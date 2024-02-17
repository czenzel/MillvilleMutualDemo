<?php

namespace Project3\Database;

class InventoryDatabase
{
    public function __construct()
    {
        $this->session_variable = 'inventory';
    }

    public function save($vehicle)
    {
        $dealership = $this->load();

        foreach ($dealership->vehicles as $stored) {
            if (strtoupper($stored->vin) == strtoupper($vehicle->vin)) {
                throw new \Exception("Vehicle VIN number already stored.");
            }
        }        

        $dealership->add($vehicle);
        $json = json_encode($dealership);
        $_SESSION[$this->session_variable] = $json;
    }

    public function load()
    {
        if (!isset($_SESSION) || !isset($_SESSION[$this->session_variable]))
        {
            return new \Project3\Entities\DealershipEntity('Dealership');
        }

        $json = $_SESSION[$this->session_variable];
        $data = json_decode($json, true);
        
        $dealership = new \Project3\Entities\DealershipEntity($data['name']);

        $dealership->vehicles = array_map(function($vehicle) {
            return new \Project3\Entities\VehicleEntity(
                $vehicle['make'], $vehicle['model'], $vehicle['year'], $vehicle['package'], $vehicle['price'], $vehicle['vin']
            );
        }, $data['vehicles']);

        return $dealership;
    }
}