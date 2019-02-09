
<div id="usercomments">

<?php @readfile('form/'.basename($_SERVER['PHP_SELF'], '.php').'.txt'); ?>

<?php /*
<div class="comment">
<div class="cenzurovat"><a href="<?php echo "{$_SERVER['PHP_SELF']}?cenzurovat"; ?>">Cenzurovací mód</a></div>
<h3>Nový komentář</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div><input type="text" name="name" id="name" size="20" /> <label for="name">Jméno</label></div>
<div><textarea rows="8" cols="50" name="text" id="text"></textarea></div>
<div><input type="submit" name="savecomment" id="savecomment" value="Odeslat" /></div>
</form>
</div><!-- div class="comment" -->

<?php
if($_SERVER['PHP_AUTH_USER'] == D_USER && $_SERVER['PHP_AUTH_PW'] == D_PASSWD)
{
?>

<div class="comment">
<h3>Cenzura</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div><textarea rows="20" cols="80" name="text" id="text">
<?php @readfile('form/'.basename($_SERVER['PHP_SELF'], '.php').'.txt'); ?>
</textarea></div>
<div><input type="submit" name="cenzurovat" id="cenzurovat" value="Odeslat" /></div>
</form>
</div><!-- div class="comment" -->

<?php
} // if(!($_SERVER['PHP_AUTH_USER'] == ...
?>
*/ ?>

</div><!-- div class="usercomments" -->

</div><!-- div id="page" -->


<div id="sidebar">

<div id="header">
<a href="http://woq.nipax.cz/sobaka/">
<img src="img/website/logo.png" width="278" height="198" alt="logo" /><br />
чокнутая собака, красноярск<br />
Semestr na Sibiři
</a>
</div>

<?php include_once 'p_menu.php'; ?>

<div class="group" style="margin-top: 3em;">
<div>
<form action="p_fulltext.php" method="post" onsubmit="if(!this.najit.value || this.najit.value=='výraz ...') { alert('Byl zadán prázdný řetězec!'); this.najit.focus(); return false; }"><p>
<input type="text" name="najit" size="12" value="výraz ..." onclick="if(this.value=='výraz ...')this.value=''" /> <input type="submit" value="Najít" />
</p></form>
</div>
</div>

</div><!-- div id="sidebar" -->


<div id="copyright">
Copyright &copy; 2009 Михал Турек <?php Blank('http://woq.nipax.cz/'); ?>
</div>

</body>
</html>
