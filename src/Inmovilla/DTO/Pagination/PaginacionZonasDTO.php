<?php
namespace Inmovilla\DTO\Pagination;

use Inmovilla\DTO\ZonaDTO;

/**
 * @method static PaginacionZonasDTO fromArray(array $data)
 * @property-read ZonaDTO[] $items Array of CiudadDTO objects.
 */
class PaginacionZonasDTO extends AbstractPaginationDTO
{
    protected const ITEM_CLASS = ZonaDTO::class;
    public const ARRAY_DATA_KEY = 'zonas';
}