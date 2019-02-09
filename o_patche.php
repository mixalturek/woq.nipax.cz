<?
$p_title = 'Patche';
include 'p_begin.php';
?>


<!--
<a id=""></a>
<div class="object">
<div class="head">
<?//Img('img/prog/', '');?>
<div class="name"> ()</div>
<div class="date"></div>
<div class="technology"></div>
<div class="address"><?//Down('down/prog/');?></div>
<div class="rate"></div>
</div>

<div class="descript"></div>
</div>
-->

<a id="klish"></a>
<div class="object">
<div class="name">Klish, VT100 escape sequences are not processed correctly</div>
<div class="date">13.05.2011</div>
<div class="technology">C</div>
<div class="address"><?php Blank('http://code.google.com/p/klish/issues/detail?id=66&can=1');?></div>
<div class="address"><?php Blank('http://code.google.com/p/klish/source/detail?r=463');?></div>

<div class="descript">
<p><em>The klish is a framework for implementing a CISCO-like CLI on a UNIX systems. It is configurable by XML files. The KLISH stands for Kommand Line Interface Shell.</em></p>

<p>Hi,</p>

<p>keys Insert, Delete, Home, End, PageUp, PageDown, F5 - F12 and maybe others are interpreted as ArrowUp, which moves up in the history of commands. It's really uncomfortable.</p>

<p>There is a bug in vt100.c, the code tests only the last character of escape sequence, and if no one matches, default tinyrl_vt100_CURSOR_UP will be used. I'm attaching a patch for this, it also disables space at the beginning of empty line (to not display list of available commands). You can use "patch -p0 &lt; klish_space_home_end_del.patch" to apply the patch to stable version 1.4.3.</p>

<p>The update is fully functional with xterm. It seems KDE konsole works too. Home and End keys don't work under gnome-terminal. This is probably bug inside gnome-terminal according to google. Other terminal emulators were not tested.</p>

<p>Hope this will be useful,</p>
<p>Michal Turek</p>
</div>
</div>


<?
include 'p_end.php';
?>
