<?php

namespace Inmovilla\Tests\DTO;

use Inmovilla\DTO\PropiedadFichaDTO;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class PropiedadFichaDTOTest extends TestCase
{
    public function testFromArray(): void
    {
        $data = [
            'ficha' => [
                1 => [
                    'cod_ofer' => '001',
                    'ref' => 'REF001',
                    'precioinmo' => 150000.50,
                    'ciudad' => 'Test City',
                    'zona' => 'Test Zone',
                    'habitaciones' => 3,
                    'banyos' => 2,
                ]
            ],
            'fotos' => [
                '001' => ['foto1.jpg', 'foto2.jpg']
            ],
            'descripciones' => [
                '001' => ['Beautiful property', 'Great location']
            ],
        ];

        $propiedadFichaDTO = PropiedadFichaDTO::fromArray($data);

        $this->assertEquals('001', $propiedadFichaDTO->cod_ofer);
        $this->assertEquals('REF001', $propiedadFichaDTO->ref);
        $this->assertEquals(150000.50, $propiedadFichaDTO->precioinmo);
        $this->assertEquals('Test City', $propiedadFichaDTO->ciudad);
        $this->assertEquals('Test Zone', $propiedadFichaDTO->zona);
        $this->assertEquals(3, $propiedadFichaDTO->habitaciones);
        $this->assertEquals(2, $propiedadFichaDTO->banyos);

        $this->assertEquals(['foto1.jpg', 'foto2.jpg'], $propiedadFichaDTO->fotos);
        $this->assertEquals(['Beautiful property', 'Great location'], $propiedadFichaDTO->descripciones);
    }

    public function testFromArrayWithMissingFicha(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Missing key 'ficha' in data array.");

        $data = []; // Faltan los datos necesarios
        PropiedadFichaDTO::fromArray($data);
    }

    public function testFromArrayWithPartialData(): void
    {
        $data = [
            'ficha' => [
                1 => [
                    'cod_ofer' => '002',
                    'ref' => 'REF002',
                    'precioinmo' => 200000.00,
                ]
            ]
        ];

        $propiedadFichaDTO = PropiedadFichaDTO::fromArray($data);

        $this->assertEquals('002', $propiedadFichaDTO->cod_ofer);
        $this->assertEquals('REF002', $propiedadFichaDTO->ref);
        $this->assertEquals(200000.00, $propiedadFichaDTO->precioinmo);

        $this->assertEmpty($propiedadFichaDTO->fotos);
        $this->assertEmpty($propiedadFichaDTO->descripciones);
    }
}