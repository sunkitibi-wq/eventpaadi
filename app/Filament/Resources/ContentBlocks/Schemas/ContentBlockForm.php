<?php

namespace App\Filament\Resources\ContentBlocks\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContentBlockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('type')
                    ->options([
                        'html' => 'HTML',
                        'text' => 'Text',
                        'markdown' => 'Markdown',
                        'template' => 'Template',
                    ])
                    ->required()
                    ->default('html'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('settings')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('blockable_type'),
                TextInput::make('blockable_id')
                    ->numeric(),
            ]);
    }
}
