// resources/js/api/useApi.js
import axios from "axios";

export const api = axios.create({
  withCredentials: true,
  headers: {
    "X-Requested-With": "XMLHttpRequest",
    Accept: "application/json",
  },
});

// Interceptor opcional pra normalizar erro
api.interceptors.response.use(
  (res) => res,
  (err) => {
    // abort/cancel
    if (axios.isCancel?.(err) || err?.code === "ERR_CANCELED") {
      return Promise.reject(err);
    }

    // você pode padronizar aqui (401/419 etc.)
    return Promise.reject(err);
  }
);
