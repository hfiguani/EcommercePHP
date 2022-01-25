<?php
   include("template/header.html");
   include("includes/connect.php");
 ?>
<h3>Welcome To our Store.</h3>
<div class="content" style="margin-top:40px;margin-left:100px; ">
<?php 

$okay = TRUE;
 if (empty($_POST['fname']) or empty($_POST['lname']) or empty($_POST['login']) or empty($_POST['password']) or empty($_POST['cpassword'])
  or empty($_POST['street']) or empty($_POST['city']) or empty($_POST['zip']) or empty($_POST['state'])) {
 print '<p class="error">Please
enter all the information.</p>';
$okay = FALSE;
 }
 
 if ($_POST['password'] != $_POST['cpassword']){
    print '<p class="error">Please check your password confirmation.</p>';
 $okay = FALSE;
  }

 if ($okay) {
   $login=$_POST["login"];
   $password=md5($_POST["password"]);
   $fname=$_POST["fname"];
   $lname=$_POST["lname"];
   $street=$_POST["street"];
   $city=$_POST["city"];
   $zip=$_POST["zip"];
   $state=$_POST["state"];
   
    $sql= "INSERT INTO customer (clogin,cpassword,cfname,clname,street,city,zip,state) VALUES ('$login','$password' ,'$fname','$lname' , '$street', '$city', '$zip', '$state')";
   
   IF(!mysqli_query($link,$sql)) {
     die("Error : ".mysqli_error()) ;  
   } else {
     
   print '<p>You have been successfully registered .</p>';
   }
 
mysqli_close($link);}
?>
</div>
<div class="footer">

&copy; 2015 Hafed Figuani | BHCC CMT Department.

</div>
</div>
</body>
</html>