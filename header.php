<?php
ob_start();

function e_hand($eno, $emsg) {    
}
set_error_handler("e_hand");

session_start();

date_default_timezone_set("asia/kolkata");
$today = date("Y-m-d");
?>
<link rel="stylesheet" href="vender/bs/css/bootstrap.min.css">
<script src="vender/jquery-3.3.1.min.js"></script>
<script src="vender/popper.min.js"></script>
<script src="vender/bs/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="vender/jqui/jquery-ui.min.css">
<script src="vender/jqui/jquery-ui.min.js"></script>
<script src="vender/jquery.validate.min.js"></script>
<link rel="stylesheet" href="vender/fa/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<?php require_once 'include/const.php'; ?>
<?php require_once 'include/db.php'; ?>
<?php require_once 'include/my_mail.php'; ?>
<?php require_once 'include/myfun.php'; ?>

<div class="banner1">
    
            <nav class="navbar navbar-expand-sm bg-transparent navbar-dark">
                    <a class="navbar-brand text-white">RaipurTutor</a>                  
                    <!-- <a class="navbar-brand text-white"><img src="images/c1.jpg" style="width: 60px"/></a>                   -->
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#n1"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="n1">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>            
                                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>            
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>            
                                <?php
                                if(is_admin()){
                                    echo "<li class='nav-item'><a class='nav-link' href='tutor_list.php'>New Tutors</a></li>";
                                }
                                if(is_login()){
                                    echo "<li class='nav-item'><a class='nav-link' href='enquiry_list.php'>Enquiry</a></li>";
                                    echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
                                }
                                else {
                                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";                                    
                                }
                                ?>
                              
                            </ul>                  
                    </div>
    </nav>
    
    
</div>

<div class="container-fluid p-5" >    
