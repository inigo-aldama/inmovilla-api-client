<?php

namespace Inmovilla\Tests\DTO;

use Inmovilla\DTO\ZonaDTO;
use PHPUnit\Framework\TestCase;

class ZonaDTOTest extends TestCase
{
    public function testFromArray(): void
    {
        $data = [
            'cod_zona' => 1,
            'zone' => 'Test Zone',
        ];

        $zonaDTO = ZonaDTO::fromArray($data);

        $this->assertEquals(1, $zonaDTO->cod_zona);
        $this->assertEquals('Test Zone', $zonaDTO->zone);
    }

    public function testFromArrayWithMissingFields(): void
    {
        $data = [
            'cod_zona' => 2,
        ];

        $zonaDTO = ZonaDTO::fromArray($data);

        $this->assertEquals(2, $zonaDTO->cod_zona);
        $this->assertNull($zonaDTO->zone ?? null);
    }
}