<?php

namespace Inmovilla\Repository;

use Inmovilla\DTO\Pagination\PaginacionCiudadesDTO;

class CiudadRepository extends BaseRepository
{
    public function findAll(int $startPosition = 1, int $numElements = 100, string $order = ''): PaginacionCiudadesDTO
    {
        $this->client->addRequest(PaginacionCiudadesDTO::ARRAY_DATA_KEY, $startPosition, $numElements,'', $order);
        return PaginacionCiudadesDTO::fromArray($this->client->sendRequest());
    }

}