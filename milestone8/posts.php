<?php 
include_once('connect.php');
if(isset($_POST['title'],$_POST['content'],$_POST['category'])){
    $errors = array();
    
    $title = trim($_POST['title']);
    $contents = trim($_POST['contents']);
    if(empty($title)){
        $errors[] = 'Title is required';
    }
    if(empty($contents)){
        $errors[] = "Content is required";
    }
    if(category_exists('id', $_POST['category'])){
        $errors[] = 'Category does not exist';
        
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
<?php if(isset($errors) && !empty($errors)){
    echo '<ul><li>',implode('</li><li>',$errors),'</li</ul>';
}?>


<form align = "center" action = "posts.php" method = "Post">
<div>Title of Post: <input type="text" name= "title"></br></div>
	
	<div>Content of Post: </br>
	<textarea cols="40" 
       rows="5" 
       style="width:200px; height:200px;"  name = "content"></textarea></div>
	
		<div><input type = "submit" value = "Post"></div>
	<div><label for="category">Category</label>

	<select name = "category">
	<?php 
	foreach (get_categories() as $category){
	    ?>
	   <option value ="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
	   <?php
	}
	?>
	</select></div>
	<div>Comments: <br>
	<textarea cols= "40" rows = "5" style = "width:200px; height:200px;" name = "Comm"></textarea>
	</div>
	<div><input type = "submit" value = "Comment"></div>
	
	
	
</form>
</body>

</html>

<?php
    $output = "SELECT * FROM posts2 ORDER BY ID DESC";
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
            $insertSQL = "INSERT INTO posts2 (`Title`,`Content`,`Date`) VALUES ('$title','$content','$date')";
            if(!mysqli_query($insertSQL)){
                die(' Error Posting');
            }
            else{
                echo ' One post is inserted to the database';
            }
        }
    
        if(isset($_POST['Del'])){
      

                 $DelTitle = $_POST['delTitle'];
                 $delSql = "DELETE posts2 WHERE Title = '$DelTitle'";
                 if(!mysqli_query($delSql)){
                     die(' Error deleting record');
                 }
                 else{
                     echo ' Record Deleted';
                 }
          
            
        }
        if(isset($_POST['Ed'])){
           
                $OldTitle = $_POST['oldTitle'];
   
                $edTitle = $_POST['edTitle'];
                $editSql = "UPDATE posts2 SET '$edTitle' WHERE Title = '$OldTitle'";
                if(!mysqli_query($editSql)){
                    die(' Error editing record');
                }
                else{
                    echo ' Edit Successful';
                }
                 
        }
        if(isset($_POST['Search'])){
            $searchText = $_Post['searchBox'];
            $searchSql = "SELECT * FROM `posts2` Where `Title` = '$searchText'";
            if(!mysqli_query($searchSql)){
                die(' Error searching');
            }
            else{
                echo ' Search Successful';
                
            }
        }
        if(isset($_POST['Comment'])){
            $commText = $_Post['Comm'];
            $commSql = "INSERT INTO `posts2` (Comment) VALUE ('$commText')";
            if(!mysqli_query($commSql)){
                die(' Error uploading comment');
            }
            else{
                echo ' Comment was successful';
                
            }
        }
        ?>