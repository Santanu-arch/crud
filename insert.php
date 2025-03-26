<?php
include("config.php");

if(isset($_GET["add"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    if($name == "" && $password == "") {
        header("location:index.php?message=Fill name and password");
    }
    else if($name == "") {
        header("location:index.php?message=Fill name");
    }
    else if($password == "") {
        header("location:index.php?message=Fill password");
    }
    else {
        $q = "insert into data(name, password) values('$name', '$password')";
        $res = mysqli_query($con, $q);

        if($res) {
            header("location:index.php?insert_message=Data Inserted!!");
        }
        else {
            echo "Data Not Inserted!!";
        }
    }
}
?>