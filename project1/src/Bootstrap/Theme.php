<?php

namespace Bootstrap;

class Theme
{
    public function __construct()
    {
    }

    public function header()
    {
        $header = <<<EOL
        <!DOCTYPE html>
        <html>
            <head>
                <title>Project 1</title>
            </head>
            <body>
        EOL;

        echo $header;
    }

    public function scripts_body() 
    {
        $scripts = <<<EOL
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        EOL;

        echo $scripts;
    }

    public function footer()
    {
        $footer = <<<EOL
            </body>
        </html>
        EOL;

        echo $footer;
    }
}