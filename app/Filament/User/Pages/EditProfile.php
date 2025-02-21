<?php

namespace App\Filament\User\Pages;


use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
                        SpatieMediaLibraryFileUpload::make('cv')
                            ->acceptedFileTypes(['application/pdf'])
                            ->collection('student_cv'),
                        SpatieMediaLibraryFileUpload::make('Student')
                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                            ->collection('student'),
                        TextInput::make('cv_link')
                            ->label('CV Link')
                            ->formatStateUsing(function ($state, $get) {
                                $media = Media::where('collection_name', 'student_cv')
                                    ->where('model_id', $get('id'))
                                    ->first();
                                return $media ? $media->getUrl() : 'No CV uploaded';
                            })
                            ->disabled()
                            ->visible(fn($get) => $get('cv')),
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
