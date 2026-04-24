// Estado da aplicação
let appState = {
    currentPage: 'home',
    userName: ''
};
// Inicialização quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});
// Função de inicialização
function initializeApp() {
    setupNavigationButtons();
    setupForms();
    setupDateInput();
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
// Configurar data mínima para agendamento
function setupDateInput() {
    const dateInput = document.getElementById('appointmentDate');

    if (!dateInput) return;

    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    const formattedDate = year + '-' + month + '-' + day;
    
    dateInput.setAttribute('min', formattedDate);
}
// Função para mostrar página
function showPage(pageName) {
    const allPages = document.querySelectorAll('.page');
    allPages.forEach(function(page) {
        page.classList.remove('active');
    });
    const selectedPage = document.getElementById(pageName + 'Page');
  if (selectedPage) {
        selectedPage.classList.add('active');
    }

    const nav = document.getElementById('mainNav');

    if (pageName === 'home') {
        nav.classList.remove('visible');
    } else {
        nav.classList.add('visible');
    }

    appState.currentPage = pageName;
}

// Função de Cadastramento:
function CadastrarUsuario () {
    let nomeInput = document.querySelector("input#registerName").value;
    let cpfInput = document.querySelector("input#registerCpf").value;
    let nascimentoInput = document.querySelector("input#").value;
    let nascimentoInput = document.querySelector("input#registerEmail").value;
    let nascimentoInput = document.querySelector("input#").value;
    


}
