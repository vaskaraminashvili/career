<?php

namespace App\Filament\Cms\Resources\StudentResource\Pages;

use App\Enums\UserType;
use App\Filament\Cms\Resources\StudentResource;
use App\Models\User;
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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'email'    => $data['user_email'],
            'password' => bcrypt($data['user_password']),
            'type'     => UserType::STUDENT,
        ]);

        unset($data['user_email'], $data['user_password'], $data['user_password_confirmation']);

        $data['user_id'] = $user->id;
        return $data;
    }
}
