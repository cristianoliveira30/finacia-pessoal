// Funções UI (Refresh/Expand)
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