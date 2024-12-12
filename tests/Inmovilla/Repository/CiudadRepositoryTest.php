<?php

namespace Inmovilla\Tests\Repository;

use Inmovilla\ApiClient\ApiClient;
use Inmovilla\Repository\CiudadRepository;
use PHPUnit\Framework\TestCase;

class CiudadRepositoryTest extends TestCase
{
    public function testFindAll(): void
    {
        $mockClient = $this->createMock(ApiClient::class);
        $mockClient->expects($this->once())
            ->method('sendRequest')
            ->willReturn([
                'ciudades' => [
                    ['posicion' => 1, 'elementos' => 2, 'total' => 2],
                    ['cod_ciu' => 1, 'city' => 'Test City 1'],
                    ['cod_ciu' => 2, 'city' => 'Test City 2'],
                ]
            ]);

        $repository = new CiudadRepository($mockClient);

        $cities = $repository->findAll();

        $this->assertCount(2, $cities->items);
        $this->assertEquals('Test City 1', $cities->items[0]->city);
        $this->assertEquals(1, $cities->items[0]->cod_ciu);
        $this->assertEquals('Test City 2', $cities->items[1]->city);
        $this->assertEquals(2, $cities->items[1]->cod_ciu);
    }
}