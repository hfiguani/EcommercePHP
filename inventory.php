<?php
include("template/header.html");
include("includes/connect.php");
?>

<div class="contact" >
<h2 style="color:red; font-family:microsoft sans serif; ">Welcome to the inventory!</h2>
<? $ssqlr = "SELECT * FROM product ORDER BY idproduct";
   $sresult = mysqli_query($link,$ssqlr);
   $srowcount=mysqli_num_rows($sresult);
  if ($srowcount > 0) {?>
  <table width="90%" class="inv" style="margin-right: auto;margin-left: auto;">
     <th>Product ID</th><th> Label </th><th>Description</th><th>Price </th><th>Sale price</th><th>Quantity</th><th>Picture</th></th>
   <?  while($srow = mysqli_fetch_assoc($sresult)) {?>
      


  
  <tr><td><?php echo $srow["idproduct"] ?></td><td><?php echo $srow["label"] ?></td><td size="50"><?php echo $srow["sdesc"] ?></td><td><?php echo $srow["oprice"] ?></td><td><?php echo $srow["nprice"] ?></td><td><?php echo $srow["qty"] ?></td><td><?php echo $srow["pic"] ?></td></tr>



<?PHP      }?>
     </table>
<?} else {
    echo "0 results";
}
?>

</div>

<?php
include("template/footer.html");
?>