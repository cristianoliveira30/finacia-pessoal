//export CSV
export const baixarCSV = (data) => {

}

//export PDF 
export const baixarPDF = (data) => {

}

//export xlsx
export const baixarXlsx = (data) => {
    
}

// Funcao de Refresh do Card
export const Refresh = (cardId) => {
    const btn = document.getElementById(`${cardId}-btn-refresh`);
    const icon = btn ? btn.querySelector('svg') : null;

    // Adiciona animação de rotação para feedback visual
    if (icon) {
        icon.classList.add('animate-spin');
    }

    // Dispara um evento customizado informando que este card precisa ser atualizado.
    // O componente do gráfico (ApexCharts ou Livewire) deve ouvir este evento.
    window.dispatchEvent(new CustomEvent('chart:refresh', { detail: { cardId } }));

    // Simula tempo de resposta/network (Remove a animação após 1s)
    // Em uma implementação real, você removeria a classe no callback de sucesso da requisição
    setTimeout(() => {
        if (icon) {
            icon.classList.remove('animate-spin');
        }
    }, 1000);
}

// Funcao que expande o card em tela cheia
export function toggleExpand(cardId) {
    const card = document.getElementById(cardId);
    const btn = document.getElementById(`${cardId}-btn-expand`);
    // Busca o SVG dentro do botão para manipular as classes do ícone
    const iconSvg = btn ? btn.querySelector('svg') : null;

    // Verifica se já está expandido olhando se possui a classe de grid total
    const isExpanded = card.classList.contains('col-span-full');

    if (isExpanded) {
        // === MINIMIZAR (Voltar ao tamanho original) ===

        // Remove a classe que força a largura total
        card.classList.remove('col-span-full', 'z-10');

        // Restaura o ícone de expansão (se estiver usando Bootstrap Icons classes)
        if (iconSvg) {
            // Remove o ícone de "contratar" e volta para "expandir"
            // Nota: Ajuste os nomes das classes conforme a biblioteca de ícones que o x-bi usa,
            // aqui estou seguindo a lógica do seu código original.
            iconSvg.classList.remove('bi-arrows-angle-contract');
            iconSvg.classList.add('bi-arrows-fullscreen');
        }

    } else {
        // === EXPANDIR (Ocupar toda a linha) ===

        // Adiciona classe para ocupar todas as colunas do grid pai
        // z-10 garante que ele fique levemente acima de elementos vizinhos durante a transição
        card.classList.add('col-span-full', 'z-10');

        // Troca o ícone para "contratar/reduzir"
        if (iconSvg) {
            iconSvg.classList.remove('bi-arrows-fullscreen');
            iconSvg.classList.add('bi-arrows-angle-contract');
        }

        // UX: Rola a página suavemente para garantir que o card expandido esteja visível
        setTimeout(() => {
            card.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }, 300);
    }

    // CRÍTICO: Força o ApexCharts a redesenhar para preencher a nova largura
    setTimeout(() => {
        window.dispatchEvent(new Event('resize'));
    }, 300); // Delay igual à duração da transição CSS (se houver)
}

export const getCardGeneric = async (object) => {
    const { name, data } = object;

    try {
        const response = await fetch(name, data);

        if (!response.ok) {
            throw new Error(`Erro HTTP: ${response.status}`);
        }

        const result = await response.json();
        return result;

    } catch (error) {
        console.error("Erro no getCardGeneric:", error);
        return null;
    }
};
