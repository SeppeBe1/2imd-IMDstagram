<?php

namespace src;

spl_autoload_register();
include_once("./header.inc.php");

$security = new classes\User();
$security->onlyLoggedInUsers();

/* if(isset($_POST['keyword'])) { IS OK TO PUT IN HTML?
        $keyword = $_POST['keyword'];
        $search = new classes\Search();
        $resultsSearch = $search->searchParam($keyword);
    } */

/* if(isset($_GET['tag'])) {
        $hashtag = $_GET['tag'];
        $searchTag = new classes\Search();
        $resultsTags = $searchTag->searchTags($hashtag);
        var_dump($resultsTags);
    } */

// STACKING OF THE BOOTSTRAP DIVS IN 3 COLUMNS
// $numberOfColumns = 3;
// $bootstrapColWidth = 12 / $numberOfColumns ;
// $arrayChunks = array_chunk($postsUserResults, $numberOfColumns);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">
    <link rel="stylesheet" href="css/style-results.css">


    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>
    <title>Plantstagram - feed</title>
</head>

<body>

    <main>
        <!-- HIER RESULTS PRINTEN - NEEDS TWEAKING WITH HTML/CSS -->
        <?php if (isset($_POST['keyword'])) : ?>
            <?php $keyword = $_POST['keyword'];
            $search = new classes\Search();
            $resultsSearch = $search->searchParam($keyword); ?>

            <div class="container search-results-con">
                <h3>Search results for <span class="bold">"<?php echo $_POST['keyword'] ?>"</span>:</h3><br>

                <!--  <p class="search-results-p">Accounts</p> -->
                <!-- if clause (if keyword == username) -->

                <!-- <p class="search-results-p">Posts</p> -->
                <!-- else -->

                <?php foreach ($resultsSearch as $key) : ?>
                    <div class="container post-post">
                        <div class="row row-first">
                            <div class="col-2">
                                <a href="#">
                                    <img src="<?php echo $key['avatar']; ?>" class="profile-pic-feed">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="#"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                <a href="#" class="profile-location"><?php echo $key['location']; ?></a>
                                <br>
                                <a href="#"><img src="<?php echo  $key['photo']; ?>" class="picture-feed"></a><br>
                                <!--a href aanpassen param meegeven naar de detailpg van de foto-->
                                <br>

                                <?php $descrArray = explode(" ", $key['description']); ?>
                                <?php foreach ($descrArray as $word) : ?>
                                    <?php if ($word[0] == "#") : ?>
                                        <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo  $word; ?></a>
                                    <?php else : ?>
                                        <?php echo  $word; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- RESULTS TAGS -->
        <?php if (isset($_GET['tag'])) : ?>
            <?php $hashtag = $_GET['tag'];
            $searchTag = new classes\Search();
            $resultsTags = $searchTag->searchTags($hashtag); ?>

            <div class="container-fluid container-gallery tags-results">
                <div class="row">
                    <div>
                        <h3 class="results-title">Posts from <span class="tag-results"><?php echo "#" . $_GET['tag']; ?></span></h3>
                    </div>

                    <?php foreach ($resultsTags as $tagResults) : ?>
                        <div class="col-4">
                            <div class="square-image">
                                <a href="postDetail.php"><img class="img-thumbnail img" src="<?php echo $tagResults['photo']; ?>"></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>
    </main>
</body>

</html>