<?php 
$id = $_GET['val'];
require_once('../config.php');
$sql = "delete from cateogry where cat_id = $id";
$result = mysqli_query($conn,$sql);
if (!$result){
echo "deleted error" .mysqli_error($conn);

}
header('Location:category.php');
mysqli_close($conn);
?>