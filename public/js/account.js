'use strict';
//Главные контент
const mainContent = document.querySelector('main');
//Проверка наличия юзера в localStorage
document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.username) {
        setUser(localStorage.username);
    }
});
//Профиль
const profile = document.querySelector('.user-profile ul');
//Модальное окно
const modal = document.querySelector('.modal_container');
//Формы
const signInForm = document.querySelector('#sign-in-form');
const signUpForm = document.querySelector('#sign-up-form');
signInForm.addEventListener('submit', loginAction);
signUpForm.addEventListener('submit', registerAction);
//Блок для вывода ошибок входа в приложение
const accountError = document.querySelector('.error-message');
//Выбор действия в профиле пользователя
profile.addEventListener('click', event => {
    switch (event.target.id) {
        case 'register-btn':
            showRegisterModal();
            break;
        case 'login-btn':
            showLoginModal();
            break;
        case 'logout-btn':
            logoutAction();
            break;
        case 'admin-btn':
            adminAction();
            break;
        case 'main-btn':
            clientInitialization();
            break;
    }
})
//Функционал

// Модальные окна Входа, регистрации
function showRegisterModal() {
    modal.classList.add('sign-up');
    modal.classList.remove('hidden');
}
function showLoginModal() {
    modal.classList.add('sign-in');
    modal.classList.remove('hidden');
}
function showErrorModal(message) {
    modal.classList.add('error');
    accountError.textContent = message;
    modal.classList.remove('hidden');
}

function closeModal() {
    modal.classList.remove('sign-up');
    modal.classList.remove('sign-in');
    modal.classList.remove('error');
    modal.classList.add('hidden');
}
modal.addEventListener('click', event => {
    if (!event.target.classList.contains('close')) return;
    closeModal();
});

//Активаиция состояни Client после входа юзера
function clientInitialization() {
    mainContent.innerHTML = '';
    document.querySelector('body').className = '';
    document.querySelector('body').classList.add('client');
}
//validation error messages
 function errorMsg(messages, action = 'sign-in') {
     const container = document.querySelector(`#${action}-error ul`);
     container.innerHTML = '';
     container.parentNode.classList.remove('hidden');
     messages.forEach(message => container.innerHTML += `<li>${message}</li>`);
 }
 function clearErrorMsg(action) {
     const container = document.querySelector(`#${action}-error ul`);
     container.innerHTML = '';
     container.parentNode.classList.add('hidden');
 }
 //set/unset user
 function setUser(name) {
     document.querySelector('.username').textContent = name;
     document.querySelector('.username').classList.remove('hidden');
     clientInitialization();
 }
function unsetUser() {
    document.querySelector('.username').textContent = '';
    document.querySelector('.username').classList.add('hidden');
    document.querySelector('body').className = '';
    document.querySelector('body').classList.add('default');
    mainContent.innerHTML = '';
    localStorage.clear();
 }

 console.log(localStorage);

