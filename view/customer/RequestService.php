<?php
global $backend_routes;
session_start();
global $routes;
require '../../routes.php';
require '../../Utils.php';

// Include CarRepo.php and call the function to fetch data
include '../../model/OrderRepo.php';

global $image_routes;
$logo_image = $image_routes['logo_icon'];

$Dashboard = $routes['customer_dashboard'];
$Request_Service = $routes['customer_request'];
$Cancel_Order = $routes['customer_cancel_order'];
$Review =  $routes['customer_review_list'];
$Payment = '';

$Request_ServiceController = $backend_routes['request_service_controller'];

$user_id = $_SESSION["user_id"];

$Login_page = $routes['customer_login'];
//echo 'User ID = '.$user_id;
$logoutController = $backend_routes['logout_controller'];

if($_SESSION["user_id"] <= 0){
    echo '<h1>'.$_SESSION["user_id"] .'</h1>';
    header("Location: {$Login_page}");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Service Solution -> Customer Dashboard</title>
    <link rel="stylesheet" href="/Home_Service_Solution/css/Customer_Dashboard.css">
    <link rel="stylesheet" href="/Home_Service_Solution/css/Request_Service.css">

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
            var service = document.getElementById("service").value;

            var address = document.getElementById("address").value;

            // Check if the username is empty or null
            if (service === "" || service === null || service === 'null') {
                showModal("Select a Service");
                return false;
            }

            if (address === "" || address === null) {
                showModal("Address is Required");
                return false;
            }
            return true;
        }

        // Attach the validation function to the form's onsubmit event
        document.getElementById("form").onsubmit = function () {
            return validateForm();
        };

    </script>




</head>
<body>

<!-- Validation Modal -->
<div id="validationModal" style="display: none; position: fixed; top: 0; right: 0; width: 40%; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; padding: 15px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);" class="alert-dismissible fade show" role="alert">
    <span id="close_button" aria-hidden="true" onclick="close_modal();" style="position: absolute; top: 5px; right: 5px; cursor: pointer; font-size: 20px;">&times;</span>
    <div style="position: absolute; top: 0; right: 0;">
        <p style="cursor: pointer; font-size: 30px;" class="close" data-dismiss="alert" aria-label="Close" >
        </p>
    </div>
    <p id="validationMessage"></p>
</div>



<div class="main_container">
    <div class="division_a">

        <div class="division_a">

            <div class="service-container">
                <h2>Place your order to get services</h2>
                <form action="<?php echo $Request_ServiceController; ?>" method="post" id="form" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="service">Select Service:</label>
                        <select id="service" name="service">
                            <option value="null">Choose an option</option>
                            <option value="AC Servicing">AC Servicing</option>
                            <option value="Home Cleaning">Home Cleaning</option>
                            <option value="Plumbing and Sanitation">Plumbing and Sanitary Services</option>
                            <option value="House Shifting">House Shifting Services</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address">
                    </div>
                    <button type="submit" class="login-btn">Place Order</button>
                </form>
            </div>






        </div>


    </div>
    <div class="division_b">
        <header class="navbar">
            <div class="logo">
                <img src="https://raw.githubusercontent.com/tamalsaha45/temp/main/received_468165922270933.png?fbclid=IwZXh0bgNhZW0CMTAAAR1TBL3PEwVikJb-Gh8FVvj7K-XfRGrEfxd9w9Ev_5C8mqbsbJaj284gI-g_aem_AfjISRnUKHpIx8F51-sXQYNPIKuAiI41p3Ap_5uapPc7_PJkHQdLI3Mqr1InBTIjrmz0IKHr4NKdTw0-EsbcspJ2" style="border-radius: 50%;" alt="Logo">
            </div>
        </header>
    </div>
    <div class="division_d">
        <div class="left_panel">
            <button onclick="goToDashboard()">Dashboard</button>
            <button style="background-color: #ffffcc" onclick="goToRequestService()">Request Service</button>
            <button onclick="cancelOrder()">Cancel Order</button>
            <button onclick="leaveReview()">Review</button>
            <button onclick="logout()">Logout</button>
        </div>
    </div>
</div>

<script>
    function goToDashboard() {
        window.location.href = "<?php echo $Dashboard; ?>";
    }

    function goToRequestService() {
        window.location.href = "<?php echo $Request_Service; ?>";
    }

    function cancelOrder() {
        window.location.href = "<?php echo $Cancel_Order; ?>";
    }

    function leaveReview() {
        window.location.href = "<?php echo $Review; ?>";
    }

    function makePayment() {
        window.location.href = "<?php echo $Payment; ?>";
    }
    function logout() {
        window.location.href = "<?php echo $logoutController; ?>";
    }
</script>

</body>
</html>

