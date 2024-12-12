<?php
namespace Inmovilla\DTO\Pagination;

use Inmovilla\DTO\PropiedadDTO;

/**
 * @method static PaginacionDestacadosDTO fromArray(array $data)
 * @property-read PropiedadDTO[] $items Array of CiudadDTO objects.
 */
class PaginacionDestacadosDTO extends AbstractPaginationDTO
{
    protected const ITEM_CLASS = PropiedadDTO::class;
    public const ARRAY_DATA_KEY = 'destacados';
}