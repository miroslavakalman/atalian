@php
$lang = app()->getLocale();
$cfg = config('cookie');
@endphp

<div id="cookieBanner" class="cookie-banner">
    <p>{!! $cfg['text'][$lang] !!}</p>
    <form id="cookieForm">
        @foreach($cfg['categories'] as $key => $cat)
            <div class="cookie-category">
                <label>
                    <input type="checkbox" name="{{ $key }}" @if($cat['required']) checked disabled @endif>
                    <strong>{{ $cat['name'][$lang] }}</strong> — {{ $cat['description'][$lang] }}
                </label>
            </div>
        @endforeach
        <div class="cookie-actions">
            <button type="button" id="acceptAll">{{ $cfg['buttons']['accept_all'][$lang] }}</button>
            <button type="button" id="declineAll">{{ $cfg['buttons']['decline_all'][$lang] }}</button>
            <button type="submit">{{ $cfg['buttons']['save'][$lang] }}</button>
        </div>
    </form>
</div>

<style>
.cookie-banner {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #111;
    color: #fff;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 9999;
    font-size: 14px;
    opacity: 0;
    transform: translateY(100%);
    transition: all 0.5s ease;
}

.cookie-banner.show {
    opacity: 1;
    transform: translateY(0);
}

.cookie-banner a {
    color: var(--coop-orange-accent);
    text-decoration: underline;
}

.cookie-actions button {
    margin-left: 10px;
    padding: 5px 12px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    font-size: 14px;
}

.cookie-category{
    font-family: 'Inter';
    margin: 20px;
}
.btn { background: var(--coop-orange-accent); color: #fff; }
.btn-decline { background: #555; color: #fff; }
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const banner = document.getElementById('cookieBanner');
    const form = document.getElementById('cookieForm');
    const storageKey = '{{ $cfg["storage_key"] }}';
    const metrikaID = '{{ $cfg["metrika_id"] }}';

    let saved = null;
    try {
        saved = JSON.parse(localStorage.getItem(storageKey));
    } catch (e) {
        saved = null;
    }

    if (!saved) {
        banner.classList.add('show');
    } else if (saved.analytics) {
        initMetrika();
    }

    document.getElementById('acceptAll').addEventListener('click', () => {
        const data = {};
        [...form.elements].forEach(el => {
            if (el.type === 'checkbox') data[el.name] = true;
        });
        save(data);
        initMetrika();
    });

    document.getElementById('declineAll').addEventListener('click', () => {
        const data = {};
        [...form.elements].forEach(el => {
            if (el.type === 'checkbox') data[el.name] = el.disabled;
        });
        save(data);
    });

    form.addEventListener('submit', e => {
        e.preventDefault();
        const data = {};
        [...form.elements].forEach(el => {
            if (el.type === 'checkbox') data[el.name] = el.checked;
        });
        save(data);
        if (data.analytics) initMetrika();
    });

    function save(data) {
        localStorage.setItem(storageKey, JSON.stringify(data));
        banner.classList.remove('show');
    }

    function initMetrika() {
        if (window.ym) return;
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            k=e.createElement(t),a=e.getElementsByTagName(t)[0];
            k.async=1;k.src=r;a.parentNode.insertBefore(k,a);
        })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(metrikaID, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    }
});
</script>
        
