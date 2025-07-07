const formContactPerson = document.getElementById('contactPersonForm');
const saveButton = document.getElementById('saveButton');
const successAlert = document.getElementById('successAlert');
const errorAlert = document.getElementById('errorAlert');
const url = window.Laravel.appUrl;
console.log(url);

saveButton.addEventListener('click', async function() {
    await submitForm();
});


async function submitForm() {
    const formData = new FormData(formContactPerson);
    const response = await fetch(`${url}/contact-person/store`, {
        method: 'POST',
        body: formData
    });

    if (response.ok) {
        const data = await response.json();
        successAlert.style.display = 'block';
        successAlert.textContent = data.message;
        setTimeout(() => {
            successAlert.style.display = 'none';
        }, 3000);
    } else {
        const errorData = await response.json();
        errorAlert.style.display = 'block';
        errorAlert.textContent = errorData.message;
        setTimeout(() => {
            errorAlert.style.display = 'none';
        }, 3000);
    }
}