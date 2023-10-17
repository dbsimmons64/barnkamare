<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Nursery Dashboard';
    protected static string $routePath = 'finance';

    public function getTitle(): string|Htmlable
    {
//        return static::$title ?? __('filament-panels::pages/dashboard.title');

        return session('nursery_name') ?? __('filament-panels::pages/dashboard.title');
    }
}
