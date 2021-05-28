<?php

namespace src;
spl_autoload_register();

$post = new classes\Post();

if(!empty($_POST)){
$post->deletePost($_POST["id"]);
$post->deleteAllReports($_POST["id"]);

$response = [
    "status" => "success",
    "message" => "Post deleted!"
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