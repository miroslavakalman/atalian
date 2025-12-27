<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage; 
class CareerSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'resume_path',
        'message',
        'vacancy_name',
        'status',
        'notes',
        'consent_pd',
        'consent_marketing'
    ];

    protected $casts = [
        'consent_pd' => 'boolean',
        'consent_marketing' => 'boolean',
        'created_at' => 'datetime',
    ];

    // Статусы откликов
    const STATUS_NEW = 'new';
    const STATUS_REVIEWED = 'reviewed';
    const STATUS_INVITED = 'invited';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ARCHIVED = 'archived';

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_REVIEWED => 'Рассмотрен',
            self::STATUS_INVITED => 'Приглашен',
            self::STATUS_REJECTED => 'Отклонен',
            self::STATUS_ARCHIVED => 'В архиве',
        ];
    }

    public function getStatusLabelAttribute()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }

    public function getResumeUrlAttribute()
    {
        return $this->resume_path ? Storage::url($this->resume_path) : null;
    }

    public function getResumeSizeAttribute()
    {
        if (!$this->resume_path || !Storage::exists($this->resume_path)) {
            return null;
        }
        
        $bytes = Storage::size($this->resume_path);
        if ($bytes < 1024) return $bytes . ' Б';
        if ($bytes < 1048576) return round($bytes / 1024, 1) . ' КБ';
        return round($bytes / 1048576, 1) . ' МБ';
    }
}