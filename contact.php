<?php
include("template/header.html");
?>
<div class="contact">
<h2>Leave a message :</h2>
 <p><?php 
print '<style type="text/css"
media="screen">
 .error { color: red; }
 </style>';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$problem = FALSE; // No problems
if (empty($_POST['fname'])) {
 $problem = TRUE;
 print '<p class="error">Please
enter your full name!</p>';
 }
if (empty($_POST['subject'])) {
 $problem = TRUE;
 print '<p class="error">Please
enter the subject!</p>';
 }
 if (empty($_POST['email']) and (substr_count($_POST['email'],'@') != 1)) {
 $problem = TRUE;
 print '<p class="error">Please
enter your email address!</p>';
 }

if (empty($_POST['message'])) {

 $problem = TRUE;
 print '<p class="error">Please
enter the message!</p>';
 }
 
 if (!$problem) { 
   
  $fname= $_POST['fname'];
  $subject= $_POST['subject'];
  $eamil= $_POST['email'];
  $message= $_POST['message'];
  $myeamil='fugain17@yahoo.fr';
  mail($myeamil, $_POST['subject'], $message, $eamil);
  print '<p>Email sent successfuly...</p>';
 $_POST = array();
  
}
 } 
?></p>

<form action="contact.php"
method="post" style="text-align:left;margin-left: 150px; ">

<p>Name: <input type="text"
name="fname" size="20"
value="<?php if (isset($_POST['fname'])) { print htmlspecialchars($_POST['fname']); } ?>" /></p>

 <p>Subject: <input type="text"
name="subject" size="40"
value="<?php if (isset($_POST['subject'])) { print htmlspecialchars($_POST['subject']); } ?>" /></p>
<p>Email: <input
type="text" name="email"
size="20" value="<?php if(isset($_POST['email'])) { print htmlspecialchars($_POST['email']);
} ?>" /></p>
<p>Message: <br /><textarea name="message" rows="10" cols="30" value="<?php if
(isset($_POST['message']))
{ print htmlspecialchars($_POST['message']); } ?>" ></textarea> <br /> 
<input type="submit" name="submit"
value="Send" /></p>
</form>
</div>
<?php
include("template/footer.html");
?>