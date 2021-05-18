<?php

namespace src;
spl_autoload_register();

$post = new classes\Post();
$post->deleteAllReports($_POST["id"]);

?>
