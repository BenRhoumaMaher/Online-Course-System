<?php
include('check.php');
$course = 0;
if(isset($_REQUEST['cid'])){
 $course = $_REQUEST['cid'];
}

require("views/reports.view.php");
?>