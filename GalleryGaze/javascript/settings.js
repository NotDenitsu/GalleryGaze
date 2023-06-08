document.addEventListener('DOMContentLoaded', () => {
    const accountPill = document.getElementById('settings-account');
    const securityPill= document.getElementById('settings-security');


    const accountSettings = document.getElementsByClassName('settings__account-options');
    const securitySettings = document.getElementsByClassName('settings__security-options');

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