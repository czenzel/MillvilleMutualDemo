<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
$upload_form = new Project2\Forms\UploadForm();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project 2</title>
</head>
<body>
    <h1>Project 2</h1>
    <p>
        <?= $upload_form->render(); ?>
    </p>
    <?php
    if ($upload_form->uploaded()):
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
    <?php endif; ?>
</body>
</html>