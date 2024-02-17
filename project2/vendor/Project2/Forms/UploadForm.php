<?php

namespace Project2\Forms;

class UploadForm
{
    public function __construct()
    {
    }

    public function render()
    {
        $contents = <<<FORM
            <p>
                <form action="/" method="POST" enctype="multipart/form-data">
                    <input type="file" name="csvupload" />
                    <input type="submit" value="Upload" />
                </form>
            </p>
        FORM;

        return $contents;
    }

    public function file() 
    {
        $exists = $this->uploaded();

        if ($exists)
        {
            return $_FILES['csvupload']['tmp_name'];
        }

        return null;
    }

    public function uploaded()
    {
        $exists = isset($_FILES) && isset($_FILES['csvupload']) &&
            file_exists($_FILES['csvupload']['tmp_name']);
        
        return $exists;
    }
}
?>