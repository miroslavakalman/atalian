<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'group',
        'type',
        'value_ru',
        'value_en',
        'description',
        'order',
    ];

    const GROUP_ABOUT = 'about';
    const GROUP_CAREER = 'career';
    const GROUP_CONTACT = 'contact';
    const GROUP_ETHICS = 'ethics';
    const GROUP_INDUSTRIES = 'industries';
    const GROUP_SERVICES = 'services';
    const GROUP_COOKIES = 'cookies';
    const GROUP_HOME = 'home';

    public static function getGroups()
    {
        return [
            self::GROUP_HOME => 'Главная страница',
            self::GROUP_ABOUT => 'О компании',
            self::GROUP_CAREER => 'Карьера',
            self::GROUP_SERVICES => 'Услуги',
            self::GROUP_CONTACT => 'Контакты',
            self::GROUP_ETHICS => 'Этика',
            self::GROUP_INDUSTRIES => 'Отрасли',
            self::GROUP_COOKIES => 'Cookies',
        ];
    }

    public function getGroupNameAttribute()
    {
        return self::getGroups()[$this->group] ?? $this->group;
    }

    public function getValue($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $locale === 'en' ? ($this->value_en ?: $this->value_ru) : $this->value_ru;
    }
}