<?
Header('Content-Type: text/html; charset=utf-8');// Kódování znaků

include_once 'p_config.php';// Konfigurace
include_once 'p_func.php';// Pomocné funkce

echo '<?xml version="1.0" encoding="utf-8"?>', "\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="CS">

<head>
<meta http-equiv="content-type" content="text/html; utf-8" />
<meta http-equiv="content-language" content="cs" />

<title><?echo $p_title;?> - Michal Turek</title>

<meta name="description" content="Michal Turek - Osobní web" />
<meta name="robots" content="all, follow" />
<meta name="resource-type" content="document" />

<style type="text/css" media="all">@import "style.css";</style>
<style type="text/css" media="print">@import "print.css";</style>
<link href="img/p_ico.png" rel="shortcut icon" type="image/x-icon" />
</head>

<body>

<div id="main">

<div id="banner">
<div><a href="http://woq.nipax.cz/">Michal Turek - Osobní web</a></div>
</div>

<h1><?echo $p_title;?></h1>

