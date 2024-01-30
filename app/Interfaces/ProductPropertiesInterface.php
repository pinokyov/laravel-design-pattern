<?php

namespace App\Interfaces;

interface ProductPropertiesInterface
{
    public function addProperty($key,$value);

    public function get();
}
