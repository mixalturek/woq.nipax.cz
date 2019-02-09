<?
$p_title = 'HOWTO - Jiné';
include 'p_begin.php';
?>


<div class="object">
<div class="name">RTFM</div>

<?php Img('img/howto/ask.gif', '');?>

</div>


<div class="object">
<div class="name">Wirth's law</div>
<pre>
Software gets slower faster than hardware gets faster.
</pre>
</div>


<div class="object">
<div class="name">Pan sponka ve Vimu</div>

<?php Img('img/howto/pan_sponka_a_vim.gif', 'Pan sponka ve Vimu');?>

</div>


<div class="object">
<div class="name">Fraktály v Bashi :o)</div>
<pre>
S0=P; S1=F; S2=2; S3=0; S4=0;S5=6;e=echo;b=bc;I=-1; for x in `seq 1 24`;
do R=-2;  for y in `seq 1 80`; do B=0; r=0; i=0; while [ $B -le 32 ]; do
r2=`$e "$r*$r"  | $b`; i2=`$e "$i*$i" |$b`;  i=`$e "2.0*$i*$r+ $I" |$b`;
r=`$e  "$r2 - $i2+$R" |$b`;: $((B += 1));  V=`$e "($r2 +$i2) > 4" | $b`;
if  [ "$V" -eq 1  ]; then break;  fi;  done; if  [ $B  -ge 32  ] ;  then
$e  -en "\E[01;40m ";  else U=$(( (B*4)/15+30));  $e  -en "\E[01;$U""m";
C=$((C%6));eval "$e -ne \$E\$S$C";: $((C+=1));fi;R=`$e "$R+0.03125" |$b`
done; $e -e "\E[m\E(";I=`$e "$I+0.08333" |$b`; done #          (c) BruXy
</pre>
</div>


<div class="object">
<div class="name">Tři největší katastrofy lidstava</div>
<pre>
Hirošima 45
Černobyl 84
Windows  95
</pre>
</div>


<div class="object">
<div class="name">Přísloví</div>
<pre>
Kdo jinému rm -rf /, sám do ní padá.
</pre>
</div>


<div class="object">
<div class="name">:-D</div>
<pre>
Datum: Dnes 13:34
Vložil: Mr.Gentleman (neregistrovaný)
Titulek: Re: Zbytecne hledate filozofii hlubokou (celé vlákno)

Snažit se? A o co?! O ženskou???
Když je tak hloupá, že sama od pohledu nepochopí, jaký geek
a odborník a super sexy a nejlepší muž před ní stojí,
tak nestojí za žádnou snahu...

<?php Blank('http://www.root.cz/clanky/komiks-umela-zena/nazory/');?>


Naopak, myslím si, že žena by nechtěla žít v takovém svinčiku
jako já (4 počítače na 2 stolech a spousta účtenek ze supermarketu,
na které píšu, když mi spadne kernel), pod stolem prach,...

<?php Blank('http://www.root.cz/clanky/komiks-firemni-skoleni/nazory/');?>
</pre>
</div>


<div class="object">
<div class="name">Martyška</div>
<pre>
<?Img('img/howto/martyska.jpg', 'Martyška');?>
</pre>
</div>


<div class="object">
<div class="name">Klasický vs. kvantový student</div>
<pre>
<?Img('img/howto/mff_life_06_sm.jpg', 'Klasický vs. kvantový student');?>

<?php Blank('http://www-ucjf.troja.mff.cuni.cz/scheirich/index.php?s=4&strip=6');?>
</pre>
</div>


<div class="object">
<div class="name">Code Quality Review</div>
<pre>
<?Img('img/howto/code_quality_review.jpg', 'Code Quality Review');?>

<?php Blank('http://halbot.haluze.sk/?id=3957');?>
</pre>
</div>


<div class="object">
<div class="name">Little Bobby Tables</div>
<pre>
<?Img('img/howto/exploits_of_a_mom.png', 'Little Bobby Tables');?>

<?php Blank('http://xkcd.com/327/');?>
</pre>
</div>


<div class="object">
<div class="name">First</div>
<pre>
<?Img('img/howto/first.gif', 'První');?>

<?php Blank('http://graphjam.com/2008/10/28/song-chart-memes-first-in-the-comments/');?>
</pre>
</div>


<div class="object">
<div class="name">Let me google that for you</div>
<pre>
<?php Blank('http://www.lmgtfy.com/');?>
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
