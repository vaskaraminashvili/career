<?php

namespace App\Models;

use App\Traits\CustomInteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class News extends Model implements HasMedia
{
    use HasFactory, HasTranslations, CustomInteractsWithMedia;

    public array $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'title'       => 'array',
        'description' => 'array',
        'status'      => 'boolean',
    ];

    protected function getMediaCollectionName()
    {
        return 'news';
    }
}
