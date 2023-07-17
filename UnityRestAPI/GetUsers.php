<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "unity_users_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connected failed: ". $conn->connect_error);
}

echo "Connected successfully, now we will show the users";

$sql = "SELECT username, password FROM user";

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "username: ". $row['username']. " password: ". $row['password'];
    }
}else{
    echo "0 results";
}
$conn->close();
?>