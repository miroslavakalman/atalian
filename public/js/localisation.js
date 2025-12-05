document.addEventListener("DOMContentLoaded", function () {
    const lang = document.documentElement.getAttribute("lang") || "ru";

    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");

        if (translations[lang] && translations[lang][key]) {
            el.textContent = translations[lang][key];
        }
    });
});
