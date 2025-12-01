<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->brandName('Ikatan Putera Puteri Batik Jawa Timur')
            ->favicon(asset('favicon.ico'))
            ->colors([
                'primary' => '#8B0022',
                'secondary' => '#C92C53',
                'accent' => '#F25C79',
                'gray' => '#FDE9ED',
                'success' => Color::Green,
                'warning' => Color::Orange,
                'danger' => Color::Red,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                \App\Filament\Widgets\StatsOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationGroups([
                'Katalog Batik' => [
                    'icon' => 'heroicon-o-squares-2x2',
                    'label' => 'Katalog Batik',
                ],
                'Event & Workshop' => [
                    'icon' => 'heroicon-o-calendar-days',
                    'label' => 'Event & Workshop',
                ],
                'Konten Website' => [
                    'icon' => 'heroicon-o-document-text',
                    'label' => 'Konten Website',
                ],
                'Pengguna & Komunikasi' => [
                    'icon' => 'heroicon-o-users',
                    'label' => 'Pengguna & Komunikasi',
                ],
                'Pengaturan' => [
                    'icon' => 'heroicon-o-cog-6-tooth',
                    'label' => 'Pengaturan',
                ],
            ])
            ->sidebarCollapsibleOnDesktop()
            ->topNavigation(false);
    }
}