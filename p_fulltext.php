<?
include_once 'p_config.php';// Konfigurace

$message = Date('d.m.Y - H:i:s')." - '{$_POST['najit']}'\n";
error_log($message, 3, FULLTEXTLOGFILE);// Uloží do logů

Header("Location: http://www.google.com/search?q=site:woq.nipax.cz {$_POST['najit']}&ie=ISO-8859-2");
exit;
?>
