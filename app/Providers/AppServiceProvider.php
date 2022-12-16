<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $user = User::query()->find(1);
        if($user) Auth::login($user);

        // create @admin, @endadmin directives
        Blade::directive('admin', function() {
            return "<?php if(auth()->guard()->check() && auth()->user()->user_type == 1): ?>";
        });
        Blade::directive('endadmin', function() {
            return "<?php endif; ?>";
        });

        // view composer
        view()->composer('home::layouts.header', function ($view) {
            // All active categories
            $view->with('categories', PostCategory::query()->where('status', 1)->get());
            // 3 latest posts
            $view->with('latestPosts', Post::query()->where('status', 1)->latest()->take(3)->get());
        });
    }
}
