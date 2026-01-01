@extends('layouts.app')

@section('title', __('cookies.title'))

@section('content')
<div class="container cookies-page">
    <h1>{{ __('cookies.title') }}</h1>
    <div class="policy-meta">
        <p>{{ __('cookies.last_updated', ['date' => date('d.m.Y')]) }}</p>
        <p>{{ __('cookies.effective_date', ['date' => date('d.m.Y')]) }}</p>
    </div>
    
    <div class="cookies-content">
        <section class="intro-section">
            <p>{{ __('cookies.intro') }}</p>
        </section>
        
        <section>
            <h2>{{ __('cookies.what_are_cookies') }}</h2>
            <p>{{ __('cookies.cookies_definition') }}</p>
        </section>
        
        <section>
            <h2>{{ __('cookies.types_of_cookies') }}</h2>
            
            <div class="cookie-type">
                <h3>{!! __('cookies.essential_cookies') !!}</h3>
                <p>{{ __('cookies.essential_desc') }}</p>
            </div>
            
            <div class="cookie-type">
                <h3>{!! __('cookies.functional_cookies') !!}</h3>
                <p>{{ __('cookies.functional_desc') }}</p>
            </div>
            
            <div class="cookie-type">
                <h3>{!! __('cookies.analytical_cookies') !!}</h3>
                <p>{{ __('cookies.analytical_desc') }}</p>
                <p><strong>{{ __('cookies.analytical_services') }}</strong></p>
                <ul>
                    <li>
                        <a href="https://yandex.ru/legal/confidential/" target="_blank" rel="noopener noreferrer">
                            {{ __('cookies.yandex_metrika') }}
                        </a> - {{ __('cookies.yandex_policy') }}
                    </li>
                </ul>
            </div>
            
            <div class="cookie-type">
                <h3>{!! __('cookies.marketing_cookies') !!}</h3>
                <p>{{ __('cookies.marketing_desc') }}</p>
            </div>
        </section>
        
        <section>
            <h2>{{ __('cookies.third_party_cookies') }}</h2>
            <p>{{ __('cookies.third_party_desc') }}</p>
        </section>
        
        <section>
            <h2>{{ __('cookies.managing_cookies') }}</h2>
            
            <div class="manage-section">
                <h3>{!! __('cookies.browser_settings') !!}</h3>
                <p>{{ __('cookies.browser_desc') }}</p>
                
                <p><strong>{{ __('cookies.how_to_manage') }}</strong></p>
                <ul>
                    <li>
                        <a href="{{ __('cookies.chrome_link') }}" target="_blank" rel="noopener noreferrer">
                            {{ __('cookies.chrome_manage') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ __('cookies.firefox_link') }}" target="_blank" rel="noopener noreferrer">
                            {{ __('cookies.firefox_manage') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ __('cookies.safari_link') }}" target="_blank" rel="noopener noreferrer">
                            {{ __('cookies.safari_manage') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ __('cookies.edge_link') }}" target="_blank" rel="noopener noreferrer">
                            {{ __('cookies.edge_manage') }}
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="manage-section">
                <h3>{!! __('cookies.cookie_banner') !!}</h3>
                <p>{{ __('cookies.banner_desc') }}</p>
            </div>
        </section>
        
        <section>
            <h2>{{ __('cookies.consequences') }}</h2>
            <p>{!! __('cookies.consequences_desc') !!}</p>
        </section>
        
        <section>
            <h2>{{ __('cookies.changes_to_policy') }}</h2>
            <p>{{ __('cookies.changes_desc') }}</p>
        </section>
        
        <section>
            <h2>{{ __('cookies.contact_info') }}</h2>
            <p>info@atalian.ru</p>
        </section>
        
        <section class="consent-section">
            <h2>{{ __('cookies.your_consent') }}</h2>
            <p>{{ __('cookies.consent_text') }}</p>
        </section>
    </div>
</div>

<style>
.cookies-page {
    max-width: 1000px;
    margin: 40px auto;
    padding: 0 20px;
}

.cookies-page h1 {
    color: #012615;
    margin-bottom: 15px;
    text-align: center;
    font-size: 28px;
}

.policy-meta p{
    text-align: center;
    color: #666;
    margin-bottom: 40px;
    font-style: italic;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
}

.policy-meta p {
    margin: 5px 0;
}

.cookies-content section {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
}

.cookies-content section:last-child {
    border-bottom: none;
}

.cookies-content h2 {
    color: #ec732c;
    font-size: 20px;
    margin-bottom: 15px;
}

.cookies-content h3 {
    color: #333;
    font-size: 17px;
    margin: 15px 0 10px;
    font-weight: 600;
}

.cookies-content p {
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.cookies-content ul {
    margin-left: 25px;
    margin-bottom: 15px;
}

.cookies-content li {
    margin-bottom: 8px;
    line-height: 1.5;
}

.cookies-content a {
    color: #ec732c;
    text-decoration: none;
    transition: color 0.2s;
}

.cookies-content a:hover {
    color: #d55f1c;
    text-decoration: underline;
}

.cookie-type {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
    border-left: 3px solid #ec732c;
}

.manage-section {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.consent-section {
    background: #fff8f0;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #ff9900;
}

@media (max-width: 768px) {
    .cookies-page {
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .cookies-page h1 {
        font-size: 24px;
    }
    
    .cookies-content h2 {
        font-size: 18px;
    }
    
    .cookies-content h3 {
        font-size: 16px;
    }
    
    .cookies-content ul {
        margin-left: 20px;
    }
    
    .cookie-type, .manage-section {
        padding: 12px;
    }
}
</style>
@endsection