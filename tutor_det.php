<?php require_once './header.php'; ?>
<h1 class="head1">Details</h1>
<hr>
<table class="table table-striped">
    <?php
    $query = "select * from app_users where id = '$_REQUEST[id]'";
    $r = run_sql($query);
    if($row = mysqli_fetch_array($r)){
        echo "<tr><td>Name</td><td>$row[user_name]</td></tr>";
        echo "<tr><td>Phone No</td><td>$row[phone_no]</td></tr>";
        echo "<tr><td>EMail</td><td>$row[email]</td></tr>";
        echo "<tr><td>Subjects</td><td>$row[subjects]</td></tr>";
        echo "<tr><td>Location</td><td>$row[location]</td></tr>";
        echo "<tr><td>Experience</td><td>$row[experience]</td></tr>";
        echo "<tr><td>Skills</td><td>$row[skills]</td></tr>";
        echo "<tr><td>Category</td><td>$row[cate]</td></tr>";
        echo "<tr><td>Min Batch Size</td><td>$row[min_batch_size]</td></tr>";
        echo "<tr><td>Max Batch Size</td><td>$row[max_batch_size]</td></tr>";
        echo "<tr><td>Min Fees</td><td>$row[min_fees]</td></tr>";
        echo "<tr><td>Max Fees</td><td>$row[max_fees]</td></tr>";
        echo "<tr><td>Description</td><td>$row[t_desc]</td></tr>";
    }
    ?>
</table>
<img class='img img-fluid my-3' src='upload/<?=$row[id]?>.jpg'/>
<?php
if(is_admin()){
    if($row["status"] == "rejected" || $row["status"] == "new"){
        echo "<a class='btn btn-success mx-3' href='tutor_apr.php?id=$row[id]&status=approved'>Approve</a>";
    }
    if($row["status"] == "approved" || $row["status"] == "new"){
        echo "<a class='btn btn-danger' href='tutor_apr.php?id=$row[id]&status=rejected'>Reject</a>";
    }    
}
?>
<a class="btn btn-primary my-3" href="enquiry.php?id=<?=$_REQUEST["id"]?>" >Inquiry</a>
<?php require_once './footer.php'; ?>
