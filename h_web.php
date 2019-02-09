<?
$p_title = 'HOWTO - Web';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Prohlížeč Telnet :-)</div>
<pre>
$ telnet www.server.cz 80
GET index.html HTTP/1.0
</pre>
</div>


<div class="object">
<div class="name">Podmínky v HTML</div>
<pre>
&lt;!--[if IE ]&gt;
&lt;div style="text-align: center;"&gt;
&lt;a href="http://firefox.czilla.cz/"&gt;
&lt;img alt="Mozilla Firefox: Objevte znovu web"
	title="Mozilla Firefox: Objevte znovu web"
	style="border:none; width:468px; height:60px;"
	src="http://firefox.czilla.cz/img/p/cz-ff-468x60-w-objevte.png" /&gt;
&lt;/a&gt;
&lt;/div&gt;
&lt;![endif]--&gt;
</pre>
<?php Blank('http://firefox.czilla.cz/propagace/');?>
</div>


<div class="object">
<div class="name">Prototyp XHTML 1.0 stránky</div>
<pre>
&lt;?xml version=&quot;1.0&quot; encoding=&quot;iso-8859-2&quot;?&gt;
&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Strict//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd&quot;&gt;

&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot; xml:lang=&quot;cs&quot; lang=&quot;CS&quot;&gt;

&lt;head&gt;
&lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=iso-8859-2&quot; /&gt;
&lt;meta http-equiv=&quot;content-language&quot; content=&quot;cs&quot; /&gt;

&lt;title&gt;Index&lt;/title&gt;

&lt;meta name=&quot;keywords&quot; content=&quot;&quot; /&gt;
&lt;meta name=&quot;description&quot; content=&quot;&quot; /&gt;
&lt;meta name=&quot;author&quot; content=&quot;all: Michal Turek; WOQ (zavináč) seznam.cz&quot; /&gt;
&lt;meta name=&quot;copyright&quot; content=&quot;Copyright (c) 2006 Michal Turek&quot; /&gt;
&lt;meta name=&quot;robots&quot; content=&quot;all, follow&quot; /&gt;
&lt;meta name=&quot;resource-type&quot; content=&quot;document&quot; /&gt;

&lt;style type=&quot;text/css&quot; media=&quot;all&quot;&gt;@import &quot;style.css&quot;;&lt;/style&gt;
&lt;style type=&quot;text/css&quot; media=&quot;print&quot;&gt;@import &quot;print.css&quot;;&lt;/style&gt;
&lt;link href=&quot;img/p_ico.png&quot; rel=&quot;shortcut icon&quot; type=&quot;image/x-icon&quot; /&gt;
&lt;/head&gt;

&lt;body&gt;

&lt;!--[if IE ]&gt;
&lt;div style=&quot;text-align: center&quot;&gt;
&lt;a href=&quot;http://firefox.czilla.cz/&quot;&gt;&lt;img alt=&quot;Mozilla Firefox: Objevte znovu web&quot; title=&quot;Mozilla Firefox: Objevte znovu web&quot; style=&quot;border:none; width:468px; height:60px;&quot; src=&quot;http://firefox.czilla.cz/img/p/cz-ff-468x60-w-objevte.png&quot; /&gt;&lt;/a&gt;
&lt;/div&gt;
&lt;![endif]--&gt;

&lt;/body&gt;
&lt;/html&gt;
</pre>
</div>


<div class="object">
<div class="name">PHP: Datum a čas</div>
<pre>
// YYYY-MM-DD HH-MM-SS
$date = date('Y-m-d H:i:s');
</pre>
</div>


<div class="object">
<div class="name">PHP: Výpis pole</div>
<pre>
print_r($pole);

echo '&lt;pre&gt;';
print_r($_SERVER);
echo '&lt;/pre&gt;';
</pre>
</div>


