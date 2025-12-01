<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Главная - Аталиан')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="@yield('body-class')">

    <!-- HEADER -->
    <header class="header">
        <a href="{{ url(app()->getLocale() . '/') }}" class="logo-link">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
        </a>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav" id="mainNav">
            <!-- О компании -->
            <div class="nav-item has-dropdown">
                <a href="{{ url(app()->getLocale() . '/about') }}">{{ __('messages.about_us') }}</a>
                <div class="fullscreen-dropdown">
                    <button class="menu-close" onclick="closeMenu(this)">×</button>
                    <div class="dropdown-content">
                        <div class="dropdown-section">
                            <h3>О компании</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/about/history') }}">История</a>
                                <a href="{{ url(app()->getLocale() . '/about/team') }}">Команда</a>
                                <a href="{{ url(app()->getLocale() . '/about/values') }}">Ценности</a>
                                <a href="{{ url(app()->getLocale() . '/about/leadership') }}">Руководство</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Деятельность</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/about/approach') }}">Наш подход</a>
                                <a href="{{ url(app()->getLocale() . '/about/geography') }}">География</a>
                                <a href="{{ url(app()->getLocale() . '/about/partners') }}">Партнеры</a>
                                <a href="{{ url(app()->getLocale() . '/about/achievements') }}">Достижения</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Сертификаты</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/about/certificates') }}">Качество</a>
                                <a href="{{ url(app()->getLocale() . '/about/standards') }}">Стандарты</a>
                                <a href="{{ url(app()->getLocale() . '/about/compliance') }}">Соответствие</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Пресс-центр</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/about/news') }}">Новости</a>
                                <a href="{{ url(app()->getLocale() . '/about/media') }}">СМИ о нас</a>
                                <a href="{{ url(app()->getLocale() . '/about/events') }}">Мероприятия</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Услуги -->
            <div class="nav-item has-dropdown">
                <a href="{{ url(app()->getLocale() . '/services') }}">{{ __('messages.services') }}</a>
                <div class="fullscreen-dropdown">
                    <button class="menu-close" onclick="closeMenu(this)">×</button>
                    <div class="dropdown-content">
                        <div class="dropdown-section">
                            <h3>Основные услуги</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/services/cleaning') }}">Клининг</a>
                                <a href="{{ url(app()->getLocale() . '/services/technical') }}">Техобслуживание</a>
                                <a href="{{ url(app()->getLocale() . '/services/supply') }}">Закупки</a>
                                <a href="{{ url(app()->getLocale() . '/services/security') }}">Безопасность</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Отрасли и объекты</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/services/industrial') }}">Офисы</a>
                                <a href="{{ url(app()->getLocale() . '/services/commercial') }}">Промышленность</a>
                                <a href="{{ url(app()->getLocale() . '/services/healthcare') }}">Ритейл</a>
                                <a href="{{ url(app()->getLocale() . '/services/educational') }}">Общественные места</a>
                                <a href="{{ url(app()->getLocale() . '/services/educational') }}">Транспорт и логистика</a>
                                <a href="{{ url(app()->getLocale() . '/services/educational') }}">Здравоохранение</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Дополнительные</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/services/administrative') }}">Административные</a>
                                <a href="{{ url(app()->getLocale() . '/services/facility') }}">Управление</a>
                                <a href="{{ url(app()->getLocale() . '/services/custom') }}">Индивидуальные</a>
                                <a href="{{ url(app()->getLocale() . '/services/consulting') }}">Консалтинг</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Решения</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/services/innovation') }}">Инновации</a>
                                <a href="{{ url(app()->getLocale() . '/services/technology') }}">Технологии</a>
                                <a href="{{ url(app()->getLocale() . '/services/sustainability') }}">Устойчивость</a>
                                <a href="{{ url(app()->getLocale() . '/services/efficiency') }}">Эффективность</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a href="{{ url(app()->getLocale() . '/commitments') }}">{{ __('messages.commitments') }}</a>
            </div>

            <div class="nav-item has-dropdown">
                <a href="{{ url(app()->getLocale() . '/career') }}">{{ __('messages.career') }}</a>
                <div class="fullscreen-dropdown">
                    <button class="menu-close" onclick="closeMenu(this)">×</button>
                    <div class="dropdown-content">
                        <div class="dropdown-section">
                            <h3>Вакансии</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/career/vacancies') }}">Все вакансии</a>
                                <a href="{{ url(app()->getLocale() . '/career/students') }}">Студентам</a>
                                <a href="{{ url(app()->getLocale() . '/career/experienced') }}">Опытным</a>
                                <a href="{{ url(app()->getLocale() . '/career/internships') }}">Стажировки</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Преимущества</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/career/benefits') }}">Условия</a>
                                <a href="{{ url(app()->getLocale() . '/career/development') }}">Развитие</a>
                                <a href="{{ url(app()->getLocale() . '/career/training') }}">Обучение</a>
                                <a href="{{ url(app()->getLocale() . '/career/culture') }}">Культура</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Процесс</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/career/process') }}">Отбор</a>
                                <a href="{{ url(app()->getLocale() . '/career/interview') }}">Собеседование</a>
                                <a href="{{ url(app()->getLocale() . '/career/onboarding') }}">Адаптация</a>
                                <a href="{{ url(app()->getLocale() . '/career/feedback') }}">Обратная связь</a>
                            </div>
                        </div>
                        <div class="dropdown-section">
                            <h3>Карьера</h3>
                            <div class="dropdown-links">
                                <a href="{{ url(app()->getLocale() . '/career/growth') }}">Рост</a>
                                <a href="{{ url(app()->getLocale() . '/career/positions') }}">Позиции</a>
                                <a href="{{ url(app()->getLocale() . '/career/success') }}">Успехи</a>
                                <a href="{{ url(app()->getLocale() . '/career/testimonials') }}">Отзывы</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a href="{{ url(app()->getLocale() . '/contact') }}">{{ __('messages.contact') }}</a>
            </div>

            <!-- Mobile Language Switch -->
            <div class="mobile-lang-switch">
                @php
                    $segments = Request::segments(); 
                    if (in_array($segments[0] ?? '', ['ru', 'en'])) {
                        array_shift($segments);
                    }
                    $basePath = implode('/', $segments);
                @endphp
                <a href="{{ url('ru/' . $basePath) }}" class="lang-link">RU</a>
                <span>|</span>
                <a href="{{ url('en/' . $basePath) }}" class="lang-link">EN</a>
            </div>
        </nav>

        <!-- Desktop Language Switch -->
        <div class="lang-switch">
            @php
                $segments = Request::segments(); 
                if (in_array($segments[0] ?? '', ['ru', 'en'])) {
                    array_shift($segments);
                }
                $basePath = implode('/', $segments);
            @endphp
            <a href="{{ url('ru/' . $basePath) }}">RU</a> | 
            <a href="{{ url('en/' . $basePath) }}">EN</a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">
            <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="logo-white">
            <div class="footer-row">
                <div class="footer-column">
                    <h5>{{ __('messages.company') }}</h5>
                    <a href="#">{{ __('messages.about_us') }}</a>
                    <a href="#">{{ __('messages.commitments') }}</a>
                    <a href="#">{{ __('messages.career') }}</a>
                </div>
                <div class="footer-column">
                    <h5>{{ __('messages.documents') }}</h5>
                    <a href="#">{{ __('messages.csr') }}</a>
                    <a href="#">{{ __('messages.data_policy') }}</a>
                </div>
                <div class="footer-column">
                    <h5>{{ __('messages.contacts') }}</h5>
                    <a href="#">+7 (495) 411 56 45</a>
                    <a href="#">+7 (495) 411 56 43</a>
                    <a href="#">+7 (812) 384 49 81</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mainNav = document.getElementById('mainNav');
        
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        // Close mobile menu when clicking on a link
        const navLinks = document.querySelectorAll('.nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuToggle.classList.remove('active');
                mainNav.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        });

        // Existing dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Инициализация выпадающего меню...');
            
            const navItems = document.querySelectorAll('.nav-item.has-dropdown');
            let closeTimeout;
            
            navItems.forEach(item => {
                const dropdown = item.querySelector('.fullscreen-dropdown');
                
                // Открытие при наведении
                item.addEventListener('mouseenter', function() {
                    console.log('Открываем меню');
                    clearTimeout(closeTimeout);
                    if (dropdown) {
                        dropdown.style.display = 'block';
                    }
                });
                
                // Закрытие с задержкой при уходе
                item.addEventListener('mouseleave', function(e) {
                    const relatedTarget = e.relatedTarget;
                    if (relatedTarget && !dropdown.contains(relatedTarget)) {
                        console.log('Закрываем меню с задержкой');
                        closeTimeout = setTimeout(() => {
                            if (dropdown) {
                                dropdown.style.display = 'none';
                            }
                        }, 300);
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

        // Функция закрытия меню по крестику
        function closeMenu(button) {
            const dropdown = button.closest('.fullscreen-dropdown');
            if (dropdown) {
                dropdown.style.display = 'none';
            }
        }

        // Закрытие по ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const openMenus = document.querySelectorAll('.fullscreen-dropdown[style*="display: block"]');
                openMenus.forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>

    <script src="{{ asset('app.js') }}"></script>
    @stack('scripts')
</body>
</html>