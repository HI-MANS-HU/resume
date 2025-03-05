<?php require_once './header.php'; ?>
<?php 
$msg="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg="Thanks for registration! Please wait for 2 working days for approval!";
    }    
    else if($_REQUEST["msg"]==3){
        $msg="your password has been mailed to you!";
    }    
    else if($_REQUEST["msg"]==5){
        $msg="Submitted!";
    }    
    else if($_REQUEST["msg"]==7){
        $msg="Thanks for contacting, we will get back to you soon!";
    }    

}
if(!empty($msg)){
    echo "<div class='alert alert-success alert-dismissible fade show'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>RaipurTutor</strong> $msg
          </div>";
}
?>
<form class="form-inline">
    <input class="form-control" value="<?=$_REQUEST[subject]?>"  type="text" name="subject" placeholder="Subject"/>
    <input class="form-control" value="<?=$_REQUEST[fees]?>" type="number" name="fees" placeholder="Fees"/>
    <select class="form-control" name="cate">
        <option selected="selected" value="">Select Category</option>
        <option>Home Tutor</option>
        <option>Coaching</option>
        <option>Online</option>
    </select>
    <input class="form-control btn btn-primary" type="submit"  value="Search"/>
</form>

                
<h1 class="head1">Tutors</h1>
<hr>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr><th>Name</th><th>Phone No</th><th>Education</th><th>Subject</th><th>Location</th><th>Action</th></tr>
    </thead>
    <?php
    $whr = "";
    if(!empty($_REQUEST["subject"])){
     $whr = " and subjects like '%$_REQUEST[subject]%'";   
    }
    if(!empty($_REQUEST["fees"])){
     $whr = $whr . " and min_fees <= $_REQUEST[fees] ";   
    }    
    if(!empty($_REQUEST["cate"])){
     $whr = $whr . " and cate = '%$_REQUEST[cate]%' ";   
    }    
    $query = "select * from app_users where not role='admin' and status = 'approved' $whr";
//    echo "$query<br>";
    $r = run_sql($query);
    while($row = mysqli_fetch_array($r)){
        echo "<tr>";
        echo "<td>$row[user_name]</td>";
        echo "<td>$row[phone_no]</td>";
        echo "<td>$row[education]</td>";
        echo "<td>$row[subjects]</td>";
        echo "<td>$row[location]</td>";
        echo "<td><a class='btn btn-danger btn-sm' href='tutor_det.php?id=$row[id]'>Read More</a></td>";
        echo "</tr>";
    }
    ?>
</table>


<?php require_once './footer.php'; ?>


