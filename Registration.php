<?php


include('RegValidation.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script src="JS/JSRegistration.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Registration</h1>

	<p id="mytext" class="imgcontainer" ></p>
    <div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" action="" class="regform" onsubmit="return validateForm()" method="POST">

	<fieldset>
    <legend class="imgcontainer">Basic Information </legend>

	<label for="sellerName">Seller Name : </label>
	<input type="text" id="sellerName" name="sname" value="<?php echo $sellerName ?>">
	<p><?php echo $sellerNameErr; ?></p>
	
     <br>

     

	<!-- Phone  -->
		<label for="sPhone">Phone Number : </label>
		<input type="text" name="sphone" id="sPhone" value="<?php echo $sPhone ?>">
		<p><?php echo $sPhoneErr; ?></p>

	<br>

		<!-- Gender  -->
		<label>Gender : </label>
		<input type="Radio" name="gender" value="Male" id="male">
		<label for="male">Male</label>
		<input type="Radio" name="gender" value="Female" id="female">
		<label for="female">Female</label>
		<p><?php echo $GenderErr; ?></p>

    <br>

	<!-- tradelicense -->
        <label for="tradelicense">Trade Number : </label>
		<input type="text" name="tradelicense" id="tradelicense" value="<?php echo $tradelicense ?>">
		<p><?php echo $tradelicenseErr; ?></p>		


	<br>

	<!-- Address  -->
        <label for="streetAddress">Street Address : </label>
		<input type="text" name="streetaddress" id="streetAddress" value="<?php echo $streetAddress ?>">
		<p><?php echo $streetAddressErr; ?></p>
	<br>

	<!-- Area -->
        <label for="sArea">Area : </label>
		<input type="text" name="sarea" id="sArea" value="<?php echo $sArea ?>">
		<p><?php echo $sAreaErr; ?></p>	

	<br>

	<!-- City -->
        <label for="sCity">City : </label>
		<input type="text" name="scity" id="sCity" value="<?php echo $sCity ?>">
		<p><?php echo $sCityErr; ?></p>	

	<br>

	<!-- Postal Zip code -->
        <label for="sZipCode">Zip Code : </label>
		<input type="text" name="szipcode" id="sZipCode" value="<?php echo $sZipCode ?>">
		<p><?php echo $sZipCodeErr; ?></p>	

	</fieldset>


	<fieldset>
		
	   <legend class="imgcontainer">User Information </legend>

        <!-- Email  -->
		<label for="Email">Email : </label>
		<input type="email" name="email" id="Email" value="<?php echo $Email ?>">
		<p><?php echo $EmailErr; ?></p>
	    <br>
        <!-- Password  -->
		<label for="password">Password : </label>
		<input type="password" name="pass" id="password" value="<?php echo $password ?>">
		<p><?php echo $passwordErr; ?></p>
		<br>
        <!-- Reenter Password  -->
		<label for="rpassword">Confirm Password : </label>
		<input type="password" name="rpass" id="rpassword" value="<?php echo $rpassword ?>">
		<p><?php echo $rPsswordErr; ?></p>
        
    </fieldset>
    <div>
    <button type="button" > <a href="Login.php">Back!</a> </button>
	<input type="submit"  name="submit" class="newbutton">
	</div>
   
    </form>

    </div>

</body>
</html>