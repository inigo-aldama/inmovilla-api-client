<?php

namespace Inmovilla\Tests\DTO;

use Inmovilla\DTO\PropiedadDTO;
use PHPUnit\Framework\TestCase;

class PropiedadDTOTest extends TestCase
{
    public function testFromArray(): void
    {
        $data = [
            'cod_ofer' => '001',
            'ref' => 'A-123',
            'precioinmo' => 150000.50,
            'ciudad' => 'Test City',
            'zona' => 'Test Zone',
            'habitaciones' => 3,
            'banyos' => 2,
        ];

        $dto = PropiedadDTO::fromArray($data);

        $this->assertEquals('001', $dto->cod_ofer);
        $this->assertEquals('A-123', $dto->ref);
        $this->assertEquals(150000.50, $dto->precioinmo);
        $this->assertEquals('Test City', $dto->ciudad);
        $this->assertEquals('Test Zone', $dto->zona);
        $this->assertEquals(3, $dto->habitaciones);
        $this->assertEquals(2, $dto->banyos);
    }
}