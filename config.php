<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "details";

$con = mysqli_connect($host, $user, $pass, $db);
if($con) {
    // echo "Connected!!";
}
else {
    echo "Not Connected!!";
}
?>