<div class="object">
<div class="name">PHP: Rychlý výpis MySQL tabulky</div>
<pre>
function mysql_print_query($query)
{
	$result = mysql_query($query)
		OR die('&lt;div class=&quot;warn&quot;&gt;Error in MySQL query.&lt;/div&gt;');

	if(mysql_num_rows($result) &gt; 0)
	{
		$num_columns = mysql_num_fields($result);

		echo &quot;&lt;table&gt;\n&lt;tr&gt;\n&quot;;
		for($i = 0; $i &lt; $num_columns; $i++)
			echo '&lt;th&gt;'.mysql_field_name($result, $i).&quot;&lt;/th&gt;&quot;;
		echo &quot;&lt;/tr&gt;\n\n&quot;;

		while($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			echo &quot;&lt;tr&gt;&quot;;
			for($i = 0; $i &lt; $num_columns; $i++)
				echo &quot;&lt;td&gt;{$row[$i]}&lt;/td&gt;&quot;;
			echo &quot;&lt;/tr&gt;\n&quot;;
		}

		echo &quot;&lt;/table&gt;\n\n&quot;;
	}
	else
	{
		echo &quot;&lt;p&gt;Dotaz vrátil prázdný výsledek.&lt;/p&gt;&quot;;
	}

	mysql_free_result($result);
}


function mysql_get_val($query)
{
	$result = mysql_query($query) OR die('&lt;div class=&quot;warn&quot;&gt;Error in MySQL query.&lt;/div&gt;');
	$row = mysql_fetch_array($result, MYSQL_NUM);
	return $row[0];
}
</pre>
</div>


<div class="object">
<div class="name">PHP: Prototyp MySQL dotazu</div>
<pre>
// Jeden řádek
$query = &quot;SELECT count(*) FROM tabulka&quot;;
$result = mysql_query($query);
$row = mysql_fetch_array($result);

// Více řádků
$query = &quot;SELECT * FROM tabulka&quot;;
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{

}
</pre>
</div>


<div class="object">
<div class="name">CSS: margin</div>
<pre>
element { margin: top right bottom left; }
</pre>
</div>


<div class="object">
<div class="name">Přesměrování</div>
<pre>
&lt;?php
header("HTTP/1.1 301 Moved Permanently");
Header('Location: http://www.stranka.cz/');
exit();

// Sám na sebe
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}");
exit();

// Na jinou stránku se stejným umístěním
header("Location: http://{$_SERVER['HTTP_HOST']}".dirname($_SERVER['PHP_SELF']).'/login.php');
exit();
?&gt;
</pre>
</div>


<div class="object">
<div class="name">PHP</div>
<pre>
include $_SERVER['DOCUMENT_ROOT'].'/inc.php';

php.ini
error_reporting = E_ALL | E_STRICT
</pre>
</div>


<div class="object">
<div class="name">CSS pseudotřídy</div>
<pre>
:hover
:before
:after
:focused	označení tabulátorem, fokus prvku ve formuláři
:link		nenavštívený odkaz
:active		klik na odkaz, stisknuté tlačítko
:visited	navštívený odkaz
:first-child	první prvek
:first-line	první řádek
:first-letter	první znak
</pre>
</div>


<div class="object">
<div class="name">CSS: Následující element</div>
<pre>
/* První odstavec po nadpisu */
h1 + p { ... }
</pre>
</div>


<div class="object">
<div class="name">CSS: Více stylů pro jeden element</div>
<pre>
&lt;div style="první_styl druhý_styl"&gt;text&lt;/div&gt;
</pre>
</div>


<div class="object">
<div class="name">CSS: Vertikální zarovnání obrázku na řádku</div>
<pre>
img { vertical-align: middle; }
</pre>
</div>


<div class="object">
<div class="name">CSS: Obecný selektor</div>
<pre>
* { padding: 0px; margin: 0px; }
</pre>
</div>


<div class="object">
<div class="name">Zarovnání formulářových prvků</div>
<pre>
input, select { vertical-align: middle; }
label { width: 120px; float: left; display: block; }

&lt;label for="jmeno"&gt;Jméno:&lt;/label&gt; &lt;input id="jméno" /&gt;
</pre>
</div>


<div class="object">
<div class="name">Promazání spamů z fóra</div>
<pre>
# Víc než tři odkazy a určité stáří příspěvku
DELETE FROM `vzkazy` WHERE text REGEXP '(.*http://){3,}' AND cas &gt;= 1136941129
</pre>
</div>


<div class="object">
<div class="name">Zvýraznění elementů s title atributem</div>
<pre>
&lt;span title="Nějaký popisek k textu"&gt;text&lt;/span&gt;

