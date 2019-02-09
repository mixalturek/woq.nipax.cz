<?php
function Email($m)// Proti spamu
{
	// $m = str_replace("@", '&#64;', $m);
	$m = str_replace("@", ' (zavináč) ', $m);
	echo '<span class="m">&lt;', $m, '&gt;</span>';
}

function Img($adr, $alt)// Vloží obrázek
{
	if(file_exists($adr))// Pouze pokud existuje
	{
		$adr_big = str_replace("_sm", '', $adr);// Umaže '_sm' (small) z adresy
		$img = getimagesize($adr);// Velikost obrázku

		if($adr != $adr_big && file_exists($adr_big))// S odkazem na velký
			echo "<div class=\"img\"><a href=\"$adr_big\"><img src=\"$adr\" $img[3] alt=\"\" /><br />$alt</a></div>\n";
		else// Bez odkazu
			echo "<div class=\"img\"><img src=\"$adr\" $img[3] alt=\"\" /><br />$alt</div>\n";
	}
	else
	{
		echo $err_message = Date("d.m.Y - H:i:s - ").__FILE__." - line ".__LINE__."\t\t\t - $adr DOES NOT EXIST!\n\n<br />";
	}
}

function Web($adr, $text, $roll = '')// Odkaz na web
{
	if(file_exists($adr.'.php'))
		echo "<a href=\"$adr.php$roll\">$text</a>";
	else
		echo "<span class=\"invalid_link\">$text</span>";
}

function Blank($adr, $text = '')// Odkaz na cizí stránky
{
	if($text)// Text byl předaný
		echo "<a href=\"$adr\" class=\"blank\" title=\"$adr\">$text</a>";
	else
		echo "<a href=\"$adr\" class=\"blank\">$adr</a>";
}

function Down($adr)// Odkaz na download
{
	if(file_exists($adr))
	{
		$size = filesize($adr);// Velikost souboru v B

		if(strlen($size) > 6)// MB
			printf("<a href=\"$adr\" class=\"down\">%0.1f MB</a>", $size / 1048576);
		else if(strlen($size) > 3)// kB
			printf("<a href=\"$adr\" class=\"down\">%0.1f kB</a>", $size / 1024);
		else// B
			printf("<a href=\"$adr\" class=\"down\">%d B</a>", $size);
	}
	else
	{
		$err_message = Date("d.m.Y - H:i:s - ").__FILE__." - line ".__LINE__."\t\t\t - $adr DOES NOT EXIST!\n\n";
		@error_log($err_message, 3, ERRORLOGFILE);
	}
}

function WarnIE()
{
?>
<!--[if IE ]>
<p class="todo">Pokud Vám připadá, že je tato stránka zobrazená nějak podivně, tak zkuste prohlížeč, který dodržuje webové standardy o něco více, než ten Váš (např. <?php Blank('http://www.opera.com/', 'Opera'); ?>, <?php Blank('http://www.mozilla.com/firefox/', 'Firefox'); ?>).</p>
<![endif]-->
<?php
}


?>