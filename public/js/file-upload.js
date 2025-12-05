const maxFileSize = 5 * 1024 * 1024;

document.getElementById('resume-input')?.addEventListener('change', function() {
    const file = this.files[0];
    const fileNameEl = document.getElementById('file-name');
    const fileErrorEl = document.getElementById('file-error');

    if (file) {
        if (file.size > maxFileSize) {
            fileErrorEl.textContent = "Файл слишком большой! Максимум 5 МБ.";
            fileErrorEl.style.display = "block";
            this.value = "";
            fileNameEl.textContent = "Файл не выбран";
        } else {
            fileErrorEl.style.display = "none";
            fileNameEl.textContent = file.name;
        }
    } else {
        fileNameEl.textContent = "Файл не выбран";
        fileErrorEl.style.display = "none";
    }
});
