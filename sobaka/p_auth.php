<?php
/*
if($_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != '147.32.114.184')
{
	echo 'Ksic!';
	exit();
}
*/

define('D_USER', 'woq');
define('D_PASSWD', 'porn.bat');

if(isset($_GET['cenzurovat']) && !($_SERVER['PHP_AUTH_USER'] == D_USER && $_SERVER['PHP_AUTH_PW'] == D_PASSWD))
{
	header('Content-Type: text/html; charset=utf-8');
	header('WWW-Authenticate: Basic realm="Prihlaste se, prosim"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'Кшиц!';
	exit;
}
?>
