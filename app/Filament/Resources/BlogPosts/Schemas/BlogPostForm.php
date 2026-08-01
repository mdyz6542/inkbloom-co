<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use App\Models\BlogCategory;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columns(2)->schema([
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->columnSpanFull(),

                    TextInput::make('slug')->required()->unique(ignoreRecord: true),

                    Select::make('blog_category_id')
                        ->label('Category')
                        ->options(BlogCategory::pluck('name', 'id'))
                        ->nullable(),

                    Select::make('status')->options(['draft' => 'Draft', 'published' => 'Published'])->default('draft'),

                    DateTimePicker::make('published_at')->label('Publish At'),

                    FileUpload::make('image')->image()->directory('blog')->columnSpanFull(),

                    Textarea::make('excerpt')->rows(2)->columnSpanFull(),

                    MarkdownEditor::make('content')->columnSpanFull(),

                    TextInput::make('meta_title')->columnSpanFull(),
                    Textarea::make('meta_description')->rows(2)->columnSpanFull(),
                ]),
            ]);
    }
}
