<?php

$bookName=$bId= $bAuthor=$bPublisher=$bEdition=$bPrice=$bQuantity="";
$bookNameErr=$bIdErr= $bAuthorErr=$bPublisherErr=$bEditionErr=$bPriceErr=$bQuantityErr=$v="";

include('DataBase.php');


if($_SERVER['REQUEST_METHOD'] == "POST") {


	if (empty($_POST['bname'])) {

			$bookNameErr="Please Enter Book Title";		
	}
	else {
			$bookName=$_POST['bname'];
		 }
    if (empty($_POST['bid'])) {

			$bIdErr="Please Enter Book Id";		
	}
	else {
			$bId=$_POST['bid'];
	}	

	if (empty($_POST['bauthor']) ) {

			$bAuthorErr="Please Enter Book Author";		
	}
	else {
			$bAuthor=$_POST['bauthor'];
	}

	if (empty($_POST['bpublisher'])) {

			$bAuthorErr="Please Enter Book Publiser";		
	}
	else {
			$bPublisher=$_POST['bpublisher'];
		 }
	if (empty($_POST['bedition']) ) {

			$bEditionErr="Please Enter Book Edition";		
	}
	else {
			$bEdition=$_POST['bedition'];
		 }
	if (empty($_POST['bprice']) ) {

			$bEditionErr="Please Enter Price";		
	}
	else {
			$bPrice=$_POST['bprice'];
		 }
	if (empty($_POST['bquantity'])) {

			$bQuantityErr="Please Enter Quantity";		
	}
	else {
			$bQuantity=$_POST['bquantity'];
		 }	

    if ($bookNameErr=="" &&$bIdErr=="" && $bAuthorErr=="" && $bPublisherErr=="" && $bEditionErr== "" && $bPriceErr== "" && $bQuantityErr=="") {



    	        $connection = new DataBase();
				$conobj=$connection->OpenCon();

				$userQuery=$connection->CheckBookId($conobj,"book",$_POST['bid']);

				if ($userQuery->num_rows > 0) {

					echo "You have already an Book using this Id!!";
				   }
				 else {

                    session_start();

	        	    $sellerid = $_SESSION['user'];

	        	    $InsertQuery=$connection->InsertBook($conobj, $bookName, $bId,$bAuthor, $bPublisher,                                $bEdition,$bPrice, $bQuantity,$sellerid);

	        	    if(!empty($InsertQuery))
			        {


			        	$target_dir="uploads/";

			   	       	$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			   	       								

		                $sbid = $bId;

						if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir.$sbid.".".$extension))
						{
						echo "file upload";
						echo "<br>";
						}
						else
						{
						echo "Sorry";
						}


						



			        }

	            }

	        }		  	 	 	 

}

  ?>