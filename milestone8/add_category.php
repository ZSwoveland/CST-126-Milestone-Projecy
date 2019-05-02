<?php
include_once 'connect.php';
if(isset($_POST['name'])){
    $name = trim($_PIST['name']);
    if(empty($name)){
        $error = "You must submit a category name.";
    }else if(category_exists('name',$name)){
        $error = 'That category already exists.';
    }else if(strlen($name) > 24){
        $error = 'Category names can only be up to 24 characters.';
    }
    if(!isset($error)){
        add_category($name);
    }
}
?>
<!DOCTYPE html>
<html lang= "en">

<head>

<meta charset = "UTF-8">
<title>Blogs Page</title>


</head>

<body>
<form align = "center" action = "add_category.php" method = "Post">
<?php if(isset($error)){
echo '<p> {$error} </p></br>';
}?>
Name: <input type="text" name= "name"></br>

<input type = "submit" value = "Add Category"></br>
</form>
</body>

</html>