<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\Setting;

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
        // Share categories globally with all views
        View::composer('*', function ($view) {
            try {
                $categories = ProductCategory::all();
                $brands = Brand::all();
            } catch (\Exception $e) {
                $categories = collect();
                $brands = collect();
            }
            $settings = $this->getSettings();

            // Company Settings
            $view->with('categories', $categories);
            $view->with('navBrands', $brands);
            $view->with('companyEmail', $settings['company_email'] ?? 'info@ulg.ae');
            $view->with('companyPhone', $settings['company_phone'] ?? '+971 552323282');
            $view->with('companyAddress', $settings['company_address'] ?? 'Industrial Area 2, Ajman, UAE');
            $view->with('companyName', $settings['company_name'] ?? 'Union Lubricants');

            // SEO Settings
            $view->with('metaTitle', $settings['meta_title'] ?? 'Union Lubricants - Premium Industrial Lubricants');
            $view->with('metaDescription', $settings['meta_description'] ?? 'High-quality lubricant solutions for industrial applications');
            $view->with('metaKeywords', $settings['meta_keywords'] ?? 'lubricants, industrial oils, hydraulic fluids');

            // Social Media Settings
            $view->with('facebookUrl', $settings['facebook_url'] ?? '#');
            $view->with('twitterUrl', $settings['twitter_url'] ?? '#');
            $view->with('linkedinUrl', $settings['linkedin_url'] ?? '#');
            $view->with('instagramUrl', $settings['instagram_url'] ?? '#');
        });
    }

    /**
     * Get all settings as associative array.
     */
    private function getSettings()
    {
        try {
            $settingsCollection = Setting::all();
            $settings = [];
            foreach ($settingsCollection as $setting) {
                $settings[$setting->key] = $setting->value;
            }
            return $settings;
        } catch (\Exception $e) {
            // Return empty array if settings table doesn't exist
            return [];
        }
    }
}
