<?php

namespace App\Inmovilla\Repository;

use App\Inmovilla\DTO\Pagination\PaginacionTiposDTO;
use Inmovilla\Repository\BaseRepository;

class TipoRepository extends BaseRepository
{
    public function findAll(int $startPosition = 1, int $numElements = 100, string $order = ''): PaginacionTiposDTO
    {
        $this->addRequest(PaginacionTiposDTO::ARRAY_DATA_KEY, $startPosition, $numElements,'', $order);
        $response = $this->sendRequests();
        return PaginacionTiposDTO::fromArray($response);
    }

}