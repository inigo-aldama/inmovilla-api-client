<?php
namespace Inmovilla\DTO;

use InvalidArgumentException;

abstract class AbstractDTO implements DTOInterface, InitializableFromArrayInterface
{
    private function __construct() {}

    /**
     * Creates an instance of the concrete class from an array of data.
     *
     * @param array $data Input data to map to properties.
     * @return static Returns an instance of the concrete class.
     * @throws InvalidArgumentException If a property does not exist in the class.
     */
    public static function fromArray(array $data)
    {
        $instance = new static();
        $instance->validateInputData($data);
        foreach ($data as $key => $value) {
            if (property_exists($instance, $key)) {
                $instance->{$key} = $value;
            } else {
                // throw new InvalidArgumentException("Unknown property '{$key}' for class " . static::class);
                echo "[warning] Property '$key' with value '$value' does not exist in class '" . get_class($instance) . "'." . PHP_EOL;
                $instance->{$key} = $value;
            }
        }
        return $instance;
    }

    protected function validateInputData(array $data): void
    {
        // Default implementation, subclasses can override.
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}