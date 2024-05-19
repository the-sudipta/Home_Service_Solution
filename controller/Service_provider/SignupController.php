<?php


// Service Provider

//include_once '../Navigation_Links.php';
global $routes;
require '../../routes.php';
require '../../Utils.php';


require_once __DIR__ . '/../../model/ServiceProviderRepo.php';


session_start();


$Login_page = $routes['service_provider_login'];
$Signup_Page = $routes['service_provider_signup'];

//echo $_SERVER['REQUEST_METHOD'];
$everythingOKCounter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "Got Req";

    $username = $_POST['username'];
    if (empty($username)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;

        echo '<br>username Error 1<br>';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo '<br>username Error 2<br>';
    } else {
        $everythingOK = TRUE;
    }

    $password = $_POST['password'];
    if (empty($password) || strlen($password) < 8) {
        // check if password size in 8 or more and  check if it is empty

        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo '<br>Pass error 1<br>';
    } else {
        $everythingOK = TRUE;
    }

    if ($everythingOK && $everythingOKCounter === 0) {
        echo 'Username = '.$username . '<br>';
        echo 'Password = '.$password . '<br>';
        $inserted_id = createServiceProvider($username, $password, "Offline", "Basic");

//        echo '<br><br>';
        echo '<br>Everything is ok<br>';
        echo '<br>ID found = '.$inserted_id.' <br>';
        if ($inserted_id && $inserted_id > 0) {
            $_SESSION["data"] = $inserted_id;
            $_SESSION["user_id"] =$inserted_id;

            if ($inserted_id > 0) {
                navigate($Login_page);
                exit;
            } else {
                navigate($Signup_Page);
                exit;
            }
        } else {
            echo '<br>Returning to Signup page because Account Could not be Created<br>';
            navigate($Signup_Page);
            exit;
        }
    } else {
        echo '<br>Returning to Login page because The data user provided is not properly validated like 
                in password: 1-upper_case, 1-lower_case, 1-number, 1-special_character and at least 8 character long it must be provided <br>';
        navigate($Signup_Page);
        exit;
    }


}


