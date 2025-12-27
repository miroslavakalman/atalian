<?php

namespace App\Helpers;

use App\Models\Content;

class ContentHelper
{
    public static function get($key, $default = null, $locale = null)
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
    
    public static function getAll($group, $locale = null)
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