<?php

namespace App\Filament\User\Pages\Auth;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;

class RegisterUser extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                Hidden::make('type')->default('student'),
            ]);
    }

    protected function handleRegistration(array $data): \Illuminate\Database\Eloquent\Model
    {
        $user = parent::handleRegistration($data);

        $student = \App\Models\Student::create([
            'user_id' => $user['id'],
            'status'  => 1
        ]);


        return $user;
    }
}


