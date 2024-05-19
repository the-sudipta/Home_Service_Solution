<?php
function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "home_service_solution";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
