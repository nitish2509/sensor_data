<?php
$hostname = "localhost";
$username = "root";
$password = "nitish2509";
$database = "arduino_data";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $irCount = $_POST['irCount'];
    $vibrationCount = $_POST['vibrationCount'];
    
    $sql = "INSERT INTO sensor_data (irCount, vibrationCount, time) VALUES ('$irCount', '$vibrationCount', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
