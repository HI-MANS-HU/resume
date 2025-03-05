<?php $page="forgot" ?>
<?php require_once 'header.php';?>
<?php
$err="";
if(isset($_POST["email"])){
    if(empty ($_POST["email"])){
        $err = "E-Mail is req!!";
    }
    else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false){
        $err = "E-Mail is incorrect!!";
    }
    else if(!is_exist ($_POST["email"])){
        $err = "E-Mail is not registered!!";
    }
    else {
$email = filter_var($_POST["email"], FILTER_SANITIZE_MAGIC_QUOTES);
$query = "select * from app_users 
    where email = '$email' 
    ";
    $r = run_sql($query);    
    if(mysqli_num_rows($r)>0){
       $row = mysqli_fetch_array($r); 
       $body = " Your password is $row[pass]";
//       echo "<h4>Your password is : $row[pass]</h4>";
       mail_it($row["email"], "Your password", $body, null);
       redirect("index.php?msg=3");
    }
    else {
        $err = "Incorrect information!";
    }
    }
}
?>
<div class="row">    
    <div class="col-sm-10 offset-sm-1">    
        <h1>Forgot Password!</h1>
<form method="post"  class="form-horizontal">
  <div class="form-group">
      <input required type="email" class="form-control" id="email" name='email' placeholder="Email" value="<?php echo $_POST["email"]?>"/>
  </div>
    <div  class="form-group">
       <h4 style="color: red;"><?php echo $err;?></h4>
    </div>    
  <div class="form-group"> 
      <button type="submit" class="btn btn-primary btn-block" style="background-color: #660000">Submit</button>
  </div>
  <div class="form-group"> 
      <a class="btn btn-primary btn-block" style="background-color: #660000" href="forgot_pass.php">Reset</a>
  </div>    
</form>
        </div>
</div>        
<?php require_once 'footer.php';?>
