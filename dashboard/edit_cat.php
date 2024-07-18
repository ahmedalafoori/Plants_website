<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Edit category</h2>
    <hr>
    <?php
                if(isset($_GET['val'])){
                $cat_id = $_GET['val'];
                require_once('../config.php');
                $sql = "select * from cateogry where cat_id = '$cat_id'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Erorr" . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
    <form name="cateogry" id="add_ne" action="" method="POST" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td><label class="form-label">cateogry name:</label></td>
                    <td><input class="form-control" id="cat_name" type="text" 
                    name="cat_name" value="<?php echo $row['cat_name']; ?>"></td>
                </tr>
               
                <tr>
                    <td>Uplode News Image:</td>
                    <td><img class="w-50 h-50 my-2" src="./news_uplode/<?php echo $row['cat_img']; ?>"  height="230px">
                        <label id="format"><input class="form-control" type="file" name="cat_uplode">
                        The allowed formats here are (jpg,png,svg)</label></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <input class="btn btn-success" type="submit" value="Update" name="edit_cateogry">
                    <a href="./category.php" class="btn btn-danger">Cancel</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <?php
        }}
    ?>
    <?php
    if(isset($_POST['edit_cateogry']))
    {
        require_once('../config.php');
            $cat_name = $_POST['cat_name'];
    
        if (isset($_FILES['cat_uplode']) && !empty($_FILES['cat_uplode']['tmp_name'])) {
            $folder ="./cat_uplode/";
            $img = $_FILES['cat_uplode']['name'];
            $tmp = $_FILES['cat_uplode']['tmp_name'];
            $sql = "UPDATE `cateogry` SET `cat_name` = '$cat_name', `cat_img` = '$img' WHERE `cateogry`.`cat_id` = $cat_id";
            move_uploaded_file($tmp,$folder.$img);
        }
            else {
                $sql = "UPDATE `cateogry` SET `cat_name` = '$cat_name' WHERE `cateogry`.`cat_id` = $cat_id";
                }
            if(!$result = mysqli_query($conn,$sql))
                {
                    echo "Update Error" . mysqli_error($conn);
                }
            else{
                echo "<script>alert('edit Success')</script>";
            }
    }
    ?>
</main>
<!-- end main  -->
<?php
    require_once('footer.php');
?>