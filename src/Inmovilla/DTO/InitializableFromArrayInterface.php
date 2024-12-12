<?php
namespace Inmovilla\DTO;

/**
 * Interface for objects that can be initialized from an array.
 */
interface InitializableFromArrayInterface
{
    /**
     * Creates an instance from an array of data.
     *
     * @param array $data The data to initialize the object.
     * @return static Returns an instance of the implementing class.
     */
    public static function fromArray(array $data);
}