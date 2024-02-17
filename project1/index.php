<?php require_once(dirname(__FILE__) . '/vendor/autoload.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 1</title>
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Lead Entry</a>
            </div>
        </div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php include(dirname(__FILE__) . '/forms/lead.php'); ?>
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