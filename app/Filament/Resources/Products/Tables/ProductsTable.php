<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                TextColumn::make('price')->money('PKR')->sortable(),
                TextColumn::make('sale_price')->money('PKR')->label('Sale Price'),
                TextColumn::make('stock')->sortable(),
                IconColumn::make('is_active')->boolean()->label('Active'),
                IconColumn::make('is_new')->boolean()->label('New'),
                IconColumn::make('is_bestseller')->boolean()->label('Best Seller'),
            ])
            ->filters([
                SelectFilter::make('category')->relationship('category', 'name'),
                TernaryFilter::make('is_active')->label('Active'),
                TernaryFilter::make('is_new')->label('New Arrival'),
                TernaryFilter::make('is_bestseller')->label('Best Seller'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
