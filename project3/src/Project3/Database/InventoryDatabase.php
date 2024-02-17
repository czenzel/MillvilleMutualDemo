<?php

namespace Project3\Database;

class InventoryDatabase
{
    public function __construct()
    {
        $this->session_variable = 'inventory';
    }

    public function new()
    {
        if (!array_key_exists($this->session_variable, $_SESSION) && !isset($_SESSION[$this->session_variable]))
        {
            $_SESSION[$this->session_variable] = json_encode(new \Project3\Entities\DealershipEntity('Dealership'));
        }
    }

    public function save($vehicle)
    {
        $dealership = $this->load();

        if ($dealership->vehicles != null)
        {
            foreach ($dealership->vehicles as $stored) {
                if (strtoupper($stored->vin) == strtoupper($vehicle->vin)) {
                    throw new \Exception("Vehicle VIN number already stored.");
                }
            }
        }

        $dealership->add($vehicle);
        $json = json_encode($dealership);
        $_SESSION[$this->session_variable] = $json;
    }

    public function load()
    {
        $json = $_SESSION[$this->session_variable];
        $data = json_decode($json, true);
        
        $dealership = new \Project3\Entities\DealershipEntity($data['name']);

        if ($data['vehicles'] != null)
        {
            $dealership->vehicles = array_map(function($vehicle) {
                return new \Project3\Entities\VehicleEntity(
                    $vehicle['make'], $vehicle['model'], $vehicle['year'], $vehicle['package'], $vehicle['price'], $vehicle['vin']
                );
            }, $data['vehicles']);
        }

        return $dealership;
    }
}