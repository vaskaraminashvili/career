<?php

namespace App\Filament\Cms\Resources\FeedbackResource\Pages;

use App\Filament\Cms\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedback extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
