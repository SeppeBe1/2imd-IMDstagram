<?php 
include_once(__DIR__ . "/classes/User.php");


    if(!empty($_POST)){
        try {
            $user = new User();
            $user->setUsername();
            $user->setEmail();
            $user->setPassword();

            $user->saveUser();
            $regComplete = "Registration completed!"; //nog laten printen

        }catch(\Throwable $thr) {
            $error = $thr->getMessage(); //error laten printen
        }
    }


?>