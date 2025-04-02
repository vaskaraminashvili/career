<?php

namespace App\Filament\Cms\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class CompanyResource extends Resource
{
    use Translatable;

    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

//    protected static ?string $navigationLabel = 'company';

    public static function getNavigationLabel(): string
    {
        return __('Company');
    }

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

                    ])->visible(fn($livewire) => $livewire instanceof \App\Filament\Cms\Resources\CompanyResource\Pages\EditCompany),
                Section::make('User Account')
                    ->schema([
                        TextInput::make('user_email')
                            ->email()
                            ->required()
                            ->label('Email Address'),
                        TextInput::make('user_password')
                            ->password()
                            ->required()
                            ->label('Password')
                            ->rules(['confirmed']),

                        TextInput::make('user_password_confirmation')
                            ->password()
                            ->required()
                            ->label('Confirm Password')
                            ->dehydrated(false), // This field won't be saved to the database

                    ])->visible(fn($livewire) => $livewire instanceof \App\Filament\Cms\Resources\CompanyResource\Pages\CreateCompany),
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->required(),

                TextInput::make('address')
                    ->required(),
                RichEditor::make('description')
                    ->columnSpanFull()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('company_logo')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->collection('company')
                    ->required(),
                Toggle::make('status')
                    ->required(),

            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->words(5)
                    ->searchable(),
                SpatieMediaLibraryImageColumn::make('company_logo')
                    ->circular()
                    ->conversion('thumb')
                    ->collection('company'),
                Tables\Columns\ToggleColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            ])
            ->defaultSort('id', 'desc');
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
            'index'  => \App\Filament\Cms\Resources\CompanyResource\Pages\ListCompanies::route('/'),
            'create' => \App\Filament\Cms\Resources\CompanyResource\Pages\CreateCompany::route('/create'),
            'edit'   => \App\Filament\Cms\Resources\CompanyResource\Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
