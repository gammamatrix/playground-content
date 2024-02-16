<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Http\Requests\Concerns\StoreFilter;

use Playground\Http\Requests\StoreRequest;
use Tests\Unit\Playground\Http\TestCase;

/**
 * \Tests\Unit\Playground\Http\Requests\Concerns\StoreFilter\DateTraitTest
 *
 * @see \Playground\Http\Requests\Concerns\StoreFilter::filterStatus()
 */
class StatusTraitTest extends TestCase
{
    /**
     * filterStatus
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterStatus()
     */
    public function test_filterStatus(): void
    {
        $instance = new StoreRequest;

        $this->assertSame([], $instance->filterStatus([]));

        $expected = ['status' => 1];
        $this->assertSame($expected, $instance->filterStatus(['status' => 1]));
        $this->assertSame($expected, $instance->filterStatus(['status' => '1']));
        $this->assertSame($expected, $instance->filterStatus(['status' => '-1.0']));

        $expected = [
            'status' => [
                'active' => true,
                'lock' => true,
                'public' => false,
            ],
        ];
        $this->assertSame($expected, $instance->filterStatus([
            'status' => [
                'active' => 1,
                'lock' => true,
                'public' => 0,
            ],
        ]));
    }
}
