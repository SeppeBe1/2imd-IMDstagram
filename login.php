<?php
    include_once(__DIR__ . "/connection.php");
    session_start();

    //test connection
    $conn = \Database::getConn();
    $statement = $conn->prepare("select * from users");
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);

?> 