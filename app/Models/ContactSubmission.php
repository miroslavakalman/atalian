<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactSubmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subject',
        'name',
        'email',
        'phone',
        'company',
        'message',
        'status',
        'notes',
        'consent_pd',
    ];

    protected $casts = [
        'consent_pd' => 'boolean',
        'created_at' => 'datetime',
    ];

    const STATUS_NEW = 'new';
    const STATUS_READ = 'read';
    const STATUS_REPLIED = 'replied';
    const STATUS_CLOSED = 'closed';

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_READ => 'Прочитано',
            self::STATUS_REPLIED => 'Отвечено',
            self::STATUS_CLOSED => 'Закрыто',
        ];
    }

    public function getStatusLabelAttribute()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }

    public function getSubjectLabelAttribute()
    {
        $subjects = [
            'general' => 'Общий вопрос',
            'services' => 'Информация об услугах',
            'partnership' => 'Партнерство',
            'career' => 'Карьера',
            'other' => 'Другое',
        ];
        
        return $subjects[$this->subject] ?? $this->subject;
    }

    public function scopeNew($query)
    {
        return $query->where('status', self::STATUS_NEW);
    }
}