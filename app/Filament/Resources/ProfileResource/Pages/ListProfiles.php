<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProfileResource;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn () => auth()->user()->role === 'superadmin'),
        ];
    }

    protected function makeTable(): Table
    {
        return parent::makeTable()->recordUrl(null);
    }
}
