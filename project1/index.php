<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/config.php');

$navigation = new Bootstrap\Navigation($SITE_CONFIG['TITLE'], $SITE_CONFIG['NAVIGATION']);
$theme = new Bootstrap\Theme();

$theme->header();
$navigation->render()
?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $lead_form = new Project1\Forms\LeadForm();
                        $lead_form->render();
                        ?>
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