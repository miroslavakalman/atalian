<?php

use App\Models\Content;

if (!function_exists('content')) {
    function content($key, $default = null, $locale = null)
    {
        try {
            $content = Content::where('key', $key)->first();
            
            if (!$content) {
                return __($key) ?: $default;
            }
            
            $locale = $locale ?: app()->getLocale();
            return $locale === 'en' ? ($content->value_en ?: $content->value_ru) : $content->value_ru;
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('allContent')) {
    function allContent($group, $locale = null)
    {
        try {
            $contents = Content::where('group', $group)
                ->orderBy('order')
                ->get();
            
            $result = [];
            foreach ($contents as $content) {
                $locale = $locale ?: app()->getLocale();
                $result[$content->key] = $locale === 'en' ? ($content->value_en ?: $content->value_ru) : $content->value_ru;
            }
            
            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }
}