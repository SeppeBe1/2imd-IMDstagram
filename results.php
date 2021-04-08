<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $security = new classes\User();
    $security->onlyLoggedInUsers();

    if(isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $search = new classes\Search();
        $resultsSearch = $search->searchParam($keyword);
    }

    /* if(isset($_POST['tag'])) {
        $tag = $_POST['tag'];
        $searchTag = new classes\Search();
        $resultsTags = $searchTag->searchTags($tag);

        var_dump($resultsTags);
    } */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>
    <title>Plantstagram - feed</title>
</head>
<body>

        <main>
        <!-- HIER RESULTS PRINTEN - NEEDS TWEAKING WITH HTML/CSS -->
                <div class="container post-post">
                    <?php foreach($resultsSearch as $key): ?>
                            <div class="row row-first">
                                <div class="col-2">
                                    <a href="#">
                                        <img src="<?php echo $key['avatar']; ?>" class="profile-pic-feed">
                                    </a>
                                </div>
                                <div class="col-7">
                                    <a href="#"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                    <a href="#" class="profile-location"><?php echo $key['location']; ?></a>
                                    <a href="#" class="profile-description"><?php echo $key['description']; ?></a>
                                </div>
                            </div>
                    <?php endforeach; ?>
                </div>
        </main>
    </body>
</html>

