<?php

function autoloader($class) { // KLOPT NIET. check laatste video van goodbytes
include 'classes/' . $class . '.php';
}

?>