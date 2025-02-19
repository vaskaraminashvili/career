<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Url;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudentResource extends Resource
{
    use Translatable;

    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->relationship('User')
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            ->required(),
                    ]),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('phone')->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('Student')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->collection('student'),
                SpatieMediaLibraryFileUpload::make('cv')
                    ->acceptedFileTypes(['application/pdf'])
                    ->collection('student_cv'),
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
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('Student Name')
                    ->formatStateUsing(function ($state, Student $record) {
                        return $record->first_name . ' ' . $record->last_name;
                    })
                    ->words(4),
                ToggleColumn::make('status'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit'   => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
