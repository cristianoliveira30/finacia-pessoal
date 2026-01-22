import { marked } from "marked";

export const Refresh = (id) => {
    window.dispatchEvent(new CustomEvent('chart:refresh', { detail: { cardId: id } }));
};

export const toggleExpand = (id) => {
    const card = document.getElementById(id);
    if (card) {
        card.classList.toggle('col-span-full');
        card.classList.toggle('z-10');
        setTimeout(() => window.dispatchEvent(new Event('resize')), 300);
    }
};

function safeParseJsonScript(scriptId) {
    const el = document.getElementById(scriptId);
    if (!el) return null;
    const txt = (el.textContent || "").trim();
    if (!txt) return null;
    try { return JSON.parse(txt); } catch { return null; }
}

/**
 * Normaliza qualquer formato de chart para um payload consistente.
 * Retorna sempre:
 * { title, type, x_label, categories:[], series:[{name, data:[]}] }
 */
function normalizeChartPayload(chart, type, title) {
    const obj = chart && typeof chart === "object" ? chart : {};

    // categorias
    const categories =
        Array.isArray(obj.categories) ? obj.categories :
            Array.isArray(obj.labels) ? obj.labels :
                Array.isArray(obj.xAxis?.categories) ? obj.xAxis.categories :
                    [];

    // series
    let series = [];
    if (Array.isArray(obj.series)) {
        // padrão esperado: [{name, data:[]}]
        if (obj.series.length && typeof obj.series[0] === "object" && "data" in obj.series[0]) {
            series = obj.series.map((s) => ({
                name: String(s?.name ?? title ?? "Série"),
                data: Array.isArray(s?.data) ? s.data.map((n) => (Number.isFinite(+n) ? +n : n)) : [],
            }));
        } else {
            // se vier série como array simples (ex: [1,2,3])
            series = [{
                name: String(title ?? "Série"),
                data: obj.series.map((n) => (Number.isFinite(+n) ? +n : n)),
            }];
        }
    } else if (Array.isArray(obj.data)) {
        series = [{ name: String(title ?? "Série"), data: obj.data }];
    }

    return {
        title: String(title ?? ""),
        type: String(type ?? ""),
        x_label: obj.x_label ?? obj.xLabel ?? null,
        categories,
        series,
        // opcional: mantém o bruto para debug/backwards
        raw: obj,
    };
}

function scrollToBottom(el) {
    if (!el) return;
    el.scrollTop = el.scrollHeight;
}

function createBubble(side /* 'user' | 'ai' */, { label = null } = {}) {
    const bubble = document.createElement("div");

    const base =
        "p-2.5 text-sm rounded-lg border break-words max-w-[85%] " +
        "border-slate-200 dark:border-slate-700 black:border-zinc-800";

    const ai =
        "mr-auto text-slate-700 bg-slate-100 " +
        "dark:bg-slate-900/50 dark:text-slate-200 " +
        "black:bg-zinc-950 black:text-zinc-300";

    const user =
        "ml-auto text-slate-700 bg-white " +
        "dark:bg-slate-800 dark:text-slate-100 " +
        "black:bg-zinc-900 black:text-zinc-100";

    bubble.className = `${base} ${side === "user" ? user : ai}`;

    if (label) {
        const head = document.createElement("div");
        head.className =
            "mb-1 flex items-center gap-1 text-[11px] " +
            "text-slate-500 dark:text-slate-400 black:text-zinc-500 select-none";
        head.innerHTML = label;
        bubble.appendChild(head);
    }

    const content = document.createElement("div");
    content.dataset.aiContent = "1";
    // deixa o texto quebrar e manter quebras
    content.className = "whitespace-pre-wrap";
    bubble.appendChild(content);

    return { bubble, content };
}

function getLoaderFragment(id) {
    const tpl = document.getElementById(`${id}-ai-loader-template`);
    if (!tpl || !("content" in tpl)) return null;
    return tpl.content.cloneNode(true);
}

