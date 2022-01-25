<?php
include("template/header.html");
?>
<div class="contact">


<form action="addprod.php" enctype="multipart/form-data" method="post" style="text-align:left;margin-left: 150px; ">
<h2>Adding Products :</h2><table class="addpd">
<tr><td>Product Name:</td><td> <input type="text" name="label" size="20"value="<?php if (isset($_POST['label'])) { print htmlspecialchars($_POST['label']); } ?>" /></td></tr>
<tr><td>Small description: </td><td><input type="text" name="sdesc" size="40" value="<?php if (isset($_POST['sdesc'])) { print htmlspecialchars($_POST['sdesc']); } ?>" /></td></tr>
<tr><td>More details:</td><td> <textarea name="ldesc" rows="15" cols="45" value="<?php if
                               (isset($_POST['ldesc']))
                               { print htmlspecialchars($_POST['ldesc']); } ?>" ></textarea> </td></tr> 
<tr><td>Price:</td><td> <input type="text" name="price" size="20" value="<?php if(isset($_POST['price'])){ print htmlspecialchars($_POST['price']); } ?>"/></td></tr>
<tr><td>Sale:</td><td> <input type="text" name="sale" size="20" value="<?php if(isset($_POST['sale'])){ print htmlspecialchars($_POST['sale']); } ?>"/></td></tr>
<tr><td>Quantity: </td><td><input type="text" name="qty" size="20" value="<?php if(isset($_POST['qty'])){ print htmlspecialchars($_POST['qty']); } ?>"/></td></tr> 
<tr><td>Picture:</td><td><input type="hidden" name="MAX_FILE_SIZE" value="300000" /><input type="file" name="the_file" /></td></tr>         
<tr><td></td><td><input type="submit" name="submit" value="Add product" /></td></tr>
</table>
</form>
</div>
<?php
include("template/footer.html");
?>