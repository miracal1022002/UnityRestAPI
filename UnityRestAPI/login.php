<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "unity_users_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connected failed: ". $conn->connect_error);
}

$login_username = $_POST["username"];
$login_password = $_POST["password"];

$info_select_query = "SELECT * FROM user WHERE username = '" . $login_username . "'";

$table = mysqli_query($conn, $info_select_query);

if(mysqli_num_rows($table)>0){
    $row = mysqli_fetch_array($table);
    $hashed_password = $row['password'];
    if(!password_verify($login_password, $hashed_password)){
        echo "Incorrect password";
    }else{
        echo "Login successful";
    }
}else{
    echo "Incorrect username";
}
?>