<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class PhotosRelationManager extends RelationManager
{
    protected static string $relationship = 'photos';

    protected static ?string $recordTitleAttribute = 'path';

    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([                
                FileUpload::make('path')
                    ->directory(function (RelationManager $livewire): string {
                        return "\projects\{$livewire->ownerRecord->id}"
                            ;})
                    ->visibility('private')
                    ->image()
                    // ->imageResizeMode('cover')
                    // ->imageResizeTargetWidth('1920')
                    // ->imageResizeTargetHeight('1080')
                    ->preserveFilenames()
                    ->maxSize(4096)
                    ->label('Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('path')
                ->square()
                ->label('Image'),
                // Tables\Columns\TextColumn::make('path')
                // ->label('Path'),

                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->successNotificationTitle('Success!')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                ->successNotificationTitle('Photo Deleted')
                ,
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}