<?php
namespace Inmovilla\DTO;

/**
 * @method static CiudadDTO fromArray(array $data)
 */
class CiudadDTO extends AbstractDTO implements PaginableDTOInterface
{
   public int $cod_ciu;
   public string $city;
   public string $provincia;
   public int $codprov;
   public string $isla;
   public int $num;
   public string $keysdistrito;

}