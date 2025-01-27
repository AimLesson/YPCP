<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Personalia;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PersonaliaResource\Pages;
use App\Filament\Resources\PersonaliaResource\RelationManagers;

class PersonaliaResource extends Resource
{
    protected static ?string $model = Personalia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationLabel(): string
    {
        return 'Personalia';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->label('Branch')
                    ->relationship('branch', 'name')
                    ->searchable()
                    ->preload()
                    ->options(function () {
                        if (auth()->user()->role === 'superadmin') {
                            return \App\Models\Branch::all()->pluck('name', 'id');
                        } else {
                            return \App\Models\Branch::where('id', auth()->user()->branch_id)->pluck('name', 'id');
                        }
                    })
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Pegawai'),
                Forms\Components\Select::make('title')
                    ->options([
                        'Kepala Sekolah' => 'Kepala Sekolah',
                        'Wakil Kepala Sekolah' => 'Wakil Kepala Sekolah',
                        'Guru' => 'Guru',
                        'Staff' => 'Staff',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('profile_picture')
                    ->directory('profile-images')
                    ->image()
                    ->maxSize(2048),
            ]);
    }
    
    

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $branchId = Auth::user()->branch_id;
                if(auth()->user()->role !== 'superadmin' && auth()->user()->role !== 'yayasan') {
                    $query->where('branch_id', $branchId);
                }
            })
            ->columns([
                Tables\Columns\ImageColumn::make('profile_picture')->rounded(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('branch.name')->label('Branch')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn ($record) => auth()->user()->role === 'superadmin' || $record->branch_id === auth()->user()->branch_id),
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
            'index' => Pages\ListPersonalias::route('/'),
            'create' => Pages\CreatePersonalia::route('/create'),
            'edit' => Pages\EditPersonalia::route('/{record}/edit'),
        ];
    }

    protected static function getTableQuery()
    {
        return parent::getTableQuery()->filterByBranch();
    }
    

}
