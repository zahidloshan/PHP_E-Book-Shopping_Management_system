<!DOCTYPE html>
<html>
<head>
	<title>Book List</title>
	<script src="JS/JSBookList.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Book List</h1>
	<script >
		function makediscount() {

		  var dBookid = document.getElementById("dBookid").value;
		  var makeDiscount = document.getElementById("makeDiscount").value;
		  if(dBookid == "" || makeDiscount=="") {
				document.getElementById("textmakediscount").innerHTML = "Please Enter Book Id and Discount Pirce";
				document.getElementById("textmakediscount").style.color = "red";
			}
			else
			{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("textmakediscount").innerHTML = this.responseText;
		      document.getElementById("textmakediscount").style.color = "green";
		    }
			else
			{
				 document.getElementById("textmakediscount").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "MakeDiscount.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("dBookid="+dBookid+"&makeDiscount="+makeDiscount);
		}
		}
	</script>

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" class="booklistform" method="POST">
	<p id="mytext" class="imgcontainer"></p>
	<label for="dBookid">Discount Book Id : </label>
	<input type="text" id="dBookid" name="dbookid" placeholder="Enter Discount Book Id" >
	<label for="makeDiscount">Discount Amount : </label>
	<input type="text" id="makeDiscount" name="makediscount" placeholder="Enter Discount Price amount" >
    <button type="button"> <a href="BookList.php">Refresh</a> </button>
	<button type="button"> <a href="Profile.php">Back!</a> </button>
	
	
	</form>
	<button  type="button" id="makediscount" onclick="makediscount()">Make Discount</button>
	
	<p id="textmakediscount" class="imgcontainer"></p>
	


	<?php


	   include('DataBase.php');

	    
        session_start();

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
	       

</body>
</html>