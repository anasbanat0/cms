<?php
require 'includes/db.php';
$name = '';
$email = '';
$subject = '';
$gender = '';
$skill1 = '';
$skill2 = '';
$skill3 = '';
$skill4 = '';
$country = '';
$comment = '';
$result = '';
if (isset($_POST['validate'])) {
  if (empty($_POST['name'])) {
    $name = '<span style="color: red;">The name field is empty!</span>';
  } else {
    $name = '<span style="color: green;">' . htmlspecialchars($_POST['name']) . '</span>';
  }
  if (!empty($_POST['email'])) {
    $email = '<span style="color: green;">' . strip_tags($_POST['email']) . '</span>';
  } else {
    $email = '<span style="color: red;">Email field is required</span>';
  }
  if (empty($_POST['subject'])) {
    $subject = '<span style="color: red;">Subject field is required</span>';
  } else {
    $subject = '<span style="color: green;">' . htmlspecialchars($_POST['subject']) . '</span>';
  }
  if (empty($_POST['gender'])) {
    $gender = '<span style="color: red;">Mention your gender.</span>';
  } else {
    $gender = '<span style="color: green;">' . htmlspecialchars($_POST['gender']) . '</span>';
  }
  if (empty($_POST['country'])) {
    $country = '<span style="color: red;">Country field is required</span>';
  } else {
    $country = '<span style="color: green;">' . htmlspecialchars($_POST['country']) . '</span>';
  }
  $comment = '<h3>The comment is: </h3>' . trim(htmlspecialchars($_POST['comment']));
  $skills = '<span style="color: green;"> | Check</span>';
  if (!empty($_POST['skill1'])) {
    $skill1 = $skills;
  }
  if (!empty($_POST['skill2'])) {
    $skill2 = $skills;
  }
  if (!empty($_POST['skill3'])) {
    $skill3 = $skills;
  }
  if (!empty($_POST['skill4'])) {
    $skill4 = $skills;
  }
} else {
  $result =  'Sorry, there&apos;s no request we received! <br>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PHP Form</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
      <tr>
        <td>Name *</td>
        <td><input type="text" name="name"><?php echo $name; ?></td>
      </tr>
      <tr>
        <td>Email Address *</td>
        <td><input type="email" name="email"><?php echo $email; ?></td>
      </tr>
      <tr>
        <td>Subject *</td>
        <td><input type="text" name="subject"><?php echo $subject; ?></td>
      </tr>
      <tr>
        <td>Your Gender</td>
      </tr>
      <tr>
        <td>Male:<br>Female:<br>Other:</td>
        <td><input type="radio" name="gender" value="male"><br><input type="radio" value="female" name="gender"><br><input type="radio" name="gender" value="other"></td>
      </tr>
      <tr>
        <td>
          Skills:
        </td>
        <td>
          <input type="checkbox" name="skills1" value="html">: HTML <br>
          <input type="checkbox" name="skills2" value="php">: PHP <br>
          <input type="checkbox" name="skills3" value="css">: CSS <br>
          <input type="checkbox" name="skills4" value="javascript">: JavaScript <br>
        </td>
      </tr>
      <tr>
        <td>Country</td>
        <td>
          <select name="country">
            <option selected>Select a country</option>
            <option value="america">America</option>
            <option value="russia">Russia</option>
            <option value="england">England</option>
            <option value="brazil">Brazil</option>
            <option value="pakistan">Pakistan</option>
            <option value="palestine">Palestine</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Comments</td>
        <td><textarea name="comment"></textarea></td>
      </tr>
      <tr>
        <td><input type="hidden" value="yes" name="validate"></td>
        <td><input type="submit" name="login_submit" value="Submit"></td>
      </tr>
    </table>
    <?php echo $comment; ?>
    <?php echo $result; ?>
  </form>
</body>

</html>