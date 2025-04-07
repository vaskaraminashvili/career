<?php

namespace App\Traits;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait CustomInteractsWithMedia
{
    use InteractsWithMedia {
        registerMediaCollections as parentRegisterMediaCollections;
        registerMediaConversions as parentRegisterMediaConversions;
    }

    public function registerMediaCollections(): void
    {
        $this->parentRegisterMediaCollections();

        $this
            ->addMediaCollection($this->getMediaCollectionName());
    }

    protected function getMediaCollectionName(): string
    {
        return strtolower(class_basename($this));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->parentRegisterMediaConversions($media);

        $this->addMediaConversion('big-thumb')
            ->width(1680)
            ->height(815)
            ->nonQueued();

        $this->addMediaConversion('card-thumb')
            ->width(633)
            ->height(470)
            ->nonQueued();

        $this->addMediaConversion('small-thumb')
            ->width(300)
            ->height(100)
            ->nonQueued();
    }

    public function getImgAttribute(): string
    {
        return $this->getFirstMediaUrl($this->getMediaCollectionName()) ?: asset('assets/imgs/logo/logo.png');
    }

    public function getImagesUrlsAttribute(): array
    {
        return $this->getMedia($this->getMediaCollectionName())->map->getUrl()->toArray();
    }
}
