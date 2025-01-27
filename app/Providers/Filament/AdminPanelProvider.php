<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Navigation\UserMenuItem;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Session\Middleware\StartSession;
use Devonab\FilamentEasyFooter\EasyFooterPlugin;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use BezhanSalleh\FilamentGoogleAnalytics\FilamentGoogleAnalyticsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Teal,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                EasyFooterPlugin::make()->withFooterPosition('footer')->withLoadTime('This page loaded in'),
                FilamentGoogleAnalyticsPlugin::make(),
                BreezyCore::make()    
                    ->myProfile(
                        shouldRegisterUserMenu: true, 
                        userMenuLabel: 'My Profile', 
                        shouldRegisterNavigation: false, 
                        navigationGroup: 'Settings', 
                        hasAvatars: true, 
                        slug: 'my-profile' 
                    )
                ->avatarUploadComponent(fn() => FileUpload::make('avatar'))
            ])
            ->brandLogo(asset('ypcp/logo-yayasan-big.png'))->brandLogoHeight('4rem')->favicon(asset('ypcp/logo-yayasan.png'));;
            

    }
}
