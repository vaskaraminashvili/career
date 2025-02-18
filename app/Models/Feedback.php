<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feedback extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    protected $casts = [
        'id'          => 'integer',
        'title'       => 'array',
        'description' => 'array',
        'status'      => 'boolean',
    ];
}
