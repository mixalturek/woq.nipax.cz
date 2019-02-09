<?php
Header('Content-Type: text/html; charset=utf-8');
include_once 'p_func.php';

echo '<?xml version="1.0" encoding="utf-8"?>', "\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="cs" />

<title>Borsch::<?php echo $p_title;?></title>

<meta name="keywords" content="borsch, interpreter, programming, language, fel, cvut, x36pjp" />
<meta name="description" content="Brosch Interpret is simple programming language similar to PHP" />
<meta name="webmaster" content="Michal Turek; http://woq.nipax.cz/" />
<meta name="copyright" content="Copyright (c) 2007 Michal Turek" />
<meta name="robots" content="all, follow" />
<meta name="resource-type" content="document" />

<style type="text/css" media="all">@import "style.css";</style>
<link href="img/website/ico.png" rel="shortcut icon" type="image/x-icon" />
</head>

<body>

<div id="header"><a href="http://woq.nipax.cz/borsch/">Борщ интерпретатор</a></div>

<div id="menu">
<?php
MenuItem('index', 'Index');
MenuItem('language', 'Language');
MenuItem('devel', 'Devel');
MenuItem('classes', 'Classes');
MenuItem('download', 'Download');
MenuItem('todo', 'TODO');
?>
</div>

<div id="main">
