function initSlider() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const slider = document.querySelector('.slides-container');

    if (slides.length === 0) {
        console.warn('Слайдер: нет .slide — пропускаем');
        return;
    }

    let currentSlide = 0;
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    function showSlide(n) {
        currentSlide = (n + slides.length) % slides.length;

        slides.forEach(s => s.classList.remove('active'));
        dots.forEach(d => d.classList.remove('active'));

        slides[currentSlide]?.classList.add('active');
        dots[currentSlide]?.classList.add('active');
    }

    function nextSlide() { showSlide(currentSlide + 1); }
    function prevSlide() { showSlide(currentSlide - 1); }

    // Свайпы
    if (slider) {
        slider.style.cursor = 'grab';

        slider.addEventListener('mousedown', e => {
            isDragging = true;
            startX = e.pageX;
            slider.style.cursor = 'grabbing';
        });

        slider.addEventListener('mousemove', e => {
            if (!isDragging) return;
            currentX = e.pageX;
        });

        slider.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            slider.style.cursor = 'grab';

            const diff = startX - currentX;

            if (diff > 50) nextSlide();
            if (diff < -50) prevSlide();
        });

        // Touch
        slider.addEventListener('touchstart', e => {
            startX = e.touches[0].clientX;
        });

        slider.addEventListener('touchmove', e => {
            currentX = e.touches[0].clientX;
        });

        slider.addEventListener('touchend', () => {
            const diff = startX - currentX;

            if (diff > 50) nextSlide();
            if (diff < -50) prevSlide();
        });
    }

    // Автопереключение — только ОДИН раз
    let slideInterval = setInterval(nextSlide, 5000);

    // Пауза при наведении
    if (slider) {
        slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
        slider.addEventListener('mouseleave', () => {
            slideInterval = setInterval(nextSlide, 5000);
        });
    }
}


    // FAQ - с защитой от ошибок
    function initFAQ() {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const serviceImage = document.querySelector('.service-img');

        if (dropdownItems.length === 0) {
            console.log('FAQ: нет элементов на странице');
            return;
        }

        console.log('FAQ: инициализация', dropdownItems.length, 'элементов');

        const serviceImages = {
            0: 'img/service-1.png',
            1: 'img/service-2.png', 
            2: 'img/service-3.png',
            3: 'img/service-4.png',
            4: 'img/service-5.png', 
            5: 'img/service-6.png',
        };

        dropdownItems.forEach((item, index) => {
            const closed = item.querySelector('.dropdown-closed');
            
            if (closed) {
                closed.addEventListener('click', function() {
                    const isActive = item.classList.contains('active');
                    
                    dropdownItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                    });
                    
                    if (!isActive) {
                        item.classList.add('active');
                        
                        // Плавная смена картинки
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
                dropdownItems.forEach(item => {
                    item.classList.remove('active');
                });
            }
        });
    }

    // Анимация чисел - с защитой от ошибок
    function initCounter() {
        const statsSection = document.querySelector('.stats');
        
        if (!statsSection) {
            console.log('Счетчик: нет блока статистики на странице');
            return;
        }

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
                    
                    if (target % 1 === 0) {
                        element.textContent = Math.floor(current) + suffix;
                    } else {
                        element.textContent = current.toFixed(3) + suffix;
                    }
                }, duration / steps);
            });
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumbers();
                    observer.unobserve(statsSection);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(statsSection);
    }
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Инициализация выпадающего меню...');
        
        const navItems = document.querySelectorAll('.nav-item.has-dropdown');
        let closeTimeout;
        
        navItems.forEach(item => {
            const dropdown = item.querySelector('.fullscreen-dropdown');
            
            // Открытие при наведении
            item.addEventListener('mouseenter', function() {
                console.log('Открываем меню');
                clearTimeout(closeTimeout); // Отменяем закрытие если было
                if (dropdown) {
                    dropdown.style.display = 'block';
                }
            });
            
            // Закрытие с задержкой при уходе
            item.addEventListener('mouseleave', function(e) {
                // Проверяем, перешли ли мы на само меню
                const relatedTarget = e.relatedTarget;
                if (relatedTarget && !dropdown.contains(relatedTarget)) {
                    console.log('Закрываем меню с задержкой');
                    closeTimeout = setTimeout(() => {
                        if (dropdown) {
                            dropdown.style.display = 'none';
                        }
                    }, 300); // Задержка 300ms
                }
            });
            
            // Обработчики для самого меню
            if (dropdown) {
                dropdown.addEventListener('mouseenter', function() {
                    console.log('Курсор в меню - отменяем закрытие');
                    clearTimeout(closeTimeout);
                });
                
                dropdown.addEventListener('mouseleave', function(e) {
                    console.log('Курсор ушел из меню - закрываем');
                    closeTimeout = setTimeout(() => {
                        dropdown.style.display = 'none';
                    }, 300);
                });
            }
        });
        
        console.log('Найдено элементов с выпадающим меню:', navItems.length);
    });

    // ГЛАВНАЯ ИНИЦИАЛИЗАЦИЯ
    document.addEventListener('DOMContentLoaded', function() {
        console.log('=== ИНИЦИАЛИЗАЦИЯ СКРИПТОВ ===');
        
        // Запускаем все модули
        initSlider();
        initFAQ(); 
        initCounter();
        
        console.log('=== СКРИПТЫ ЗАГРУЖЕНЫ ===');
    });

    document.getElementById('vac-prev')?.addEventListener('click', () => {
        document.getElementById('vac-slider').scrollBy({ left: -300, behavior: "smooth" });
    });

    document.getElementById('vac-next')?.addEventListener('click', () => {
        document.getElementById('vac-slider').scrollBy({ left: 300, behavior: "smooth" });
    });
    document.getElementById('resume-input').addEventListener('change', function() {
        const fileName = this.files.length ? this.files[0].name : "Файл не выбран";
        document.getElementById('file-name').textContent = fileName;
    });
    const maxFileSize = 5 * 1024 * 1024; // 5 МБ

    document.getElementById('resume-input').addEventListener('change', function() {
        const file = this.files[0];
        const fileNameEl = document.getElementById('file-name');
        const fileErrorEl = document.getElementById('file-error');

        if(file) {
            if(file.size > maxFileSize) {
                fileErrorEl.textContent = "Файл слишком большой! Максимум 5 МБ.";
                fileErrorEl.style.display = "block";
                this.value = ""; // сброс файла
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

