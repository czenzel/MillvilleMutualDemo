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
                        $upload_form = new Project2\Forms\UploadForm();
                        $upload_form->render();
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <?php
                    if ($upload_form->uploaded()):
                        try
                        {
                            $csv = new Project2\Tasks\CSVtoJSON();
                            $json = $csv->file($upload_form->file());
                    ?>
                        <h2>File Uploaded</h2>
                        <p>
                            <pre><?= $json ?></pre>
                        </p>
                        <p>
                            <a href="<?= $csv->written_url($json) ?>">Download JSON</a>
                        </p>
                    <?php
                        }
                        catch (Exception $e)
                        {
                        ?>
                        <div class="alert alert-danger" role="alert">Unable to process this file.</div>
                        <?php
                        }
                    endif;
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