<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/config.php');

$navigation = new Bootstrap\Navigation($SITE_CONFIG['TITLE'], $SITE_CONFIG['NAVIGATION']);
$theme = new Bootstrap\Theme();

$theme->header();
$navigation->render();
?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php
                            $demo = new \Project4\Demo\Demonstration();
                            ?>
                            <h2>Summary of Integers: <?= $demo->run(); ?></h2>
                            <p>
                                <pre><?= $demo->values_as_json(); ?></pre>
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </main>
<?php
$theme->scripts_body();
$theme->footer();
?>