<?php
// Against spam
function Email($m)
{
	$m = str_replace('@', ' (zavináč) ', $m);
	echo "<span class=\"m\">&lt;$m&gt;</span>";
}

// Insert image
function Img($path, $alt)
{
	if(file_exists($path))
	{
		$path_big = str_replace("_sm", '', $path);
		$img = getimagesize($path);

		if($path != $path_big && file_exists($path_big))// With link to bigger
		{
			echo "<div class=\"img\"><a href=\"$path_big\"><img src=\"$path\" $img[3] alt=\"\" /><br />$alt</a></div>\n";
		}
		else
		{
			echo "<div class=\"img\"><img src=\"$path\" $img[3] alt=\"\" /><br />$alt</div>\n";
		}
	}
	else
		echo "<div>картинки нет</div>";
}

// Link to web
function Web($addr, $text, $roll = '')
{
	if(file_exists($addr.'.php'))
		if(isset($_GET['offline']))
			echo "<a href=\"$addr.htm$roll\">$text</a>";
		else
			echo "<a href=\"$addr.php$roll\">$text</a>";
	else
		echo "<span class=\"invalid_link\">$text</span>";
}

// Link to foreign website
function Blank($addr, $text = '')
{
	if($text)
		echo "<a href=\"$addr\" class=\"blank\" title=\"$addr\">$text</a>";
	else
		echo "<a href=\"$addr\" class=\"blank\">$addr</a>";
}

// Link for download file
function Down($path)
{
	if(file_exists($path))
	{
		$size = filesize($path);

		if(strlen($size) > 6)// MB
			printf("<a href=\"$path\" class=\"down\">%0.1f MB</a>", $size / 1048576);
		else if(strlen($size) > 3)// kB
			printf("<a href=\"$path\" class=\"down\">%0.1f kB</a>", $size / 1024);
		else// B
			echo "<a href=\"$path\" class=\"down\">$size B</a>";
	}
}

function MenuItem($addr, $text)
{
	echo (basename($_SERVER['PHP_SELF']) == "$addr.php")
		? "<a class=\"active\">$text</a>" : Web($addr, $text);

//	Web($addr, $text);
}

function mysql_get_val($query)
{
	$result = mysql_query($query) OR die('<div class="warn">'.mysql_error().'</div>');
	$row = mysql_fetch_array($result, MYSQL_NUM);
	return $row[0];
}


function Trans($azb, $trans, $cz)
{
//	echo "(<span class=\"azb\">$azb</span>|<span class=\"trans\">$trans</span>|<span class=\"cz\">$cz</span>)";
	echo "<span lang=\"ru\" xml:lang=\"ru\" title=\"$trans # $cz\">$azb</span>";
}

//////////////////////////////////////////////////////////////////////////

function Validate($value)
{
	if(get_magic_quotes_gpc())
		$value = stripslashes($value);

	return nl2br(htmlspecialchars(trim($value)));
}

function SaveComment()
{
/*
	if(isset($_POST['name']) && isset($_POST['text']) && isset($_POST['savecomment']))
	{
		foreach ($_POST as $key => $value)
			$INPUT_DATA[$key] = Validate($value);

		$filename = 'form/'.basename($_SERVER['PHP_SELF'], '.php').'.txt';
		$fw = fopen($filename, 'a');
		fwrite($fw, "<div class=\"comment\">\n");
		fwrite($fw, "<div class=\"datetime\">".date(DATE_RFC822)."</div>\n");
		fwrite($fw, "<h3>{$INPUT_DATA['name']}</h3>\n");
		fwrite($fw, "<p>{$INPUT_DATA['text']}</p>\n");
		fwrite($fw, "</div><!-- div class=\"comment\" -->\n\n");
		fclose($fw);

		header("Location: http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}#usercomments");
		exit();
	}
	else if(isset($_POST['text']) && isset($_POST['cenzurovat']))
	{
		// The HTML code is needed here!
		// $_POST['text'] = Validate($_POST['text']);
		if(get_magic_quotes_gpc())
			$_POST['text'] = stripslashes($_POST['text']);

		$filename = 'form/'.basename($_SERVER['PHP_SELF'], '.php').'.txt';
		$fw = fopen($filename, 'w');
		fwrite($fw, $_POST['text']);
		fclose($fw);

		header("Location: http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}#usercomments");
		exit();
	}
*/
}
?>