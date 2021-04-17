<?php

include('DataBase.php');

$nsPassword=$csPassword="";
$nsPasswordErr=$csPasswordErr="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['nspass']) || empty($_POST['cspass']) ) {

			$nsPasswordErr="Enter Password Properly";
			$csPasswordErr="Enter Password Properly";		
	}
    

	else {
			$nsPassword=$_POST['nspass'];
			$csPassword=$_POST['nspass'];
	}


	if($_POST['nspass'] != $_POST['cspass']) {
	$csPasswordErr = "Both password have to match";
    }
    else
    {
    	$nsPassword=$_POST['nspass'];
    }




	if ($nsPasswordErr==""&&$csPasswordErr=="")
	{

		session_start();
        $user=$_SESSION['user'];
		$connection = new DataBase();
		$conobj=$connection->OpenCon();

		$userQuery=$connection->ChangePassword($conobj,$user,$nsPassword);

		echo "Password has been Changed ";
		


           /*
		   session_start();
           $user=$_SESSION['user'];

		    // read file
			$data = file_get_contents('Login.txt');

			// decode json to array
			$json_arr = json_decode($data, true);

			foreach ($json_arr as $key => $value) {
			    if ($value['email'] == $user) {
			        $json_arr[$key]['password'] = $nsPassword;
			        
			    }
			}

			// encode array to json and save to file
			file_put_contents('Login.txt', json_encode($json_arr,JSON_PRETTY_PRINT));

			echo "Password has been Changed ";
          */
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password Form</title>
	<script src="JS/JSChangePasswordForm.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Change PassWord From </h1>

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" method="POST">
	    <br>
	    <p id="mytext" class="imgcontainer"></p>
     <!--  Id -->
        <label for="nsPassword">Enter New Password : </label>
		<input type="password" name="nspass" id="nsPassword" value="<?php echo $nsPassword ?>">
		<p><?php echo $nsPasswordErr; ?></p>
        <br>

        
	   <br>
       <!-- Current Password -->
        <label for="csPassword">Comfirm Password : </label>
		<input type="password" name="cspass" id="csPassword" value="<?php echo $csPassword ?>">
		<p><?php echo $csPasswordErr; ?></p>
        <br>
        
         <input type="submit" class="newbutton" value="Change Password" name= "button">
         <button type="button"> <a href="ChangePassword.php">Back!</a> </button>
            
        </form>

        <br>

	    <br>

	    

</body>
</html>