<?php

spl_autoload_register('myAutoloader');

    function myAutoloader($className)
    {
        // all classes
        $fullpath = 'classes/' . $className . '.php';
        include_once($fullpath);

        // Security abstract class
        $security = 'helpers/' . $className . '.php';
        include_once($security);
    }

?>