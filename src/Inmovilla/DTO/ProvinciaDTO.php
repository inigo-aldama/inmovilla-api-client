<?php
namespace App\Inmovilla\DTO;

use Inmovilla\DTO\AbstractDTO;
use Inmovilla\DTO\PaginableDTOInterface;

/**
 * @method static ProvinciaDTO fromArray(array $data)
 */
class ProvinciaDTO extends AbstractDTO implements PaginableDTOInterface
{
   public int $codprov;

   public string $provincia;
   public string $isla;

}