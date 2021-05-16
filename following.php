<?php

namespace src;

include_once("./header.inc.php");
spl_autoload_register();

$user = new classes\User();
$user->setUsername($_SESSION['user']);
$currentlyLoggedIn = $user->showUser();
// var_dump($currentlyLoggedIn);

$follow = new classes\Follow();
$follow->setIsFollower((int)$currentlyLoggedIn[0]['id']);
$following = $follow->getallFollowing();
var_dump($following);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">
    <link rel="stylesheet" href="css/style-profileEdit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cssgram/0.1.10/cssgram.min.css">
    <title>Plantstagram - following</title>
</head>
<body>
    <main>
            <div class="container-fluid container-profile-edit clearfix">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <h6 class="fw-bold border-bottom ">Following</h6>
                    </div>
                </div>

                <?php foreach ($following as $f):?>
                <div class="row follow-bottom">
                    <div class="col-3 col-md-2">
                        <a href="profile.php?username=<?php echo $f['username'];?>"><img src="./user_avatar/<?php echo $f['avatar'];?>" class="profile-pic-follow "></a>
                    </div>
                    <div class="col-4 col-md-6">
                        <a href="profile.php?username=<?php echo $f['username'];?>"><h6 class="fw-bold username"><?php echo $f['username'];?></h6></a>
                    </div>
                    <div class="col-5 col-md-4 ">
                        <a href="#" class="float-left btn btn-following " data-followid="<?php echo $user_id?>">Following</a>

                    </div>
                </div>
                
                <?php endforeach ;?>
            </div>

    </main>
</body>
</html>