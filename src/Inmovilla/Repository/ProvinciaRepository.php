<?php

namespace App\Inmovilla\Repository;

use App\Inmovilla\DTO\Pagination\PaginacionProvinciasDTO;
use Inmovilla\Repository\BaseRepository;

class ProvinciaRepository extends BaseRepository
{
    public function findAll(int $startPosition = 1, int $numElements = 100, string $order = ''): PaginacionProvinciasDTO
    {
        $this->addRequest(PaginacionProvinciasDTO::ARRAY_DATA_KEY, $startPosition, $numElements,'', $order);
        $response = $this->sendRequests();
        return PaginacionProvinciasDTO::fromArray($response);
    }

}