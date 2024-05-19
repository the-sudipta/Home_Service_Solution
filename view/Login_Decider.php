<?php
//require './Navigation_Links.php';
global $routes, $image_routes;
require '../routes.php';
require '../Utils.php';

$Service_Provider_Image = $image_routes['service_provider_icon'];
$Customer_Image = $image_routes['customer_icon'];
$Customer_Login = $routes['customer_login'];
$Service_Provider_Login = $routes['service_provider_login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Service Solution - Login</title>
    <link rel="stylesheet" href="/Home_Service_Solution/css/Login_Signup_Decider.css">
    <style>
        /* Style to remove default link styles */
        .card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<div class="card" id="serviceProviderCard">
    <div class="card-content">
        <img src="<?php echo $Service_Provider_Image; ?>" alt="Card Image">
        <div class="content">
            <h2>Service Provider</h2>
            <p>Please click to <span style="font-weight: bolder; font-size: large;">Login</span> as a Service Provider</p>
        </div>
    </div>
</div>

<div class="card" id="customerCard">
    <div class="card-content">
        <img src="<?php echo $Customer_Image; ?>" alt="Card Image">
        <div class="content">
            <h2>Customer</h2>
            <p>Please click to <span style="font-weight: bolder; font-size: large;">Login</span> as a Customer</p>
        </div>
    </div>
</div>

<script>
    // Get reference to the card elements
    const serviceProviderCard = document.getElementById('serviceProviderCard');
    const customerCard = document.getElementById('customerCard');

    // Add click event listeners to the card elements
    serviceProviderCard.addEventListener('click', function() {
        // Redirect to service provider login page
        window.location.href = '<?php echo $Service_Provider_Login; ?>';
    });

    customerCard.addEventListener('click', function() {
        // Redirect to customer login page
        window.location.href = '<?php echo $Customer_Login; ?>';
    });
</script>

</body>
</html>
