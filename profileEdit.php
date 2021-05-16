<?php

namespace src;

spl_autoload_register();
include_once("./header.inc.php");

$user = new classes\User();
$username = $_SESSION['user'];

/* GETTERS SETTERS TOEVOEGEN! */
if (isset($_SESSION['user'])) {
    $user->setUsername($username);
    $usersinfo = $user->showUser($username);
}

// UPDATE INFO 
if (!empty($_POST['save'])) {
    //change Full name
    if (!empty($_POST['fullName'])) {
        $user->setFullName($_POST['fullName']);
        $user->setUsername($_SESSION['user']);
        try {
            $user->changefullName();
        } catch (\Throwable $error) {
            $error = $error->getMessage();
        }
    }

    //change Username
    if (!empty($_POST['username'])) {
        try {
            $newUsername = $_POST['username'];
            $user->setUsername($newUsername);
            $getNewUsername = $user->getUsername();

            if ($newUsername != $_SESSION['user']) {
                if ($user->usernameExists($username) == true) {
                    $user->changeUsername($getNewUsername, $username);
                    $_SESSION['user'] = $_POST['username'];
                    header("Refresh:0");
                } elseif ($user->usernameExists($username) == false) {
                    $errorUsernameExists = true;
                }
            }
        } catch (\Throwable $error) {
            $error = $error->getMessage();
        }
    }

    //change Bio
    if (!empty($_POST['bio'])) {
        $user->setBio($_POST['bio']);
        $user->setUsername($_SESSION['user']);
        try {
            $user->changeBio();
        } catch (\Throwable $error) {
            $error = $error->getMessage();
        }
    }

    try {
        //change Email
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->setEmail($_POST['email']);
            $user->changeEmail();
        } else {
            $errorEmail = true;
        }
    } catch (\Throwable $error) {
        $error = $error->getMessage();
    }


    //change Password
    if (!empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
        $lengthPassword = (strlen($_POST['password']));
        $password = ($_POST['password']);
        try {
            // if password equals the second input password = set password
            if ($_POST['password'] === $_POST['confirmPassword']) {
                if ($lengthPassword >= 6) {
                    $user->setPassword($_POST['password']);
                    $user->setConfirmPassword($_POST['confirmPassword']);
                    $user->changePassword($password, $username);
                    header("Refresh:0");
                } else {
                    $errorLengthPw = true;
                }
            } else {
                $errorPassword = true;
            }
        } catch (\Throwable $error) {
            $error = $error->getMessage();
        }
    }
}

