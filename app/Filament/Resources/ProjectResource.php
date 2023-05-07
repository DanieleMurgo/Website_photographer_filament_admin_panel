<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use RelationManagers\PhotosRelationManager;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(2048),
                Forms\Components\TextInput::make('client')
                ->required()
                ->maxLength(2048),
                Forms\Components\TextInput::make('advertorial_on')
                ->required()
                ->maxLength(2048),
                Forms\Components\TextInput::make('year')
                ->numeric()
                ->integer()
                ->length(4)
                ->minValue(2000)
                ->maxValue(2050),
                Forms\Components\TextArea::make('description')
                ->minLength(20)
                ->maxLength(4096)
                ->required()
                ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {

        $limit=30;


        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')->limit($limit)->sortable(),
                Tables\Columns\TextColumn::make('client')->sortable(),
                Tables\Columns\TextColumn::make('advertorial_on')->sortable(),
                Tables\Columns\TextColumn::make('year')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\PhotosRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }    
}