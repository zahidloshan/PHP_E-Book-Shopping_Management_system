<?php


include('BookAddValidation.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Add</title>
	<script src="JS/JSBook.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Add Book</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" class="addbookform" method="POST" enctype="multipart/form-data">
    <p id="mytext" class="imgcontainer"></p>
	<fieldset class="columncenter">
    <legend class="imgcontainer" >Book Information </legend>
    <table width="100%">
    	<tr>
    		<td>
	<label for="bookName">Book Title : </label>
	     </td>
	<td>
	<input type="text" id="bookName" name="bname" value="<?php echo $bookName ?>">
	</td>
	</tr>
	<p><?php echo $bookNameErr; ?></p>

     <!-- Book Id -->
     <tr>
    		<td>
        <label for="bId">Book Id : </label>
             </td>
	<td>
		<input type="text" name="bid" id="bId" value="<?php echo $bId ?>">
		</td>
	</tr>
		<p><?php echo $bIdErr; ?></p>	

     

	<!-- Author  -->
	<tr>
    		<td>
		<label for="bAuthor">Authr : </label>
		     </td>
	<td>
		<input type="text" name="bauthor" id="bAuthor" value="<?php echo $bAuthor ?>">
		</td>
	</tr>
		<p><?php echo $bAuthorErr; ?></p>


		<!-- Publisher -->
		<tr>
    		<td>
        <label for="bPublisher">Publisher : </label>
             </td>
	     <td>
		<input type="text" name="bpublisher" id="bPublisher" value="<?php echo $bPublisher ?>">
		</td>
	</tr>
		<p><?php echo $bPublisherErr; ?></p>


	<!-- Edition  -->
	<tr>
    		<td>
        <label for="bEdition">Book Edition : </label>
             </td>
	<td>
		<input type="text" name="bedition" id="bEdition" value="<?php echo $bEdition ?>">
		</td>
	</tr>
		<p><?php echo $bEditionErr; ?></p>
	

	<!-- Book Price -->
	<tr>
    		<td>
        <label for="bPrice">Book Price : </label>
             </td>
	<td>
		<input type="text" name="bprice" id="bPrice" value="<?php echo $bPrice ?>">
		</td>
	</tr>
		<p><?php echo $bPriceErr; ?></p>	


	<!-- Book Quantity -->
	<tr>
    		<td>
        <label for="bQuantity">Book Quantity : </label>
             </td>
	<td>
		<input type="text" name="bquantity" id="bQuantity" value="<?php echo $bQuantity ?>">
		</td>
	</tr>
		<p><?php echo $bQuantityErr; ?></p>
	<!-- Book Picture -->
	<tr>
        <td colspan="2"><hr></td>
    </tr>

	<tr>
    		<td>
        <label for="bPicture">Book Picture : </label>
             </td>
	<td>
		<input type="file" name="file" id="bPicture" value="<?php echo $bPicture ?>">
		</td>
	</tr>
		<!--<p><?php echo $bPictureErr; ?></p>	-->


       </table>
	</fieldset>

    <div>
    <button type="button"> <a href="Profile.php">Back!</a> </button>
	<input type="submit" class="newbutton" name="submit">
	</div>
    </form>

</body>
</html>