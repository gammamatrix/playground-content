<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Http\Requests\Concerns\StoreFilter;

use Illuminate\Support\Carbon;
use Playground\Http\Requests\StoreRequest;
use Tests\Unit\Playground\Http\TestCase;

/**
 * \Tests\Unit\Playground\Http\Requests\Concerns\StoreFilter\DateTraitTest
 *
 * @see \Playground\Http\Requests\Concerns\StoreFilter::filterDate()
 * @see \Playground\Http\Requests\Concerns\StoreFilter::filterDateAsCarbon()
 */
class DateTraitTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        Carbon::setTestNow(Carbon::now());
    }

    /**
     * filterDate
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterDate()
     */
    public function test_filterDate(): void
    {
        $instance = new StoreRequest;

        $this->assertNull($instance->filterDate(''));

        $PLAYGROUND_DATE_SQL = config('playground.date.sql');

        if (! $PLAYGROUND_DATE_SQL || ! is_string($PLAYGROUND_DATE_SQL)) {
            throw new \Exception('Expecting PLAYGROUND_DATE_SQL to be a string.');
        }

        $this->assertSame(
            Carbon::now()->format($PLAYGROUND_DATE_SQL),
            $instance->filterDate('now')
        );
    }

    /**
     * filterDateAsCarbon
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterDateAsCarbon()
     */
    public function test_filterDateAsCarbon(): void
    {
        $instance = new StoreRequest;

        $this->assertNull($instance->filterDateAsCarbon(''));

        $date = 'now';
        $this->assertInstanceOf(\DateTime::class, $instance->filterDateAsCarbon($date));
        $this->assertInstanceOf(\Carbon\Carbon::class, $instance->filterDateAsCarbon($date));
    }
}
