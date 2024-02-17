<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/config.php');

$database = new Project1\Database\LeadDatabase();

$navigation = new Bootstrap\Navigation($SITE_CONFIG['TITLE'], $SITE_CONFIG['NAVIGATION']);
$theme = new Bootstrap\Theme();

$theme->header();
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
<?php
$theme->scripts_body();
$theme->footer();
?>