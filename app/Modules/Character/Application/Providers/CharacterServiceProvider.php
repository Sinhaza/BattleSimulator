<?php
namespace App\Modules\Character\Application\Providers;

use Illuminate\Support\ServiceProvider;

class CharacterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            App\Modules\Character\Domain\Repositories\CharacterRepositoryInterface::class,
            App\Modules\Character\Application\Repositories\CharacterRepository::class,
        );
    }
}