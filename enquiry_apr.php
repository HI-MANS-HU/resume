<?php

require_once './header.php';

check_login();
$query = "update enquiry set status = '$_REQUEST[status]' where id = $_REQUEST[id]";
$r = run_sql($query);
redirect("enquiry_list.php?msg=1");

require_once './footer.php';

?>
