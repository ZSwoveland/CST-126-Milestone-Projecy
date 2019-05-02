<!DOCTYPE html>
<html lang = 'en'>

<head>
	<meta charset="utf=8">
	<title>Category List</title>
	

</head>
<body>
<?php 
$output = "SELECT * FROM category";
$resOutput = mysqli_query($output);
while($row = mysql_fetch_array($resOutput)){
    echo print_r($row);
}
    ?>
   
   
    
    





</body>






</html>




<?php
