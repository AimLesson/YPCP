<?php

namespace App\Filament\Resources\PersonaliaResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PersonaliaResource;

class ListPersonalias extends ListRecords
{
    protected static string $resource = PersonaliaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("Tambah Data Karyawan"),
        ];
    }

    protected function makeTable(): Table
    {
        return parent::makeTable()->recordUrl(null);
    }
}
