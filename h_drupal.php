<?
$p_title = 'HOWTO - Drupal';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Přihlašovací údaje k databázi</div>
<pre>
sites/default/settings.php
$db_url = 'mysql://login:password@server/database';
</pre>
</div>


<div class="object">
<div class="name">Reset administrátorského hesla</div>
<pre>
&lt;?php echo md5('new password'); ?&gt;
UPDATE `drupal6`.`users` SET `pass` = 'hash' WHERE `users`.`uid`=1 LIMIT 1 ;
</pre>
</div>


<div class="object">
<div class="name">Nastavení cronu</div>
<pre>
[woq@woq ~]# crontab -e

# m h  dom mon dow   command
0 * * * * wget -O - -q -t 1 http://website/cron.php

nebo modul poormanscron
</pre>
</div>


<div class="object">
<div class="name">Čistá URL</div>
<pre>
Standardní formát adres v Drupalu
<i>http://woq.sh.cvut.cz/~woq/isc.cvut.cz/?q=en/node/25</i>

Administer - Site building - Modules - Path (zapnout)
Administer - Site building - Modules - URLify (aut. předvyplnění podle titulku)
Administer - Site building - Modules - Pathauto (aut. předvyplnění podle titulku)
Administer - User management - Permissions (nastavit oprávnění modulům)

Some article - Edit - URL path settings (nastavit nové jméno)
<i>http://woq.sh.cvut.cz/~woq/isc.cvut.cz/?q=en/trips</i>

[root@woq ~]# a2enmod rewrite
[root@woq ~]# /etc/init.d/apache2 restart

[woq@woq isc.cvut.cz]$ cat .htaccess
&lt;IfModule mod_rewrite.c&gt;
  RewriteEngine on

  # Update this
  # http://woq.sh.cvut.cz/~woq/isc.cvut.cz/
  RewriteBase /~woq/isc.cvut.cz

  # Rewrite URLs of the form 'x' to the form 'index.php?q=x'.
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_URI} !=/favicon.ico
  RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
&lt;/IfModule&gt;

Administer - Site configuration - Clean URLs (zapnout)
<i>http://woq.sh.cvut.cz/~woq/isc.cvut.cz/en/trips</i>
</pre>
</div>


<div class="object">
<div class="name">Jazykové verze webu, lokalizace</div>
<pre>
Administer - Site configuration - Languages (výběr jazyků)
Administer - Site building - Translate interface - Search (překlad řetězců)

Velikost ikon (obrázky jsou 18x12)
Administer - Site configuration - Languages - Configure - Icons - Image Size
</pre>
</div>


<div class="object">
<div class="name">Ikona webu</div>
<pre>
misc/favicon.ico
Administer - Site building - Themes - Configure - Shortcut icon settings

Konverze obrázku na .ico
<?php Blank('http://www.chami.com/html-kit/services/favicon/', ''); ?>
</pre>
</div>


<div class="object">
<div class="name">Titulní stránka</div>
<pre>
Administer - Site configuration - Site information
Standardně se používá <em>node</em>
</pre>
</div>


<div class="object">
<div class="name">Layout webu</div>
<pre>
Administer - Site building - Blocks
</pre>
</div>


<div class="object">
<div class="name">Časová zóna</div>
<pre>
Administer - Site configuration - Date and time
</pre>
</div>


<div class="object">
<div class="name">FCK Editor</div>
<pre>
sites/all/modules/fckeditor/fckeditor/fckconfig.js

FCKConfig.ProcessHTMLEntities	= false ;
FCKConfig.IncludeLatinEntities	= false ;
FCKConfig.IncludeGreekEntities	= false ;
FCKConfig.ProcessNumericEntities = false ;
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
