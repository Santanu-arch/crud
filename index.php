<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4 bg-primary text-light text-center p-3 rounded">
  <h3>Details</h3>
</div>  
  
<div class="container mt-3">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Data
  </button>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Entry</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form action="insert.php" method="post">
      <div class="modal-body">
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        <label class="form-label">Password:</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="reset" class="btn btn-primary">Reset</button>
        <button type="submit" class="btn btn-success" value="Add" name="add">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container mt-3">
    <table class="table table-stripped text-center">
        <thead class="table table-dark">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Password</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $q = "select*from data";
            $res = mysqli_query($con, $q);
            $r1 = mysqli_num_rows($res);

            if($r1>0) {
                while($r2 = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>".$r2["id"]."</td>";
                    echo "<td>".$r2["name"]."</td>";
                    echo "<td>".$r2["password"]."</td>";
                    echo "<td><a href='update.php?id=".$r2["id"]."' class='btn btn-warning'>Update</a></td>";
                    echo "<td><a href='delete.php?id=".$r2["id"]."' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <h1 class="text-center text-danger">
        <?php
        if(isset($_GET["message"])) {
            echo $_GET["message"];
        }
        else if(isset($_GET["insert_message"])) {
            echo "<h1 class='text-center text-success'>".$_GET["insert_message"]."</h1>";
        }
        else if(isset($_GET["delete_message"])) {
            echo "<h1 class='text-center text-success'>".$_GET["delete_message"]."</h1>";
        }
        else if(isset($_GET["update_message"])) {
            echo "<h1 class='text-center text-success'>".$_GET["update_message"]."</h1>";
        }
        ?>
    </h1>
</div>
</body>
</html>
