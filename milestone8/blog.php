
<?php 
function add_post($title, $contents, $category){
    
}
function edit_post($title, $contents, $category){
    
}
function add_category($name){
    $name = mysql_real_escape_string($name);
    mysql_query("INSERT INTO 'categories' SET 'name' = '{$name}'");
}
function delete($field, $id){
    $field = mysql_real_escape_string($table);
    $id = (int)$id;
    mysql_query("DELETE FROM '{$table}' WHERE 'id' = {$id}");
}
function get_posts($id = null, $cat_id = null){
    
}
function get_categories($id = null){
    $categories = array();
    
    $query = mysql_query("SELECT 'catID', 'name' FROM categories");
    
    while ($row = mysql_fetch_assoc($query)){
        $categories[] = $row;
    }
    return $categories;
}

function category_exists($field, $value){
   
    
    $query = mysql_query("SELECT COUNT(1) FROM 'categories' WHERE 'field' = '{$value}'");
    
    return (mysql_result($query, 0) == '0') ? false : true;
    
}
?>
<?php
    $output = "SELECT * FROM posts ORDER BY ID DESC";
    $resOutput = mysqli_query($output);
    while($row = mysql_fetch_array($resOutput)){
        echo print_r($row);
    }
    $title = $content = "";
    $date = date("Y/m/d");
   
        if(isset($_POST['Post'])){
            session_start();
            include('connect.php');
            $title = $_POST['title'];
            $content =  $_POST['content'];
            $insertSQL = "INSERT INTO posts2(`Title`,`Content`,`Date`) VALUES ('$title','$content','$date')";
            if(!mysqli_query($insertSQL)){
                die(' Error Posting');
            }
            else{
                echo ' One post is inserted to the database';
            }
        }
    
    
?>