<?php

namespace Project2\Forms;

class UploadForm
{
    public function __construct()
    {
    }

    public function render()
    {
        $form = new \Formr\Formr('bootstrap');
        $form->required = '*';

        if ($form->submitted())
        {
            $form->validate('*');
            $form->success_message = 'File uploaded';
        }

        $form->messages();
        $form->open_multipart();
        $form->create_form('CSV File|file');
    }

    public function file() 
    {
        $exists = $this->uploaded();

        if ($exists)
        {
            return $_FILES['csv_file']['tmp_name'];
        }

        return null;
    }

    public function uploaded()
    {
        $exists = isset($_FILES) && isset($_FILES['csv_file']) &&
            file_exists($_FILES['csv_file']['tmp_name']);
        
        return $exists;
    }
}
?>