async function typeWriter(targetEl, text, { speed = 12 } = {}) {
    if (!targetEl) return;

    // respeita prefer-reduced-motion
    if (window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches) {
        targetEl.textContent = text;
        return;
    }

    targetEl.textContent = "";
    for (let i = 0; i < text.length; i++) {
        targetEl.textContent += text[i];
        // leve “humanização” sem custar caro
        const delay = text[i] === "\n" ? speed * 2 : speed;
        await new Promise((r) => setTimeout(r, delay));
    }
}

/* =========================
   Bind IA por card
   ========================= */

export const bindCardAI = (id) => {
    const form =
        document.getElementById(`${id}-ai-form`) ||
        document.querySelector(`[data-card-ai-form][data-card-id="${id}"]`);

    if (!form) return;
    if (form.dataset.aiBound === "1") return;
    form.dataset.aiBound = "1";

    const promptEl = document.getElementById(`${id}-ai-prompt`);

    // NOVO: container de mensagens (scroll)
    const messagesEl = document.getElementById(`${id}-ai-messages`);

    // mantém compatibilidade com seu Blade atual (placeholder tem id ai-response)
    const placeholderEl = document.getElementById(`${id}-ai-response`);
    const statusEl = document.getElementById(`${id}-ai-status`);

    const submitBtn = form.querySelector("[data-ai-submit]");
    const btnText = form.querySelector("[data-ai-btn-text]");
    const btnLoading = form.querySelector("[data-ai-btn-loading]");

    const setLoading = (loading) => {
        if (submitBtn) submitBtn.toggleAttribute("disabled", !!loading);

        if (btnText) {
            btnText.toggleAttribute("hidden", !!loading);
            btnText.classList.toggle("hidden", !!loading);
        }

        if (btnLoading) {
            btnLoading.toggleAttribute("hidden", !loading);
            btnLoading.classList.toggle("hidden", !loading);
        }
    };

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const Api = window.Api;
        const Alerts = window.Alerts;

        if (!Api) {
            statusEl && (statusEl.textContent = "window.Api não encontrado.");
            Alerts?.showError?.({ msg: "API não configurada (window.Api)." });
            return;
        }

        const endpoint = form.getAttribute("action");
        const comando = String(promptEl?.value ?? "").trim();

        if (!endpoint) {
            statusEl && (statusEl.textContent = "Endpoint não configurado.");
            Alerts?.showError?.({ msg: "Endpoint não configurado." });
            return;
        }

        if (!comando) {
            statusEl && (statusEl.textContent = "Digite uma pergunta antes de enviar.");
            Alerts?.showInfo?.("Digite uma pergunta antes de enviar.");
            return;
        }

        const title = form.dataset.aiTitle || "";
        const chartType = form.dataset.aiChartType || "";
        const chart = safeParseJsonScript(`${id}-ai-chart-json`);
        const payload = normalizeChartPayload(chart, chartType, title);

        const hasData = (payload.categories?.length || 0) > 0 || (payload.series?.length || 0) > 0;
        if (!hasData) {
            statusEl && (statusEl.textContent = "dados insuficientes");
            Alerts?.showInfo?.("Dados insuficientes para análise.");
            return;
        }

        if (statusEl) statusEl.textContent = "";

        // remove placeholder inicial
        if (placeholderEl) placeholderEl.remove();

        setLoading(true);

        // 1) balão do usuário
        if (messagesEl) {
            const userMsg = createBubble("user", { label: `<span>Você</span>` });
            userMsg.content.textContent = comando;
            messagesEl.appendChild(userMsg.bubble);
            scrollToBottom(messagesEl);
        }

        // 2) balão da IA com loader
        let aiBubble = null;
        let aiContent = null;

        if (messagesEl) {
            const aiMsg = createBubble("ai", { label: `<span>Assistente</span>` });
            const loaderFrag = getLoaderFragment(id);

            if (loaderFrag) {
                aiMsg.content.appendChild(loaderFrag);
            } else {
                aiMsg.content.textContent = "Gerando resposta...";
            }

            messagesEl.appendChild(aiMsg.bubble);
            scrollToBottom(messagesEl);

            aiBubble = aiMsg.bubble;
            aiContent = aiMsg.content;
        }

        try {
            const res = await Api.post(endpoint, { nome: title, comando, payload });

            const data = res?.data ?? {};
            const answer = String(data.answer ?? data.message ?? data.response ?? "Sem resposta do servidor.");

            // 3) troca loader por “digitando”
            if (aiContent) {
                aiContent.innerHTML = `<span data-ai-typed></span><span class="ai-cursor">▍</span>`;
                const typedEl = aiContent.querySelector("[data-ai-typed]");

                await typeWriter(typedEl, answer, { speed: 12 });

                // render final em markdown (cara de produto)
                aiContent.innerHTML = marked.parse(answer);

                // garante scroll no final após render
                scrollToBottom(messagesEl);
            }

            Alerts?.close?.();
            Alerts?.showSuccess?.("Análise gerada com sucesso");
            if (promptEl) promptEl.value = "";
        } catch (err) {
            const msg =
                err?.response?.data?.message ||
                err?.response?.data?.error ||
                "Falha ao consultar a IA.";

            if (statusEl) statusEl.textContent = msg;

            // se existe bolha de IA, reaproveita ela como erro
            if (aiContent) {
                aiContent.textContent = msg;
                // opcional: “pinta” a bolha como erro
                aiBubble?.classList?.add("border-red-300", "bg-red-50");
                aiBubble?.classList?.add("dark:border-red-900/40", "dark:bg-red-950/30");
                aiBubble?.classList?.add("black:border-red-900/40", "black:bg-zinc-950");
            }

            Alerts?.close?.();
            Alerts?.showError?.({ msg });
        } finally {
            Alerts?.close?.();
            setLoading(false);
        }
    });
};

