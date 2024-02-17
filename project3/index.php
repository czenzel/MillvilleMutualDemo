<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');

session_start();
$database = new Project3\Database\InventoryDatabase();
$database->new();

require_once(dirname(__FILE__) . '/config.php');

$table = new Project3\UI\InventoryTable();

$navigation = new Bootstrap\Navigation($SITE_CONFIG['TITLE'], $SITE_CONFIG['NAVIGATION']);
$theme = new Bootstrap\Theme();

$theme->header();
$navigation->render();
?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-api" role="alert">
                            <h4 class="alert-heading">Warning</h4>
                            <p>You have entered an invalid VIN number that was previouslly recgonized. In a perfect production application you would get the exact exception and show it here.</p>
                        </div>
                        <div id="vehicles">
                        <?php
                        $table->render();
                        ?>
                        </div>
                        <p><em>Enter the vehicle's information and press the Enter key to continue</em></p>
                    </div>
                </div>
            </div>
        </main>
        <style>
            @import url(/css/styles.css);
        </style>
        <script src="/js/forms.php" async>
        </script>
<?php
$theme->scripts_body();
$theme->footer();
?>