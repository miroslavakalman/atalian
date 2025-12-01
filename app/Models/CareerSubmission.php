<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'resume_path',
        'message',
    ];
}

