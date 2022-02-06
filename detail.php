<?php require 'includes/db.php'; ?>
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
    <?php
    if (isset($_GET['user_id'])) {
      $sql = "SELECT * FROM comments WHERE id='$_GET[user_id]'";
      $run = mysqli_query($conn, $sql);
      while ($rows = mysqli_fetch_assoc($run)) {
        echo '
        <div class="jumbotron">
      <h1>User Details</h1>
      <p>Let just get the complete details</p>
      <a class="btn btn-warning" href="new_form.php?edit_id=' . $rows['id'] . '">Edit ' . $rows['name'] . '</a>
    </div>
      <div class="row">
      <strong class="col-sm-3">Name:</strong>
      <div class="col-sm-3">' . $rows['name'] . '</div>
    </div>
    <div class="row">
      <strong class="col-sm-3">Email Address:</strong>
      <div class="col-sm-3">' . $rows['email'] . '</div>
    </div>
    <div class="row">
      <strong class="col-sm-3">Subject:</strong>
      <div class="col-sm-3">' . $rows['subject'] . '</div>
    </div>
    <div class="row">
      <strong class="col-sm-3">Gender:</strong>
      <div class="col-sm-3">' . $rows['gender'] . '</div>
    </div>
    <div class="row">
      <strong class="col-sm-3">Skills:</strong>
      <div class="col-sm-3">' . $rows['skill1'] . ',  ' . $rows['skill2'] . ', ' . $rows['skill3'] . ', ' . $rows['skill4'] . '</div>
    </div>';
        $sel_country = "SELECT * FROM countries WHERE country_code='$rows[country]'";
        $run_country = mysqli_query($conn, $sel_country);
        while ($c_rows = mysqli_fetch_assoc($run_country)) {
          echo '<div class="row">
      <strong class="col-sm-3">Country:</strong>
      <div class="col-sm-3">' . $c_rows['country_name'] . '</div>
    </div>';
        }
        echo '<div class="row">
      <strong class="col-sm-3">Comment:</strong>
      <div class="col-sm-3">' . $rows['comment'] . '</div>
    </div>
      ';
      }
    }
    ?>
  </div>
</body>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>