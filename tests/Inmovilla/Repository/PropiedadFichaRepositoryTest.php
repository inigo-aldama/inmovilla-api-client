<?php

namespace Inmovilla\Tests\Repository;

use Inmovilla\ApiClient\ApiClient;
use Inmovilla\Repository\PropiedadFichaRepository;
use PHPUnit\Framework\TestCase;

class PropiedadFichaRepositoryTest extends TestCase
{
    public function testFindByCodOffer(): void
    {
        $mockClient = $this->createMock(ApiClient::class);
        $mockClient->expects($this->once())
            ->method('sendRequest')
            ->willReturn([
                'ficha' => [
                    1 => [
                        'cod_ofer' => 1,
                        'ref' => 'REF001',
                        'precioinmo' => 150000.50,
                        'ciudad' => 'Test City',
                        'zona' => 'Test Zone',
                        'habitaciones' => 3,
                        'banyos' => 2,
                    ]
                ]
            ]);

        $repository = new PropiedadFichaRepository($mockClient);

        $propertyDetails = $repository->findByCodOffer(1);

        $this->assertEquals(1, $propertyDetails->cod_ofer);
        $this->assertEquals('REF001', $propertyDetails->ref);
        $this->assertEquals(150000.50, $propertyDetails->precioinmo);
        $this->assertEquals('Test City', $propertyDetails->ciudad);
        $this->assertEquals('Test Zone', $propertyDetails->zona);
        $this->assertEquals(3, $propertyDetails->habitaciones);
        $this->assertEquals(2, $propertyDetails->banyos);
    }
}