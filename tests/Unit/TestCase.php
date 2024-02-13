<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Content;

use Playground\Content\ServiceProvider;
// use Playground\ServiceProvider as PlaygroundServiceProvider;
use Playground\Test\OrchestraTestCase;

/**
 * \Tests\Unit\Playground\Content\TestCase
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
        $app['config']->set('playground.auth.verify', 'user');

        // $app['config']->set('playground-content.redirect', true);
        // $app['config']->set('playground-content.session', true);

    }
}
