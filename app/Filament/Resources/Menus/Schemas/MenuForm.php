<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('location'),
                Repeater::make('items')
                    ->relationship()
                    ->schema([
                        TextInput::make('label')
                            ->required(),
                        Select::make('page_id')
                            ->relationship('page', 'title')
                            ->searchable()
                            ->preload()
                            ->label('Link to Page')
                            ->helperText('Or enter a custom URL/Route below'),
                        TextInput::make('url'),
                        TextInput::make('route'),
                        Select::make('target')
                            ->options([
                                '_self' => 'Same tab',
                                '_blank' => 'New tab',
                            ])
                            ->default('_self'),
                        TextInput::make('icon'),
                        TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->default(true),
                    ])
                    ->orderColumn('order')
                    ->defaultItems(0)
                    ->collapsible()
                    ->collapsed(false),
            ]);
    }
}
