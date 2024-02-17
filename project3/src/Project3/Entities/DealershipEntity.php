<?php

namespace Project3\Entities;

class DealershipEntity
{
    public $vehicles;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function add($vehicle)
    {
        $this->vehicles[] = $vehicle;
    }

    public function delete($vehicle)
    {
        $this->vehicles = array_filter($this->vehicles, function($v) use ($vehicle) {
            $to_be_deleted = $v->vin == $vehicle->vin;

            if ($to_be_deleted)
            {
                // Perform soft delete
                $v->deleted = true;
            }
        });
    }
    
    public function json()
    {
        return json_encode($this->array());
    }

    public function array()
    {
        return [
            'name' => $this->name
        ];
    }
}