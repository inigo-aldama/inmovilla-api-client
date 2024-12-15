<?php
namespace Inmovilla\DTO\Pagination;

use InvalidArgumentException;

class PaginationDTO
{
    public int $posicion;
    public int $elementos;
    public int $total;

    public function __construct(array $data = [])
    {
        foreach (array_keys(get_class_vars(static::class)) as $key) {
            if (!array_key_exists($key, $data)) {
                throw new InvalidArgumentException("Missing required key '{$key}' in data array.");
            }
            $this->{$key} = $data[$key];
        }
    }
}