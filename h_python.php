<?
$p_title = 'HOWTO - Python';
include 'p_begin.php';
?>



<div class="object">
<div class="name">Parametry skriptu</div>
<pre>
import sys
print sys.argv[0]	# jméno programu
print sys.argv[1]	# první parametr
</pre>
</div>


<div class="object">
<div class="name">Doplňování slov (ve shellu)</div>
<pre>
alt+/
</pre>
</div>


<div class="object">
<div class="name">Přetypování</div>
<pre>
cislo = 1
float(cislo)
</pre>
</div>


<div class="object">
<div class="name">Podtržítko v kalkulačce</div>
<pre>
>>> 3
3
>>> 2 + _
5
</pre>
</div>


<div class="object">
<div class="name">Listy</div>
<pre>
>>> tmp = "helpA"
>>> tmp
'helpA'
>>> tmp[1:4]
'elp'


 indexy
 +---+---+---+---+---+
 | H | e | l | p | A |
 +---+---+---+---+---+
 0   1   2   3   4   5
-5  -4  -3  -2  -1
</pre>
</div>


<div class="object">
<div class="name">Čtení vstupu</div>
<pre>
tmp = int(raw_input("Zadejte cislo: "))

if tmp &lt; 0:
	print "mensi"
else:
	print "vetsi"
</pre>
</div>


<div class="object">
<div class="name">Cykly</div>
<pre>
a = [0,1,2]
for i in a:
	print i


for i in range(3):
	print i


a = ['Mary', 'had', 'a', 'little', 'lamb']
for i in range(len(a)):
	print i, a[i]

0 Mary
1 had
2 a
3 little
4 lamb


while i &lt; 5:
	print i
	i += 1
</pre>
</div>


<div class="object">
<div class="name">Funkce</div>
<pre>
def f(n):
	""" Druha mocnina """	# dokumentační řetězec
	return n*n


>>> def f():
	"""prvni radek.

	dalsi radek.
	"""
	pass			# nic nedělá

>>> print f.__doc__
prvni radek.

	dalsi radek.
</pre>
</div>


<div class="object">
<div class="name">Čekání na yes/no</div>
<pre>
def ask_ok(prompt, retries=4, complaint='Yes or no, please!'):
    while True:
        ok = raw_input(prompt)
        if ok in ('y', 'ye', 'yes'): return True
        if ok in ('n', 'no', 'nop', 'nope'): return False
        retries = retries - 1
        if retries &lt; 0: raise IOError, 'refusenik user'
        print complaint
</pre>
</div>


<div class="object">
<div class="name">Tabulka úhel:sin(úhel)</div>
<pre>
import math
dict([(x, math.sin(x/180.0*3.14159)) for x in (0,10,20,30,40,50,60,70,80,90)])
</pre>
</div>


<div class="object">
<div class="name">Jméno modulu</div>
<pre>
print __name__
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
