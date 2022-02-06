<?php 
if(isset($_POST['validate'])){
  echo "The email is: $_POST[login_email]<br>";
  echo "The password is: $_POST[login_password]<br>";
}else {
  echo 'Sorry, there&apos;s no request we received!';
}
?>