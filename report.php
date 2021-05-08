<?php

namespace src;
spl_autoload_register();

$post = new classes\Post();
$post->rapportPost($_POST["id"], $_POST["username"]);


?>