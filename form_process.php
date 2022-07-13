<?php
require_once 'includes/db.php';
if(isset($_POST['submit_form'])){
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $comment = trim(htmlspecialchars($_POST['comment']));
  if(empty($_POST['skill1'])) {
    $_POST['skill1'] = '';
  }
  if(empty($_POST['skill2'])) {
    $_POST['skill2'] = '';
  }
  if(empty($_POST['skill3'])) {
    $_POST['skill3'] = '';
  }
  if(empty($_POST['skill4'])) {
    $_POST['skill4'] = '';
  }
  $ins_sql = "INSERT INTO comments (name, email, subject, gender, skill1, skill2, skill3, skill4, country, comment) VALUES ('$name', '$email', '$subject', '$gender', '$_POST[skill1]', '$_POST[skill2]', '$_POST[skill3]', '$_POST[skill4]', '$country', '$comment')";
  $run_sql = mysqli_query($conn, $ins_sql);
}else {}
?>

