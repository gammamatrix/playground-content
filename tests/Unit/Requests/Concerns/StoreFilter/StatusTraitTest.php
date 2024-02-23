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

        $input = [];

        $instance->filterStatus($input);
        $this->assertSame([], $input);

        $input = ['status' => 1];
        $instance->filterStatus($input);
        $this->assertSame(['status' => 1], $input);

        $input = ['status' => '1'];
        $instance->filterStatus($input);
        $this->assertSame(['status' => 1], $input);

        $input = ['status' => '-1.0'];
        $instance->filterStatus($input);
        $this->assertSame(['status' => 1], $input);

        $input_map = [
            'status' => [
                'active' => 1,
                'lock' => true,
                'public' => 0,
            ],
        ];

        $instance->filterStatus($input_map);

        $this->assertSame([
            'status' => [
                'active' => true,
                'lock' => true,
                'public' => false,
            ],
        ], $input_map);
    }
}
