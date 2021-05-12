<?php

namespace src;
spl_autoload_register();

$post = new classes\Post();
$post->deletePost($_POST["id"]);
$post->deleteAllReports($_POST["id"]);


?>