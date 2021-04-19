<?php



        include('DataBase.php');

        
        session_start();

        $sellerid = $_SESSION['user']; 


         $connection = new DataBase();
         $conobj=$connection->OpenCon();

         $userQuery=$connection->CheckWithdrawHistory($conobj,$sellerid);

         if($userQuery->num_rows > 0) {
             while($user = $userQuery->fetch_assoc()) { 
                 echo "<fieldset >


                <legend><b>Withdraw History:</b></legend>";

              echo "Current Balance : ".$user['currentbalance']."<br>";
             echo "After Withdraw Balance : ".$user['afterwithdrawbal']."<br>";
             echo "Withdraw Time : ".$user['withdrawtime']."<br>";
             echo "</fieldset>";
            }
        } 

        
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>With Draw History </title>
        <link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
    </head>
    <body>
         <button type="button"> <a href="Account.php">Back!</a> </button>
        
    </body>
    </html>