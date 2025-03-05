<?php require_once './header.php'; ?>
<?php
if(isset($_POST["uname"])){
    $msg = "Name :: $_POST[uname]<br>";
    $msg = $msg . "Phone No :: $_POST[pn]<br>";
    $msg = $msg . "Message :: $_POST[msg]<br>";
    mail_it(ADMIN_EMAIL, "New Contact", $msg, null);
    redirect("index.php?msg=7");
}
?>
    <div class="row">
        <div class="col-sm-12">   
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3716.875041110396!2d81.70429564952835!3d21.315953383220382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28e86236b0644f%3A0xde997fa359b3b929!2sColumbia+Institute+of+Engineering+%26+Technology!5e0!3m2!1sen!2sin!4v1530795795197"  frameborder="0" style="border:0" allowfullscreen></iframe>
            <!--<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14875.552042957932!2d81.644062!3d21.236289!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf1a753bfdb3d4773!2sPrem+Palace!5e0!3m2!1sen!2sin!4v1529928008665"  frameborder="0" style="border:0" allowfullscreen></iframe>-->
        </div>
        </div>
    </div>
<div class="text-center my-3">
</div>
<form method="post">
                <input class="form-control" type="text" name="uname" placeholder="Name" /><br>
                <input class="form-control" type="text" name="pn" placeholder="Phone No" /><br>
                <textarea class="form-control" rows="4" name="msg" placeholder="Message"></textarea><br>
                <input class="form-control btn btn-dark btn-block" type="submit"/>                
                </form>

<?php require_once './footer.php'; ?>
