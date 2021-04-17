<?php 
$dBookid = $_POST['dBookid'];
$makeDiscount = $_POST['makeDiscount'];
if($dBookid!="" && $makeDiscount!="")
{
if($_SERVER['REQUEST_METHOD'] == "POST") {


            	if (empty($_POST['dBookid']) || empty($_POST['makeDiscount'])) {

					echo "Please Enter Book Id and Discount Pirce a";

				}
				else if(!preg_match('/^[0-9]*$/', $_POST['dBookid'])|| !preg_match('/^[0-9]*$/', $_POST['makeDiscount']))
				{
					echo "Enter Numeric Value";
				}
				else {

					session_start();

					$sellerid = $_SESSION['user'];

                  include('DataBase.php');

				$connection = new DataBase();
		         $conobj=$connection->OpenCon();

		         $userQuery=$connection->CheckBook($conobj,$sellerid,$_POST['dBookid']);

		         if($userQuery->num_rows > 0) {

		         	$connection = new DataBase();
		           $conobj=$connection->OpenCon();


		         	$userQuery=$connection->CheckBookList1($conobj,$_POST['dBookid']);
		         	$user =$userQuery->fetch_assoc();

		         	$bookprice=$user['bprice'];

		         	if($bookprice <=0)
		         	{
		         		echo "Not able to makeDiscount ";
		         	}
		         	else
		         	{

		         		$newprice=$bookprice-$_POST['makeDiscount'];

		         		$userQuery=$connection->UpdatePrice($conobj,$_POST['dBookid'],$newprice);

		         		//echo $newprice;

		         		//header('Location: BookList.php');

		         		$connection = new DataBase();
					         $conobj=$connection->OpenCon();

					         $userQuery=$connection->CheckBookList($conobj,$sellerid);

					         if($userQuery->num_rows > 0) {
								 while($user = $userQuery->fetch_assoc()) { 

								 	if($user['bid'] ==$_POST['dBookid'])
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



		         }

		         else {

		         	 echo "your are not able to makediscount in this book";

		         }



			 }
			     

                

         }

  }       
?>