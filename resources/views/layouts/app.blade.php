<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title', 'Главная - Аталиан')</title>
    <link rel="canonical" href="{{ url()->current() }}">
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
        <a href="{{ url(app()->getLocale() . '/') }}" class="logo-link">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
        </a>

        <nav class="nav" id="mainNav">
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

        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Открыть меню">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </header> 

    <div class="mobile-nav-container">
        <div class="mobile-overlay" id="mobileOverlay"></div>
        
        <nav class="mobile-nav" id="mobileNav" aria-label="Мобильная навигация">
            <div class="mobile-nav-header">
                <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="mobile-logo">
                <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Закрыть меню">
                    <span>&times;</span>
                </button>
            </div>

            <div class="mobile-nav-content">
                <a href="{{ url(app()->getLocale() . '/about') }}" class="mobile-nav-link">{{ __('menu.about_us') }}</a>
                
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

    <main>
        @yield('content')
    </main>

@if (!isset($hideFooter) || $hideFooter === false)
<footer class="footer">
    <div class="footer-container">
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
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileNav = document.getElementById('mobileNav');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const body = document.body;
    
    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    
    function openMobileMenu() {
        mobileMenuToggle.classList.add('active');
        mobileNav.classList.add('active');
        mobileOverlay.classList.add('active');
        body.classList.add('menu-open');
        mobileMenuToggle.setAttribute('aria-label', 'Закрыть меню');
    }
    
    function closeMobileMenu() {
        mobileMenuToggle.classList.remove('active');
        mobileNav.classList.remove('active');
        mobileOverlay.classList.remove('active');
        body.classList.remove('menu-open');
        mobileMenuToggle.setAttribute('aria-label', 'Открыть меню');
        
        document.querySelectorAll('.mobile-dropdown.active').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
    
    mobileMenuToggle.addEventListener('click', function() {
        if (mobileNav.classList.contains('active')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });
    
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }
    
    mobileOverlay.addEventListener('click', closeMobileMenu);
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
            closeMobileMenu();
        }
    });
    
    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdown = this.closest('.mobile-dropdown');
            const isActive = dropdown.classList.contains('active');
            
            document.querySelectorAll('.mobile-dropdown.active').forEach(item => {
                if (item !== dropdown) {
                    item.classList.remove('active');
                }
            });
            
            dropdown.classList.toggle('active');
        });
    });
    
    const mobileLinks = document.querySelectorAll('.mobile-nav-link, .mobile-dropdown-menu a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });
    
    const langLinks = document.querySelectorAll('.mobile-lang-link');
    langLinks.forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.mobile-dropdown.active').forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        });
    });
    
    window.addEventListener('resize', function() {
        if (window.innerWidth > 1024 && mobileNav.classList.contains('active')) {
            closeMobileMenu();
        }
    });
});

(function() {
    let clickCount = 0;
    let clickTimeout;
    let isAdminPanelVisible = false;
    
    const secretLogo = document.getElementById('secret-logo-footer');
    
    if (!secretLogo) {
        console.log('Секретный логотип не найден');
        return;
    }
    
    function showAdminPanel() {
        const panel = document.getElementById('admin-panel');
        if (panel) {
            panel.style.display = 'block';
            isAdminPanelVisible = true;
            
            setTimeout(() => {
                if (isAdminPanelVisible) {
                    hideAdminPanel();
                }
            }, 30000);
            
            window.addEventListener('scroll', hideAdminPanelOnScroll);
        }
    }
    
    window.hideAdminPanel = function() {
        const panel = document.getElementById('admin-panel');
        if (panel) {
            panel.style.display = 'none';
            isAdminPanelVisible = false;
            window.removeEventListener('scroll', hideAdminPanelOnScroll);
        }
    }
    
    function hideAdminPanelOnScroll() {
        if (isAdminPanelVisible) {
            hideAdminPanel();
        }
    }
    
    function handleSecretClick(e) {
        e.preventDefault();
        e.stopPropagation();
        
        clearTimeout(clickTimeout);
        clickCount++;
        
        secretLogo.style.transform = 'scale(0.95)';
        secretLogo.style.opacity = '0.8';
        
        setTimeout(() => {
            secretLogo.style.transform = 'scale(1)';
            secretLogo.style.opacity = '1';
        }, 150);
        
        console.log(`🤫 Секретные клики: ${clickCount}/5`);
        
        if (clickCount === 5) {
            secretLogo.style.boxShadow = '0 0 15px rgba(244, 111, 31, 0.7)';
            secretLogo.style.transition = 'box-shadow 0.3s ease';
            
            showAdminPanel();
            
            clickCount = 0;
            
            setTimeout(() => {
                secretLogo.style.boxShadow = '';
            }, 1000);
            
            return;
        }
        
        clickTimeout = setTimeout(() => {
            console.log('⏰ Секретная комбинация сброшена');
            clickCount = 0;
        }, 3000);
        
      
    }
    
    secretLogo.addEventListener('click', handleSecretClick);
    secretLogo.style.cursor = 'pointer';
    
    document.addEventListener('click', function(e) {
        const panel = document.getElementById('admin-panel');
        if (panel && isAdminPanelVisible && !panel.contains(e.target)) {
            hideAdminPanel();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isAdminPanelVisible) {
            hideAdminPanel();
        }
    });
    
    console.log('%c🔐 Секретная админ-панель активирована', 
                'color: #f46f1f; font-weight: bold; font-size: 14px;');
    console.log('%cЧтобы открыть панель доступа, сделайте 5 быстрых кликов по белому логотипу в футере', 
                'color: #666; font-style: italic;');
    
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