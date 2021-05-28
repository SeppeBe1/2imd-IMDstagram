<?php

namespace src;
spl_autoload_register();
$user = new classes\User();
$post = new classes\Post();

if(!empty($_POST)){

$user->deleteUser($_POST["userId"]);
$post->deletePost($_POST["postId"]);

    $response = [
        "status" => "success",
        "message" =>  htmlspecialchars($user->getUsername()) . " is banned!"
    ];

    header('Content-Type: application/json');
    echo json_encode($response);

} else {
    $response = [
        "status" => "error",
        "message" => "An error has occured"
    ];
}
?>