<?php
   include("template/header.html");
   include("includes/connect.php");
 ?>
<h3>Welcome To our Store.</h3>
<div class="content" style="margin-top:40px;margin-left:100px; ">
<?php 

$okay = true;
 if (empty($_POST['label']) or empty($_POST['sdesc']) or empty($_POST['ldesc']) or empty($_POST['price']) or empty($_POST['qty'])) {
 print '<p class="error">Please enter all the information.</p>';
$okay = false;
 }

 if ($okay) {
   $label=$_POST["label"];
   $sdesc=$_POST["sdesc"];
   $ldesc=$_POST["ldesc"];
   $price=$_POST["price"];
   $sale=$_POST["sale"];
   $qty=$_POST["qty"];
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
     if (move_uploaded_file($_FILES['the_file']['tmp_name'],"imgs/{$_FILES['the_file']['name']}")) {
    print '<p>Your file has been uploaded.</p>';
     $pic=$_FILES['the_file']['name'];
   function get_file_extension($pic) {
    $ext= spliti($_FILES['the_file']['name'],'.');
     return $ext[1];
   }

 
   } else { 
    echo $pic;
    print '<p style="color: red;">Your file could not be uploaded because: ';
   
   
    switch ($_FILES['the_file']['error']) {
    case 1:
    print 'The file exceeds the upload_max_filesize setting in php.ini';
    break;
    case 2:
    print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
    break;
    case 3:
    print 'The file was only partially uploaded';
    break;
   case 4:
    print 'No file was uploaded';
    break;
    case 6:
    print 'The temporary folder does not exist.';
    break;
    default:
    print 'Something unforeseen happened.';
    break;
    }
   
    print '.</p>'; 
   
    } 
   
    } 
    
   
    $sql= "INSERT INTO product (idadmin,label,sdesc,ldesc,oprice,pic,sale,qty) VALUES (1,'$label','$sdesc' ,'$ldesc','$price' , '$pic', '$sale', '$qty')";
   
   IF(!mysqli_query($link,$sql)) {
     die("Error : ".mysqli_error($link)) ;  
   } else {
     
   print '<p>Product have been added successfully.</p>';
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