<?php
include("config.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $q = "delete from data where id = '$id'";
    $res = mysqli_query($con, $q);

    if($res) {
        header("location:index.php?delete_message=Data Deleted!!");
    }
    else {
        echo "Data Not Deleted!!";
    }
}
?>