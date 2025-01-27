<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null)
                    ->required(fn ($context) => $context === 'create')
                    ->dehydrated(fn ($state) => filled($state)),
                Forms\Components\Select::make('role')
                    ->options([
                        'superadmin' => 'Superadmin',
                        'yayasan' => 'Yayasan',
                        'kepala_sekolah' => 'Kepala Sekolah',
                        'operator' => 'operator',
                    ])
                    ->required()
                    ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'),
                Forms\Components\Select::make('branch_id')
                    ->label('Branch')
                    ->relationship('branch', 'name')
                    ->nullable()
                    ->searchable()
                    ->preload()
                    ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            $userId = Auth::user()->id;
            if(auth()->user()->role !== 'superadmin' && auth()->user()->role !== 'yayasan') {
                $query->where('id', $userId);
            }
        })
        ->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('role')->searchable(),
            Tables\Columns\TextColumn::make('branch.name')
                ->label('Branch')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
            Tables\Columns\TextColumn::make('updated_at')->dateTime(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make()
                ->visible(fn ($record) => auth()->user()->role === 'superadmin' 
                || auth()->user()->role === 'yayasan' 
                || auth()->user()->id === $record->id // Check if the logged-in user is editing their own record
            ),            
            Tables\Actions\DeleteAction::make()
                ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'),
        ])
        ->bulkActions([
            //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
