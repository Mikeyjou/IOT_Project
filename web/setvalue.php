<?php session_start(); ?>
<?php

echo '<meta charset="UTF-8"/>';
 $database = mysql_connect( "140.138.152.207","frank85", "ak800730" );
 if ( !mysql_select_db( "atm", $database ) )
	die( "Could not open database!" );
 mysql_query("SET NAMES 'UTF8'");
 $time =date('Y-m-d');
 $value = $_GET['addvalue'] ;

 mysql_query("INSERT INTO iot_value (owner,value,time) VALUES(
'". $_SESSION['account']."',
'". mysql_escape_string($value)."',
'". mysql_escape_string($time)."')") 
 or die(mysql_error());
header('Location: elements.php');
?>