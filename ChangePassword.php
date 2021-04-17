
<?php


include('ChangePasswordValidation.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<script src="JS/JSChangePassword.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Change PassWord</h1>

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" method="POST">
	    <br>
	    <p id="mytext" class="imgcontainer"></p>
     <!--  Id -->
        <label for="sellerId">Enter Seller Email : </label>
		<input type="text" name="sid" id="sellerId" value="<?php echo $sellerId ?>">
		<p><?php echo $sellerIdErr; ?></p>
        <br>

        
	   <br>
       <!-- Current Password -->
        <label for="sPassword"> Current Password : </label>
		<input type="Password" name="spass" id="sPassword" value="<?php echo $sPassword ?>">
		<p><?php echo $sPasswordErr; ?></p>
        <br>
        
         <input type="submit" class="newbutton" value="Continue" name= "button">
         <button type="button"> <a href="Profile.php">Back!</a> </button>
            
        </form>

        <br>

	    <br>

	    

</body>
</html>