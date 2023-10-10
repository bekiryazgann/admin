let domainRegisterForm = document.querySelector('#domain-register-form');

domainRegisterForm.addEventListener('submit', event => {
    let domainName = domainRegisterForm.querySelector('input').value
    confirm('Eklemek istediğiniz Domain bu mu? "' + domainName + '"');

    domainRegisterForm.querySelector('input').setAttribute('value', '')
    domainRegisterForm.querySelector('input').value = ''
    event.preventDefault()
})