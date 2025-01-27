<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Branch;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BranchResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BranchResource\RelationManagers;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getNavigationLabel(): string
    {
        return 'Sekolah';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->reactive() // Make it reactive so changes trigger updates in dependent fields
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))), // Generate slug dynamically
            Forms\Components\TextInput::make('phone')
                ->tel()
                ->maxLength(15),
            Forms\Components\FileUpload::make('logo')
                ->directory('logos')
                ->image()
                ->maxSize(2048),
            Forms\Components\FileUpload::make('profile_bg')
                ->label('Gambar Latar')
                ->image(),
            Forms\Components\FileUpload::make('profile_banner1')
                ->label('Gambar 1')
                ->image(),
            Forms\Components\FileUpload::make('profile_banner2')
                ->label('Gambar 2')
                ->image(),
            Forms\Components\RichEditor::make('visi')
                ->label('Visi')
                ->nullable(),
            Forms\Components\RichEditor::make('misi')
                ->label('Misi')
                ->nullable(),
            Forms\Components\RichEditor::make('company_profile')
                ->maxLength(65535)
                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'orderedList', 'unorderedList', 'heading', 'blockquote', 'codeBlock']),
            Forms\Components\RichEditor::make('about')
                ->maxLength(65535)
                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'orderedList', 'unorderedList', 'heading', 'blockquote', 'codeBlock']),
            Forms\Components\Textarea::make('address')
                ->maxLength(65535),
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->disabled() // Make it non-editable
                ->maxLength(255),
        ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $branchId = Auth::user()->branch_id;
                if(auth()->user()->role !== 'superadmin' && auth()->user()->role !== 'yayasan') {
                    $query->where('id', $branchId);
                }
            })
            ->columns([
                Tables\Columns\ImageColumn::make('logo')->rounded(),
                Tables\Columns\TextColumn::make('name')->searchable(), 
                Tables\Columns\TextColumn::make('slug')->searchable(), 
                Tables\Columns\TextColumn::make('phone')->searchable(), 
                Tables\Columns\TextColumn::make('address')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(function ($record) {
                    return auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan' || auth()->user()->branch_id === $record->id;
                }),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
