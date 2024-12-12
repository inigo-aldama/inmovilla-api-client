<?php

namespace Inmovilla\Repository;

use Inmovilla\DTO\Pagination\PaginacionCiudadesDTO;

class CiudadRepository extends BaseRepository
{
    public function findAll(int $startPosition = 1, int $numElements = 100, string $order = ''): PaginacionCiudadesDTO
    {
        $this->addRequest(PaginacionCiudadesDTO::ARRAY_DATA_KEY, $startPosition, $numElements,'', $order);
        $response = $this->sendRequests();
        return PaginacionCiudadesDTO::fromArray($response);
    }

}