<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title', 'Главная - Аталиан')</title>
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- Language Alternates -->
    @php
        $currentPath = request()->getPathInfo();
        $pathWithoutLocale = preg_replace('#^/(en|ru)/#', '/', $currentPath);
        if ($pathWithoutLocale === '/') {
            $pathWithoutLocale = '';
        }
    @endphp
    <link rel="alternate" hreflang="ru" href="{{ url('ru' . $pathWithoutLocale) }}">
    <link rel="alternate" hreflang="en" href="{{ url('en' . $pathWithoutLocale) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('ru' . $pathWithoutLocale) }}">
    <link href="{{ asset(path: 'css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Atalian" />
    <link rel="manifest" href="/img/favicon/site.webmanifest" />
</head> 
<body class="@yield('body-class')">
<x-cookie-banner />
 @stack('scripts')
    <header class="header">
        <!-- ОБЫЧНЫЙ ЛОГОТИП в хедере (без секрета) -->
        <a href="{{ url(app()->getLocale() . '/') }}" class="logo-link">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
        </a>

        <!-- Desktop Navigation -->
        <nav class="nav" id="mainNav">
            <!-- О компании -->
            <a href="{{ url(app()->getLocale() . '/about') }}">{{ __('menu.about_us') }}</a>

            <div class="nav-item has-dropdown">
                <a href="{{ url(app()->getLocale() . '/services') }}">{{ __('menu.services') }}</a>
                <div class="dropdown">
                    <div class="dropdown-links">
                        <a href="{{ url(app()->getLocale() . '/services/cleaning') }}">{{ __('menu.cleaning') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/technical') }}">{{ __('menu.technical') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/facility') }}">{{ __('menu.facility') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/logistics') }}">{{ __('menu.logistics') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/administrative') }}">{{ __('menu.administrative') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/custom') }}">{{ __('menu.custom_solutions') }}</a>
                    </div>
                </div>
            </div>

            <div class="nav-item has-dropdown">
                <a href="#">{{ __('menu.industries') }}</a>
                <div class="dropdown">
                    <div class="dropdown-links">
                        <a href="{{ url(app()->getLocale() . '/industries/#offices') }}">{{ __('menu.industries_offices') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#industrial') }}">{{ __('menu.industries_industrial') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#retail_service') }}">{{ __('menu.industries_retail_service') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#public') }}">{{ __('menu.industries_public') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#transport') }}">{{ __('menu.industries_transport') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#healthcare') }}">{{ __('menu.industries_healthcare') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#premium_housing') }}">{{ __('menu.industries_premium_housing') }}</a>
                    </div>
                </div>
            </div>

            <div class="nav-item has-dropdown">
                <a href="{{ url(app()->getLocale() . '/ethics') }}">{{ __('menu.commitments') }}</a>
                <div class="dropdown">
                    <div class="dropdown-links">
                        <a href="{{ url(app()->getLocale() . '/ethics') }}">{{ __('menu.ethics') }}</a>
                        <a href="{{ url(app()->getLocale() . '/sustainability') }}">{{ __('menu.sustainability') }}</a>
                    </div>
                </div>
            </div>

            <a href="{{ url(app()->getLocale() . '/career') }}">{{ __('menu.career') }}</a>
            <a href="{{ url(app()->getLocale() . '/contact') }}">{{ __('menu.contact') }}</a>
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

        <!-- Mobile Menu Button (ТЕМНАЯ для белого фона) -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Открыть меню">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </header> <!-- ЗАКРЫВАЕМ header ЗДЕСЬ! -->

    <!-- Mobile Navigation Container (ВНЕ header) -->
    <div class="mobile-nav-container">
        <!-- Overlay -->
        <div class="mobile-overlay" id="mobileOverlay"></div>
        
        <!-- Mobile Menu -->
        <nav class="mobile-nav" id="mobileNav" aria-label="Мобильная навигация">
            <div class="mobile-nav-header">
                <!-- ОБЫЧНЫЙ ЛОГОТИП в мобильном меню (без секрета) -->
                <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="mobile-logo">
                <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Закрыть меню">
                    <span>&times;</span>
                </button>
            </div>

            <div class="mobile-nav-content">
                <a href="{{ url(app()->getLocale() . '/about') }}" class="mobile-nav-link">{{ __('menu.about_us') }}</a>
                
                <!-- Services Dropdown -->
                <div class="mobile-dropdown">
                    <button class="mobile-dropdown-toggle">
                        {{ __('menu.services') }}
                        <svg class="mobile-dropdown-arrow" width="12" height="8" viewBox="0 0 12 8">
                            <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url(app()->getLocale() . '/services/cleaning') }}">{{ __('menu.cleaning') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/technical') }}">{{ __('menu.technical') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/facility') }}">{{ __('menu.facility') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/logistics') }}">{{ __('menu.logistics') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/administrative') }}">{{ __('menu.administrative') }}</a>
                        <a href="{{ url(app()->getLocale() . '/services/custom') }}">{{ __('menu.custom_solutions') }}</a>
                    </div>
                </div>
                
                <!-- Industries Dropdown -->
                <div class="mobile-dropdown">
                    <button class="mobile-dropdown-toggle">
                        {{ __('menu.industries') }}
                        <svg class="mobile-dropdown-arrow" width="12" height="8" viewBox="0 0 12 8">
                            <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url(app()->getLocale() . '/industries/#offices') }}">{{ __('menu.industries_offices') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#industrial') }}">{{ __('menu.industries_industrial') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#retail_service') }}">{{ __('menu.industries_retail_service') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#public') }}">{{ __('menu.industries_public') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#transport') }}">{{ __('menu.industries_transport') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#healthcare') }}">{{ __('menu.industries_healthcare') }}</a>
                        <a href="{{ url(app()->getLocale() . '/industries/#premium_housing') }}">{{ __('menu.industries_premium_housing') }}</a>
                    </div>
                </div>
                
                <!-- Commitments Dropdown -->
                <div class="mobile-dropdown">
                    <button class="mobile-dropdown-toggle">
                        {{ __('menu.commitments') }}
                        <svg class="mobile-dropdown-arrow" width="12" height="8" viewBox="0 0 12 8">
                            <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url(app()->getLocale() . '/ethics') }}">{{ __('menu.ethics') }}</a>
                        <a href="{{ url(app()->getLocale() . '/sustainability') }}">{{ __('menu.sustainability') }}</a>
                    </div>
                </div>
                
                <a href="{{ url(app()->getLocale() . '/career') }}" class="mobile-nav-link">{{ __('menu.career') }}</a>
                <a href="{{ url(app()->getLocale() . '/contact') }}" class="mobile-nav-link">{{ __('menu.contact') }}</a>
                
                <!-- Mobile Language Switch -->
                <div class="mobile-lang-switch">
                    @php
                        $segments = Request::segments(); 
                        if (in_array($segments[0] ?? '', ['ru', 'en'])) {
                            array_shift($segments);
                        }
                        $basePath = implode('/', $segments);
                    @endphp
                    <a href="{{ url('ru/' . $basePath) }}" class="mobile-lang-link {{ app()->getLocale() === 'ru' ? 'active' : '' }}">RU</a>
                    <span class="mobile-lang-separator">|</span>
                    <a href="{{ url('en/' . $basePath) }}" class="mobile-lang-link {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                </div>
            </div>
        </nav>
    </div>

    <!-- СЕКРЕТНАЯ АДМИН-ПАНЕЛЬ (скрыта до активации) -->
    <div id="admin-panel" style="display: none; position: fixed; top: 20px; right: 20px; z-index: 9999;">
        <div style="background: rgba(44, 62, 80, 0.95); color: white; padding: 15px; 
                    border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3); 
                    border-left: 4px solid #f46f1f;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="color: #f46f1f; margin-right: 8px;">🔐</span>
                <strong>Секретный доступ к админке</strong>
            </div>
            <a href="{{ route('login') }}" 
               style="display: block; background: #f46f1f; color: white; 
                      text-decoration: none; padding: 8px 16px; 
                      border-radius: 4px; text-align: center; margin-bottom: 8px;">
                🔒 Войти в админ-панель
            </a>
            <small style="opacity: 0.8; display: block; margin-top: 8px; font-size: 11px;">
                Только для администраторов.<br>
                Секрет: 5 кликов по логотипу в подвале сайта
            </small>
            <button onclick="hideAdminPanel()" 
                    style="position: absolute; top: 5px; right: 5px; 
                           background: none; border: none; color: white; 
                           font-size: 18px; cursor: pointer; padding: 0 5px;">
                ×
            </button>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
