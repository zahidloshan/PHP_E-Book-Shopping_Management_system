<?php

    include('DataBase.php');

        
        session_start();

        $sellerid = $_SESSION['user']; 


         $connection = new DataBase();
         $conobj=$connection->OpenCon();

         $userQuery=$connection->CheckBookHis($conobj,$sellerid);

         if($userQuery->num_rows > 0) {
             while($user = $userQuery->fetch_assoc()) { 
                 echo "<fieldset>


                <legend><b>Book:</b></legend>";

             echo '<img src="uploads/'.$user['bid'].'.png" alt='.$user['bid'].' width="300" height="130">'."<br>";  

             echo "Book Id : ".$user['bid']."<br>";
             echo "Book Title : ".$user['bookname']."<br>";
             echo "Book Price : ".$user['bprice']."<br>";
             echo "Book Quantity : ".$user['bquantity']."<br>";
             echo "</fieldset>";
            }
        }
         else
         {

             echo "History Not Available";

         }   




    ?>
<?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Back") {
                header('Location: Profile.php');
                
                }
    ?> 
    <!DOCTYPE html>
    <html>
    <head>
        <title>History </title>
    </head>
    <body>

        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="submit" value="Back" name= "button">
            
        </form>
    
    </body>
    </html>    