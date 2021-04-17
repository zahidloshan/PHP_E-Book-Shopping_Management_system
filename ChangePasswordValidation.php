<?php 

include('DataBase.php');


$sellerId=$sPassword="";
$sellerIdErr=$sPasswordErr="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['sid'])) {

			$sellerIdErr="Please Enter Email";		
	}
	else {
			$sellerId=$_POST['sid'];
	}

	if (empty($_POST['spass'])) {

			$sPasswordErr="Please Enter Password";		
	}
	else {
			$sPassword=$_POST['spass'];
	}

	
	if ($sellerIdErr=="" && $sPasswordErr=="")
	{


		        $connection = new DataBase();
				$conobj=$connection->OpenCon();

				$userQuery=$connection->CheckUser($conobj,"login",$sellerId,$sPassword);

				if ($userQuery->num_rows > 0) {

					 session_start();
                    $_SESSION['user'] = $_POST['sid'];
			        header('Location: ChangePasswordForm.php');
				   }
				 else {
				echo "<br>";
				echo "Password and Email is not correct";
				echo "<br>";
				}

		 

	}
}


 ?>