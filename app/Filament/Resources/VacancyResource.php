<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacancyResource\Pages;
use App\Filament\Resources\VacancyResource\RelationManagers;
use App\Models\Vacancy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'title')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('description'),
                Forms\Components\DatePicker::make('start_date'),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.title')
                    ->numeric()
                    ->sortable()
                    ->words(3)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('title')
                    ->words(5)
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index'  => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancy::route('/create'),
            'edit'   => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}
