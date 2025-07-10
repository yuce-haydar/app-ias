<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\HomePageSetting;
use App\Models\AboutPageSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Breadcrumb image helper'ını tüm view'larda kullanılabilir yap
        View::share('getBreadcrumbImage', function() {
            $settings = HomePageSetting::getSettings();
            
            if ($settings && $settings->breadcrumb_image) {
                return asset('storage/' . $settings->breadcrumb_image);
            }
            
            // Varsayılan breadcrumb resmi
            return asset('assets/images/imageshatay/hatay6.jpeg');
        });
        
        // About page helper'ını tüm view'larda kullanılabilir yap
        View::share('getAboutPageSettings', function() {
            return AboutPageSetting::getSettings();
        });
    }
}
