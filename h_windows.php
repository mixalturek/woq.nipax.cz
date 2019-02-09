<?
$p_title = 'HOWTO - MS Windows';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Přepínač pracovních ploch</div>
<pre>
<?php Blank('http://virtuawin.sourceforge.net/'); ?>

<?php Blank('http://www.microsoft.com/windowsxp/downloads/powertoys/xppowertoys.mspx'); ?>
</pre>
</div>


<div class="object">
<div class="name">Vypnutí modré přihlašovací obrazovky při startu</div>
<pre>
Ovládací panely
Uživatelské účty
Změnit způsob přihlašování a odhlašování uživatelů
Používat úvodní obrazovku
</pre>
</div>


<div class="object">
<div class="name">Přetahování aplikací v taskbaru</div>
<pre>
<?php Blank('http://www.freewebs.com/nerdcave/taskbarshuffle.htm'); ?>
</pre>
</div>


<div class="object">
<div class="name">Minimalizace aplikace do traye</div>
<pre>
TryTask
<?php Blank('http://www.trvx.net/'); ?>
</pre>
</div>


<div class="object">
<div class="name">Detailní zobrazení procesů (ps)</div>
<pre>
Process Explorer
</pre>
</div>


<div class="object">
<div class="name">Automatické vypnutí počítače</div>
<pre>
shutdown -f -s -t &lt;čas v sekundách&gt;
</pre>
</div>


<div class="object">
<div class="name">Spuštění pod jiným uživatelem (sudo)</div>
<pre>
runas /env /user:&lt;username&gt; "perl procesy.pl"
</pre>
</div>


<div class="object">
<div class="name">Zabití stromu procesů</div>
<pre>
taskkill /PID &lt;pid&gt; /T
</pre>
</div>


<div class="object">
<div class="name">Administrátorský přístup k disku</div>
<pre>
\\server\c$
</pre>
</div>


<div class="object">
<div class="name">Změna MAC adresy</div>
<pre>
Síťová připojení
Vlastnosti
Konfigurovat
Upřesnit
LocallyAdministered Address
</pre>
</div>


<div class="object">
<div class="name">Zobrazování přípon souborů</div>
<pre>
Windows Explorer
Tools
Folder options
View
Hide extensions for known file types
</pre>
</div>


<div class="object">
<div class="name">Odstranění souboru pro hibernaci</div>
<pre>
c:\hyberfil.sys
Control Panel
Power Options
Hibernate
Enable Hibernation
</pre>
</div>


<div class="object">
<div class="name">Ostranění souboru pro swap</div>
<pre>
c:\pagefile.sys
My computer
Properties
Advanced
Performance
Advanced
Virtual Memory
</pre>
</div>


<div class="object">
<div class="name">Namountování ext2/ext3 ve Windows</div>
<pre>
<?php Blank('http://www.root.cz/clanky/jak-pripojit-ext2-ext3-a-reiserfs-do-windows/'); ?>
</pre>
</div>


<div class="object">
<div class="name">Jazyk pro neunicode aplikace</div>
<pre>
Ovládací panely
Místní a jazykové nastavení
Upřesnit
Jazyk pro programy nepodporující kód unicode
</pre>

Ale dělá to <em>nepořádek</em> v systému! Např. se změní název adresáře "Data aplikací" v Document and Settings na nějaký <em>nepořádek</em> a kvůli tomu zmizí všechna nastavení VPN, protože systém nemůže číst ze souboru (Chyba 624). Prostě Windows.
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
