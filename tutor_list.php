<?php require_once './header.php'; ?>
<?php check_admin(); ?>
<?php 
$msg="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg="Tutor Updated!";
    }    
}
if(!empty($msg)){
    echo "<div class='alert alert-success alert-dismissible fade show'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>RaipurTutor</strong> $msg
          </div>";
}
?>

<h1 class="head1">New Tutors</h1>
<hr>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr><th>Name</th><th>Phone No</th><th>Education</th><th>Subject</th><th>Location</th><th>Action</th></tr>
    </thead>
    <?php
    $query = "select * from app_users where status = 'new'";
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
