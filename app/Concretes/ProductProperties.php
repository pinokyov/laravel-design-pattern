<?php

namespace App\Concretes;

use App\Interfaces\ProductPropertiesInterface;

class ProductProperties implements ProductPropertiesInterface
{
    private $properties;

    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function addProperty($key, $value)
    {
        $this->properties[$key] = $value;
    }

    public function get()
    {
        return $this->properties;
    }
}
