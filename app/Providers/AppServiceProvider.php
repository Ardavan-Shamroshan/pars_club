<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\League\Entities\TeamResult;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;
use Modules\Setting\Entities\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // create @admin, @endadmin directives
        Blade::directive('admin', function () {
            return "<?php if(auth()->guard()->check() && auth()->user()->user_type == 1): ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        // view composer

        // home head-tag
        view()->composer('home::layouts.head-tag', function ($view) {
            $view->with('setting', Setting::query()->first());
        });

        // home header
        view()->composer('home::layouts.header', function ($view) {
            // All active categories
            $view->with('categories', PostCategory::query()->where('status', 1)->get());
            // 3 latest posts
            $view->with('latestPosts', Post::query()->where('status', 1)->latest()->take(3)->get());
            // setting
            $view->with('setting', Setting::query()->first());
        });

        // home right sidebar
        view()->composer('home::layouts.right-sidebar', function ($view) {
            // hot posts
            $view->with('hotPosts',  // hot posts
                Post::query()
                    ->where('published_at', '<=', now())
                    ->where(['status' => 1], ['label' => 1])
                    ->latest()
                    ->take(8)
                    ->get()
            );
        });

        // home left sidebar
        view()->composer('home::layouts.left-sidebar', function ($view) {
            // team results
            $view->with('results',
                TeamResult::query()
                    ->orderBy('points', 'desc')
                    ->get()
            );
        });
    }
}
