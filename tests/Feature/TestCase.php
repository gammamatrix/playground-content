<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Tests\Feature\Playground\Http;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Unit\Playground\Http\TestCase as BaseTestCase;

/**
 * \Tests\Feature\Playground\Http\TestCase
 */
class TestCase extends BaseTestCase
{
    use DatabaseTransactions;

    protected bool $load_migrations_laravel = false;

    protected bool $load_migrations_playground = false;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (! empty(env('TEST_DB_MIGRATIONS'))) {
            if ($this->load_migrations_laravel) {
                $this->loadMigrationsFrom(dirname(dirname(__DIR__)).'/database/migrations-laravel');
            }
            if ($this->load_migrations_playground) {
                $this->loadMigrationsFrom(dirname(dirname(__DIR__)).'/database/migrations-playground');
            }
        }
    }
}
