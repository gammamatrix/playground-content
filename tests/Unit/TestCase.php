<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Http;

use Playground\Http\ServiceProvider;
// use Playground\ServiceProvider as PlaygroundServiceProvider;
use Playground\Test\OrchestraTestCase;

/**
 * \Tests\Unit\Playground\Http\TestCase
 */
class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            // PlaygroundServiceProvider::class,
            ServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // dd(__METHOD__);
        $app['config']->set('auth.providers.users.model', 'Playground\\Test\\Models\\User');
        $app['config']->set('playground-auth.verify', 'user');

        $app['config']->set('playground.date.sql', 'Y-m-d H:i:s');
        // $app['config']->set('playground-http.redirect', true);
        // $app['config']->set('playground-http.session', true);

    }
}
