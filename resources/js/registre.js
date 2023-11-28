// public/js/register.js

document.getElementById('role').addEventListener('change', function () {
    var adminFields = document.getElementById('adminFields');

    if (this.value === '1') {
        adminFields.style.display = 'block';
    } else {
        adminFields.style.display = 'none';
    }
});
