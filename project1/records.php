<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
$database = new Project1\Database\LeadDatabase();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 1</title>
    </head>
    <body>
        <?php
        $navigation = new Project1\Bootstrap\Navigation();
        $navigation->render();
        ?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <?php
                                foreach ($database->get_headers() as $header)
                                {
                                    echo "<th scope=\"col\">$header</th>";
                                }
                                ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($database->get_records() as $lead)
                                {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>{$i}</td>";
                                    foreach ($lead as $key => $value)
                                    {
                                        $unit = $key == 'Appraised Value of Home' ? '$ ' : '';
                                        $unit_class = $key == 'Appraised Value of Home' ? ' class="sum"' : '';
                                        echo "<td{$unit_class}>{$unit}{$value}</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9"></td>
                                    <td colspan="1" class="sum">$ <?= $database->sum(); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="count">Total Records: <?= $database->count(); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <style>
            @import url(/css/styles.css);
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>