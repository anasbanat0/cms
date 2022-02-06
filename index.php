<?php
require 'includes/db.php';
//////// DELETE ROWS ////////
if (isset($_GET['del_id'])) {
  $del_sql = "DELETE FROM comments WHERE id='$_GET[del_id]'";
  $run_sql = mysqli_query($conn, $del_sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retriving Data From Database</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <table class="table table-striped">
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email Address</th>
        <th>Gender</th>
        <th>Country</th>
        <th>Access</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM comments";
        $run_sql = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($run_sql)) {
          echo '
        <tr>
          <td>' . $rows['id'] . '</td>
          <td>' . $rows['name'] . '</td>
          <td>' . $rows['email'] . '</td>
          <td>' . $rows['gender'] . '</td>';
          $sel_country = "SELECT * FROM countries WHERE country_code='$rows[country]'";
          $run_country = mysqli_query($conn, $sel_country);
          while ($c_rows = mysqli_fetch_assoc($run_country)) {
            echo '<td>' . $c_rows['country_name'] . '</td>';
          }
          echo '<td><a class="btn btn-info btn-xs" href="detail.php?user_id=' . $rows['id'] . '">Access</a></td>
          <td><a class="btn btn-danger btn-xs" href="index.php?del_id=' . $rows['id'] . '">Delete</a></td>
        </tr>
        ';
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>