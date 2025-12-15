// resources/js/composables/useFilter.js

/**
 * Alterna a visibilidade de um container de filtro e atualiza o estilo do botão.
 * @param {string} containerId - O ID da div que contém os filtros.
 * @param {string} buttonId - O ID do botão que aciona o filtro.
 */
export function toggleFilter(containerId = 'filterContainer', buttonId = 'filterButton') {
    const container = document.getElementById(containerId);
    const button = document.getElementById(buttonId);

    if (!container || !button) {
        console.warn(`Elementos do filtro não encontrados: ${containerId}, ${buttonId}`);
        return;
    }

    // Alterna a classe 'hidden'
    container.classList.toggle('hidden');

    // Verifica se está visível para aplicar os estilos de "Ativo"
    const isVisible = !container.classList.contains('hidden');

    if (isVisible) {
        // Estilo ATIVO (Cinza/Dark com anel de foco)
        button.classList.add('bg-gray-100', 'dark:bg-gray-600', 'ring-2', 'ring-gray-200', 'dark:ring-gray-500');
        button.classList.remove('bg-white', 'dark:bg-gray-700');
    } else {
        // Estilo INATIVO (Branco padrão)
        button.classList.remove('bg-gray-100', 'dark:bg-gray-600', 'ring-2', 'ring-gray-200', 'dark:ring-gray-500');
        button.classList.add('bg-white', 'dark:bg-gray-700');
    }
}