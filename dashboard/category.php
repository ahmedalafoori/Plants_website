<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category</h1>
        <a href="./add_cat.php" class="btn btn-primary">Add Category</a>
    </div>
    <h2>Mange Category</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Category image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config.php');
                $sql = "SELECT * FROM `cateogry` ORDER BY `cat_id` DESC";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Erorr" .mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['cat_id'];
                    $cat_name = $row['cat_name'];
                    $img = $row['cat_img'];
                    echo "
                    <tr>
                    <td>$id</td>
                    <td>$cat_name</td>
                    <td>$img</td>
                    <td><a href='./edit_cat.php?val=$id' class='btn btn-info'>Edit</a></td>
                    <td><a href='./del_cat.php?val=$id' class='btn btn-danger'>Delete</a></td>
                    </tr>
                    ";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>