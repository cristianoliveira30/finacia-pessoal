// resources/js/api/reports.js
async function getRelatoriosGraph(data, { signal } = {}) {
  const endpoint = data.link;
  const method = (data.method || "POST").toUpperCase();
  const filtros = data.filtros || {};

  const init = {
    method,
    headers: { "Content-Type": "application/json" },
    signal,
  };

  // Only send body when not GET/HEAD
  if (method !== "GET" && method !== "HEAD") {
    init.body = JSON.stringify(filtros);
  }

  const response = await fetch(endpoint, init);

  if (!response.ok) {
    const text = await response.text().catch(() => "");
    throw new Error(`HTTP ${response.status}: ${text || response.statusText}`);
  }

  // in case 204
  if (response.status === 204) return null;

  return await response.json();
}

export {
    getRelatoriosGraph
}
