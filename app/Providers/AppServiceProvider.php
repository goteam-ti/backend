<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // we can use this to prevent lazy loading
        Model::preventLazyLoading();

        // we enable this to remove the data wrapper in our api response
        JsonResource::withoutWrapping();
    }
}
