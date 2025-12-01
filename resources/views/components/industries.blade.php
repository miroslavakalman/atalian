@extends('layouts.app')

@section('title', __('messages.industries'))

@section('content')
<div class="industries-wrapper">
    <h1>{{ __('messages.industries') }}</h1>
    <p class="intro">{{ __('messages.industries_intro') }}</p>

    <div class="industries-grid">
        @php
        $industries = [
            ['name' => 'Банковский сектор', 'desc' => 'Оптимизация процессов, управление рисками и внедрение цифровых решений для финансовых учреждений.'],
            ['name' => 'Телеком', 'desc' => 'Управление инфраструктурой, внедрение IT-решений и автоматизация процессов.'],
            ['name' => 'Энергетика', 'desc' => 'Повышение эффективности, мониторинг ресурсов и устойчивое развитие.'],
            ['name' => 'Производство', 'desc' => 'Сокращение издержек, цифровизация производства и улучшение логистики.'],
            ['name' => 'Здравоохранение', 'desc' => 'Оптимизация процессов, внедрение технологий и повышение качества обслуживания.'],
            ['name' => 'Образование', 'desc' => 'Разработка цифровых платформ, управление инфраструктурой и образовательных процессов.'],
        ];
        @endphp

        @foreach($industries as $industry)
            <div class="industry-card">
                <h3>{{ $industry['name'] }}</h3>
                <p>{{ $industry['desc'] }}</p>
            </div>
        @endforeach
    </div>
</div>
<style>
    .industries-wrapper {
    padding: 120px var(--content-padding);
    text-align: center;
    background-color: #fdfdfd;
}

.industries-wrapper h1 {
    font-size: 48px;
    color: #3f3e3e;
    margin-bottom: 20px;
}

.industries-wrapper .intro {
    font-size: 20px;
    color: #5a5a5a;
    max-width: 800px;
    margin: 0 auto 60px;
}

.industries-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2.5em;
}

.industry-card {
    background-color: #f6f6f6;
    border-radius: 20px;
    padding: 30px 20px;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.industry-card h3 {
    font-size: 24px;
    color: #3f3e3e;
    margin-bottom: 15px;
}

.industry-card p {
    font-size: 16px;
    color: #5a5a5a;
    line-height: 1.6;
}

/* Hover эффекты */
.industry-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}
</style>

<script>
    // Можно добавить раскрытие карточки с подробностями
document.querySelectorAll('.industry-card').forEach(card => {
    card.addEventListener('click', () => {
        card.classList.toggle('active');
    });
});

</script>
@endsection
