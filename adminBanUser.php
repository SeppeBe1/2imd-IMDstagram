<?php

namespace src;
spl_autoload_register();

$user = new classes\User();
$post = new classes\Post();

$user->deleteUser($_POST["userId"]);
$post->deletePost($_POST["postId"]);

?>