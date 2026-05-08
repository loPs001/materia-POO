// Estado da aplicação
let appState = {
    currentPage: 'home',
    dadosUser: null,
    queueData: {
        ticketNumber: '',
        position: 0,
        estimatedTime: '',
        serviceType: '',
        location: '',
        time: ''
    },
    queueInterval: null
};

// Inicialização quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

// Função de inicialização
function initializeApp() {
    setupNavigationButtons();
    showPage('home');
}

// Configurar botões de navegação
function setupNavigationButtons() {
    const allButtons = document.querySelectorAll('[data-page]');
    
    allButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const targetPage = this.getAttribute('data-page');
            showPage(targetPage);
        });
    });
}


// Função para mostrar página
function showPage(pageName) {
    // Esconder todas as páginas
    const allPages = document.querySelectorAll('.page');
    allPages.forEach(function(page) {
        page.classList.remove('active');
    });

    // Mostrar página selecionada
    const selectedPage = document.getElementById(pageName + 'Page');
    if (selectedPage) {
        selectedPage.classList.add('active');
    }

    // Gerenciar navegação
    const nav = document.getElementById('mainNav');
    const queueNavBtn = document.getElementById('queueNavBtn');
    const notificationsNavBtn = document.getElementById('notificationsNavBtn');

    if (pageName === 'home') {
        nav.classList.remove('visible');
    } else {
        nav.classList.add('visible');
        
        // Mostrar botões de fila e notificações se houver dados
        if (appState.queueData.ticketNumber) {
            queueNavBtn.classList.add('visible');
            notificationsNavBtn.classList.add('visible');
        }
    }

    // Atualizar estado atual
    appState.currentPage = pageName;
}


