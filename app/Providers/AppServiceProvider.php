<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\HomePageSetting; 
use App\Models\AboutPageSetting;
use App\Models\Facility;
use App\Models\Project;

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
        
        // Footer için tesisleri tüm view'larda kullanılabilir yap
        View::share('footerFacilities', Facility::active()->orderBy('sort_order')->take(5)->get());
        
        // Footer için projeleri tüm view'larda kullanılabilir yap
        View::share('footerProjects', Project::featured()->orderBy('sort_order')->take(5)->get());
    }
}
