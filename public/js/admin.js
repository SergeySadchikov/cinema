'use strict';
//активируем инетерфейс админки
function initAdminIntarface(data) {
    activateAdminView();
    getMenu(data).then(activateAccordeon);
}
function activateAccordeon() {
    const headers = Array.from(document.querySelectorAll('.conf-step__header'));
    headers.forEach(header => header.addEventListener('click', () => {
        header.classList.toggle('conf-step__header_closed');
        header.classList.toggle('conf-step__header_opened');
    }));
}
function getMenu(data) {
    return new Promise((resolve, reject) => {
        //menuItems.forEach(item => mainContent.appendChild(browserJSEngine(actionTemplate(item))));
        for (const key in data) {
            mainContent.appendChild(browserJSEngine(actionTemplate(key, data[key])));
        }
        resolve();
    });
}
//Представление
function activateAdminView() {
    document.querySelector('body').classList.remove('client');
    document.querySelector('body').classList.add('admin');
    mainContent.classList.add('conf-steps');
}

// Функционал
function renderAvailibeHalls(data) {
    // data.forEach(hall => document.querySelector('#availible-halls')
    //     .appendChild(browserJSEngine(availableHallsTemplate(hall)))
    // );
    document.querySelector('#availible-halls').appendChild(browserJSEngine(availableHallsTemplate()));
    data.halls.forEach(hall => document.querySelector('#availible-halls ul')
        .appendChild(browserJSEngine(availibleHallTemplate(hall))));
}