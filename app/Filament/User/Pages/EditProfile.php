<?php

namespace App\Filament\User\Pages;


use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
//                TextInput::make('student.first_name'),
                Fieldset::make()
                    ->relationship('student')
                    ->schema([
                        TextInput::make('first_name.ka')
                            ->label('First Name Geo')
                            ->required(),
                        TextInput::make('last_name.ka')
                            ->label('Last Name Geo')
                            ->required(),
                        TextInput::make('first_name.en')
                            ->label('First Name Eng')
                            ->required(),
                        TextInput::make('last_name.en')
                            ->label('Last Name Eng')
                            ->required(),
                    ]),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function fillForm(): void
    {
        $data = $this->getUser()->load('student')->toArray();

        $this->callHook('beforeFill');

        $data = $this->mutateFormDataBeforeFill($data);
        $this->form->fill($data);

        $this->callHook('afterFill');
    }
}
