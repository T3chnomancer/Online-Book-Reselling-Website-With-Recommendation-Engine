<?php
date_default_timezone_set("Asia/Kolkata");
$link=mysql_connect("localhost","root") or die("Could not connect".mysql_error());
mysql_select_db("bookshop")or die("Could not connect: ". mysql_error());

$Rdate=date('d-M-Y h:i:s');
?>