@if (!isset($hideFooter) || $hideFooter === false)
<footer class="footer">
    <div class="footer-container">
        <!-- СЕКРЕТНЫЙ ЛОГОТИП ТОЛЬКО ЗДЕСЬ -->
        <img src="{{ asset('img/logo-white.png') }}" alt="Logo" 
             class="logo-white" id="secret-logo-footer" 
             style="cursor: pointer;" 
             title="Нажмите для перехода на главную">
        
        <div class="footer-row">
            <div class="footer-column">
                <h5>{{ __('messages.company') }}</h5>
                <a href="{{ route('about', app()->getLocale()) }}">{{ __('messages.about_us') }}</a>
                <a href="{{ route('ethics', app()->getLocale()) }}">{{ __('messages.commitments') }}</a>
                <a href="{{ route('career', app()->getLocale()) }}">{{ __('messages.career') }}</a>
            </div>
            <div class="footer-column">
                <h5>{{ __('messages.documents') }}</h5>
                <a href="{{ route('cookies', app()->getLocale()) }}">{{ __('cookies.title') }}</a>
                <a href="{{ route('policy', parameters: app()->getLocale()) }}">{{ __('messages.data_policy') }}</a>
                <a href="{{ route('sitemap', app()->getLocale()) }}">{{ __('messages.sitemap') }}</a>
            </div>
            <div class="footer-column">
                <h5>{{ __('messages.contacts') }}</h5>
                <a href="tel:+74954115645">+7 (495) 411 56 45</a>
                <a href="tel:+74954115643">+7 (495) 411 56 43</a>
                <a href="tel:+78123844981">+7 (812) 384 49 81</a>
            </div>
        </div>
    </div>
