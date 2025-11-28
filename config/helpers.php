<?php

declare(strict_types=1);

/**
 * @template T
 * @param int $count
 * @param callable(int): T $callback
 * @return array<int, T>
 */
function array_fill_callback(int $startIndex, int $count, callable $callback): array
{
    $data = [];

    for ($i = $startIndex; $i < $startIndex + $count; ++$i) {
        $data[$i] = $callback($i);
    }

    return $data;
}
