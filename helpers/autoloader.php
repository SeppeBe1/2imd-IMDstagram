<?php

function autoloader($class) { 
    include 'classes/' . $class . '.php';
}

?>