</footer>
@endif
    <script>
// Mobile Menu Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Элементы мобильного меню
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileNav = document.getElementById('mobileNav');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const body = document.body;
    
    // Dropdown элементы
    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    
    // Функция открытия меню
    function openMobileMenu() {
        mobileMenuToggle.classList.add('active');
        mobileNav.classList.add('active');
        mobileOverlay.classList.add('active');
        body.classList.add('menu-open');
        mobileMenuToggle.setAttribute('aria-label', 'Закрыть меню');
    }
    
    // Функция закрытия меню
    function closeMobileMenu() {
        mobileMenuToggle.classList.remove('active');
        mobileNav.classList.remove('active');
        mobileOverlay.classList.remove('active');
        body.classList.remove('menu-open');
        mobileMenuToggle.setAttribute('aria-label', 'Открыть меню');
        
        // Закрываем все выпадающие меню
        document.querySelectorAll('.mobile-dropdown.active').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
    
    // Открытие/закрытие по кнопке бургер
    mobileMenuToggle.addEventListener('click', function() {
        if (mobileNav.classList.contains('active')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });
    
    // Закрытие по кнопке закрытия
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }
    
    // Закрытие по клику на оверлей
    mobileOverlay.addEventListener('click', closeMobileMenu);
    
    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
            closeMobileMenu();
        }
    });
    
    // Обработка выпадающих меню в мобильной версии
    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdown = this.closest('.mobile-dropdown');
            const isActive = dropdown.classList.contains('active');
            
            // Закрываем другие открытые dropdown
            document.querySelectorAll('.mobile-dropdown.active').forEach(item => {
                if (item !== dropdown) {
                    item.classList.remove('active');
                }
            });
            
            // Переключаем текущий dropdown
            dropdown.classList.toggle('active');
        });
    });
    
    // Закрытие меню при клике на ссылку (кроме языковых)
    const mobileLinks = document.querySelectorAll('.mobile-nav-link, .mobile-dropdown-menu a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });
    
    // Языковые ссылки закрывают только выпадающие меню
    const langLinks = document.querySelectorAll('.mobile-lang-link');
    langLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Закрываем только dropdown, но не всё меню
            document.querySelectorAll('.mobile-dropdown.active').forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        });
    });
    
    // Обработка ресайза окна
    window.addEventListener('resize', function() {
        if (window.innerWidth > 1024 && mobileNav.classList.contains('active')) {
            closeMobileMenu();
        }
    });
});

