<?php

spl_autoload_register('myAutoloader');

    function myAutoloader($className)
    {
        $fullpath = 'classes/' . $className . '.php';
        include_once($fullpath);
    }

?>