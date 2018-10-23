<?php

namespace Modules\Inewsletter\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Inewsletter\Events\Handlers\RegisterInewsletterSidebar;

class InewsletterServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterInewsletterSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('subscribers', array_dot(trans('inewsletter::subscribers')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('inewsletter', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(

        );
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Inewsletter\Repositories\SubscribersRepository',
            function () {
                $repository = new \Modules\Inewsletter\Repositories\Eloquent\EloquentSubscribersRepository(new \Modules\Inewsletter\Entities\Subscribers());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inewsletter\Repositories\Cache\CacheSubscribersDecorator($repository);
            }
        );
// add bindings

    }
}
