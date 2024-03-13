<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Http\Requests\Contracts;

/**
 * \Playground\Http\Requests\Contracts\PaginationColumns
 */
interface PaginationColumns
{
    /**
     * @return array<string, mixed>
     */
    public function getPaginationColumns(): array;

    /**
     * @param array<string, mixed> $rules
     */
    public function rules_filters_columns(array &$rules): void;
}
