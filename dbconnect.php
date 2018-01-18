
<?php
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass','');
define('dbname', 'login');

$connction=mysql_connect(dbhost,dbuser,dbpass);
$dbconncetion=mysql_select_db(dbname);
if(!$connction){
	die("connection failed: ".mysql_error());
}
if(!$dbconncetion){
	die("database connection failed: ".mysql_error());
}

?>