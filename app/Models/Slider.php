<?php

namespace App\Models;

use App\Traits\CustomInteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Slider extends Model implements HasMedia
{
    use HasFactory, HasTranslations, CustomInteractsWithMedia;

    public array $translatable = ['title'];

    protected $fillable = [
        'title',
        'sort',
        'link',
        'status',
    ];

    protected $casts = [
        'id'     => 'integer',
        'title'  => 'array',
        'status' => 'boolean',
    ];

    protected function getMediaCollectionName(): string
    {
        return 'slider';
    }
}
