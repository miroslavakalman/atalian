<?php
return [
    'text' => [
        'ru' => 'Мы используем cookies для обеспечения работы сайта и улучшения сервиса. Настройте свои предпочтения:',
        'en' => 'We use cookies to ensure site functionality and improve your experience. Set your preferences:',
    ],
    'buttons' => [
        'save' => ['ru' => 'Сохранить', 'en' => 'Save'],
        'accept_all' => ['ru' => 'Принять все', 'en' => 'Accept all'],
        'decline_all' => ['ru' => 'Отклонить все', 'en' => 'Decline all'],
    ],
    'categories' => [
        'necessary' => [
            'name' => ['ru' => 'Необходимые', 'en' => 'Necessary'],
            'description' => ['ru' => 'Без них сайт не работает', 'en' => 'Required for website operation'],
            'required' => true
        ],
        'analytics' => [
            'name' => ['ru' => 'Аналитика', 'en' => 'Analytics'],
            'description' => ['ru' => 'Отслеживание посещений и поведенческих данных', 'en' => 'Track visits and behavior'],
            'required' => false
        ],
    ],
    'storage_key' => 'cookieConsent',
    'metrika_id' => 12345678, // Яндекс.Метрика
];
