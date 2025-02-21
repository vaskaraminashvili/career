<?php

namespace App\Filament\Cms\Resources\StudentResource\Pages;

use App\Filament\Cms\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
