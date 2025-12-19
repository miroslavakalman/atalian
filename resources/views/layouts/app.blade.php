<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title', 'Главная - Аталиан')</title>
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

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
@if (!isset($hideFooter) || $hideFooter === false)
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
    </script>

<script type="module" src="/js/app.js"></script>

</body>
</html>