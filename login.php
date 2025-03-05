<?php require_once './header.php'; ?>
<script>
$(document).ready(function(){
    $("#myform").validate();
});
</script>
<?php
if(isset($_POST["email"])){
    // $email = filter_var($_POST["email"], FILTER_SANITIZE_MAGIC_QUOTES);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_ADD_SLASHES);
    // $pass = filter_var($_POST["pass"], FILTER_SANITIZE_MAGIC_QUOTES);
    $pass = filter_var($_POST["pass"], FILTER_SANITIZE_ADD_SLASHES);
    $query = "select * from app_users 
    where email = '$email' 
    and pass = '$pass' and status = 'approved'";
    $r = run_sql($query);    
    if(mysqli_num_rows($r)>0){
       $row = mysqli_fetch_array($r); 
       $_SESSION["uname"]=$row["user_name"];
       $_SESSION["email"]=$row["email"];
       $_SESSION["role"]=$row["role"];
       $_SESSION["id"]=$row["id"];
       header("location:index.php");
    }
    else {
        $err="Incorrect User Name or Password!!";
    }
}
?>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
<h1 class="head1">Login</h1>
<hr>
<form method="post" id="myform">
    <input required class="form-control" type="text" name="email" placeholder="EMail"/><br>
    <input required class="form-control" type="password" name="pass" placeholder="Password"/><br>
    <span style="color: red;"><?=$err?></span>
    <input class="btn btn-primary btn-block" type="submit" value="Login" /><br>
    <a class="btn btn-danger btn-block" href="login.php">Reset</a><br>
    <a href="reg.php">Register As Tutor</a><br>
    <a href="forgot_pass.php">Forgot Password</a><br>
</form>        
    </div>
</div>
<?php require_once './footer.php'; ?>
