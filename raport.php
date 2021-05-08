<?php

namespace src;
spl_autoload_register();


$post = new classes\Post();
var_dump($_POST["id"]);
var_dump($_POST["username"]);
$post->rapportPost($_POST["id"], $_POST["username"])






?>