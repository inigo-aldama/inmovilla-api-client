<?php
namespace App\Inmovilla\DTO\Pagination;

use App\Inmovilla\DTO\ProvinciaDTO;
use Inmovilla\DTO\Pagination\AbstractPaginationDTO;

/**
 * @method static PaginacionProvinciasDTO fromArray(array $data)
 * @property-read ProvinciaDTO[] $items Array of ProvinciaDTO objects.
 */
class PaginacionProvinciasDTO extends AbstractPaginationDTO
{
    protected const ITEM_CLASS = ProvinciaDTO::class;
    public const ARRAY_DATA_KEY = 'provincias';
}