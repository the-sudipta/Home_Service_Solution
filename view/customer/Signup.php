<?php

// Customer

global $routes, $backend_routes;
//include_once '../Navigation_Links.php';
require '../../routes.php';

//echo '<h1>'.login_page().'</h1>'

$Signup_Controller_File = $backend_routes['customer_signup_controller'];
$Login_Decider = $routes['login_decider'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Service Solution - Signup</title>
    <link rel="stylesheet" href="/Home_Service_Solution/css/Login.css">



    <script>


        // Function to show modal with validation message
        function showModal(message) {
            document.getElementById("validationMessage").innerHTML = message;
            document.getElementById("validationModal").style.display = "block";
        }

        close_modal = () => {
            document.getElementById("validationModal").style.display = "none";
        }



        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;

            var alphanumericRegex = /^[a-zA-Z0-9]+$/;

            // Check if the username is empty or null
            if (username === "" || username === null) {
                showModal("Username is Required");
                return false;
            }else if (!alphanumericRegex.test(username)) {
                showModal("Username should contain only alphanumeric characters.");
                return false;
            }

            if (password === "" || password === null) {
                showModal("Password is Required");
                return false;
            }else if (password.length < 8) {
                showModal("Password must be at least 8 characters long.");
                return false;
            } else if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/)) {
                showModal("Password must include at least 1 special character, 1 number, 1 small letter, and 1 capital letter.");
                return false;
            }

            if (name === "" || name === null) {
                showModal("Name is Required");
                return false;
            }

            if (phone === "" || phone === null) {
                showModal("Phone is Required");
                return false;
            }else if (!/^\d+$/.test(phone)) {
                showModal("Phone must contain only numeric characters.");
                return false;
            }

            if (address === "" || address === null) {
                showModal("Address is Required");
                return false;
            }

            return true;
        }

        document.getElementById("form").onsubmit = function () {
            return validateForm();
        };

    </script>



</head>
<body>


<!-- Validation Modal -->
<div id="validationModal" style="display: none; position: fixed; top: 0; right: 0; width: 40%; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; padding: 15px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); z-index: 9999;" class="alert-dismissible fade show" role="alert">
    <span id="close_button" aria-hidden="true" onclick="close_modal();" style="position: absolute; top: 5px; right: 5px; cursor: pointer; font-size: 20px;">&times;</span>
    <div style="position: absolute; top: 0; right: 0;">
        <p style="cursor: pointer; font-size: 30px;" class="close" data-dismiss="alert" aria-label="Close" >
        </p>
    </div>
    <p id="validationMessage"></p>
</div>


<div class="login-container">
    <h2>Service Provider Signup</h2>
    <form action="<?php echo $Signup_Controller_File; ?>" method="post" id="form" onsubmit="return validateForm();">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </div>
        <button type="submit" class="login-btn">Signup</button>
    </form>
    <a href="<?php echo  $Login_Decider; ?>" class="signup-link">Already have an account? Login</a>
</div>

<script src="js/index.js"></script>
</body>
</html>