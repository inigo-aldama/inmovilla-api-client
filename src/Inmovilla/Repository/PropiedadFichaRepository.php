<?php
namespace Inmovilla\Repository;

use Inmovilla\DTO\PropiedadFichaDTO;

class PropiedadFichaRepository extends BaseRepository
{
    public function findByCodOffer(string $cod_ofer): PropiedadFichaDTO
    {
        $where = $this->buildWhereClause(['cod_ofer' => $cod_ofer]);
        $this->addRequest(PropiedadFichaDTO::ARRAY_DATA_KEY, 1, 1, $where, '');
        $response = $this->sendRequests();
        return  PropiedadFichaDTO::fromArray($response);
    }

}