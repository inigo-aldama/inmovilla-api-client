<?php

namespace Inmovilla\ApiClient;

class Request
{
    public string $type;
    public int $startPosition;
    public int $numElements;
    public string $where;
    public string $order;

    public function __construct(string $type, int $startPosition, int $numElements, string $where = "", string $order = "")
    {
        $this->type = $type;
        $this->startPosition = $startPosition;
        $this->numElements = $numElements;
        $this->where = $where;
        $this->order = $order;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'startPosition' => $this->startPosition,
            'numElements' => $this->numElements,
            'where' => $this->where,
            'order' => $this->order,
        ];
    }
}