// ================= СЕКРЕТНАЯ КОМБИНАЦИЯ КЛИКОВ (ТОЛЬКО ДЛЯ ЛОГО В ФУТЕРЕ) =================
(function() {
    let clickCount = 0;
    let clickTimeout;
    let isAdminPanelVisible = false;
    
    // Только один секретный логотип - в футере
    const secretLogo = document.getElementById('secret-logo-footer');
    
    if (!secretLogo) {
        console.log('Секретный логотип не найден');
        return;
    }
    
    // Функция для показа админ-панели
    function showAdminPanel() {
        const panel = document.getElementById('admin-panel');
        if (panel) {
            panel.style.display = 'block';
            isAdminPanelVisible = true;
            
            // Автоматическое скрытие через 30 секунд
            setTimeout(() => {
                if (isAdminPanelVisible) {
                    hideAdminPanel();
                }
            }, 30000);
            
            // Скрыть панель при скролле
            window.addEventListener('scroll', hideAdminPanelOnScroll);
        }
    }
    
    // Функция для скрытия админ-панели
    window.hideAdminPanel = function() {
        const panel = document.getElementById('admin-panel');
        if (panel) {
            panel.style.display = 'none';
            isAdminPanelVisible = false;
            window.removeEventListener('scroll', hideAdminPanelOnScroll);
        }
    }
    
    // Скрытие при скролле
    function hideAdminPanelOnScroll() {
        if (isAdminPanelVisible) {
            hideAdminPanel();
        }
    }
    
    // Функция обработки клика по секретному логотипу
    function handleSecretClick(e) {
        e.preventDefault();
        e.stopPropagation();
        
        // Сброс таймера
        clearTimeout(clickTimeout);
        clickCount++;
        
        // Визуальная обратная связь (легкая анимация)
        secretLogo.style.transform = 'scale(0.95)';
        secretLogo.style.opacity = '0.8';
        
        setTimeout(() => {
            secretLogo.style.transform = 'scale(1)';
            secretLogo.style.opacity = '1';
        }, 150);
        
        // Консоль для отладки
        console.log(`🤫 Секретные клики: ${clickCount}/5`);
        
        // Проверка на 5 кликов
        if (clickCount === 5) {
            // Эффект успеха
            secretLogo.style.boxShadow = '0 0 15px rgba(244, 111, 31, 0.7)';
            secretLogo.style.transition = 'box-shadow 0.3s ease';
            
            // Показываем админ-панель
            showAdminPanel();
            
            // Сбрасываем счетчик
            clickCount = 0;
            
            // Убираем эффект через 1 секунду
            setTimeout(() => {
                secretLogo.style.boxShadow = '';
            }, 1000);
            
            return;
        }
        
        // Сброс счетчика через 3 секунды
        clickTimeout = setTimeout(() => {
            console.log('⏰ Секретная комбинация сброшена');
            clickCount = 0;
        }, 3000);
        
      
    }
    
    // Добавляем обработчик к секретному логотипу
    secretLogo.addEventListener('click', handleSecretClick);
    secretLogo.style.cursor = 'pointer';
    
    // Закрытие админ-панели по клику вне ее
    document.addEventListener('click', function(e) {
        const panel = document.getElementById('admin-panel');
        if (panel && isAdminPanelVisible && !panel.contains(e.target)) {
            hideAdminPanel();
        }
    });
    
    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isAdminPanelVisible) {
            hideAdminPanel();
        }
    });
    
    // Сообщение в консоль для разработчиков
    console.log('%c🔐 Секретная админ-панель активирована', 
                'color: #f46f1f; font-weight: bold; font-size: 14px;');
    console.log('%cЧтобы открыть панель доступа, сделайте 5 быстрых кликов по белому логотипу в футере', 
                'color: #666; font-style: italic;');
    
    // Дополнительная подсказка при наведении на логотип
    secretLogo.addEventListener('mouseenter', function() {
        this.title = 'Нажмите 5 раз для доступа к админке';
    });
    
    secretLogo.addEventListener('mouseleave', function() {
        this.title = 'Нажмите для перехода на главную';
    });
})();
    </script>

<script type="module" src="/js/app.js"></script>

</body>
</html>