export const bindAllCardsAI = (root = document) => {
    root.querySelectorAll("[data-card-ai-form][data-card-id]").forEach((f) => {
        const id = f.getAttribute("data-card-id");
        if (id) bindCardAI(id);
    });
};

export const bindOverlayToggle = (cardId) => {
    const card = document.getElementById(cardId);
    if (!card) return;

    const wrap = card.querySelector("[data-overlay-toggle]");
    if (!wrap) return;

    // evita bind duplicado
    if (wrap.dataset.bound === "1") return;
    wrap.dataset.bound = "1";

    const chartId = wrap.getAttribute("data-chart-id");
    const defaultMode = wrap.getAttribute("data-default-mode") || "none";
    const buttons = Array.from(wrap.querySelectorAll("[data-overlay-mode]"));

    const setActive = (mode) => {
        buttons.forEach((btn) => {
            const on = btn.getAttribute("data-overlay-mode") === mode;

            // limpa estados (ativo/inativo)
            btn.classList.remove(
                // ativo
                "bg-sky-600", "text-white", "hover:bg-sky-700",
                "dark:bg-sky-500", "dark:hover:bg-sky-400",
                // inativo
                "bg-white", "text-slate-600", "hover:bg-slate-200", "hover:text-slate-900",
                "dark:bg-slate-800/60", "dark:text-slate-200", "dark:hover:bg-slate-700", "dark:hover:text-white"
            );

            if (on) {
                // ✅ ativo (claro + dark)
                btn.classList.add("bg-sky-600", "text-white", "hover:bg-sky-700", "dark:bg-sky-500", "dark:hover:bg-sky-400");
            } else {
                // ✅ inativo (claro + dark)
                btn.classList.add(
                    "bg-white", "text-slate-600", "hover:bg-slate-200", "hover:text-slate-900",
                    "dark:bg-slate-800/60", "dark:text-slate-200", "dark:hover:bg-slate-700", "dark:hover:text-white"
                );
            }
        });
    };


    const emit = (mode) => {
        window.dispatchEvent(
            new CustomEvent("chart:overlay", { detail: { chartId, mode } })
        );
    };

    // estado inicial
    setActive(defaultMode);
    emit(defaultMode);

    buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const mode = btn.getAttribute("data-overlay-mode") || "none";
            setActive(mode);
            emit(mode);
        });
    });
};

export const bindAllOverlayToggles = (root = document) => {
    root.querySelectorAll("[data-overlay-toggle]").forEach((wrap) => {
        // acha o card pai
        const card = wrap.closest("[id]");
        if (!card?.id) return;
        bindOverlayToggle(card.id);
    });
};
