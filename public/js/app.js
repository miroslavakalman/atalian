document.addEventListener('DOMContentLoaded', function() {
    initSlider();
    initFAQ();
    initCounter();
});

function initSlider() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const slider = document.querySelector('.slides-container');

    let currentSlide = 0;
    let startX = null;
    let moved = false;
    let slideInterval = null;

    function showSlide(index) {
        currentSlide = (index + slides.length) % slides.length;

        slides.forEach(s => s.classList.remove('active'));
        dots.forEach(d => d.classList.remove('active'));

        slides[currentSlide].classList.add('active');
        dots[currentSlide]?.classList.add('active');
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    /* ---------- DRAG / SWIPE ---------- */

    slider.addEventListener('pointerdown', e => {
        // ❗ не трогаем клики по кнопкам и ссылкам
        if (e.target.closest('a, button')) return;

        startX = e.clientX;
        moved = false;
        slider.setPointerCapture(e.pointerId);
        slider.style.cursor = 'grabbing';
    });

    slider.addEventListener('pointermove', e => {
        if (startX === null) return;

        const diff = startX - e.clientX;
        if (Math.abs(diff) > 10) moved = true;
    });

    slider.addEventListener('pointerup', e => {
        if (startX === null) return;

        slider.releasePointerCapture(e.pointerId);
        slider.style.cursor = 'grab';

        if (!moved) {
            startX = null;
            return; // это был клик
        }

        const diff = startX - e.clientX;

        if (diff > 50) nextSlide();
        if (diff < -50) prevSlide();

        startX = null;
    });

    slider.addEventListener('pointercancel', () => {
        startX = null;
        slider.style.cursor = 'grab';
    });

    /* ---------- AUTOPLAY ---------- */

    function startAutoPlay() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoPlay() {
        clearInterval(slideInterval);
    }

    startAutoPlay();

    slider.addEventListener('mouseenter', stopAutoPlay);
    slider.addEventListener('mouseleave', startAutoPlay);
}

/* ---------- INIT ---------- */
document.addEventListener('DOMContentLoaded', initSlider);


/* ---------- ВАКАНСИОННЫЙ СЛАЙДЕР (без изменений) ---------- */
document.getElementById('vac-prev')?.addEventListener('click', () => {
    document.getElementById('vac-slider')
        ?.scrollBy({ left: -300, behavior: "smooth" });
});

document.getElementById('vac-next')?.addEventListener('click', () => {
    document.getElementById('vac-slider')
        ?.scrollBy({ left: 300, behavior: "smooth" });
});

function initFAQ() {
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const serviceImage = document.querySelector('.service-img');

    const serviceImages = {
        0: 'img/services/main/service-1.webp',
        1: 'img/services/main/service-2.webp',
        2: 'img/services/main/service-3.webp',
        3: 'img/services/main/service-4.webp',
        4: 'img/services/main/service-5.webp',
        5: 'img/services/main/service-6.webp',
    };

    dropdownItems.forEach((item, index) => {
        const closed = item.querySelector('.dropdown-closed');

        if (closed) {
            closed.addEventListener('click', function() {
                const isActive = item.classList.contains('active');

                dropdownItems.forEach(it => it.classList.remove('active'));

                if (!isActive) {
                    item.classList.add('active');

                    if (serviceImage) {
                        serviceImage.style.opacity = '0';
                        setTimeout(() => {
                            serviceImage.src = serviceImages[index];
                            serviceImage.style.opacity = '1';
                        }, 300);
                    }
                }
            });
        }

        const arrowUp = item.querySelector('.arrow-up');
        if (arrowUp) {
            arrowUp.addEventListener('click', function(e) {
                e.stopPropagation();
                item.classList.remove('active');
            });
        }
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-item')) {
            dropdownItems.forEach(item => item.classList.remove('active'));
        }
    });
}
function initCounter() {
    const statsSection = document.querySelector('.stats');



    function animateNumbers() {
        const numberElements = document.querySelectorAll('.stat h3[data-target]');
        if (numberElements.length === 0) return;

        numberElements.forEach(element => {
            const target = parseFloat(element.getAttribute('data-target'));
            const suffix = element.getAttribute('data-suffix') || '';
            const duration = 2000;
            const steps = 20;
            const stepValue = target / steps;

            let current = 0;
            let step = 0;

            const timer = setInterval(() => {
                current += stepValue;
                step++;

                if (step >= steps) {
                    current = target;
                    clearInterval(timer);
                }

                if (target % 1 === 0) element.textContent = Math.floor(current) + suffix;
                else element.textContent = current.toFixed(1) + suffix;
            }, duration / steps);
        });
    }

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumbers();
                observer.unobserve(statsSection);
            }
        });
    }, { threshold: 0.5 });

    observer.observe(statsSection);
}
document.addEventListener("DOMContentLoaded", function () {
    const lang = document.documentElement.getAttribute("lang") || "ru";

    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");

        if (translations[lang] && translations[lang][key]) {
            el.textContent = translations[lang][key];
        }
    });
});
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
document.addEventListener('DOMContentLoaded', function() {
    const vacCards = document.querySelectorAll('.vac-card.vac-hidden-mobile');
    const showMoreBtn = document.getElementById('show-more-btn');

    if (window.innerWidth <= 768 && vacCards.length > 0) {
        showMoreBtn.style.display = 'inline-block';
    }

    showMoreBtn?.addEventListener('click', function() {
        vacCards.forEach(card => card.classList.remove('vac-hidden-mobile'));
        showMoreBtn.style.display = 'none';
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.nav-item.has-dropdown');
    let closeTimeout;

    navItems.forEach(item => {
        const dropdown = item.querySelector('.fullscreen-dropdown');

        item.addEventListener('mouseenter', function() {
            clearTimeout(closeTimeout);
            if (dropdown) dropdown.style.display = 'block';
        });

        item.addEventListener('mouseleave', function(e) {
            const related = e.relatedTarget;
            if (related && !dropdown.contains(related)) {
                closeTimeout = setTimeout(() => {
                    if (dropdown) dropdown.style.display = 'none';
                }, 300);
            }
        });

        if (dropdown) {
            dropdown.addEventListener('mouseenter', () => clearTimeout(closeTimeout));
            dropdown.addEventListener('mouseleave', () => {
                closeTimeout = setTimeout(() => dropdown.style.display = 'none', 300);
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('showMore');

    if (!btn) return;

    btn.addEventListener('click', () => {
        document.querySelectorAll('.hidden-mobile').forEach(el => {
            el.style.display = 'flex'; 
        });

        btn.style.display = 'none'; 
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('scroll-to-vacancies');
    const target = document.getElementById('open-vacancies');

    if (!btn || !target) return;

    btn.addEventListener('click', () => {
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.nav-item.has-dropdown > a');

    dropdowns.forEach(link => {
        link.addEventListener('click', e => {
            const dropdown = link.nextElementSibling;
            if (dropdown) {
                e.preventDefault();
                dropdown.classList.toggle('active');
            }
        });
    });
});

