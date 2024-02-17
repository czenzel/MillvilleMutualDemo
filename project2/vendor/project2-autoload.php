<?php

class Project2Autoload
{
    function __construct()
    {
        $this->namespace = 'Project2';
        
        spl_autoload_register(array($this, 'loader'));
        $this->register();
    }

    function loader($className)
    {
        $filename = dirname(__FILE__) . '/' . str_replace('\\', '/', $className) . '.php';

        if (file_exists($filename))
        {
            require_once($filename);

            if (class_exists($className))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    function register()
    {
        spl_autoload('Project2\Tasks\CSVtoJSON');
        spl_autoload('Project2\Forms\UploadForm');
    }
}

$project2autoload = new Project2Autoload();
