<?php

class Project4Autoload
{
    function __construct()
    {
        $this->namespace = 'Project4';
        
        spl_autoload_register(array($this, 'loader'));
        $this->register();
    }

    function loader($className)
    {
        global $namespace;

        $className = str_ireplace($this->namespace . '\\', '', $className);
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
        spl_autoload('Project4\Arrays\Summary');
        spl_autoload('Project4\Exceptions\NumericException');
        spl_autoload('Project4\Demo\Demonstration');
    }
}

$project4autoload = new Project4Autoload();
