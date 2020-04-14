<?php
rename(dirname(__FILE__)."/uploads/".$_GET['file'],dirname(__FILE__)."/rejected/".$_GET['file']);
include("attestfile.php");
?>