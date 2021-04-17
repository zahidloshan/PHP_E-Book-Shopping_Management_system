
<!DOCTYPE html>
<html>
<head>
	<title>Update Book</title>
	<script src="JS/JSUpdateBook.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
</head>
<body>
	<h1 class="imgcontainer">Update Book</h1>

	<script>
		function updatebook() {

		  var bid = document.getElementById("bId").value;
		  var bquantity = document.getElementById("bQuantity").value;
		  var bprice = document.getElementById("bPrice").value;
		  if(bid == "" || bquantity=="" || bprice=="") {
				document.getElementById("textupdate").innerHTML = "Please Enter Book Id,Quantity and Price";
				document.getElementById("textupdate").style.color = "red";
			}
			else
			{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("textupdate").innerHTML = this.responseText;
		      document.getElementById("textupdate").style.color = "green";
		    }
			else
			{
				 document.getElementById("textupdate").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "UpdateBookAjax.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("bid="+bid+"&bquantity="+bquantity+"&bprice="+bprice);
		}
		}
	</script>

	 <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()"  method="POST">
	    <br>
	    <p id="mytext" class="imgcontainer"></p>
     <!-- Book Id -->
        <label for="bId">Enter Book Id : </label>
		<input type="text" name="bid" id="bId">
        <br>

        
	   <br>
     <!-- Book Quantity -->
        <label for="bQuantity">Update Quantity : </label>
		<input type="text" name="bquantity" id="bQuantity">
        <br>
         <br>
        <label for="bPrice">Enter Update Price: </label>
		<input type="text" name="bprice" id="bPrice">
		<button type="button" class="buttondeletbook"> <a href="Profile.php">Back!</a> </button>
          
        <button type="button" class="buttondeletbook"> <a href="UpdateBook.php">Refresh</a> </button>
        <button  type="button" onclick="updatebook()" class="buttondeletbook">Update</button>
        
        </form>
        
	    <p id="textupdate" class="imgcontainer"></p>
	    

	    <br>

	    


</body>
</html>
<?php
session_start();
include('DataBase.php');

      

	    $sellerid = $_SESSION['user']; 


	     $connection = new DataBase();
         $conobj=$connection->OpenCon();

         $userQuery=$connection->CheckBookList($conobj,$sellerid);

         if($userQuery->num_rows > 0) {
			 while($user = $userQuery->fetch_assoc()) { 
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

		

    ?>

