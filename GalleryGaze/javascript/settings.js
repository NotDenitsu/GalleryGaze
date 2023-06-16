document.addEventListener('DOMContentLoaded', () => {
    const accountPill = document.getElementById('settings-account');
    const securityPill = document.getElementById('settings-security');
  
    const accountSettings = document.querySelector('.settings__account-options');
    const securitySettings = document.querySelector('.settings__security-options');
  
    accountPill.addEventListener('click', () => {
      console.log("clicked");
      accountSettings.style.display = 'block';
      securitySettings.style.display = 'none'; // Hide other settings
    });
  
    securityPill.addEventListener('click', () => {
      console.log("clicked");
      securitySettings.style.display = 'block';
      accountSettings.style.display = 'none'; // Hide other settings
    });
  });
  