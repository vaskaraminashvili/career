<?php

namespace App\Models;

use App\Traits\CustomInteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Company extends Model implements HasMedia
{
    use HasFactory, HasTranslations, CustomInteractsWithMedia;

    public array $translatable = ['title', 'address', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'phone',
        'address',
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
        'address'     => 'array',
        'description' => 'array',
        'status'      => 'boolean',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }

    protected function getMediaCollectionName()
    {
        return 'company';
    }
}
