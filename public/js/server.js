'use strict';
// Клиент
const clientId = 3;
const clientSecret = '1a6MwBZrIkcBbrSlRwhv6YEvF1g9t5slU7QYbyL7';

function getUser() {
    const request = fetch('/api/user', {
        method: 'GET',
        headers: {Accept: 'application/json', Authorization: localStorage.accessToken}
    })
        .then(res => {
            if (200 <= res.status && res.status < 300) {
                return res;
            }
            else {
                return Promise.reject();
            }
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            localStorage.username = data.name
            setUser(data.name);
        })
        .catch(error => console.log(error));
}
function loginAction(event, sendData = {}) {
    event.preventDefault();
    if (localStorage.accessToken) return;
    if (Object.keys(sendData).length == 0) {
        const dataForm = new FormData(signInForm);
        for (const [key, value] of dataForm) {
            sendData[key] = value;
        }
    }
    sendData['client_id'] = clientId;
    sendData['client_secret'] = clientSecret;
    sendData['grant_type'] = 'password';
    const request = fetch('/api/auth/login', {
        body: JSON.stringify(sendData),
        credentials: 'same-origin',
        method: 'POST',
        headers: {'Content-Type': 'application/json'}
    })
    .then(res => {
        if (200 <= res.status && res.status < 300) {
            return res;
        }
        else if (res.status === 401) {
            return Promise.reject();
        }
    })
    .then(res => res.json())
    .then(data => {
        localStorage.accessToken = `${data.token_type} ${data.access_token}`;
        clientInitialization();
        getUser();
        closeModal();
        clearErrorMsg('sign-in');
    })
    .catch(e =>  errorMsg(['Учетные данные пользователя неверны']));
}
function logoutAction() {
    const request = fetch('/api/auth/logout', {
        method: 'GET',
        headers: {Accept: 'application/json', Authorization: localStorage.accessToken}
    })
    .then(res => {
        if (200 <= res.status && res.status < 300) {
            unsetUser();
        } else {
            return Promise.reject();
        }
    })
    .catch(error => console.log(error));
}
function registerAction(event) {
    event.preventDefault();
    if (localStorage.accessToken) return;
    const sendData = {};
    const dataForm = new FormData(signUpForm);
    for (const [key, value] of dataForm) {
        sendData[key] = value;
    }
    const request = fetch('/api/auth/register', {
        body: JSON.stringify(sendData),
        credentials: 'same-origin',
        method: 'POST',
        headers: {'Content-Type': 'application/json'}
    })
    .then(res => {
        if (200 <= res.status && res.status < 300) {
            return res;
        }
        else if (res.status === 422) {
            return Promise.reject(res);
        }
    })
    .then(res => res.json())
    .then((data) => {
        const user = {username: sendData.email, password: sendData.password};
        loginAction(event, user);
        clearErrorMsg('sign-up');
    })
    .catch(res =>  {
        res.json()
            .then(data => {
                const registerErrors = [];
                for (const key in data.errors) {
                    data.errors[key].forEach(error => {
                        registerErrors.push(error)
                    });
                }
                return registerErrors;
            })
            .then(errors => errorMsg(errors, 'sign-up'));
    });
}
function adminAction() {
    const request = fetch('/api/admin/', {
        method: 'GET',
        credentials: 'include',
        headers: {Accept: 'application/json', Authorization: localStorage.accessToken}
    })
        .then(res => {
            if (200 <= res.status && res.status < 300) {
                return res;
            }
            if(res.status === 403) {
                return Promise.reject(res);
            }
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            initAdminIntarface(data.message)
        })
        .then(getHallsData)
        .catch(res => {
            res.json()
                .then(data => showErrorModal(data.error));
        });
}
function getHallsData() {
    const request = fetch('/api/halls', {
        method: 'GET',
        credentials: 'include',
        headers: {Accept: 'application/json', Authorization: localStorage.accessToken}
    })
        .then(res => {
            if (200 <= res.status && res.status < 300) {
                return res;
            }
        })
        .then(res => res.json())
        .then(data => renderAvailibeHalls(data));
}