<?php
namespace Inmovilla\Repository;

use Inmovilla\DTO\Pagination\PaginacionDestacadosDTO;
use Inmovilla\DTO\Pagination\PaginacionPropiedadesDTO;


class PropiedadRepository extends BaseRepository
{
    public function findByCity(int $cod_ciudad, int $startPosition = 1, int $numElements = 100, string $order = ''): PaginacionPropiedadesDTO
    {
        $where = $this->buildWhereClause(['cod_ciu' => $cod_ciudad]);
        $this->addRequest(PaginacionPropiedadesDTO::ARRAY_DATA_KEY, $startPosition, $numElements, $where, $order);
        $response = $this->sendRequests();
        return  PaginacionPropiedadesDTO::fromArray($response);
    }
    public function findByZone(int $cod_zona, int $startPosition = 1, int $numElements = 100, string $order = ''): PaginacionPropiedadesDTO
    {
        $where = $this->buildWhereClause(['cod_zona' => $cod_zona]);
        $this->addRequest(PaginacionPropiedadesDTO::ARRAY_DATA_KEY, $startPosition, $numElements, $where, $order);
        $response = $this->sendRequests();
        return  PaginacionPropiedadesDTO::fromArray($response);
    }

    public function findFeatured(int $startPosition = 1, int $numElements = 100): PaginacionDestacadosDTO
    {
        $this->addRequest(PaginacionDestacadosDTO::ARRAY_DATA_KEY, $startPosition, $numElements, '', '');
        $response = $this->sendRequests();
        return  PaginacionDestacadosDTO::fromArray($response);
    }
}