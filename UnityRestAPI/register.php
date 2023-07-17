<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "unity_users_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connected failed: ". $conn->connect_error);
}

$register_username = $_POST["username"];
$register_password = $_POST["password"];

$namecheck_query = "SELECT username FROM user WHERE username='" .$username . "';";

$namecheck = mysqli_query($conn, $namecheck_query) or die("Name check query failed");

if(mysqli_num_rows($namecheck) > 0){
    echo "Name already exists";
    exit();
}

$hassed_password = password_hash($register_password, PASSWORD_DEFAULT);

$insert_user_query = "INSERT INTO user (username, password) VALUES ('" . $register_username . "', '" . $hassed_password . "');";
mysqli_query($conn, $insert_user_query) or die("Insert user query failed");

echo("Register successfully");
?>