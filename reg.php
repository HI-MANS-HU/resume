<?php require_once './header.php'; ?>
<script>
    $(document).ready(function () {
        $("#myform").validate();
    });
</script>
<?php
if (isset($_POST["user_name"])) {
    if (null != check_pass($_POST["pass"])) {
        $err = check_pass($_POST["pass"]);
    } else if ($_POST["pass"] != $_POST["cpass"]) {
        $err = "Password does not match!";
    } else if (is_exist($_POST["email"])) {
        $err = $_POST["email"] . ' already registered!';
    } else if (check_img() != null) {
        $err = check_img();
    } else {
        $query = "INSERT INTO app_users (user_name, email, pass, "
                . " phone_no, role, status, "
                . " education, t_desc, location, "
                . " skills, experience, subjects, "
                . " cate, min_batch_size, max_batch_size, "
                . " min_fees, max_fees) "
                . " VALUES ( '$_POST[user_name]', '$_POST[email]', '$_POST[pass]', "
                . " '$_POST[phone_no]', 'Tutor', 'new', "
                . "' $_POST[education]', '$_POST[t_desc]', '$_POST[location]', "
                . " '$_POST[skills]', '$_POST[experience]', '$_POST[subjects]', "
                . " '$_POST[cate]', '$_POST[min_batch_size]', '$_POST[max_batch_size]', "
                . " '$_POST[min_fees]', '$_POST[max_fees]');";
        $r = run_sql($query);
        mail_it(ADMIN_EMAIL, "New User Registered!", "Name: $_POST[name], EMail: $_POST[email]");
        $lid = mysqli_insert_id($con);
        if (isset($_FILES["at1"]) && empty($_FILES["at1"]["name"]) != true) {
            move_uploaded_file($_FILES["at1"]["tmp_name"], "upload/$lid.jpg");
        }
        redirect("index.php?msg=1");
    }
}
?>
<h1 class="head1">Register</h1>
<hr>
<form method="post" enctype="multipart/form-data" id="myform">
    <div class="row">
        <div class="col-sm-6">
            <input  required class="form-control" type="text" value="<?= $_REQUEST['user_name'] ?>" name="user_name" placeholder="Name" /><br>
            <input required inphone="true" class="form-control" type="tel" pattern="0?[6-9]{1}\d{9}" value="<?= $_REQUEST['phone_no'] ?>" name="phone_no" placeholder="Phone No" /><br>    
            <input required class="form-control" type="password"  minlength="7" name="pass" id="pass" placeholder="Password" /><br>    
            <input required class="form-control" type="password"  minlength="7" name="cpass" id="cpass" placeholder="Confirm Password" /><br>    
            <input required class="form-control" type="email" value="<?= $_REQUEST['email'] ?>" name="email" placeholder="email" /><br>            

            <input required class="form-control" type="text" value="<?= $_REQUEST['education'] ?>" name="education" placeholder="Education" /><br>            
            <input required class="form-control" type="text" value="<?= $_REQUEST['location'] ?>" name="location" placeholder="Location" /><br>            
            <input required class="form-control" type="text" value="<?= $_REQUEST['subjects'] ?>" name="subjects" placeholder="Subject" /><br>            
            <input class="form-control" type=text value="<?= $_REQUEST['experience'] ?>" name="experience" placeholder="Experience" /><br>            
        </div>                      
        <div class="col-sm-6">
            <select class="form-control" name="cate" >
                <option selected="selected">Home Tutor</option>
                <option>Coaching</option>
                <option>Online</option>
            </select><br>   
            <input min="0" class="form-control" type="number"  value="<?= $_REQUEST['min_batch_size'] ?>" name="min_batch_size" placeholder="Min Batch Size" /><br>    
            <input min="0" class="form-control" type="number"  value="<?= $_REQUEST['max_batch_size'] ?>" name="max_batch_size" placeholder="Max Batch Size" /><br>    
            <input min="0" class="form-control" type="number"  value="<?= $_REQUEST['min_fees'] ?>" name="min_fees" placeholder="Min Fees" /><br>    
            <input min="0" class="form-control" type="number"  value="<?= $_REQUEST['max_fees'] ?>" name="max_fees" placeholder="Max Fees" /><br>    
            <textarea name="skills" class="form-control" rows="1" placeholder="Skills"><?= $_REQUEST['skills'] ?></textarea><br>
            <input class="form-control" type="file" name="at1" placeholder="Image" /><br>
            <textarea name="t_desc" class="form-control" rows="4" placeholder="Description"><?= $_REQUEST['t_desc'] ?></textarea><br>
        </div>                      

    </div>
    <span style="color: red;"><?= $err ?></span>
    <input class="form-control btn btn-primary" type="submit"/><br>
    <a class="form-control btn btn-danger my-3" href="reg.php">Reset</a><br>
</form>
<?php require_once './footer.php'; ?>
