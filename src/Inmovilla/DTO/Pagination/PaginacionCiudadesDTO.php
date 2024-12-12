<?php
namespace Inmovilla\DTO\Pagination;

use Inmovilla\DTO\CiudadDTO;

/**
 * @method static PaginacionCiudadesDTO fromArray(array $data)
 * @property-read CiudadDTO[] $items Array of CiudadDTO objects.
 */
class PaginacionCiudadesDTO extends AbstractPaginationDTO
{
    protected const ITEM_CLASS = CiudadDTO::class;
    public const ARRAY_DATA_KEY = 'ciudades';
}