<?php
include("template/header.html");
include("includes/connect.php");
session_start();

?>
<div class="sidebar">
<div class="login">
  <?php 

  if (isset($_POST['log'])) {
  
  if ( (!empty($_POST['login'])) && (!empty($_POST['password'])) ) {
    $login=$_POST['login'];
    $pass=md5($_POST['password']);
  $sql = "SELECT * FROM customer Where clogin='$login' and cpassword='$pass'";
   $result = mysqli_query($link,$sql);
   $rowcount=mysqli_num_rows($result);
   if(!mysqli_num_rows($result)){
   $rowcount=0;   
   }
  if ($rowcount>0) {
   session_start();
    $row = mysqli_fetch_assoc($result);
    $name=$row['cfname'].' '.$row['clname'];
    print "<p style='color:#3ca7f7; margin:10px;font-weight: bold;'>Hello $name!</p>";
    mysqli_free_result($result);
  } else { 
     
     print "<p style='color:red;'>The submitted email
  address and password do not
  match those on file!<br />Go
  back and try again.</p>";
  
  } 
  } else {
  print "<p>Please make sure you
  enter both a login and
  a password!<br />Go back and try
  again.</p>";
  
   }
  
  } else {
   ?>
   <form action="catalog.php" method="post" style="margin: 10px; ">
   <table><tr><td>Login:</td><td> <input type="text"
  name="login" size="15" /></td></tr>
  
  <tr><td> Password:</td><td><input type="hidden"
                             name="log" /> <input type="password"
  name="password" size="15" /></td></tr>
  
   <tr><td></td><td><input type="submit" name="submit"
  value="Log In!" /></td></tr></table>
  
   </form>
  <?
   }
  ?>
</div>
<div class="cart">
  <form method="post" action="catalog.php" style="margin-right:auto;margin-left: auto;text-align:center;width:100%;  "> 
        
      <table class="tcart"> 
      <th colspan="3"><img src="imgs/cart.jpg" alt="cart" style="margin-bottom:10px;border:1px solid #dadada; " /></th>      
          <?
          if(isset($_POST['checkout'])){
          unset($_SESSION['cart']);
                }
          if(isset($_POST['add'])){
            $itemID = $_POST['pid'];

  $sale=0;
            
            $found=false;
             if(isset($_SESSION['cart'])){
              $i=-1;
              foreach ($_SESSION['cart'] as $eachitem ){
                $i++;
              foreach($eachitem as $key=>$val ){
               if ($key == "id" and $val==$itemID){
                $qty=$eachitem['quantity']+1 ;
                $sql="SELECT * FROM product WHERE idproduct=$itemID";
                $query=mysqli_query($link,$sql);
                $row=mysqli_fetch_array($query);
                $label=$row['label']; 
                if($row['sale']==0){
                $price=$eachitem['price']+$row['oprice'];
                }else{
                  $price=$eachitem['price']+$row['nprice'];
                }
                array_splice($_SESSION['cart'],$i,1,array($i=>array(id=>$itemID,label => $label,quantity => $qty ,price => $price)));
              
                $found=true; 
               }
                  }
              } 
              if($found==false){
                       
                         $sql="SELECT * FROM product WHERE idproduct=$itemID";
                         $query=mysqli_query($link,$sql); 
                         $row=mysqli_fetch_array($query);
                         $label=$row['label'];
                          if($row['sale']==0){
                         $price=$row['oprice'];
                         }else{
                          $price=$row['nprice'];
                             }
                         $qty = 1;
                         $newproduct=array(id=>$itemID,label => $label,quantity => $qty ,price => $price);
                         array_push($_SESSION['cart'],$newproduct);
                      
                        } }
                
            if(!isset($_SESSION['cart'])){
            
             $sql="SELECT * FROM product WHERE idproduct=$itemID";
             $query=mysqli_query($link,$sql); 
             $row=mysqli_fetch_array($query);
             $label=$row['label'];
             if($row['sale']==0){
             $price=$row['oprice'];
             }else{
              $price=$row['nprice'];
                 }
             $qty = 1;
             $_SESSION['cart']=array(0=>array(id=>$itemID,label => $label,quantity => $qty ,price => $price));
            } 
               
          }
           if (isset($_SESSION['cart'])){  
             foreach ($_SESSION['cart'] as $total ){
              $totalprice += $total['price'];
              
             }
             
             
                           ?>
          <tr> 
              <th>Item</th> 
              <th>Quantity</th> 
              <th>Price</th> 
           
          </tr><?
      $itm=-1;
          foreach ($_SESSION['cart'] as $value ){
               $itm++;
                ?> <tr>
                <td><?echo $_SESSION['cart'][$itm]['label'];?></td><td><?echo $_SESSION['cart'][$itm]['quantity'];?></td>
                <td><?echo $_SESSION['cart'][$itm]['price'];?></td>
                 
                 </tr><? 
             }
         unset($_POST['add']);
         unset($_POST['pid']);
            ?> 
                      <tr> 
                         <td style="border-top:1px solid #8c8c8c;font-weight: bold; ">Total Price: </td><td style="border-top:1px solid #8c8c8c; "></td> <td  style="color:#f24f00;font-weight: bold; border-top:1px solid #8c8c8c; ">$<?php echo number_format($totalprice,2) ?></td> 
                      </tr> 
         <?}
             if (!isset($_SESSION['cart'])){   
             ?><tr> 
                 <td colspan="3">Your Cart is empty</td> 
             </tr>   
            <?     
           }?>   
     </table> 
      <br /> 
      <form method="POST" action="catalog.php"><button type="submit" name="checkout">Check out</button> </form>
  </form> 
 
   

