<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="Css/CssStyle.css">
    </head>
    <body>

    
    <?php

    include('DataBase.php');

    session_start();
    $userid = $_SESSION['user'];


    $connection = new DataBase();
    $conobj=$connection->OpenCon();

    $userQuery=$connection->CheckProfile($conobj,$userid);

    $user =$userQuery->fetch_assoc();


    $sellerName=$user['sellername'];
    $gender=$user['gender'];
    $phone=$user['phone'];
    $email=$user['email'];
    $streetAddress=$user['streetaddress'];
    $area=$user['area'];
    $zipcode=$user['zipcode'];



        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Logout") {
                unset($_SESSION['user']); 
                header('Location: login.php');
                }
        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "AddBook") {
                header('Location: AddBook.php');
                }
        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "DeleteBook") {
                header('Location: DeleteBook.php');
                }
        ?>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "UpdateBook") {
                header('Location: UpdateBook.php');
                }
        ?>

        
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "ChangePassword") {
                header('Location: ChangePassword.php');
                }
        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "BookList") {
                header('Location: BookList.php');
                }
        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Account") {
                header('Location: Account.php');
                }
        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "History") {
                header('Location: History.php');
                }
        ?>

         <h1 class="imgcontainer">Welcome to your Profile</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="profileform">
            <div class="sticky">
            <div class="topnav">
                <div >
            <input type="submit"  value="AddBook" name= "button">
            <input type="submit"  value="DeleteBook" name= "button">
            <input type="submit"  value="UpdateBook" name= "button">
            <input type="submit"  value="BookList" name= "button">
            <input type="submit"  value="Account" name= "button">
            <input type="submit"  value="ChangePassword" name= "button">
            <input type="submit"  value="History" name= "button">
            <input type="submit"  value="Logout" name= "button">
               </div>
            </div>
            </div>


            <fieldset class="imgcontainer">


                <legend><b>Profile:</b></legend>

                <label for="sellerName" >Name:</label>
                <?php echo $sellerName; ?>

                <br>

                <label for="gender"> Gender :</label>
                <?php echo $gender; ?>

                <br>

                <label for="phone">Phone:  </label>
                <?php echo $phone; ?>

                <br>

                <label for="email">Email:</label>
                <?php echo $email; ?>

                <br>

                <label for="streetAddress">Street Address :</label>
                <?php echo $streetAddress; ?>

                <br>

                <label for="area">Area:  </label>
                <?php echo $area; ?>

                <br>

                <label for="zipcode">Zip Code:</label>
                <?php echo $zipcode; ?>
               
                

            </fieldset>
        </form>

            
        
    </body>
</html>