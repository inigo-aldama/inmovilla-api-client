<?php
namespace App\Inmovilla\DTO\Pagination;

use App\Inmovilla\DTO\TipoDTO;
use Inmovilla\DTO\Pagination\AbstractPaginationDTO;

/**
 * @method static PaginacionTiposDTO fromArray(array $data)
 * @property-read TipoDTO[] $items Array of TipoDTO objects.
 */
class PaginacionTiposDTO extends AbstractPaginationDTO
{
    protected const ITEM_CLASS = TipoDTO::class;
    public const ARRAY_DATA_KEY = 'tipos';
}