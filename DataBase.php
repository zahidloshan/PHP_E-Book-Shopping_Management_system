<?php
class DataBase{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "wt_user_1";
 $dbpass = "123";
 $db = "ebook";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 function CheckUser($conn,$table,$username,$password)
 {
$result = $conn->query("SELECT `email`, `password` FROM `".$table."` WHERE email='".$username."' and password='".$password."'");
 return $result;
 }


 function CheckUser1($conn,$table,$username)
 {
$result = $conn->query("SELECT * FROM `".$table."` WHERE email='".$username."';");
 return $result;
 }

 function CheckTrade($conn,$table,$tradelicense)
 {
$result = $conn->query("SELECT * FROM `".$table."` WHERE tradelicense='".$tradelicense."';");
 return $result;
 }

 function CheckBookId($conn,$table,$username)
 {
$result = $conn->query("SELECT * FROM `".$table."` WHERE bid='".$username."';");
 return $result;
 }

 function CheckBookHistory($conn,$username)
 {
   $result = $conn->query("SELECT * FROM `bookhistory` WHERE sellerid='".$username."';");
 return $result;
 }

 function CheckProfile($conn,$username)
 {
       $stmt = $conn->prepare("SELECT `sellername`, `email`, `gender`, `phone`, `streetaddress`, `area`, `city`, `zipcode`, `tradelicense` FROM `registration` WHERE email=?;");
        $stmt->bind_param("s", $p1);
        $p1 = $username;
        $stmt->execute();
        $res2 = $stmt->get_result();
        
        return $res2;

 }


 function CheckBookList($conn,$username)
 {
       $result = $conn->query("SELECT `bookname`, `bid`, `bauthor`, `bpublisher`, `bedition`, `bprice`, `bquantity`, `sellerid` FROM `book` WHERE sellerid='".$username."';");
        
        return $result;

 }

 function CheckWithdrawHistory($conn,$username)
 {
       $result = $conn->query("SELECT `sellerid`, `currentbalance`, `afterwithdrawbal`, `withdrawtime` FROM `withdrawhistory` WHERE sellerid='".$username."';");
        
        return $result;

 }


 function CheckBookList1($conn,$bookid)
 {
     

        $stmt = $conn->prepare("SELECT `bookname`, `bid`, `bauthor`, `bpublisher`, `bedition`, `bprice`, `bquantity`, `sellerid` FROM `book` WHERE bid=?;");
        $stmt->bind_param("s", $p1);
        $p1 = $bookid;
        $stmt->execute();
        $res2 = $stmt->get_result();
        
        return $res2;

 }

 
function CheckBookHis($conn,$sellerid)
 {
       $result = $conn->query("SELECT `bookname`, `bid`, `bprice`, `bquantity`, `sellerid` FROM `bookhistory` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }


 function CheckBook($conn,$username,$bookid)
 {
       $result = $conn->query("SELECT `bookname`, `bid`, `bauthor`, `bpublisher`, `bedition`, `bprice`, `bquantity`, `sellerid` FROM `book` WHERE sellerid='".$username."' and bid='".$bookid."';");
        
        return $result;

 }

 function InsertCurrentBalance($conn,$username,$updatebanlace)
 {
       $result = $conn->query("INSERT INTO `accountbalance` (`sellerid`, `currentbalance`) VALUES ('".$username."', '".$updatebanlace."');");
        
        return $result;

 }


 function InsertUser1($conn,$Email,$password)
 {
    $result= $conn->query("INSERT INTO `login`(`email`, `password`) VALUES ('$Email','$password')");
    
    if ($result === TRUE) 
    {
        echo "New record created successfully";
    } 
      else {
        echo $conn->error;
      }
      return $result;
 }

 function InsertUser($conn, $sellerName, $Email,$Gender, $sPhone, $streetAddress,$sArea, $sCity,$sZipCode,$tradelicense)
 {
    $result= $conn->query("INSERT INTO `registration`(`sellername`, `email`, `gender`, `phone`, `streetaddress`, `area`, `city`, `zipcode`, `tradelicense`) VALUES ('$sellerName','$Email','$Gender', '$sPhone', '$streetAddress','$sArea', '$sCity','$sZipCode','$tradelicense');");
    
    if ($result === TRUE) 
    {
        echo "New record created successfully";
    } 
      else {
        echo $conn->error;
      }
      return $result;
 }


 function InsertBook($conn, $bookname, $bid,$bauthor, $bpublisher, $bedition,$bprice, $bquantity,$sellerid)
 {
    $result= $conn->query("INSERT INTO `book`(`bookname`, `bid`, `bauthor`, `bpublisher`, `bedition`, `bprice`, `bquantity`, `sellerid`) VALUES ('$bookname','$bid','$bauthor','$bpublisher','$bedition','$bprice','$bquantity','$sellerid');");
    
    if ($result === TRUE) 
    {
        echo "New Book Added successfully";
    } 
      else {
        echo $conn->error;
      }
      return $result;
 }

 function InsertWithdrawHistory($conn,$username,$currentbanlace,$afterwithdrawbal,$withdrawtime)
 {
       $result = $conn->query("INSERT INTO `withdrawhistory`(`sellerid`, `currentbalance`, `afterwithdrawbal`, `withdrawtime`) VALUES ('".$username."','".$currentbanlace."','".$afterwithdrawbal."','".$withdrawtime."');");
        
        return $result;

 }

 



 function UpdatePrice($conn,$bookid,$bookprice)
 {
       $result = $conn->query("UPDATE `book` SET `bprice`='".$bookprice."' WHERE bid='".$bookid."';");
        
        return $result;

 }

 function ChangePassword($conn,$sellerid,$nspassword)
 {
       $result = $conn->query("UPDATE `login` SET `password`='".$nspassword."' WHERE email='".$sellerid."';");
        
        return $result;

 }

 function UpdateBook($conn,$bookid,$bookprice,$bookquantity)
 {
       $result = $conn->query("UPDATE `book` SET `bprice`='".$bookprice."',`bquantity`='".$bookquantity."' WHERE bid='".$bookid."';");
        
        return $result;

 }

 function DeleteBook($conn,$bookid)
 {
       $result = $conn->query("DELETE FROM `book` WHERE bid='".$bookid."';");
        
        return $result;

 }

 function DeleteBalance($conn,$sellerid)
 {
       $result = $conn->query("DELETE FROM `bookhistory` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }

 function DeleteCurrentBalance($conn,$sellerid)
 {
       $result = $conn->query("DELETE FROM `accountbalance` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }


 function CurrentBalance($conn,$sellerid)
 {
       $result = $conn->query("SELECT `sellerid`, `currentbalance` FROM `accountbalance` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }





 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }


function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>