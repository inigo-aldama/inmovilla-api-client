<?php
namespace Inmovilla\DTO;

/**
 * @method static ZonaDTO fromArray(array $data)
 */
class ZonaDTO extends AbstractDTO implements PaginableDTOInterface
{
   public int $cod_zona;
   public string $zone;

}