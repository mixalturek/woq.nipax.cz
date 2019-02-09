<?
if(isset($_POST['send']))// Formulář byl odeslán
{
	$name = stripslashes(trim($_POST['name']));
	$email = stripslashes(trim($_POST['email']));
	$subject = stripslashes(trim($_POST['subject']));
	$text = stripslashes(trim($_POST['text']));

	$headers = '';// Vynulování

	if(strlen($_POST['name']) > 0)// Jméno
	{
		if(strlen($_POST['email']) > 1)// Email, 1 kvůli '@'
		{
			$headers .= "From: {$_POST['name']} <{$_POST['email']}>\r\n";
		}
		else// Bez emailu
		{
			$headers .= "From: {$_POST['name']}\r\n";
		}
	}
	else// Bez jména
	{
		if(strlen($_POST['email']) > 1)// Email, 1 kvůli '@'
		{
			$headers .= "From: {$_POST['email']}\r\n";
		}
	}

	$headers .= 'X-Mailer: PHP/'.phpversion()."\r\n";// Mailový klient
	$headers .= 'Content-Type: text/plain; charset=iso-8859-2';// Mime typ (kvůli kódování znaků)

	if(!headers_sent())// Uložení "konstantních" informací o uživateli do cookies (platnost měsíc)
	{
		if(strlen($_POST['name']) > 0)
		{
			setcookie('name', $_POST['name'], time()+3600*24*30);
		}

		if(strlen($_POST['email']) > 1)
		{
			setcookie('email', $_POST['email'], time()+3600*24*30);
		}
	}
	else
	{
		$err_message = Date('d.m.Y - H:i:s - ').__FILE__." - line ".__LINE__."\t\t\t - HEADERS ALREADY SENT!\n\n";
		@error_log($err_message, 3, ERRORLOGFILE);
	}

	$p_title = 'Kontakt';
	include 'p_begin.php';

	if(mail('WOQ@seznam.cz', 'Woq kontakt: '.$_POST['subject'], $_POST['text'], $headers))// Úspěšné odeslání
	{
		echo "<div class=\"warning\">Email byl úšpěšně odeslán...</div>\n";
	}
	else
	{
		$err_message = Date("d.m.Y - H:i:s - ").__FILE__." - line ".__LINE__."\t\t\t - UNABLE TO SEND EMAIL!\n";
		$err_message .= "\tName: {$_POST['name']}\n";
		$err_message .= "\tEmail: {$_POST['email']}\n";
		$err_message .= "\tSubject: {$_POST['subject']}\n";
		$err_message .= "\tText: {$_POST['text']}\n\n";
		@error_log($err_message, 3, ERRORLOGFILE);

		echo '<div class="warning">Webový server má technické problémy. Prosím, použijte svůj emailový účet a pošlete zprávu zadanou do formuláře (výpis níže) na adresu ';
		Email('WOQ@seznam.cz');
		echo ". Děkujeme za pochopení.</div>\n";

		echo "<div class=\"object\">\n";
		echo "<div class=\"name\">{$_POST['name']}</div>\n";
		echo '<div class="email">'; Email($_POST['email']); echo "</div>\n";
		echo "<div class=\"subject\">{$_POST['subject']}</div>\n";
		echo '<div class="descript">'.nl2br(htmlspecialchars($_POST['text']))."</div>\n";
		echo "</div>\n\n";
	}
}
else// Nebyl odeslán formulář
{
	$p_title = 'Napsat';
	include 'p_begin.php';
?>

<form action="<?echo $_SERVER['PHP_SELF'];?>" method="post">


<div><input type="text" id="name" name="name" value="<?echo (isset($_COOKIE['name'])) ? $_COOKIE['name'] : '';?>" size="10" /> Jméno</div>
<div><input type="text" id="email" name="email" value="<?echo (isset($_COOKIE['email'])) ? $_COOKIE['email'] : '@';?>" size="10" /> Email</div>
<div><input type="text" id="subject" name="subject" size="10" /> Předmět</div>

<div><textarea id="text" name="text" rows="8" cols="40"></textarea></div>
<div><input type="submit" id="send" name="send" value="Odeslat" /> <input type="reset" value="Reset" /></div>

</form>

<p>Pozn.: Pokud neuvedete svůj email, nebudu vám schopen odpovědět!</p>

<?
}// else

include 'p_end.php';
?>
