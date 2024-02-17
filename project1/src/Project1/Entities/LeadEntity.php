<?php

namespace Project1\Entities;

class LeadEntity
{
    public $first_name;
    public $last_name;
    public $street_address;
    public $city;
    public $state;
    public $zip_code;
    public $email_address;
    public $telephone_number;
    public $appraised_value_of_home;

    public function __construct($data)
    {
        if (!empty($data)) {
            $this->first_name = $data['first_name'];
            $this->last_name = $data['last_name'];
            $this->street_address = $data['street_address'];
            $this->city = $data['city'];
            $this->state = $data['state'];
            $this->zip_code = $data['zip_code'];
            $this->email_address = $data['e-mail_address'];

            if (array_key_exists('phone_number', $data))
            {
                $this->telephone_number = $data['phone_number'];
            }

            $this->appraised_value_of_home = $data['appraised_value_of_home'];
        }
    }

    public function to_array()
    {
        return [
            $this->first_name,
            $this->last_name,
            $this->street_address,
            $this->city,
            $this->state,
            $this->zip_code,
            $this->email_address,
            $this->telephone_number,
            $this->appraised_value_of_home
        ];
    }
}