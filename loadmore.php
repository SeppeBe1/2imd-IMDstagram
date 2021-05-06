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

    // foreach ($result as $post){

    //     $test = array_keys($post);
        
    //     // $t = $test[1];
    //     // echo $t;

    //     echo $post['description']; 
    // }



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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">
    <title>Plantstagram - feed</title>
</head>

<body>

    <main>

    <?php foreach ($result as $post) : ?>

        <p><?php echo  $post['description'];?></p>

    <?php endforeach; ?>



    </main>

</body>