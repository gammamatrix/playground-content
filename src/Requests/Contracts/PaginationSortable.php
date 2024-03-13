<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Http\Requests\Contracts;

/**
 * \Playground\Http\Requests\Contracts\PaginationSortable
 */
interface PaginationSortable
{
    /**
     * @return array<string, mixed>
     */
    public function getSortable(): array;

    /**
     * @param array<string, mixed> $rules
     */
    public function rules_sortable(array &$rules): void;

    /**
     * @return array<string, mixed>
     */
    public function prepareForValidationSort(): array;
}
