<?php
namespace Inmovilla\Repository;

use Inmovilla\DTO\Pagination\PaginacionZonasDTO;

class ZonaRepository extends BaseRepository
{
    public function findByCity(int $cod_ciudad, int $startPosition = 1, int $numElements = 10): PaginacionZonasDTO
    {
        $where = $this->buildWhereClause(['cod_ciu' => $cod_ciudad]);
        $this->addRequest(PaginacionZonasDTO::ARRAY_DATA_KEY, $startPosition, $numElements, $where);
        $response = $this->sendRequests();
        return  PaginacionZonasDTO::fromArray($response);
    }

}