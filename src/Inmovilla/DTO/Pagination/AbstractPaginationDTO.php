<?php
namespace Inmovilla\DTO\Pagination;

use Inmovilla\DTO\DTOInterface;
use Inmovilla\DTO\InitializableFromArrayInterface;
use InvalidArgumentException;

abstract class AbstractPaginationDTO implements DTOInterface, InitializableFromArrayInterface
{
    public PaginationDTO $pagination;
    /** @var DTOInterface[] */
    public array $items = [];
    private function __construct() {}

    /**
     * Creates an instance of the paginated DTO from an array of data.
     *
     * @param array $data The input data.
     * @return static Returns an instance of the concrete class.
     * @throws InvalidArgumentException If validation fails or required keys are missing.
     */
    public static function fromArray(array $data)
    {
        $instance = new static();
        $instance->validateInputData($data);
        $arrayDataKey = static::ARRAY_DATA_KEY;
        $itemClass = static::ITEM_CLASS;
        $dataArray = $data[$arrayDataKey];
        $paginationData = array_shift($dataArray);
        $instance->pagination = new PaginationDTO($paginationData);
        $instance->items = array_map([$itemClass, 'fromArray'], $dataArray);
        return $instance;
    }

    /**
     * Validates the input data.
     *
     * @param array $data The input data.
     * @throws InvalidArgumentException If the input data is invalid.
     */
    protected function validateInputData(array $data): void
    {
        if (!defined('static::ITEM_CLASS') || !defined('static::ARRAY_DATA_KEY')) {
            throw new InvalidArgumentException("The constants 'ITEM_CLASS' and 'ARRAY_DATA_KEY' must be defined in the child class.");
        }

        $itemClass = static::ITEM_CLASS;
        $arrayDataKey = static::ARRAY_DATA_KEY;

        if (!class_exists($itemClass)) {
            throw new InvalidArgumentException("The class {$itemClass} does not exist.");
        }

        if (!in_array(InitializableFromArrayInterface::class, class_implements($itemClass))) {
            throw new InvalidArgumentException("The class {$itemClass} must implement InitializableFromArrayInterface.");
        }

        if (empty($data[$arrayDataKey]) || !isset($data[$arrayDataKey][0])) {
            throw new InvalidArgumentException("The index 0 must exist in the array data for key '{$arrayDataKey}'.");
        }
    }
}