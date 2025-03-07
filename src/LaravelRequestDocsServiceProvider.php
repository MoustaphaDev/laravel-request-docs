<?php

namespace Rakutentech\LaravelRequestDocs;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rakutentech\LaravelRequestDocs\Commands\LaravelRequestDocsCommand;
use Route;

class LaravelRequestDocsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-request-docs')
            ->hasConfigFile('request-docs')
            // ->hasAssets()
            ->hasViews();
            // ->hasAssets();
    }

    public function packageBooted()
    {
        parent::packageBooted();

        // URL from which the docs will be served.
        Route::get(config('request-docs.url'), [\Rakutentech\LaravelRequestDocs\Controllers\LaravelRequestDocsController::class, 'index'])
            ->name('request-docs.index')
            ->middleware(config('request-docs.middlewares'));

        // Following url for api and assets, donot change to config one.
        Route::get("request-docs/api", [\Rakutentech\LaravelRequestDocs\Controllers\LaravelRequestDocsController::class, 'api'])
            ->name('request-docs.api')
            ->middleware(config('request-docs.middlewares'));

        Route::get("request-docs/_astro/{slug}", [\Rakutentech\LaravelRequestDocs\Controllers\LaravelRequestDocsController::class, 'assets'])
            // where slug is either js or css
            ->where('slug', '.*js|.*css|.*png|.*jpg|.*jpeg|.*gif|.*svg|.*ico|.*woff|.*woff2|.*ttf|.*eot|.*otf|.*map')
            ->name('request-docs.assets')
            ->middleware(config('request-docs.middlewares'));
    }
}
