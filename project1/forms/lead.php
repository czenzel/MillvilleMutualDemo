<?php require_once(dirname(__FILE__) . '/../vendor/autoload.php'); ?>
<?php
$form = new Formr\Formr('bootstrap');
$form->required = '(phone_number)';
$form->messages();

if ($form->submitted())
{
    $data = $form->validate('First Name,Last Name,Street Address,City,State,Zip Code,E-mail Address,Appraised Value of Home');

    if ($form->ok()) {
        $form->success_message = "Thank you, {$data['First Name']}!";
    }
}

$form->create_form('First Name,Last Name,Street Address,City,State,Zip Code,E-mail Address|email,Phone Number|tel,Appraised Value of Home|number');
?>