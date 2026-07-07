<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => 
                                $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('template')
                            ->options([
                                'default' => 'Default',
                                'home' => 'Home Page',
                                'academy' => 'Academy Page',
                                'resources' => 'Resources Page',
                                'support' => 'Support Page',
                                'blog' => 'Blog Page',
                            ])
                            ->required()
                            ->default('default')
                            ->live(),
                    ]),

                Grid::make(3)
                    ->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('draft'),
                        Select::make('user_id')
                            ->relationship('author', 'name')
                            ->required()
                            ->default(fn () => auth()->id()),
                        DateTimePicker::make('published_at'),
                    ]),

                Tabs::make('Content & Settings')
                    ->columnSpanFull()
                    ->tabs(fn (Get $get): array => array_merge(
                        // Template specific tabs
                        match ($get('template')) {
                            'home' => [
                                Tab::make('Hero Section')->schema([
                                    TextInput::make('content.hero_badge')->label('Hero Badge (e.g. Nigeria\'s Event Powerhouse)'),
                                    TextInput::make('content.hero_title')->required()->label('Hero Title'),
                                    Textarea::make('content.hero_description')->required()->label('Hero Description'),
                                    TextInput::make('content.hero_primary_btn_text')->label('Primary Button Text'),
                                    TextInput::make('content.hero_primary_btn_link')->label('Primary Button Link'),
                                    TextInput::make('content.hero_secondary_btn_text')->label('Secondary Button Text'),
                                    TextInput::make('content.hero_secondary_btn_link')->label('Secondary Button Link'),
                                    FileUpload::make('content.hero_image_1')->image()->label('Hero Image 1 (Wedding/Vibrant)'),
                                    FileUpload::make('content.hero_image_2')->image()->label('Hero Image 2 (Corporate/Conference)'),
                                ]),
                                Tab::make('Three Pillars')->schema([
                                    TextInput::make('content.pillars_title')->label('Pillars Section Title'),
                                    Repeater::make('content.pillars')
                                        ->label('Pillars')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('icon')->label('Material Icon Name (e.g., handyman, newspaper, school)'),
                                            TextInput::make('link_text')->label('Link Text'),
                                            TextInput::make('link_url')->label('Link URL'),
                                        ])
                                        ->columns(2)
                                        ->maxItems(3),
                                ]),
                                Tab::make('Stats')->schema([
                                    Repeater::make('content.stats')
                                        ->label('Stats Counters')
                                        ->schema([
                                            TextInput::make('number')->required()->placeholder('e.g., 500+'),
                                            TextInput::make('label')->required()->placeholder('e.g., Events Supported'),
                                        ])
                                        ->columns(2)
                                        ->maxItems(4),
                                ]),
                                Tab::make('Bento Tools')->schema([
                                    TextInput::make('content.tools_title')->label('Tools Title'),
                                    Textarea::make('content.tools_description')->label('Tools Description'),
                                    Repeater::make('content.tools')
                                        ->label('Tools Bento Cards')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            FileUpload::make('image')->image()->label('Bento Image'),
                                            TextInput::make('link_url')->label('Link URL'),
                                            TextInput::make('icon')->label('Material Icon Name (e.g., qr_code_2, analytics)'),
                                            Select::make('col_span')
                                                ->options([
                                                    '4' => 'Small Card (Col Span 4)',
                                                    '8' => 'Large Card (Col Span 8)',
                                                ])
                                                ->required()
                                                ->default('4'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('Testimonials')->schema([
                                    TextInput::make('content.testimonials_title')->label('Testimonials Section Title'),
                                    Textarea::make('content.testimonials_description')->label('Testimonials Description'),
                                    Repeater::make('content.testimonials')
                                        ->label('Client Testimonials')
                                        ->schema([
                                            TextInput::make('author_name')->required(),
                                            TextInput::make('author_title')->required()->placeholder('e.g., CEO, Acme'),
                                            Textarea::make('quote')->required(),
                                            FileUpload::make('author_image')->image()->label('Author Photo'),
                                            Select::make('rating')
                                                ->options([
                                                    '5' => '5 Stars',
                                                    '4' => '4 Stars',
                                                ])
                                                ->default('5'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('CTA Section')->schema([
                                    TextInput::make('content.cta_title')->label('CTA Title'),
                                    Textarea::make('content.cta_description')->label('CTA Description'),
                                    TextInput::make('content.cta_primary_btn_text')->label('Primary Button Text'),
                                    TextInput::make('content.cta_primary_btn_link')->label('Primary Button Link'),
                                    TextInput::make('content.cta_secondary_btn_text')->label('Secondary Button Text'),
                                    TextInput::make('content.cta_secondary_btn_link')->label('Secondary Button Link'),
                                ]),
                            ],
                            'academy' => [
                                Tab::make('Hero Section')->schema([
                                    TextInput::make('content.hero_badge')->label('Hero Badge (e.g. Professional Event Excellence)'),
                                    TextInput::make('content.hero_title')->required()->label('Hero Title'),
                                    Textarea::make('content.hero_description')->required()->label('Hero Description'),
                                    TextInput::make('content.hero_primary_btn_text')->label('Primary Button Text'),
                                    TextInput::make('content.hero_primary_btn_link')->label('Primary Button Link'),
                                    TextInput::make('content.hero_secondary_btn_text')->label('Secondary Button Text'),
                                    TextInput::make('content.hero_secondary_btn_link')->label('Secondary Button Link'),
                                    FileUpload::make('content.hero_image')->image()->label('Hero Main Image'),
                                    TextInput::make('content.hero_stat_number')->label('Floating Stat Number (e.g. 5,000+)'),
                                    TextInput::make('content.hero_stat_label')->label('Floating Stat Label (e.g. Graduates in 2024)'),
                                ]),
                                Tab::make('Course Tracks')->schema([
                                    TextInput::make('content.tracks_title')->label('Tracks Title'),
                                    Textarea::make('content.tracks_description')->label('Tracks Description'),
                                    Repeater::make('content.tracks')
                                        ->label('Course Tracks (Bento Layout)')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('icon')->label('Material Icon Name (e.g., event_available, architecture)'),
                                            FileUpload::make('image')->image()->label('Track Banner Image (for specific cards)'),
                                            Select::make('row_span')
                                                ->options([
                                                    '1' => 'Standard (Row Span 1)',
                                                    '2' => 'Large (Row Span 2)',
                                                ])
                                                ->required()
                                                ->default('1'),
                                            Select::make('col_span')
                                                ->options([
                                                    '1' => 'Standard (Col Span 1)',
                                                    '2' => 'Double Width (Col Span 2)',
                                                ])
                                                ->required()
                                                ->default('1'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('Learning Formats')->schema([
                                    TextInput::make('content.formats_title')->label('Formats Title'),
                                    Textarea::make('content.formats_description')->label('Formats Description'),
                                    Repeater::make('content.formats')
                                        ->label('Formats')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('icon')->label('Material Icon Name'),
                                            TextInput::make('bullets')->label('Features Bullet List (comma separated)'),
                                            TextInput::make('button_text'),
                                            TextInput::make('button_link'),
                                            Toggle::make('is_popular')->label('Highlight as Popular'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('Mentors')->schema([
                                    TextInput::make('content.mentors_title')->label('Mentors Title'),
                                    Repeater::make('content.mentors')
                                        ->label('Academy Mentors')
                                        ->schema([
                                            TextInput::make('name')->required(),
                                            TextInput::make('role')->required(),
                                            FileUpload::make('image')->image(),
                                        ])
                                        ->columns(3),
                                ]),
                                Tab::make('CTA / Registration')->schema([
                                    TextInput::make('content.register_title')->label('CTA Title'),
                                    Textarea::make('content.register_description')->label('CTA Description'),
                                    TextInput::make('content.bullet_1_title'),
                                    TextInput::make('content.bullet_1_desc'),
                                    TextInput::make('content.bullet_2_title'),
                                    TextInput::make('content.bullet_2_desc'),
                                ]),
                            ],
                            'resources' => [
                                Tab::make('Hero Section')->schema([
                                    TextInput::make('content.hero_badge')->label('Hero Badge'),
                                    TextInput::make('content.hero_title')->required(),
                                    Textarea::make('content.hero_description')->required(),
                                    TextInput::make('content.hero_primary_btn_text'),
                                    TextInput::make('content.hero_primary_btn_link'),
                                    TextInput::make('content.hero_secondary_btn_text'),
                                    TextInput::make('content.hero_secondary_btn_link'),
                                    FileUpload::make('content.hero_image')->image(),
                                    TextInput::make('content.hero_floater_title')->label('Floating Chip Title'),
                                    TextInput::make('content.hero_floater_desc')->label('Floating Chip Desc'),
                                ]),
                                Tab::make('Latest Trends')->schema([
                                    TextInput::make('content.trends_title'),
                                    Textarea::make('content.trends_description'),
                                ]),
                                Tab::make('Tools Gallery')->schema([
                                    TextInput::make('content.tools_title'),
                                    Textarea::make('content.tools_description'),
                                    Repeater::make('content.tools')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('icon')->label('Material Icon Name'),
                                            TextInput::make('link_url'),
                                            Select::make('col_span')
                                                ->options([
                                                    '1' => 'Small Card (Col Span 1)',
                                                    '2' => 'Large Card (Col Span 2)',
                                                ])
                                                ->required()
                                                ->default('1'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('Downloads / Templates')->schema([
                                    TextInput::make('content.downloads_title'),
                                    Textarea::make('content.downloads_description'),
                                    Repeater::make('content.downloads')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('file_size')->placeholder('e.g., 2.4MB'),
                                            Select::make('type')
                                                ->options([
                                                    'pdf' => 'PDF Document',
                                                    'xlsx' => 'Excel Sheet',
                                                    'pptx' => 'Powerpoint Slide',
                                                ])
                                                ->required()
                                                ->default('pdf'),
                                            TextInput::make('file_url'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('Newsletter')->schema([
                                    TextInput::make('content.newsletter_title'),
                                    Textarea::make('content.newsletter_description'),
                                ]),
                            ],
                            'support' => [
                                Tab::make('Hero Section')->schema([
                                    TextInput::make('content.hero_badge')->label('Hero Badge'),
                                    TextInput::make('content.hero_title')->required(),
                                    Textarea::make('content.hero_description')->required(),
                                    TextInput::make('content.hero_primary_btn_text'),
                                    TextInput::make('content.hero_primary_btn_link'),
                                    TextInput::make('content.hero_secondary_btn_text'),
                                    TextInput::make('content.hero_secondary_btn_link'),
                                    FileUpload::make('content.hero_image')->image(),
                                ]),
                                Tab::make('Services Ecosystem')->schema([
                                    TextInput::make('content.services_title'),
                                    Textarea::make('content.services_description'),
                                    Repeater::make('content.services')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('bullet_1'),
                                            TextInput::make('bullet_2'),
                                            TextInput::make('icon')->label('Material Icon Name'),
                                        ])
                                        ->columns(2)
                                        ->maxItems(4),
                                ]),
                                Tab::make('The Difference')->schema([
                                    TextInput::make('content.difference_title'),
                                    Repeater::make('content.difference_points')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            TextInput::make('icon')->label('Material Icon Name'),
                                        ])
                                        ->columns(2),
                                    TextInput::make('content.difference_stat_1_val')->label('Stat 1 Value'),
                                    TextInput::make('content.difference_stat_1_lbl')->label('Stat 1 Label'),
                                    TextInput::make('content.difference_stat_2_val')->label('Stat 2 Value'),
                                    TextInput::make('content.difference_stat_2_lbl')->label('Stat 2 Label'),
                                    FileUpload::make('content.difference_image_1')->image()->label('Grid Image 1'),
                                    FileUpload::make('content.difference_image_2')->image()->label('Grid Image 2'),
                                ]),
                                Tab::make('Case Studies')->schema([
                                    TextInput::make('content.cases_title'),
                                    Textarea::make('content.cases_description'),
                                    Repeater::make('content.cases')
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->required(),
                                            FileUpload::make('image')->image(),
                                            TextInput::make('category')->required()->placeholder('e.g., Corporate Retreat'),
                                        ])
                                        ->columns(2),
                                ]),
                                Tab::make('Request Quote')->schema([
                                    TextInput::make('content.quote_title'),
                                    Textarea::make('content.quote_description'),
                                    TextInput::make('content.quote_phone'),
                                    TextInput::make('content.quote_email'),
                                    TextInput::make('content.quote_address'),
                                ]),
                            ],
                            default => [
                                Tab::make('Content Body')->schema([
                                    RichEditor::make('content')
                                        ->columnSpanFull(),
                                ]),
                            ]
                        },
                        // SEO tab appended to all page forms
                        [
                            Tab::make('SEO & Metadata')->schema([
                                FileUpload::make('featured_image')
                                    ->image()
                                    ->label('OG Featured Image'),
                                TextInput::make('meta_title')->label('Meta Title (Overrides page title for SEO)'),
                                Textarea::make('meta_description')
                                    ->columnSpanFull()
                                    ->label('Meta Description'),
                                TextInput::make('meta_keywords')->label('Meta Keywords (Comma separated)'),
                            ])
                        ]
                    ))
            ]);
    }
}
