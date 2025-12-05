document.addEventListener("DOMContentLoaded", function () {

    const fileInput = document.getElementById("cv-file");
    const fileError = document.getElementById("file-error");
    const maxFileSize = 5 * 1024 * 1024; // 5 MB

    if (fileInput) {
        fileInput.addEventListener("change", function () {
            const file = fileInput.files[0];

            if (file && file.size > maxFileSize) {
                fileError.textContent = "File is too large. Max 5MB.";
                fileInput.value = "";
            } else {
                fileError.textContent = "";
            }
        });
    }

    // отправка формы
    const form = document.getElementById("vacancy-form");
    if (form) {
        form.addEventListener("submit", function (e) {
            if (fileInput.files.length === 0) {
                fileError.textContent = "You must upload a file.";
                e.preventDefault();
            }
        });
    }
});
