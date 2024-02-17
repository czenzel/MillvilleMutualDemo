<?php

namespace Project1\Forms;

use Formr;
use Project1\Entities\LeadEntity;
use Project1\Database\LeadDatabase;

class LeadForm
{
    public function render()
    {
        $form = new Formr\Formr('bootstrap');
        $form->required = '(phone_number)';

        if ($form->submitted())
        {
            $data = $form->validate('First Name,Last Name,Street Address,City,State,Zip Code,E-mail Address,Appraised Value of Home');

            if ($form->ok()) {
                $lead = new \Project1\Entities\LeadEntity($data);
                
                $leadDatabase = new \Project1\Database\LeadDatabase();
                $leadDatabase->write_lead($lead);
                
                $form->success_message = "Thank you, {$data['first_name']}!";
            }
        }

        $form->messages();
        $form->create_form('First Name,Last Name,Street Address,City,State,Zip Code,E-mail Address|email,Phone Number|tel,Appraised Value of Home|number');
    }
}
