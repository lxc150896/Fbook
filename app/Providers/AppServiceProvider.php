<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Eloquent\User;
use App\Eloquent\Notification;
use Auth;
use App\Eloquent\Option;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.header', function ($view) {
            if (Auth::check()) {
                $view->with('roles', User::getRoles(Auth::id()));
                $view->with('new', Notification::countNew(Auth::id()));
            } else {
                $view->with('roles', null);
            }
        });

        view()->share($this->option());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function option()
    {
        $data['textFooters'] = Option::where(['key' => 'text_footer'])->get();
        $data['banners'] = Option::where(['key' => 'banner'])->get();
        $data['bannerBooks'] = Option::where(['key' => 'banner_book'])->get();
        $data['apps'] = Option::where(['key' => 'app'])->get();
        $data['textBanners'] = Option::where(['key' => 'text_banner'])->get();
        $data['textApps'] = Option::where(['key' => 'app_text'])->get();
        $data['contacts'] = Option::where(['key' => 'contact'])->get();
        $data['address'] = Option::where(['key' => 'address'])->get();
        $data['emails'] = Option::where(['key' => 'email'])->get();
        return $data;
    }
}
