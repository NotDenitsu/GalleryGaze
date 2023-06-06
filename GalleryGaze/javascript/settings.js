document.addEventListener('DOMContentLoaded', () => {
    const accountPill = document.getElementById('settings-account');
    const securityPill= document.getElementById('settings-security');
    const notificationsPill = document.getElementById('settings-notifications');

    const accountSettings = document.getElementsByClassName('settings__account-options');
    const securitySettings = document.getElementsByClassName('settings__security-options');
    const notificationsSettings = document.getElementsByClassName('settings__notifications-options');

    accountPill.addEventListener('click', () => {
        console.log("clicked");
    });

    securityPill.addEventListener('click', () => {
        console.log("clicked");
    });

    notificationsPill.addEventListener('click', () => {
        console.log("clicked");
    });

});