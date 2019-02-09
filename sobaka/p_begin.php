<?php
Header('Content-Type: text/html; charset=utf-8');
include_once 'p_func.php';
include 'p_auth.php';

SaveComment();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="cs" />

<title><?php echo $p_title;?></title>

<meta name="description" content="Zážitky z půlročního studia v Krasnojarsku" />
<meta name="webmaster" content="Michal Turek; http://woq.nipax.cz/" />
<meta name="copyright" content="Copyright (c) 2009 Michal Turek" />
<meta name="robots" content="all, follow" />
<meta name="resource-type" content="document" />

<style type="text/css" media="all">@import "style.css";</style>
<style type="text/css" media="print">@import "print.css";</style>

<link href="img/website/ico.png" rel="shortcut icon" type="image/x-icon" />
<link rel="alternate" title="RSS" href="rss.xml" type="application/rss+xml" />
</head>

<body>


<div id="page">

<h1><?php echo $p_title;?></h1>
