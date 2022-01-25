<?php
ob_start();
include("template/header.html");
?>
<div class="content">
  <?php
print '<h2>Registration Form</h2>
<style type="text/css"
media="screen">
 .error { color: red; }
 </style>';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$problem = FALSE; // No problems
if (empty($_POST['first_name'])) {
 $problem = TRUE;
 print '<p class="error">Please
enter your first name!</p>';
 }
if (empty($_POST['last_name'])) {
 $problem = TRUE;
 print '<p class="error">Please
enter your last name!</p>';
 }
 if (empty($_POST['login'])) {
 $problem = TRUE;
 print '<p class="error">Please
enter your login</p>';
 }

if (empty($_POST['password1'])) {

 $problem = TRUE;
 print '<p class="error">Please
enter a password!</p>';
 }
 if ($_POST['password1'] != $_POST
['password2']) {
 $problem = TRUE;
 print '<p class="error">Your
password did not match your
confirmed password!</p>';
 }

 if (!$problem) { 
 print '<p>You are now registered!
<br />Okay, you are not really
registered but...</p>';

$_POST = array();
} else { 

 print '<p class="error">Please try
again!</p>';
 }
 } 
?>
<form action="register.php"
method="post">

<p>First Name: <input type="text"
name="fname" size="20"
value="<?php if (isset($_POST['fname'])) { print htmlspecialchars($_POST['fname']); } ?>" /></p>

 <p>Last Name: <input type="text"
name="lname" size="20"
value="<?php if (isset($_POST['lname'])) { print htmlspecialchars($_POST['lname']); } ?>" /></p>
<p>Login: <input
type="text" name="login"
size="20" value="<?php if(isset($_POST['login'])) { print htmlspecialchars($_POST['login']);
} ?>" /></p>
<p>Password: <input 
type="password" name="password"
size="20" value="<?php if
(isset($_POST['password']))
{ print htmlspecialchars($_POST['password']); } ?>" /></p>
 <p>Confirm Password: <input
type="password" name="password2"
size="20" value="<?php if
(isset($_POST['password2']))
{ print htmlspecialchars($_POST['password2']); } ?>" /></p>
<p><input type="submit" name="submit"
value="Register!" /></p>
</form>
</div>

<?php
include("template/footer.html");

ob_end_flush();

?>