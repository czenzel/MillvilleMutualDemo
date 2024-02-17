<?php
session_start();

require_once(dirname(__FILE__) . '/vendor/autoload.php');

$table = new Project3\UI\InventoryTable();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    try
    {
        $table->process_submission();
        $table->render();
        echo '<script>$(document).ready(function() { load_ajax_submission(); });</script>';
    }
    catch (Exception $e)
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    try
    {
        $table->render();
    }
    catch (Exception $e)
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    }
}
