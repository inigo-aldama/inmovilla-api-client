<?php
namespace App\Inmovilla\DTO;

use Inmovilla\DTO\AbstractDTO;
use Inmovilla\DTO\PaginableDTOInterface;

/**
 * @method static TipoDTO fromArray(array $data)
 */
class TipoDTO extends AbstractDTO implements PaginableDTOInterface
{
   public int $cod_tipo;

   public string $tipo;
   public int $num;

}