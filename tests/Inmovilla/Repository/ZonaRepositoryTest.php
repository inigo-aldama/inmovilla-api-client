<?php

namespace Inmovilla\Tests\Repository;

use Inmovilla\ApiClient\ApiClient;
use Inmovilla\Repository\ZonaRepository;
use PHPUnit\Framework\TestCase;

class ZonaRepositoryTest extends TestCase
{
    public function testFindByCity(): void
    {
        $mockClient = $this->createMock(ApiClient::class);
        $mockClient->expects($this->once())
            ->method('sendRequest')
            ->willReturn([
                'zonas' => [
                    ['posicion' => 1, 'elementos' => 2, 'total' => 2],
                    ['cod_zona' => 1, 'zone' => 'Test Zone 1'],
                    ['cod_zona' => 2, 'zone' => 'Test Zone 2'],
                ]
            ]);

        $repository = new ZonaRepository($mockClient);

        $zones = $repository->findByCity(1);

        $this->assertCount(2, $zones->items);
        $this->assertEquals('Test Zone 1', $zones->items[0]->zone);
        $this->assertEquals(1, $zones->items[0]->cod_zona);
        $this->assertEquals('Test Zone 2', $zones->items[1]->zone);
        $this->assertEquals(2, $zones->items[1]->cod_zona);
    }
}