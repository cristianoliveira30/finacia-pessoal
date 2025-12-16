// resources/js/composables/useAlerts.js
import Swal from "sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";

function isDark() {
  return document.documentElement.classList.contains("dark");
}

function normalizeError(err) {
  if (!err) return "Erro inesperado.";
  if (typeof err === "string") return err;
  if (err.message) return err.message;
  try { return JSON.stringify(err); } catch { return String(err); }
}

function themeOptions() {
  // classes base (Tailwind)
  const base = {
    popup: "shadow-lg border",
    title: "text-base",
    htmlContainer: "text-sm",
  };

  if (isDark()) {
    return {
      customClass: {
        ...base,
        popup: `${base.popup} border-slate-700`,
      },
    };
  }

  return {
    customClass: {
      ...base,
      popup: `${base.popup} border-slate-200`,
    },
  };
}

export function useAlerts() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });

  function showSuccess(message, title = "Sucesso") {
    return Toast.fire({ icon: "success", title, text: message, ...themeOptions() });
  }

  function showInfo(message, title = "Info") {
    return Toast.fire({ icon: "info", title, text: message, ...themeOptions() });
  }

  function showError({ title = "Erro", msg = "Erro inesperado." } = {}) {
    return Toast.fire({ icon: "error", title, text: normalizeError(msg), ...themeOptions() });
  }

  function loading(title = "Carregando...", text = "Aguarde um instante.") {
    return Swal.fire({
      title,
      text,
      allowOutsideClick: false,
      allowEscapeKey: false,
      showConfirmButton: false,
      didOpen: () => Swal.showLoading(),
      ...themeOptions(),
    });
  }

  function close() {
    Swal.close();
  }

  async function confirm({
    title = "Confirmar?",
    text = "Deseja continuar?",
    confirmButtonText = "Sim",
    cancelButtonText = "Cancelar",
    icon = "question",
  } = {}) {
    const res = await Swal.fire({
      title,
      text,
      icon,
      showCancelButton: true,
      confirmButtonText,
      cancelButtonText,
      reverseButtons: true,
      focusCancel: true,
      ...themeOptions(),
    });
    return res.isConfirmed;
  }

  // ✅ opcional: ouvir troca de tema e fechar/reabrir se tiver modal aberto
  function bindThemeSync() {
    const html = document.documentElement;

    const obs = new MutationObserver(() => {
      // se tiver um swal aberto, atualiza (reabre) — toast normalmente já pega o tema no próximo
      if (Swal.isVisible()) {
        const { title, html: content } = Swal.getPopup()
          ? { title: Swal.getTitle()?.textContent, html: Swal.getHtmlContainer()?.innerHTML }
          : { title: null, html: null };

        // simples: só força redraw fechando (evita lógica complexa)
        Swal.close();
      }
    });

    obs.observe(html, { attributes: true, attributeFilter: ["class"] });
    return () => obs.disconnect();
  }

  return { showSuccess, showError, showInfo, loading, close, confirm, bindThemeSync };
}
