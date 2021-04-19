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

	<fieldset class="columnleft">
    <legend class="imgcontainer">Basic Information </legend>
    <table width="100%">
    	<tr>
    		<td>
	<label for="sellerName">Seller Name : </label>
	        </td>
	<td>
	<input type="text" id="sellerName" name="sname" value="<?php echo $sellerName ?>">
	</td>
	</tr>
	
	<p><?php echo $sellerNameErr; ?></p>
	

     

	<!-- Phone  -->
	<tr>
    		<td>
		<label for="sPhone">Phone Number : </label>
		</td>
	<td>
		<input type="text" name="sphone" id="sPhone" value="<?php echo $sPhone ?>">
		</td>
	</tr>
		<p><?php echo $sPhoneErr; ?></p>
    


		<!-- Gender  -->
		<tr>
    		<td>
		<label>Gender : </label>
		</td>
	<td>
		<input type="Radio" name="gender" value="Male" id="male">
		<label for="male">Male</label>
		
		<input type="Radio" name="gender" value="Female" id="female">
		<label for="female">Female</label>
		</td>
	</td>
	</tr>
		<p><?php echo $GenderErr; ?></p>


	<!-- tradelicense -->
	<tr>
    		<td>
        <label for="tradelicense">Trade Number : </label>
        </td>
	<td>
		<input type="text" name="tradelicense" id="tradelicense" value="<?php echo $tradelicense ?>">
		</td>
	</tr>
		<p><?php echo $tradelicenseErr; ?></p>		



	<!-- Address  -->
	<tr>
    		<td>
        <label for="streetAddress">Street Address : </label>
        </td>
	<td>
		<input type="text" name="streetaddress" id="streetAddress" value="<?php echo $streetAddress ?>">
		</td>
	</tr>
		<p><?php echo $streetAddressErr; ?></p>

	<!-- Area -->
	<tr>
    		<td>
        <label for="sArea">Area : </label>
        </td>
	<td>
		<input type="text" name="sarea" id="sArea" value="<?php echo $sArea ?>">
		</td>
	</tr>
		<p><?php echo $sAreaErr; ?></p>	


	<!-- City -->
	<tr>
    		<td>
        <label for="sCity">City : </label>
        </td>
	<td>
		<input type="text" name="scity" id="sCity" value="<?php echo $sCity ?>">
		</td>
	</tr>
		<p><?php echo $sCityErr; ?></p>	

	<!-- Postal Zip code -->
	<tr>
    		<td>
        <label for="sZipCode">Zip Code : </label>
        </td>
	<td>
		<input type="text" name="szipcode" id="sZipCode" value="<?php echo $sZipCode ?>">
		</td>
	</tr>
		<p><?php echo $sZipCodeErr; ?></p>	
    </table>
	</fieldset>


	<fieldset class="columnright">
		
	   <legend class="imgcontainer">User Information </legend>
         <table width="100%">
    	<tr>
    		<td>
        <!-- Email  -->
		<label for="Email">Email : </label>
		    </td>
	    <td>
		<input type="email" name="email" id="Email" value="<?php echo $Email ?>">
		</td>
	    </tr>
		<p><?php echo $EmailErr; ?></p>
	   
        <!-- Password  -->
        <tr>
    		<td>
		<label for="password">Password : </label>
		</td>
	    <td>
		<input type="password" name="pass" id="password" value="<?php echo $password ?>">
		</td>
	    </tr>
		<p><?php echo $passwordErr; ?></p>
		
        <!-- Reenter Password  -->
        <tr>
    		<td>
		<label for="rpassword">Confirm Password : </label>
		</td>
	    <td>
		<input type="password" name="rpass" id="rpassword" value="<?php echo $rpassword ?>">
		</td>
	    </tr>
		<p><?php echo $rPsswordErr; ?></p>
	    </table>
        
    </fieldset>
    <div>
    <button type="button" id="backbuttonreg"> <a href="Login.php">Back!</a> </button>
    <p>
    	
    </p>
    <hr>
	<input type="submit"  name="submit" class="newbutton">
	</div>
   
    </form>

    </div>

</body>
</html>