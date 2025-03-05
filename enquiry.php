<?php require_once './header.php';?>
<?php
$otp = get_otp();
if(isset($_POST["name"])){
        $query = "INSERT INTO enquiry (name, email, "
                . " location, phone_no, status, "
                . " subjects, tid, otp) "
                . " VALUES ( '$_POST[name]', '$_POST[email]',  "
                . " '$_POST[location]', '$_POST[phone_no]', 'new', "
                . " '$_POST[subjects]', '$_POST[id]', '$otp');";
        $r = run_sql($query);
        redirect("index.php?msg=5");    
}
?>
<form method="post">
    <input required class="form-control" type="text" name="name" placeholder="Name"/><br>
    <input  pattern="0?[6-9]{1}\d{9}"  required class="form-control" type="tel" name="phone_no" placeholder="Phone No"/><br>
    <input required class="form-control" type="email" name="email" placeholder="EMail"/><br>
    <input class="form-control" type="text" name="location" placeholder="Location"/><br>
    <input type="hidden" name="id" value="<?=$_REQUEST["id"]?>"/>
    <textarea required class="form-control" name="subjects" placeholder="Subjects"></textarea>
    <input class="btn btn-danger btn-block my-3" type="submit" />
</form>
<?php require_once './footer.php';?>

