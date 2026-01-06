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
    try {
        return JSON.parse(txt);
    } catch {
        return null;
    }
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

export const bindCardAI = (id) => {
    const form =
        document.getElementById(`${id}-ai-form`) ||
        document.querySelector(`[data-card-ai-form][data-card-id="${id}"]`);

    if (!form) return;
    if (form.dataset.aiBound === "1") return;
    form.dataset.aiBound = "1";

    const promptEl = document.getElementById(`${id}-ai-prompt`);
    const responseEl = document.getElementById(`${id}-ai-response`);
    const statusEl = document.getElementById(`${id}-ai-status`);

    const submitBtn = form.querySelector("[data-ai-submit]");
    const btnText = form.querySelector("[data-ai-btn-text]");
    const btnLoading = form.querySelector("[data-ai-btn-loading]");

    const initialResponseHeight = responseEl ? responseEl.offsetHeight : 0;

    const resetTextareaHeight = (el) => {
        if (!el) return;
        el.style.height = initialResponseHeight ? `${initialResponseHeight}px` : "";
        el.style.overflowY = "hidden";
    };

    const setLoading = (loading) => {
        if (submitBtn) {
            submitBtn.toggleAttribute("disabled", !!loading);
        }

        // usa hidden attribute (garante) + classe hidden (tailwind)
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
        if (responseEl) {
            responseEl.value = "";
            resetTextareaHeight(responseEl);
        }

        setLoading(true);

        try {
            const res = await Api.post(endpoint, { nome: title, comando, payload });

            const data = res?.data ?? {};
            const answer = data.answer ?? data.message ?? data.response ?? "";

            if (responseEl) {
               responseEl.innerHTML = marked.parse(String(answer || "Sem resposta do servidor."));
            }

            Alerts?.close?.();
            Alerts?.showSuccess?.("Análise gerada com sucesso");
        } catch (err) {
            const msg =
                err?.response?.data?.message ||
                err?.response?.data?.error ||
                "Falha ao consultar a IA.";

            if (statusEl) statusEl.textContent = msg;

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
