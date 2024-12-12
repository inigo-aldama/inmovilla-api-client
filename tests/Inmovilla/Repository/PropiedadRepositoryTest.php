<?php

namespace Inmovilla\Tests\Repository;

use Inmovilla\ApiClient\ApiClient;
use Inmovilla\Repository\PropiedadRepository;
use PHPUnit\Framework\TestCase;

class PropiedadRepositoryTest extends TestCase
{
    public function testFindByCity(): void
    {
        $mockClient = $this->createMock(ApiClient::class);
        $mockClient->expects($this->once())
            ->method('sendRequest')
            ->willReturn([
                'paginacion' => [
                    ['posicion' => 1, 'elementos' => 2, 'total' => 2],
                    ['cod_ofer' => 1, 'ref' => 'REF001'],
                    ['cod_ofer' => 2, 'ref' => 'REF002'],
                ]
            ]);

        $repository = new PropiedadRepository($mockClient);

        $properties = $repository->findByCity(1);

        $this->assertCount(2, $properties->items);
        $this->assertEquals('REF001', $properties->items[0]->ref);
        $this->assertEquals(1, $properties->items[0]->cod_ofer);
        $this->assertEquals('REF002', $properties->items[1]->ref);
        $this->assertEquals(2, $properties->items[1]->cod_ofer);
    }

    public function testFindByZone(): void
    {
        $mockClient = $this->createMock(ApiClient::class);
        $mockClient->expects($this->once())
            ->method('sendRequest')
            ->willReturn([
                'paginacion' => [
                    ['posicion' => 1, 'elementos' => 1, 'total' => 1],
                    ['cod_ofer' => 3, 'ref' => 'REF003', 'key_zona' => '3'],
                ]
            ]);

        $repository = new PropiedadRepository($mockClient);

        $properties = $repository->findByZone(3);

        $this->assertCount(1, $properties->items);
        $this->assertEquals('REF003', $properties->items[0]->ref);
        $this->assertEquals(3, $properties->items[0]->key_zona);
    }

    public function testFindFeatured(): void
    {
        $mockClient = $this->createMock(ApiClient::class);
        $mockClient->expects($this->once())
            ->method('sendRequest')
            ->willReturn([
                'destacados' => [
                    ['posicion' => 1, 'elementos' => 2, 'total' => 2],
                    ['cod_ofer' => 4, 'ref' => 'REF004', 'destacado' => 1],
                    ['cod_ofer' => 5, 'ref' => 'REF005', 'destacado' => 1],
                ]
            ]);

        $repository = new PropiedadRepository($mockClient);

        $featuredProperties = $repository->findFeatured();

        $this->assertCount(2, $featuredProperties->items);
        $this->assertEquals('REF004', $featuredProperties->items[0]->ref);
        $this->assertEquals(1, $featuredProperties->items[0]->destacado);
        $this->assertEquals('REF005', $featuredProperties->items[1]->ref);
        $this->assertEquals(1, $featuredProperties->items[1]->destacado);
    }
}