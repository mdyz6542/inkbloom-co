<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columns(2)->schema([
                    TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')->required()->unique(ignoreRecord: true),

                    TextInput::make('tagline')->columnSpanFull(),

                    Select::make('parent_id')
                        ->label('Parent Category')
                        ->options(Category::whereNull('parent_id')->pluck('name', 'id'))
                        ->nullable(),

                    TextInput::make('sort_order')->numeric()->default(0),

                    Toggle::make('is_active')->default(true),

                    Textarea::make('intro_copy')->rows(4)->columnSpanFull(),
                    Textarea::make('meta_description')->rows(2)->columnSpanFull(),
                ]),
            ]);
    }
}
