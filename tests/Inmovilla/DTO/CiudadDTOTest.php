<?php

namespace Inmovilla\Tests\DTO;

use Inmovilla\DTO\CiudadDTO;
use PHPUnit\Framework\TestCase;

class CiudadDTOTest extends TestCase
{
    public function testFromArray(): void
    {
        $data = [
            'cod_ciu' => 1,
            'city' => 'Test City',
            'provincia' => 'Test Province',
            'codprov' => 12,
            'isla' => 'Test Island',
            'num' => 100,
            'keysdistrito' => 'Test District',
        ];

        $ciudadDTO = CiudadDTO::fromArray($data);

        $this->assertEquals(1, $ciudadDTO->cod_ciu);
        $this->assertEquals('Test City', $ciudadDTO->city);
        $this->assertEquals('Test Province', $ciudadDTO->provincia);
        $this->assertEquals(12, $ciudadDTO->codprov);
        $this->assertEquals('Test Island', $ciudadDTO->isla);
        $this->assertEquals(100, $ciudadDTO->num);
        $this->assertEquals('Test District', $ciudadDTO->keysdistrito);
    }

    public function testFromArrayWithMissingFields(): void
    {
        $data = [
            'cod_ciu' => 2,
            'city' => 'Another City',
        ];

        $ciudadDTO = CiudadDTO::fromArray($data);

        $this->assertEquals(2, $ciudadDTO->cod_ciu);
        $this->assertEquals('Another City', $ciudadDTO->city);
        $this->assertNull($ciudadDTO->provincia ?? null);
        $this->assertNull($ciudadDTO->codprov ?? null);
        $this->assertNull($ciudadDTO->isla ?? null);
        $this->assertNull($ciudadDTO->num ?? null);
        $this->assertNull($ciudadDTO->keysdistrito ?? null);
    }
}