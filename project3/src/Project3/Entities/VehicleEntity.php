<?php

namespace Project3\Entities;

class VehicleEntity
{
    public function __construct($make, $model, $year, $package, $price, $vin)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->package = $package;
        $this->price = $price;
        $this->vin = $vin;
        $this->deleted = false;

        $this->__verify();
    }

    public function json()
    {
        return json_encode($this->array());
    }

    public function array()
    {
        return [
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'package' => $this->package,
            'price' => $this->price,
            'vin' => $this->vin,
            'deleted' => $this->deleted
        ];
    }

    function __verify()
    {
        if (!is_numeric($this->price))
        {
            throw new \Exception('Price must be a number');
        }

        if (!is_numeric($this->year))
        {
            throw new \Exception('Year must be a number');
        }
    }
}