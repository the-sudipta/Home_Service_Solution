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


$Dashboard = $routes['service_provider_dashboard'];
$All_Requests = $routes['service_provider_all_requests'];
$Re_Schedule = $routes['service_provider_re_schedule'];
$My_Profile =  $routes['service_provider_my_profile'];


$Re_Schedule_Form = $routes['service_provider_re_schedule_form'];
$Login_page = $routes['service_provider_login'];
$user_id = $_SESSION["user_id"];
//echo 'User ID = '.$user_id;
$logoutController = $backend_routes['logout_controller'];

if($_SESSION["user_id"] <= 0){
    echo '<h1>'.$_SESSION["user_id"] .'</h1>';
    header("Location: {$Login_page}");
}

$TotalRequestCompleted = '';
$TotalIncome = '';
$AccountMode = '';
$UpcomingNextAppointment = '';



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Service Solution -> Customer Dashboard</title>
    <link rel="stylesheet" href="/Home_Service_Solution/css/Customer_Dashboard.css">
</head>
<body>
<div class="main_container">
    <div class="division_a">


        <div class="table-container" style="margin-top: 15px;">
            <h2>Re-schedulable Orders </h2>
            <table style="width: 100%; border-collapse: collapse; margin-left: 10px;">
                <thead>
                <tr style="background-color: #ddd; text-align: left; padding: 10px;">
                    <th>ID</th>
                    <th>Type</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php

                $rows = findAllOrderByServiceProviderID($user_id); // assuming $id is already defined
                if($rows !== null){
                    foreach ($rows as $row) {
                        // Determine color classes based on availability and status
                        if($row['status'] === 'Accepted'){

//                        The Status colors is getting from ColorGenerator.php file
                            $statusColor = '';
                            $statusColor = _Status_Badge_Color($row['status']);

                            // Generate table row
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['type']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td><span class='badge {$statusColor}'>{$row['status']}</span></td>";
                            echo '<td>';
                            echo "<form action='$Re_Schedule_Form' method='post' style='display: inline-block;'>
                                    <input hidden type='number' id='cancel_id' name='re_schedule_id' value='{$row['id']}' />
                                    <button type='submit' class='badge badge-warning' data-id='{$row['id']}'>Re-Schedule</button>
                                          </form>
                                          ";
                            echo '</td>';
                            echo "</tr>";
                        }
                    }
                }
                ?>

                </tbody>
            </table>
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
            <button onclick="goToAllRequests()">Requests</button>
            <button style="background-color: #ffffcc" onclick="reSchedule()">Re-Schedule</button>
            <button onclick="myProfile()">My Profile</button>
            <button onclick="logout()">Logout</button>
        </div>
    </div>
</div>

<script>
    function goToDashboard() {
        window.location.href = "<?php echo $Dashboard; ?>";
    }

    function goToAllRequests() {
        window.location.href = "<?php echo $All_Requests; ?>";
    }

    function reSchedule() {
        window.location.href = "<?php echo $Re_Schedule; ?>";
    }

    function myProfile() {
        window.location.href = "<?php echo $My_Profile; ?>";
    }

    function logout() {
        window.location.href = "<?php echo $logoutController; ?>";
    }
</script>

</body>
</html>

