<?php
include("config.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $q = "select * from data where id = '$id'";
    $res = mysqli_query($con, $q);
    $r1 = mysqli_fetch_assoc($res);
}
?>

<?php
include("config.php");

if(isset($_POST["update"])) {
    $id = $_GET["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $q = "update data set name = '$name', password = '$password' where id = '$id'";
    $res = mysqli_query($con, $q);

    if($res) {
        header("location:index.php?update_message=Data Updated!!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="update.php?id=<?php echo $id; ?>" class="container" method="post">
        <h1>Update Form</h1>
        <div class="mt-3 mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $r1["name"]?>">
        </div>
        <div class="mt-3 mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" name="password" placeholder="Enter your password" value="<?php echo $r1["password"]?>">
        </div>
        <div class="mt-3 mb-3">
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit" class="btn btn-success" name="update">Update</button>
        </div>
    </form>
</body>
</html>
