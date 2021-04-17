<?php
include('DataBase.php');

	$sellerName=$sPhone= $Gender=$Email=$password=$rPssword=$streetAddress=$sArea=$sCity=$sZipCode=$tradelicense=$trade="";
	$sellerNameErr=$sPhoneErr= $GenderErr=$EmailErr=$passwordErr=$rPsswordErr=$streetAddressErr=$sAreaErr=$sCityErr=$sZipCodeErr=$notavailable = $v= $tradelicenseErr= "";

	if($_SERVER['REQUEST_METHOD'] == "POST") {


		if (empty($_POST['sname'])) {

			$sellerNameErr="Please Enter Name";
			
		}
		else {
			$sellerName=$_POST['sname'];
		}

		if (empty($_POST['tradelicense']) || !preg_match('/^[0-9]*$/', $tradelicense)) {

			$tradelicenseErr="Enter tradelicense properly";
			
		}
		else {
			$tradelicense=$_POST['tradelicense'];
		}

		if (empty($_POST['sphone'])) {

			$sPhoneErr="Please Enter Phone Number";
			
		}
		else {
			$sPhone=$_POST['sphone'];
		}


		if (empty($_POST['email'])) {

			$EmailErr="Please Enter Email";
			
		}
		else {
			$Email=$_POST['email'];
		}


		if(empty($_POST['gender']) ) {
				$GenderErr = "Please Select Gender";
			}
		else {
					$Gender = $_POST['gender'];
			}

		if (empty($_POST['pass'])) {

			$passwordErr="Please Enter Password";
			
		}
		else {
			$password=$_POST['pass'];
		}


		if (empty($_POST['streetaddress'])) {

			$streetAddressErr="Please Enter address";
			
		}
		else {
			$streetAddress=$_POST['streetaddress'];
		}


		if (empty($_POST['sarea'])) {

			$sAreaErr="Please Enter area";
			
		}
		else {
			$sArea=$_POST['sarea'];
		}


		if (empty($_POST['scity'])) {

			$sCityErr="Please Enter ciry";
			
		}
		else {
			$sCity=$_POST['scity'];
		}

		if (empty($_POST['szipcode'])) {

			$sZipCodeErr="Please Enter zipcode";
			
		}
		else {
			$sZipCode=$_POST['szipcode'];
		}

		if($_POST['pass']!=$_POST['rpass'])
		{

			$passwordErr="Password and Confirm Password not same";

		}

		else
		{
			$password=$_POST['pass'];
		}

		if ($sellerNameErr=="" &&$sPhoneErr=="" && $GenderErr=="" && $passwordErr== "" &&$rPsswordErr=="" && $EmailErr== "" && $streetAddressErr== "" && $sAreaErr=="" && $sCityErr=="" && $sZipCodeErr=="") {


			$connection = new DataBase();
				$conobj=$connection->OpenCon();

				$userQuery=$connection->CheckUser1($conobj,"login",$Email);

				if ($userQuery->num_rows > 0) {

					echo "You have already an Account!!";
				   }
				 else {


				$userQuery=$connection->CheckTrade($conobj,"registration",$tradelicense);

				if ($userQuery->num_rows > 0) {

					echo "You have already an Account using this tradelicense";
				   }
				   else
				   {
				   	$InsertQuery=$connection->InsertUser($conobj, $sellerName, $Email,$Gender, $sPhone, $streetAddress,$sArea, $sCity,$sZipCode,$tradelicense);
			        if(!empty($InsertQuery))
			        {
			        $connection = new DataBase();
		            $conobj=$connection->OpenCon();


		    
			        $InsertQuery=$connection->InsertUser1($conobj,$Email,$password);
			        $connection->CloseCon($conobj);
			        header('Location: login.php');
				   }

				 }
		    }
	}

}


?>