//change Avatar
if (isset($_FILES["avatar"])) {
    try {
        $file = $_FILES["avatar"];

        $fileName = $_FILES["avatar"]["name"];
        $fileTmpName = $_FILES["avatar"]["tmp_name"];
        $fileSize = $_FILES["avatar"]["size"];
        $fileError = $_FILES["avatar"]["error"];
        $fileType = $_FILES["avatar"]["type"];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg", "jpeg", "png");

        if (in_array($fileActualExt, $allowed)) {
            if ($fileSize < 2000000) {
                $avatar = uniqid('', true) . "." . $fileActualExt;

                $fileDestination = "user_avatar/" . $avatar;
                move_uploaded_file($fileTmpName, $fileDestination);
                $user->changeAvatar($avatar, $username);
                header("Refresh:0");
            } else {
                $errorFileSize = true;;
            }
        } else {
            $errorFileExt = true;
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}


//delete Avatar
if (isset($_POST['deleteAvatar'])) {
    $user->deleteAvatar($username);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style-profileEdit.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>

    <title>Plantstagram - Profile settings</title>
</head>

<body>
    <main>
        <div class="container container-profile-edit clearfix">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h6 class="fw-bold border-bottom ">Profile settings</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="border-bottom "></span>
                </div>
            </div>

            <!-- Errors avatar -->
            <?php if (isset($errorFileSize)) : ?>
                <div class="alert alert-danger">Your file is too big!</div>
            <?php endif; ?>

            <?php if (isset($errorFileExt) && !isset($_POST['deleteAvatar'])) : ?>
                <div class="alert alert-danger">You cannot upload files of this type!</div>
            <?php endif; ?>

            <?php foreach ($usersinfo as $user) : ?>
                <div class="container-fluid ">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="row ">
                            <div class="col-12 col-md-3 text-center ">

                                <?php $userCheck = new classes\User(); ?>
                                <?php if (!$userCheck->checkIfImgExists($user['avatar'], $username)) : ?>
                                    <div class="avatar">
                                        <img src="user_avatar/<?php echo $user['avatar'] ?>" class="profile-pic-profile rounded-circle">
                                    </div>
                                <?php else : ?>
                                    <div>
                                        <img src="user_avatar/placeholder.jpeg" class="profile-pic-profile rounded-circle">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 ">


                                        <!-- Modal -->
                                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Choose your avatar</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="container-fluid ">
                                                            <div class="row ">
                                                                <div class="col-12 text-center">
                                                                    <div>
                                                                        <img src="./img/placeholder.jpeg" class="profile-pic-profile preview rounded-circle">
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-12 text-center">
                                                                    <div class="btn upload-btn "><i class="far fa-file-image"></i>
                                                                        <span> Choose file</span>

                                                                        <input class="form-control" type="file" id="preview-image" name="avatar" accept=".png, .jpg, .jpeg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-profileEdit" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-profileEdit" type="submit" name="saveAvatar">Save changes</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row container-profilePic">
                                        <div class="col-6 col-md-3">
                                            <button type="button" class="btn upload-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-camera"></i> Upload</button>
                                        </div>

                                        <div class="col-6 col-md-3 inline-flex">
                                            <button id="placeholder-image" class=" btn delete-btn" name="deleteAvatar"><i class="fas fa-trash"></i> Delete</button>
                                        </div>
                                    </div>
                    </form>
                </div>

                <div class="container-settings">
                    <div class="row">

                        <label class="switch" for="private">
                            <input type="checkbox" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <span class="slider round"></span>Private account
                        </label>
                        <br>
                        <small class="private-text">When your account is private, only people you approve can see your photos.</small>


                    </div>

                    <div class="row">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullName" placeholder="Full Name" value="<?php echo ($user['fullName']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($user["username"]) ?>">
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" maxlength="200" id="bio" rows="3" name="bio"><?php echo htmlspecialchars($user['bio']) ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label><br>
                                <small>Must have at least 6 characters.</small>
                                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                            </div>

                            <div class="form-group">
                                <label for="confirm-password">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="••••••••">
                            </div>

                            <div class=" border-bottom">
                                <div class="row btn-save-cancel">
                                    <div class="col-12">
                                        <a><input type="submit" name="save" value="Save" class="btn  btn-profileEdit"></button></a>
                                        <a href="profile.php" class="btn btn-profileEdit">Cancel</a>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endforeach; ?>
                <div class="row deactivate">
                    <p>Deactivate your account <a id="deactivate" href="login.php" data-userId="<?php echo $user["id"]; ?>"> Deactivate</a></p>

                </div>

                <!--errors-->

                <?php if (isset($errorUsernameExists)) : ?>
                    <div class="alert alert-danger">The username you've entered is already taken.</div>
                <?php endif; ?>

                <?php if (isset($errorEmail)) : ?>
                    <div class="alert alert-danger">Email is not valid.</div>
                <?php endif; ?>

                <?php if (isset($errorLengthPw)) : ?>
                    <div class="alert alert-danger">Password must contain more than 6 characters.</div>
                <?php endif; ?>

                <?php if (isset($errorPassword)) : ?>
                    <div class="alert alert-danger">Sorry, your password is incorrect, please try again.</div>
                <?php endif; ?>

                </div>
        </div>
    </main>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="js/avatar.js"></script>
    <script src="js/deactivateAccount.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>