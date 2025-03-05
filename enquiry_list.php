<?php require_once './header.php'; ?>
<?php 
$msg="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg="Enquiry Updated!";
    }    
}
if(!empty($msg)){
    echo "<div class='alert alert-success alert-dismissible fade show'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>RaipurTutor</strong> $msg
          </div>";
}
?>

<h1 class="head1">Enquiries</h1>
<hr>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr><th>Name</th><th>Phone No</th><th>EMail</th><th>Subject</th><th>Location</th><th>Action</th></tr>
    </thead>
    <?php
    $whr = "";
    if(!is_admin()){
        $whr = " and tid = $_SESSION[id] ";
    }
    $query = "select * from enquiry where status = 'new' $whr order by id desc";
    $r = run_sql($query);
    while($row = mysqli_fetch_array($r)){
        echo "<tr>";
        echo "<td>$row[name]</td>";
        echo "<td>$row[phone_no]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[subjects]</td>";
        echo "<td>$row[location]</td>";
        echo "<td><a class='btn btn-success btn-sm mx-3' href='enquiry_apr.php?id=$row[id]&status=approved'>Approve</a>";
        echo "<a class='btn btn-danger btn-sm' href='enquiry_apr.php?id=$row[id]&status=canceled'>Cancel</a></td>";
        echo "</tr>";
    }
    ?>
</table>


<?php require_once './footer.php'; ?>


