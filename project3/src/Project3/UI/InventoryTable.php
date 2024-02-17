<?php

namespace Project3\UI;

class InventoryTable 
{
    public function __construct()
    {
        $this->database = new \Project3\Database\InventoryDatabase();
    }

    public function process_submission()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            return;
        }

        if (!isset($_POST['make']) || !isset($_POST['model']) || !isset($_POST['year']) || !isset($_POST['package']) || !isset($_POST['price']) || !isset($_POST['vin']))
        {
            throw new \Exception('Invalid form submission');
        }

        $vehicle = new \Project3\Entities\VehicleEntity(
            $_POST['make'], $_POST['model'], intval($_POST['year']), $_POST['package'], floatval($_POST['price']), $_POST['vin']
        );

        $this->database->save($vehicle);
    }

    public function render()
    {
        $headers = '';
        $input = '';
        $rows = '';
        $input = '<tr>';

        $default_vehicle = new \Project3\Entities\VehicleEntity(
            'Make', 'Model', intval(date('Y')), 'Package', 0.0, 'VIN'
        );

        foreach (array_keys($default_vehicle->array()) as $key)
        {
            if ($key == 'deleted')
            {
                continue;
            }

            $title = ucwords($key);
            $headers .= "<th scope='col'>{$title}</th>";

            $type = $key == 'year' || $key == 'price' ? 'numeric' : 'text';

            $input .= "<td><input required type='{$type}' name='{$key}' class='form-control'></td>";
        }

        $input .= '</tr>';

        $dealership = $this->database->load();
        $vehicles = $dealership->vehicles;

        if ($vehicles != null)
        {
            foreach ($vehicles as $vehicle)
            {
                $row = '<tr>';

                foreach ($vehicle->array() as $key => $value)
                {
                    if ($key == 'deleted')
                    {
                        continue;
                    }

                    $row .= "<td>{$value}</td>";
                }

                $row .= '</tr>';

                $rows .= $row;
            }
        }

        $table = <<<EOL
        <form action="/index.php" method="post">
        <table class="table table-dark">
        <thead>
            <tr>
            {$headers}
            </tr>
        </thead>
        <tbody>
        {$input}
        {$rows}
        </tbody>
        </table>
        <input type="submit" hidden />
        </form>
        EOL;

        echo $table;
    }
}