</div>
</div>
<div class="content">
<div class="sale"><h2 style="color:red; font-family:microsoft sans serif; ">THIS ITEMS ARE ON SALE!</h2>
<? $ssqlr = "SELECT * FROM product WHERE sale=1 and qty >0  ORDER BY idproduct";
   $sresult = mysqli_query($link,$ssqlr);
   $srowcount=mysqli_num_rows($sresult);
  if ($srowcount > 0) {
   
     while($srow = mysqli_fetch_assoc($sresult)) {?>
      
<div class="sprod">

<table width="100%">
  <th colspan="3"><?php echo $srow["label"] ?></th>
  <tr>
    <td colspan="3"><a href="product.php?prodid=<?php echo $srow["idproduct"] ?>"><img src="imgs/<?php echo $srow["pic"] ?>" /></a></td>
  </tr>
  <tr>
    <td colspan="3"><?php echo $srow["sdesc"] ?></td>  </tr>
  <tr>
    <td style="color:red; text-decoration: line-through;font-weight: bold; ">$<?php echo $srow["oprice"] ?></td>
    <td style="color:green;font-weight: bold;">$<?php echo $srow["nprice"] ?></td><td><?php echo "<form action='catalog.php' method='post'><input type='hidden' name='pid' value='".$srow["idproduct"]."'/><input type='submit' name='add' value='Add to cart'/></form>" ?></td>
  </tr>
  
  </table>

</div>
<?PHP      }
   
} else {
    echo "0 results";
}
?>

</div>
<div class="maincatalog"></div>

<?php
   $sqlr = "SELECT * FROM product WHERE sale=0 and qty >0 ORDER BY idproduct";
   $result = mysqli_query($link,$sqlr);
   $rowcount=mysqli_num_rows($result);
  if ($rowcount > 0) {
   
     while($row = mysqli_fetch_assoc($result)) {?>
      
<div class="prod">

<table width="25%">
  <th colspan="2"><?php echo $row["label"] ?></th>
  <tr>
		<td colspan="2"><a href="product.php?prodid=<?php echo $row["idproduct"] ?>"><img src="imgs/<?php echo $row["pic"] ?>" /></a></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $row["sdesc"] ?></td>	</tr>
	<tr>
		<td style="color:red;font-weight: bold;">$<?php echo $row["oprice"] ?></td><td><?php echo "<form action='catalog.php' method='post'><input type='hidden' name='pid' value='".$row["idproduct"]."'/><input type='submit' name='add' value='Add to cart'/></form>" ?></td>
	</tr>
	
	</table>

</div>
  <?PHP      }
   
} else {
    echo "0 results";
}
mysqli_close($link);
?>



</div>
</div>
<?php
include("template/footer.html");
?>