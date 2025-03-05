<?php
require_once './header.php';
check_admin();
$query = "update app_users set status = '$_REQUEST[status]' where id = $_REQUEST[id]";
$r = run_sql($query);
redirect("tutor_list.php?msg=1");

require_once './footer.php';

?>
