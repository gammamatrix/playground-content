<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Http\Requests\Concerns\StoreFilter;

use Playground\Http\Requests\StoreRequest;
use Tests\Unit\Playground\Http\TestCase;

/**
 * \Tests\Unit\Playground\Http\Requests\Concerns\StoreFilter\SystemFieldsTraitTest
 *
 * @see \Playground\Http\Requests\Concerns\StoreFilter::filterSystemFields()
 * @see \Playground\Http\Requests\Concerns\StoreFilter::filterSystemFields()
 */
class SystemFieldsTraitTest extends TestCase
{
    /**
     * filterSystemFields: gids
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterSystemFields()
     */
    public function test_filterSystemFields_for_groups(): void
    {
        $instance = new StoreRequest;

        $this->assertSame([], $instance->filterSystemFields([]));

        $expected = ['gids' => 1];
        $this->assertSame($expected, $instance->filterSystemFields(['gids' => 1]));
    }

    /**
     * filterSystemFields: gids
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterSystemFields()
     */
    public function test_filterSystemFields_for_permissions(): void
    {
        $instance = new StoreRequest;

        $this->assertSame([], $instance->filterSystemFields([]));

        $expected = [
            'po' => 7,
            'pg' => 4,
            'pw' => 4,
        ];
        $this->assertSame($expected, $instance->filterSystemFields([
            'po' => 7,
            'pg' => 4,
            'pw' => 4,
        ]));

        // Only the permission bits may be set.

        $expected = [
            'po' => 4,
            'pg' => 4,
            'pw' => 4,
        ];
        $this->assertSame($expected, $instance->filterSystemFields([
            'po' => 100,
            'pg' => 4,
            'pw' => 4,
        ]));
    }

    /**
     * filterSystemFields: rank
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterSystemFields()
     */
    public function test_filterSystemFields_for_rank(): void
    {
        $instance = new StoreRequest;

        $expected = ['rank' => 0];
        $this->assertSame($expected, $instance->filterSystemFields(['rank' => 0]));

        $expected = ['rank' => 1];
        $this->assertSame($expected, $instance->filterSystemFields(['rank' => 1]));

        $expected = ['rank' => -1];
        $this->assertSame($expected, $instance->filterSystemFields(['rank' => -1]));
    }

    /**
     * filterSystemFields: size
     *
     * @see \Playground\Http\Requests\Concerns\StoreFilter::filterSystemFields()
     */
    public function test_filterSystemFields_for_size(): void
    {
        $instance = new StoreRequest;

        $expected = ['size' => 0];
        $this->assertSame($expected, $instance->filterSystemFields(['size' => 0]));

        $expected = ['size' => 1];
        $this->assertSame($expected, $instance->filterSystemFields(['size' => 1]));

        $expected = ['size' => -1];
        $this->assertSame($expected, $instance->filterSystemFields(['size' => -1]));
    }
}
