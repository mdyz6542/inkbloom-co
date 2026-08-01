<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Info')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('tagline')
                            ->placeholder('Short poetic line shown below the title')
                            ->columnSpanFull(),

                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        TextInput::make('sku')
                            ->label('SKU')
                            ->unique(ignoreRecord: true),

                        TextInput::make('price')
                            ->numeric()
                            ->prefix('Rs')
                            ->required(),

                        TextInput::make('sale_price')
                            ->numeric()
                            ->prefix('Rs'),

                        TextInput::make('stock')
                            ->numeric()
                            ->required()
                            ->default(0),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Images')
                    ->schema([
                        FileUpload::make('images')
                            ->label('Product Images')
                            ->multiple()
                            ->image()
                            ->directory('products')
                            ->reorderable(),
                    ]),

                Section::make('Flags')
                    ->columns(4)
                    ->schema([
                        Toggle::make('is_active')->label('Active')->default(true),
                        Toggle::make('is_new')->label('New Arrival'),
                        Toggle::make('is_bestseller')->label('Best Seller'),
                        Toggle::make('is_featured')->label('Featured'),
                    ]),

                Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title'),
                        Textarea::make('meta_description')->rows(2),
                    ]),
            ]);
    }
}
