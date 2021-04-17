<?php 

$abookid = $_POST['bid'];

if($abookid!="")
{

	session_start();
include('DataBase.php');

$bId="";
$bIdErr="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['bid'])) {

			$bIdErr="Please Enter Book Id";		
	}
	else {
			$bId=$_POST['bid'];
	}

	if ($bIdErr=="")
	{


		 $sellerid = $_SESSION['user'];



		$connection = new DataBase();
		$conobj=$connection->OpenCon();

		$userQuery=$connection->CheckBook($conobj,$sellerid,$bId);

		if($userQuery->num_rows > 0) {

			$userQuery=$connection->DeleteBook($conobj,$bId);

			echo "Delete Completed";

		}
		else
		{

			echo "Your are not able to  Delete this book";

		}

		

	}
}


}

?>