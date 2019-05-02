<?php
include('connect.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["UserName"])){
        echo ' The Username is a required field and cannot be blank';
        //$fnameerr = "Username is a required field and cannot be blank";
    }
    else{
        $UserName = $_POST['UserName'];
    }
    if(empty($_POST["Pass_Word"])){
        echo ' The Password is a required field and cannot be blank';
        //$lnameerr = "Password is a required field and cannot be blank";
    }
    else{
        $PassWord = $_POST['Pass_Word'];
    }
   
    if(!empty($_POST["UserName"]) && !empty($_POST["Password"])){
        $checkSql = "Select * FROM `accounts` WHERE User_name = '$Username'";
        
        $result = mysqli_query($conn, $checkSql) or die('Cant select from database');
        if (mysqli_num_rows($result) == 0) { // IF no previous user is using this username.
            
            $sqlInsert = "INSERT INTO `accounts`(`User_name`, `Password`) VALUES ('$UserName','$PassWord')";
            
            $result = mysqli_query($conn, $sqlInsert);
            if (!$result) {
                echo 'Query Failed ';
            }
            
            else if(mysqli_affected_rows($conn) == 1) { //If the Insert Query was successfull.
                echo 'Successfully registered';
            }
            
        }
        else{
            echo 'Username has been taken already';
        }
    }
}

mysqli_close($conn);
    
    
    
    
    
    
    
   // mysql_close($success);
   
 ?>    