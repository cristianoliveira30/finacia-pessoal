// resources/js/api/useApi.js
import axios from "axios";

export const api = axios.create({
  withCredentials: true,
  headers: {
    "X-Requested-With": "XMLHttpRequest",
    Accept: "application/json",
  },
});

// CSRF (Laravel)
const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
if (token) {
  api.defaults.headers.common["X-CSRF-TOKEN"] = token;
}

api.interceptors.response.use(
  (res) => res,
  (err) => {
    if (axios.isCancel?.(err) || err?.code === "ERR_CANCELED") return Promise.reject(err);
    return Promise.reject(err);
  }
);