span[title] { border-bottom: 1px dashed yellow; }
</pre>
</div>


<div class="object">
<div class="name">CSS selectors</div>

<table>
<tr>
<th>Pattern</th>
<th>Meaning</th>
</tr>

<tr>
<td>*</td>
<td>Matches any element.</td>
</tr>

<tr>
<td>E</td>
<td>Matches any E element (i.e., an element of type E).</td>
</tr>

<tr>
<td>E F</td>
<td>Matches any F element that is a descendant of an E element.</td>
</tr>

<tr>
<td>E &gt; F</td>
<td>Matches any F element that is a child of an element E.</td>
</tr>

<tr>
<td>E:first-child</td>
<td>Matches element E when E is the first child of its parent.</td>
</tr>

<tr>
<td>E:link<br />E:visited</td>
<td>Matches element E if E is the source anchor of a hyperlink of which the target is not yet visited (:link) or already visited (:visited).</td>
</tr>

<tr>
<td>E:active<br />E:hover<br />E:focus</td>
<td>Matches E during certain user actions.</td>
</tr>

<tr>
<td>E:lang(c)</td>
<td>Matches element of type E if it is in (human) language c (the document language specifies how language is determined).</td>
</tr>

<tr>
<td>E + F</td>
<td>Matches any F element immediately preceded by an element E.</td>
</tr>

<tr>
<td>E[foo]</td>
<td>Matches any E element with the "foo" attribute set (whatever the value).</td>
</tr>

<tr>
<td>E[foo="warning"]</td>
<td>Matches any E element whose "foo" attribute value is exactly equal to "warning".</td>
</tr>

<tr>
<td>E[foo~="warning"]</td>
<td>Matches any E element whose "foo" attribute value is a list of space-separated  values, one of which is exactly equal to "warning".</td>
</tr>

<tr>
<td>E[lang|="en"]</td>
<td>Matches any E element whose "lang" attribute has a hyphen-separated list of values beginning (from the left) with "en".</td>
</tr>

<tr>
<td>DIV.warning</td>
<td><em>HTML only</em>. The same as DIV[class~="warning"].</td>
</tr>

<tr>
<td>E#myid</td>
<td>Matches any E element ID equal to "myid".</td>
</tr>

</table>
<?php Blank('http://www.w3.org/TR/CSS2/selector.html');?>

</div>


<div class="object">
<div class="name">Předmět emailu, kódování znaků</div>
<pre>
$clearsubject = "něco ěščřžýáíé";
$encodedsubject = base64_encode($clearsubject);
$subject = "=?iso-8859-2?B?$encodedsubject?=";

<?php Blank('http://www.abclinuxu.cz/poradna/programovani/show/109707');?>
</pre>
</div>


<div class="object">
<div class="name">Sitemap generátor</div>
<pre>
<?php Blank('http://www.xml-sitemaps.com/');?>
</pre>
</div>


<div class="object">
<div class="name">Konverze webové stránky do PDF</div>
<pre>
<?php Blank('http://web2pdfconvert.com/');?>
</pre>
</div>


<div class="object">
<div class="name">Šablona na emaily</div>
<pre>
// $replaces = array('search' =&gt; 'replacement', ...);
function sendEmail($from, $to, $subject, $pathTemplate, $replaces = array())
{
	$headers  = "Return-Path: $from\n";
	$headers .= "From: $from\n";
	$headers .= "Reply-To: $from\n";
	$headers .= "Content-Type: text/plain; charset=utf-8\n";
	$headers .= "Content-Transfer-Encoding: 8bit\n";

	$subject64 = '=?utf-8?B?'.base64_encode($subject).'?=';

	$message = file_get_contents($pathTemplate) or die("Email template does not exist: $pathBody");

	foreach ($replaces as $search =&gt; $replacement) {
		$message = str_replace($search, $replacement, $message);
	}

	// DEBUG
	// echo str_replace("\n", "&lt;br /&gt;", "&lt;hr /&gt;To: $to\nSubject: $subject\n$headers\n$message&lt;hr /&gt;");

	mail($to, $subject64, $message, $headers) or die("Email sending failed: $to");
}
</pre>
</div>


<!--
<div class="object">
<div class="name"></div>
<pre>

</pre>
</div>
-->


<?
include 'p_end.php';
?>
