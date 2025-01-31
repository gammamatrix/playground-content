<?php
/**
 * Playground
 */

declare(strict_types=1);
namespace Playground\Http\Requests\Concerns;

use Illuminate\Support\Carbon;

/**
 * \Playground\Http\Requests\Concerns\PaginationDates
 */
trait PaginationDates
{
    /**
     * @var array<string, mixed>
     */
    protected array $paginationDates = [
        'created_at' => ['label' => 'Created'],
        'updated_at' => ['label' => 'Updated'],
        // 'deleted_at' => ['label' => 'Deleted'],
        // 'start_at' => ['label' => 'Start'],
        // 'end_at' => ['label' => 'End'],
    ];

    /**
     * @return array<string, mixed>
     */
    public function getPaginationDates(): array
    {
        return $this->paginationDates;
    }

    /**
     * @param array<string, mixed> $rules
     */
    public function rules_filters_dates(array &$rules): void
    {
        foreach ($this->getPaginationDates() as $column => $meta) {
            if (empty($column) || ! is_string($column)) {
                continue;
            }

            $rule_key = sprintf('filter.%1$s', $column);

            $rules[$rule_key] = 'nullable';
        }
    }

    /**
     * @return ?array<string, mixed>
     */
    public function prepareForValidationForDates(): ?array
    {
        // $params = [
        //     'filter' => [
        //         'updated_at' => [
        //             'operator' => '>=',
        //             'value' => '-3 days midnight'
        //         ],
        //         'created_at' => '2023-03%',
        //     ],
        // ];
        $dates = $this->getPaginationDates();

        $filter = $this->get('filter');
        if (empty($filter) || ! is_array($filter)) {
            return null;
        }
        // dump([
        //     '__METHOD__' => __METHOD__,
        //     '__LINE__' => __LINE__,
        //     '$filter' => $filter,
        //     'http_build_query' => http_build_query($params),
        // ]);

        $merge = false;
        foreach ($dates as $column => $meta) {
            $filter_expects_array = false;
            $unset = true;
            $options = [
                'operator' => '=',
                'parse' => true,
                'value' => null,
            ];
            if (array_key_exists($column, $filter)) {
                if (is_array($filter[$column])) {
                    $merge = true;
                    $unset = false;

                    if (array_key_exists('parse', $filter[$column])) {
                        $options['parse'] = ! empty($filter[$column]['parse']);
                    }

                    $filter_operators = $this->getPaginationOperators();

                    if (array_key_exists('operator', $filter[$column])
                        && is_string($filter[$column]['operator'])
                        && array_key_exists(strtoupper($filter[$column]['operator']), $filter_operators)
                    ) {
                        $options['operator'] = strtoupper($filter[$column]['operator']);
                    }

                    if (in_array($options['operator'], [
                        'BETWEEN',
                        'NOTBETWEEN',
                    ])) {
                        $filter_expects_array = true;
                    }

                    if (array_key_exists('value', $filter[$column])) {
                        if ($filter_expects_array && ! is_array($filter[$column]['value'])) {
                            $unset = true;
                        } elseif (is_string($filter[$column]['value'])) {
                            if ($options['parse']) {
                                $options['value'] = Carbon::parse($filter[$column]['value'])->format('Y-m-d H:i:s');
                            } else {
                                $options['value'] = $filter[$column]['value'];
                            }
                        }
                    }
                    if (! $unset) {
                        $filter[$column] = $options;
                    }
                    // dump([
                    //     '__METHOD__' => __METHOD__,
                    //     '__LINE__' => __LINE__,
                    //     '$column' => $column,
                    //     '$filter[$column]' => $filter[$column],
                    // ]);
                } elseif (is_string($filter[$column])) {
                    // dump([
                    //     '__METHOD__' => __METHOD__,
                    //     '__LINE__' => __LINE__,
                    //     '$column' => $column,
                    //     '$filter[$column]' => $filter[$column],
                    // ]);
                    $merge = true;
                    $unset = false;
                } else {
                    $unset = true;
                }

                if ($unset) {
                    $merge = true;
                    unset($filter[$column]);
                }
            }
        }
        // dump([
        //     '__METHOD__' => __METHOD__,
        //     '__LINE__' => __LINE__,
        //     '$filter' => $filter,
        //     '$merge' => $merge,
        // ]);

        if ($merge) {
            $this->merge([
                'filter' => $filter,
            ]);
        }

        return $filter;
    }
}
