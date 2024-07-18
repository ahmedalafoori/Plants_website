<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Add Users</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <form name="Register" id="reg" action="add_user.php" method="post" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><label class="form-label">Name:</label></td>
                                    <td><input class="form-control" id="name" type="text" name="user_name" placeholder="FristName MiddlelName LastName"></td>
                                </tr>
                                <tr>
                                    <td><label>Password:</label></td>
                                    <td><input class="form-control" id="pass" type="password" name="user_password1" placeholder="Must be at least 4 characters in uppercase, lowercase, number, symbol">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Confirm Password:</label></td>
                                    <td><input class="form-control" id="pass1" type="password" name="user_password2"></td>
                                </tr>
                                <tr>
                                    <td><label>Email:</label></td>
                                    <td><input class="form-control" id="email" type="email" name="user_email"></td>
                                </tr>
                                <tr>
                                    <td><label>Phone Number:</label></td>
                                    <td><input class="form-control" id="tel" type="tel" name="user_tel" placeholder="Must consist of 9 numbers"></td>
                                </tr>
                                <td><label>Gender:</label></td>
                                <td>
                                    <input class="form-check-input" id="gender" type="radio" name="user_gender" value="Male">Male
                                    <input class="form-check-input" id="gender" type="radio" name="user_gender" value="Female">Female
                                </td>
                                </tr>
                                <tr>
                                    <td><label>Country:</label></td>
                                    <td><select name="user_country" id="country">
                                            <option>Choose your country</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="China">China</option>
                                            <option value="KSA">KSA</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><label>Permission:</label></td>
                                    <td><select name="user_per" id="per">
                                            <option>Choose the Permation</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Uplode Image:</td>
                                    <td><label id="format"><input class="form-control" type="file" name="user_uplode">
                                            The allowed formats here are (jpg,png,svg,jpeg)</label></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="btn btn-success" type="submit" value="Add" name="added">
                                        <a href="./users.php" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <?php
        if(isset($_POST['added'])){
            require_once('../config.php');
            $name = $_POST['user_name'];
            $password = md5($_POST['user_password2']);
            $email = $_POST['user_email'];
            $phone = $_POST['user_tel'];
            $gender = $_POST['user_gender'];
            $country = $_POST['user_country'];
            $type = $_POST['user_per'];
            if(isset($_FILES['user_uplode']) && empty($_FILES['user_uplode']['tmp_name'])) {
                $sql = "insert into user(user_name,user_password,user_email,phone,user_gender,user_country,user_type)
                values('$name','$password','$email','$phone','$gender','$country','$type')";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    echo "Insert Error" . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
            else {
                $folder ="../Uplode/";
                $img = $_FILES['user_uplode']['name'];
                $tmp = $_FILES['user_uplode']['tmp_name'];
                $sql = "insert into user(user_name,user_password,user_email,phone,user_gender,user_country,user_img,user_type)
                values('$name','$password','$email','$phone','$gender','$country','$img','$type')";
                $result = mysqli_query($conn,$sql);
                move_uploaded_file($tmp,$folder.$img);
                if(!$result){
                    echo "Insert Error" . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
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