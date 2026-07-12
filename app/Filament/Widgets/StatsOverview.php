<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', \App\Models\User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            Stat::make('Total Posts', \App\Models\Post::count())
                ->description('All blog posts')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),
            Stat::make('Published Posts', \App\Models\Post::where('status', 'published')->count())
                ->description('Currently live')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info'),
            Stat::make('Total Pages', \App\Models\Page::count())
                ->description('Static site pages')
                ->descriptionIcon('heroicon-m-document')
                ->color('warning'),
            Stat::make('Total Menus', \App\Models\Menu::count())
                ->description('Navigation menus')
                ->descriptionIcon('heroicon-m-bars-3')
                ->color('danger'),
        ];
    }
}
