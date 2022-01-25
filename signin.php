<?php
include("template/header.html");
?>
<div class="contact">
<h2>Signing in :</h2>

<form action="register.php" method="post" style="text-align:left;margin-left: 150px; ">
<table style="text-align: left;">
<tr><td>First Name:</td><td> <input type="text" name="fname" size="20"value="<?php if (isset($_POST['fname'])) { print htmlspecialchars($_POST['fname']); } ?>" /></td></tr>
<tr><td>Last Name: </td><td><input type="text" name="lname" size="20" value="<?php if (isset($_POST['lname'])) { print htmlspecialchars($_POST['lname']); } ?>" /></td></tr>
<tr><td>Login:</td><td> <input type="text" name="login" size="20" value="<?php if(isset($_POST['login'])) { print htmlspecialchars($_POST['login']);} ?>" /></td></tr>
<tr><td>Password:</td><td> <input type="password" name="password" size="20" value="<?php if(isset($_POST['password'])){ print htmlspecialchars($_POST['password']); } ?>"/></td></tr> 
<tr><td>Confirm Password:</td><td> <input type="password" name="cpassword" size="20" value="<?php if(isset($_POST['cpassword'])){ print htmlspecialchars($_POST['cpassword']); } ?>"/></td></tr> 
<tr><td>Street:</td><td> <input type="text" name="street" size="20" value="<?php if(isset($_POST['street'])){ print htmlspecialchars($_POST['street']); } ?>"/></td></tr>
<tr><td>City:</td><td> <input type="text" name="city" size="20" value="<?php if(isset($_POST['city'])){ print htmlspecialchars($_POST['city']); } ?>"/></td></tr>
<tr><td>Zip: </td><td><input type="text" name="zip" size="20" value="<?php if(isset($_POST['zip'])){ print htmlspecialchars($_POST['zip']); } ?>"/></td></tr> 
<tr><td>State:</td><td><select name="state" width="20">
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
</select></td></tr>         
<tr><td></td><td><input type="submit" name="submit" value="Register" /></td></tr>
</table>
</form>
</div>
<?php
include("template/footer.html");
?>