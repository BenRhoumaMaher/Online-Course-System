<?php
include('app/app.php');
include('check.php');
if($category == 'instructor'){
 header('authentification/logout.php');
}

require("views/elist.view.php");
?>