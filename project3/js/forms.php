<?php
header('Content-type: text/javascript');
require_once(dirname(__FILE__) . '/../vendor/autoload.php');

$default_vehicle = new \Project3\Entities\VehicleEntity(
  'Make', 'Model', intval(date('Y')), 'Package', 0.0, 'VIN'
);

$keys = array_keys($default_vehicle->array());
?>

function load_ajax_submission() {
    $("form").submit(function (event) {
      var formData = {
        <?php
        foreach ($keys as $key) {
          echo $key . ": $('input[name=" . $key . "]').val(),\n";
        }
        ?>
      };
  
      $.ajax({
        type: "POST",
        url: "/ajax.php",
        data: formData
      }).done(function (data) {
        $('.alert-api').hide();
        $('#vehicles').html(data);
      }).fail(function (jqXHR, textStatus, errorThrown) {
        $('.alert-api').show();
      });
  
      event.preventDefault();
    });
  }

$(document).ready(function() {
  load_ajax_submission();
});