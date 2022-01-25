<?php
ob_start();
include("template/header.html");
include("includes/connect.php");
?>
<div class="content">
  <?php
print '<h2>Product Details</h2>';
   $id=$_GET['prodid'];
   $sqlr = "SELECT * FROM product WHERE idproduct=$id";
   $result = mysqli_query($link,$sqlr);
   $row=mysqli_fetch_array($result);
      
?>
<table width="70%">
  <th></th><th><?php echo $row["label"] ?></th>
  <tr>
		<td rowspan="2"><img src="imgs/<?php echo $row["pic"] ?>" /></td><td><?php echo $row["oprice"] ?></td>
	</tr>
	<tr>
	<td><?php echo $row["sdesc"] ?></td>	</tr>

	  <tr>
      <td></td><td><?php echo $row["ldesc"] ?></td>
    </tr>
	
	</table>


</div>
<?php
include("template/footer.html");

ob_end_flush();

?>