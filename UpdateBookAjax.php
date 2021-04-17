<?php 

$abookid = $_POST['bid'];
$abookquantity = $_POST['bquantity'];
$abookprice = $_POST['bprice']; 
if($abookid!="" && $abookquantity!="" && $abookprice!="")
{
session_start();
include('DataBase.php');

$bQuantity=$bPrice=$bId="";
$bQuantityErr=$bPriceErr=$bIdErr="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['bquantity']) ) {

			$bQuantityErr="Please Enter Quantity";		
	}
	else {
			$bQuantity=$_POST['bquantity'];
	}

	if (empty($_POST['bprice'])) {

			$bPriceErr="Please Enter Price";		
	}
	else {
			$bPrice=$_POST['bprice'];
	}

	if (empty($_POST['bid'])) {

			$bIdErr="Please Enter Book Id";		
	}
	else {
			$bId=$_POST['bid'];
	}

	if ($bQuantityErr=="" && $bPriceErr==""&&$bIdErr=="")
	{


         $sellerid = $_SESSION['user'];



		$connection = new DataBase();
		$conobj=$connection->OpenCon();

		$userQuery=$connection->CheckBook($conobj,$sellerid,$bId);

		if($userQuery->num_rows > 0) {

			$userQuery=$connection->UpdateBook($conobj,$bId,$bPrice,$bQuantity);

			echo "Update Succesfull";
			$connection = new DataBase();
					         $conobj=$connection->OpenCon();

					         $userQuery=$connection->CheckBookList($conobj,$sellerid);

					         if($userQuery->num_rows > 0) {
								 while($user = $userQuery->fetch_assoc()) { 

								 	if($user['bid'] ==$_POST['bid'])
								 	{
									 echo "<fieldset>
								 	


					                <legend><b>Book:</b></legend>";

					             echo '<img src="uploads/'.$user['bid'].'.png" alt='.$user['bid'].' width="300" height="130">'."<br>";  

					        	 echo "Book Id : ".$user['bid']."<br>";
					             echo "Book Title : ".$user['bookname']."<br>";
					             echo "Book Author : ".$user['bauthor']."<br>";
					             echo "Book Publisher : ".$user['bpublisher']."<br>";
					             echo "Book Edition : ".$user['bedition']."<br>";
					             echo "Book Price : ".$user['bprice']."<br>";
					             echo "Book Quantity : ".$user['bquantity']."<br>";
					             echo "</fieldset>";
								}

								}
							}


		}

		else 
		{

			echo "Your are not able Update this book";

		}


			

	}
}
}


 ?>