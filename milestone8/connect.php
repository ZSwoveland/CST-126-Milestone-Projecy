<?php
    session_start();
    DEFINE('DB_user' , 'root');
    DEFINE('DB_PWD', 'password');
    DEFINE('DB_host', 'localhost');
    DEFINE('DB_name', 'milestoneblog');
    
    
    $conn =  mysqli_connect(DB_host, DB_user, DB_PWD, DB_name);
    if($conn == false){
        die("Could not connect.");
    }
    else{
        echo "Great connecting to connect.php";
        
    }
    
    
?>