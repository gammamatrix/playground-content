<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Http\Requests\Concerns\StoreContent;

use Playground\Http\Requests\StoreRequest;
use Tests\Unit\Playground\Http\TestCase;

/**
 * \Tests\Unit\Playground\Http\Requests\Concerns\StoreContent\TraitTest
 */
class TraitTest extends TestCase
{
    public function test_purify(): void
    {
        $instance = new StoreRequest;

        $expected = 'some-string';

        $this->assertSame($expected, $instance->purify($expected));
    }

    public function test_exorcise(): void
    {
        $instance = new StoreRequest;

        $expected = 'some-string';

        $this->assertSame($expected, $instance->exorcise($expected));
    }

    public function test_getHtmlPurifier(): void
    {
        $instance = new StoreRequest;

        $this->assertInstanceOf(
            \HTMLPurifier::class,
            $instance->getHtmlPurifier()
        );
    }

    public function test_getHtmlPurifier_with_iframes(): void
    {
        $instance = new StoreRequest;

        $this->assertInstanceOf(
            \HTMLPurifier::class,
            $instance->getHtmlPurifier([
                'iframes' => '%^(https?:)?(\/\/www\.youtube(?:-nocookie)?\.com\/embed\/|\/\/player\.vimeo\.com\/)%',
            ])
        );
    }

    public function test_getHtmlPurifier_with_purifier_path(): void
    {
        $instance = new StoreRequest;

        $this->assertInstanceOf(
            \HTMLPurifier::class,
            $instance->getHtmlPurifier([
                'path' => '/tmp/purifier',
            ])
        );
    }
}
