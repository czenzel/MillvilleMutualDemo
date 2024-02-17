<?php
if (session_status() == PHP_SESSION_NONE) session_start();

require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/config.php');

$table = new Project3\UI\InventoryTable();
$alert = '';

try
{
    $table->process_submission();
}
catch (Exception $e)
{
    $alert = $e->getMessage();
}

$navigation = new Bootstrap\Navigation($SITE_CONFIG['TITLE'], $SITE_CONFIG['NAVIGATION']);
$theme = new Bootstrap\Theme();

$theme->header();
$navigation->render();
?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if ($alert != '')
                        {
                            echo "<div class='alert alert-danger' role='alert'>{$alert}</div>";
                        }

                        $table->render();
                        ?>
                        <p><em>Enter the vehicle's information and press the Enter key to continue</em></p>
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