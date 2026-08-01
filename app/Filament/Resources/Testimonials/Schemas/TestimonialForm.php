<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columns(2)->schema([
                    TextInput::make('name')->required(),
                    Select::make('rating')->options([5=>'⭐⭐⭐⭐⭐',4=>'⭐⭐⭐⭐',3=>'⭐⭐⭐',2=>'⭐⭐',1=>'⭐'])->default(5)->required(),
                    Textarea::make('text')->required()->rows(4)->columnSpanFull(),
                    Toggle::make('is_approved')->label('Approved'),
                    Toggle::make('is_featured')->label('Featured on Homepage'),
                ]),
            ]);
    }
}
