<!DOCTYPE html>
<?php
require 'includes/db.php';
if (isset($_GET['edit_id'])) {
  $edit_sql = "SELECT * FROM comments WHERE id='$_GET[edit_id]'";
  $run_sql = mysqli_query($conn, $edit_sql);
  while ($rows = mysqli_fetch_assoc($run_sql)) {
    $name = $rows['name'];
    $email = $rows['email'];
    $subject = $rows['subject'];
    $gender = $rows['gender'];
    $country = $rows['country'];
    $comment = $rows['comment'];
    if ($gender == 'male') {
      $select_tag = '<select class="form-control" name="gender"><option value="male" selected>Male</option><option value="female">Female</option></select>';
    } else {
      $select_tag = '<select class="form-control" name="gender"><option value="male">Male</option><option value="female" selected>Female</option></select>';
    }
  }
} else {
  $name = '';
  $email = '';
  $subject = '';
  $gender = '';
  $country = '';
  $comment = '';
  $select_tag = '<select class="form-control" name="gender" required><option value="">Your gender</option><option value="male">Male</option><option value="female">Female</option></select>';
}
?>
<html>

<head>
  <title>New Form</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Submit Form</h1>
    <form method="POST" class="form-horizontal" role="form" action="form_process.php">
      <div class="form-group">
        <label for="name" class="control-label col-sm-2">Name *</label>
        <div class="col-sm-5">
          <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" placeholder="Full Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="control-label col-sm-2">Email Address *</label>
        <div class="col-sm-5">
          <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email Address" required>
        </div>
      </div>
      <div class="form-group">
        <label for="subject" class="control-label col-sm-2">Subject *</label>
        <div class="col-sm-5">
          <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $subject; ?>" placeholder="Add your Subject" required>
        </div>
      </div>
      <div class="form-group">
        <label for="gender" class="control-label col-sm-2">Gender *</label>
        <div class="col-sm-3">
          <?php echo $select_tag; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Skills</label>
        <div class="col-sm-5">
          <label class="checkbox-inline" for="skill1"><input id="skill1" type="checkbox" value="html" name="skill1">HTML</label>
          <label class="checkbox-inline" for="skill2"><input id="skill2" type="checkbox" value="css" name="skill2">CSS</label>
          <label class="checkbox-inline" for="skill3"><input id="skill3" type="checkbox" value="php" name="skill3">PHP</label>
          <label class="checkbox-inline" for="skill4"><input id="skill4" type="checkbox" value="javascript" name="skill4">Javascript</label>
        </div>
      </div>
      <div class="form-group">
        <label for="country" class="control-label col-sm-2">Country *</label>
        <div class="col-sm-3">
          <select class="form-control" name="country" id="country" required>
            <option>Your country</option>
            <?php
            $sel_countries = "SELECT * FROM countries";
            $run_countries = mysqli_query($conn, $sel_countries);
            while ($rows = mysqli_fetch_assoc($run_countries)) {
              if ($country == $rows['country_code']) {
                $selected = 'selected';
              } else {
                $selected = '';
              }
              echo '<option value="' . $rows['country_code'] . '" ' . $selected . '>' . $rows['country_name'] . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="comment" class="control-label col-sm-2">Comment *</label>
        <div class="col-sm-5">
          <textarea class="form-control" rows="8" name="comment" id="comment" required><?php echo $comment; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2"></label>
        <div class="col-sm-5">
          <input class="form-control" name="submit_form" type="submit" value="Submit Form">
        </div>
      </div>
    </form>
  </div>

  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>