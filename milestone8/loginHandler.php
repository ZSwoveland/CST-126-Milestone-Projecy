<?php
include('connect.php');
    $uname = $pname ="";
   // $unameerr = $pnameerr = "";
   //Checks if the textboxes are populated
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Checks if the username text is empty
        if(empty($_POST["UserName"])){
            echo ' The Username is a required field and cannot be blank';
           // $unameerr = "Username is a required field and cannot be blank";
        }
        else{
            $uname = mysqli_real_escape_string($db,$_POST['UserName']);
           
        }
        //Checks the password text is empty
        if(empty($_POST["Pass_Word"])){
            echo ' The Password is a required field and cannot be blank';
            //$pnameerr = "Password is a required field and cannot be blank";
        }
        else{
            $pname = mysqli_real_escape_string($db,$_POST['Pass_Word']); 
        }
        //checks if both is not empty to start the login process
        if(!empty($_POST["UserName"] && !empty($_POST["Pass_Word"]))){
            //Pulls data from DB
            $sqlVarify = "SELECT * FROM accounts WHERE User_name = '$uname' AND Password = '$pname' LIMIT 1";
            
            if(isset($_POST['login'])){
                //Checks Varification 
                if(mysqli_num_rows($sqlVarify) == 1){
                    $row = mysql_fetch_array($sqlVarify);
                    $_COOKIE['UserName'] = $row['User_name'];
                    // $_SESSION['PassWord'] = $row['Pass_Word'];
                    echo 'Welcome to the blog';
                }
                else{
                    echo 'wrong username or password';
                    //Puts a timer ban if hit 3 times
                    if(isset($_COOKIE['login]'])){
                        if($_COOKIE['login'] < 3){
                            
                            $attempts = $_COOKIE['login'] + 1;
                            setcookie('login', $attempts, time()+60*10);
                        }
                        else{
                            echo 'you are banned for 10 min. try again later';
                        }
                    }
                    else{
                        setcookie('login',1,time()+60*10);
                    }
                    
                }
            }
          
           
            
        }
}







?>