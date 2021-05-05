<?php

    namespace src;
    spl_autoload_register();

    // if(!empty($_POST["id"])){

    //     // Counting of all the records, except already shown
    //     $query = 


    // }

    
    $post = new classes\Post();
    // var_dump($allPosts);

    // var_dump($_POST["totalPosts"]);

    $limit = $_POST["totalPosts"];
    $result = $post->getAllPosts($limit);
    // var_dump($result);

    // $result['id'];

    foreach ($result as $post){

        // var_dump($post['id']);

    }



    // $html = '';

    // $html = echo "";

    // $row = $_POST['row'];
    // $rowperpage = 3;
    // // var_dump($row);

    // $conn = Db::getInstance();
    // $statement = $conn->prepare("SELECT * FROM posts limit '.$row.','.$rowperpage");
    // $result = $statement->execute();
    // var_dump($result);





?>