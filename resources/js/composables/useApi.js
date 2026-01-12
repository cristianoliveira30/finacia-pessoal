// resources/js/api/useApi.js
import axios from "axios";

export const api = axios.create({
  withCredentials: true,
  xsrfCookieName: "XSRF-TOKEN",
  xsrfHeaderName: "X-XSRF-TOKEN",
  headers: {
    "X-Requested-With": "XMLHttpRequest",
    Accept: "application/json",
  },
});

// Interceptor opcional pra normalizar erro
api.interceptors.response.use(
  (res) => res,
  (err) => {
    if (axios.isCancel?.(err) || err?.code === "ERR_CANCELED") return Promise.reject(err);

    if (err?.response?.status === 419) {
      window.location.reload(); // ou: window.location.href = "/";
    }

    return Promise.reject(err);
  }
);
