<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Add new cateogry</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <form name="News" id="add_ne" action="#" method="POST" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><label class="form-label">cateogry name:</label></td>
                                    <td><input class="form-control" id="title" type="text" name="cat_name"></td>
                                </tr>
                              
                                <tr>
                                    <td>Uplode cateogry Image:</td>
                                    <td><label id="format"><input class="form-control" type="file" name="cat_uplode">
                                        The allowed formats here are (jpg,png,svg)</label></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    <input class="btn btn-success" type="submit" value="Add" name="add_cateogry">
                                    <a href="./category.php" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['add_cateogry'])){
                        require_once('../config.php');
                            $title = $_POST['cat_name'];
                            $folder ="./cat_uplode/";
                            $img = $_FILES['cat_uplode']['name'];
                            $tmp = $_FILES['cat_uplode']['tmp_name'];
                            $sql = "INSERT INTO `cateogry` (`cat_name`, `cat_img`)
                                VALUES ('$title','$img')";
                            $result = mysqli_query($conn,$sql);
                            if(!$result){
                                echo "Insert Error" . mysqli_error($conn);
                            }
                            else{
                                echo "<script>alert('add Success')</script>";
                            }
                            move_uploaded_file($tmp,$folder.$img);
                        mysqli_close($conn);
                    }
                    ?>
                </div>
            </div> 
        </div>
    </div>  
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>