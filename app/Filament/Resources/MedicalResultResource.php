<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicalResultResource\Pages;
use App\Filament\Resources\MedicalResultResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class MedicalResultResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListMedicalResults::routeTo('/', 'index'),
            Pages\CreateMedicalResult::routeTo('/create', 'create'),
            Pages\EditMedicalResult::routeTo('/{record}/edit', 'edit'),
        ];
    }
}