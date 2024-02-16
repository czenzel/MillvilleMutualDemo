<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project 4</title>
</head>
<body>
    <h1>Project 4</h1>
    <p>
        <?php
        $demo = new \Project4\Demo\Demonstration();
        ?>
        <h2>Summary of Integers: <?= $demo->run(); ?></h2>
        <p>
            <pre><?= $demo->values_as_json(); ?></pre>
        </p>
    </p>
</body>
</html>