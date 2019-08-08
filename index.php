<?php
include(__DIR__."/SF-PHP/classes/clsDatabase.php");
$objDatabase = new clsDatabase("localhost","root","","cis");
$var = $objDatabase->Query("SELECT * FROM users");
print_r($objDatabase->Result($var,0,"UserName"));
