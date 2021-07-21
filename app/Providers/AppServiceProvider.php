<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\category;
use App\Model\Slide;
use App\Model\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('fontend.components.mainmenu',function($view){
            $cate= category::where('parent_id',0)->take(3)->get();
            $view->with('cate_menu',$cate);
        });
        view()->composer('fontend.components.category_tab',function($view){
            $data = category::where('parent_id',0)->get();
            $view->with('cates',$data);
        });
        view()->composer('fontend.components.sidebar',function($view){
            $data = category::where('parent_id',0)->get();
            $view->with('cates',$data);
        });
        view()->composer('fontend.components.slider',function($view){
            $data = Slide::orderBy('created_at','desc')->get();
            $view->with('slides',$data);
        });
        view()->composer('fontend.components.header',function($view){
            $data = Setting::orderBy('created_at','desc')->get();
            $view->with('config',$data);
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
