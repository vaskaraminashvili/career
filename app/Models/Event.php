<?php

namespace App\Models;

use App\Traits\CustomInteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Event extends Model implements HasMedia
{
    use HasFactory, HasTranslations, CustomInteractsWithMedia;

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

    protected function getMediaCollectionName(): string
    {
        return 'event';
    }
}
