<?php
/**
 * Playground
 */
namespace Playground\Http\Requests\Contracts;

/**
 * \Playground\Http\Requests\Contracts\PaginationOperators
 */
interface PaginationOperators
{
    /**
     * @return array<string, mixed>
     */
    public function getPaginationOperators(): array;
}
