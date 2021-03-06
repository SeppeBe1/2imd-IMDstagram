<?php

namespace src;

include_once("./header.inc.php");
spl_autoload_register();

$user = new classes\User();

$username = $_SESSION['user'];

$user = new classes\User();
$user->setUsername($username);

$post = new classes\Post();
$filters = $post->getAllFilters();


if (isset($_POST['submit'])) {

    $post->setDescription($_POST['description']);
    $post->setLocation($_POST['location-search']);
    $post->setfilters($_POST['filter-image']);

    $fileName = $_FILES['img']['name'];
    $fileTmp = $_FILES['img']['tmp_name'];
    $fileSize = $_FILES['img']['size'];
    $fileError = $_FILES['img']['error'];
    $fileType = $_FILES['img']['type'];

    $fileExt = explode('.', $fileName);
    $fileRealExt = strtolower(end($fileExt));

    $allExtensions = array('jpeg', 'png', 'jpg', 'gif');

    try {
        if ("" == trim($_POST["description"])) {
            $ErrorDescription = true;
        }
        if (in_array($fileRealExt, $allExtensions)) {
            if ($fileError === 0) {
                if ($fileSize < 2097152 && "" !== trim($_POST["description"])) {
                    $post->setImage(uniqid('', true) . "." . $fileRealExt);
                    $fileDestination = "uploads/" . $post->getImage();

                    $post->createPost($user->getUsername(), $post->getImage(), $post->getDescription(), $post->getLocation(), $post->getFilters());

                    move_uploaded_file($fileTmp, $fileDestination);
                    header("location: index.php");
                } else {
                    if($fileSize > 2097152){
                    $errorToBig = true;
                    }
                }
            } else {
                $ErrorUpload = true;
            }
        } else {
            $errorNotUse = true;
        }
    } catch (\Throwable $error) {
        $error = $error->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">
    <title>Make new post</title>
</head>

<body onload="getLocation()">

    <!--


    - Upload photo, choose photo
    - Choose filter
    - Description + tags (placeholder van textarea)
    - Location


    - Next and back button
    - Hoe user_id erin verwerken?



    - Alle inputvelden: vandaag
    - Morgenochtend: styling
    - Mobile + desktop

-->

    <div class="container add-post">

        <div class="row">

            <form action="" class="form-post" method="post" enctype="multipart/form-data">
                <h1>Add a new post</h1>

                <?php if (isset($errorToBig)) : ?>
                    <div class="alert alert-danger">File is too big.</div>
                <?php endif; ?>

                <?php if (isset($ErrorUpload)) : ?>
                    <div class="alert alert-danger">Error while uploading image.</div>
                <?php endif; ?>

                <?php if (isset($errorNotUse)) : ?>
                    <div class="alert alert-danger">This file can't be used.</div>
                <?php endif; ?>

                <?php if (isset($ErrorDescription)) : ?>
                    <div class="alert alert-danger">Description is empty.</div>
                <?php endif; ?>

                <!-- Upload photo, choose photo -->
                <label for="img" class="labels-upload">Select your image</label><br>
                <input type="file" id="img" name="img" class="form-control" accept="image/*">
                <br><br>

                <!--Choose filter-->
                <label for="img" class="labels-upload">Select your filter</label>
                <br>
                <select name="filter-image" id="filter-image" class="form-control">
                    <?php foreach ($filters as $filter) : ?>
                        <option value="<?php echo $filter['filtername']; ?>"><?php echo $filter['filtername']; ?></option>
                    <?php endforeach; ?>
                </select>

                <br><br>

                <!-- Description + tags (placeholder van textarea) -->
                <label for="img" class="labels-upload">Write your description</label>
                <br>
                <textarea rows="4" cols="45" class="form-control" name="description" placeholder="Write description"> </textarea>
                <br><br>

                <!-- Location -->
                <label for="gsearch" class="labels-upload">Add location</label>
                <br>
                <input type="search" id="location-search" class="form-control" name="location-search" readonly>
                <!-- <button type="button" onclick="getLocation()">Try It</button> -->
                <p id="currentLocation"></p>
                <br><br>
                <!-- Submit form -->
                <input class="load-more" name="submit" type="submit" value="Submit"></button>
            </form>
        </div>
    </div>

    <script src="js/location.js"></script>
</body>

</html>