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
                const openMenus = document.querySelectorAll(    '.fullscreen-dropdown[style*="display: block"]');
                openMenus.forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>

<script type="module" src="/js/app.js"></script>

</body>
</html>