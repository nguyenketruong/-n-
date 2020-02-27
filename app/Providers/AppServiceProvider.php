<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loaisp;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view ()-> composer('computer.layout.header',function($view)
        {
            $loai_sp =loaisp::all();
            $view ->with('loai_sp',$loai_sp);
        }); 
        view ()-> composer(['computer.layout.header','computer.layout.dathang'],function($view)
        {
            $content=Cart::content();
            $view ->with('content',$content); 
        });
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
}
