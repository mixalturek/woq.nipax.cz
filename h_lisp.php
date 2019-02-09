<?
$p_title = 'HOWTO - Lisp';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Základní příkazy</div>
<pre>
<?php blank('http://service.felk.cvut.cz/courses/36JUI/Travnik/index.html'); ?>
</pre>
</div>


<div class="object">
<div class="name">Debian GNU/Linux</div>
<pre>
apt-get install clisp
</pre>
</div>


<div class="object">
<div class="name">Komentář</div>
<pre>
; toto je komentář
</pre>
</div>


<div class="object">
<div class="name">Proměnné</div>
<pre>
(setf x 3)
(setf x <span title="apostrof - nebude se vyhodnocovat">'</span>(1 2 3))
</pre>
</div>


<div class="object">
<div class="name">Funkce</div>
<pre>
(defun secti (x y)
	(+ x y)
)
</pre>
</div>


<div class="object">
<div class="name">Podmínky</div>
<pre>
T, cokoli - true
NIL, <span title="prázdný seznam">()</span> - false

(defun vetsi (x y)
	(if (> x y)
		x
		y
)	)


(defun pridej (pr in se)
	(cond
		((null se) (list pr))
		((= in 0) (cons pr se))
		(<span title="ekvivalent default">T</span> (cons (car se) (pridej pr (- in 1) (cdr se))))
)	)
</pre>
</div>


<div class="object">
<div class="name">Seznamy</div>
<pre>
&gt; (list 1 2 3)
(1 2 3) - vytvoří seznam

&gt; (car '(1 2 3))
1 - vrátí první prvek

&gt; (cdr '(1 2 3))
(2 3) - vrátí seznam bez prvního prvku

&gt; (last '(1 2 3))
(3) - vrátí poslední prvek

&gt; (butlast '(1 2 3))
(1 2) - vrátí seznam bez posledního prvku

&gt; (append '(1 2 3) '(4 5 6))
(1 2 3 4 5 6) - spojí seznamy do jednoho seznamu

&gt; (cons 0 '(1 2 3))
(0 1 2 3) - přidá prvek na začátek seznamu

&gt; (null '(1 2 3))
NIL
&gt; (null '())
T - je seznam prázdný?
</pre>
</div>


<div class="object">
<div class="name">Funkce ctvrty (s), která vrátí čtvrtý prvek v seznamu</div>
<pre>
&gt;
(defun ctvrty (s)
	(car (cdr (cdr (cdr s))))
)
CTVRTY
&gt; (ctvrty '(1 2 3 4 5 6))
4
</pre>
</div>


<div class="object">
<div class="name">Funkce vs (x y), která vytvoří seznam (x x+1 x+2 ... x+y)</div>
<pre>
&gt;
(defun vs (x y)
	(cond
		((<span title="test nuly">zerop</span> y) (list x))
		(T (cons x (vs (<span title="inkrementace">1+</span> x) (<span title="dekrementace">1-</span> y))))
)	)
VS
&gt; (vs 12 5)
(12 13 14 15 16 17)
</pre>
</div>


<div class="object">
<div class="name">Funkce otoc (x), která invertuje pořadí prvků v seznamu</div>
<pre>
&gt;
(defun otoc (s)
	(if (null s)
		s
		(append (last s) (otoc (butlast s)))
)	)

&gt; (otoc '(1 2 3 4 5))
(5 4 3 2 1)
</pre>
</div>


<div class="object">
<div class="name">Speciální volání funkcí</div>
<pre>
(function jmeno) - vrátí adresu funkce
#'jmeno - ekvivaletní zápis
(apply adresafunkce (seznam argumentů)) - zavolá funkci
(funcall adresafunkce argumenty) - zavolá funkci
(lambda (argumenty) (tělo)) - nepojmenovaná funkce

&gt; (defun secti (a b) (+ a b))
SECTI
&gt; (secti 1 2)
3

&gt; (function test)
#&lt;FUNCTION SECTI (A B) (DECLARE (SYSTEM::IN-DEFUN SECTI)) (BLOCK SECTI (+ A B))&gt;
&gt; #'secti
#&lt;FUNCTION SECTI (A B) (DECLARE (SYSTEM::IN-DEFUN SECTI)) (BLOCK SECTI (+ A B))&gt;

&gt; (apply #'secti '(1 2))
3
&gt; (funcall #'secti 1 2)
3
&gt; (funcall #'(lambda (a b) (+ a b)) 1 2)
3
</pre>
</div>


<div class="object">
<div class="name">Mapovací funkcionály (obdoba foreach cyklů)</div>
<pre>
mapcar - operace nad prvky se stejným indexem, vrátí nový seznam o min. počtu prvků
mapcan - aplikuje fci na prvky se stejným indexem, výsledky jsou sloučeny do listu
mapc - výstup se neakumuluje, ale vrací se původní seznam
maplist
mapl
...

&gt; (mapcar #'list '(1 2 3) '(7 9 12) '(4 6 5))
((1 7 4) (2 9 6) (3 12 5))

&gt; (mapcar #'list '(1 2 3) '(7 9 12) '(4 6))
((1 7 4) (2 9 6))

&gt; (mapcan (lambda (x) (list (+ x 10) 'x)) '(1 2 3 4))
(11 X 12 X 13 X 14 X)

&gt; (mapcan (lambda (x) (if (> x 0) (list x) nil)) '(-4 6 -23 1 0 12 ))
(6 1 12)
</pre>
</div>


<div class="object">
<div class="name">Funkce prumery (a b), která zpracuje dva seznamy a vytvoří seznam průměrů</div>
<pre>
&gt;
(defun prumery (a b)
	(mapcar #'(lambda (x y) (/ (+ x y) 2)) a b)
)

&gt; (prumery '(1 3 5) '(3 5 7))
(2 4 6)
</pre>
</div>


<div class="object">
<div class="name">Proměnný počet parametrů funkcí</div>
<pre>
&gt; (defun funkce (x y &amp;rest z) (list x y z))
FUNKCE
&gt; (funkce 1 2 3 4 5)
(1 2 (3 4 5))

&gt; (defun funkce (x &amp;optional y z) (list x y z))
FUNKCE
&gt; (funkce 1 2)
(1 2 NIL)

&gt; (defun funkce (x &amp;optional (y 10) (z 20)) (list x y z))
FUNKCE
&gt; (funkce 1 2)
(1 2 20)
</pre>
</div>


<div class="object">
<div class="name">Funkce maax, která vrátí největší hodnotu z parametrů</div>
<pre>
&gt;
(defun maax (a &amp;rest s)
	(cond
		((null (car s)) a)
		((&lt; a (apply #'maax s)) (apply #'maax s))
		(T a)
)	)

&gt; (maax 1 9 5 7 11 3)
11

&gt; (defun maax (a &amp;rest s)
	(setf tmp a)
	(mapc #'(lambda (z)
			(if (> z tmp)
				(setf tmp z)
			)
		)
	s)

	tmp
)

&gt; (maax 1 9 5 7 11 3)
11
</pre>
</div>


<div class="object">
<div class="name">I/O</div>
<pre>
&gt; (eval '(+ 1 2))
3

&gt; (format <span title="stdout">t</span> "~A mínus ~A je ~A ~%" 3 2 (- 3 2))
3 mínus 2 je 1
NIL

~A - tiskne příkazem princ
~S - tiskne příkazem prin1
~F - tiskne jako reálné číslo
~% - nový řádek

&gt; (princ "ahoj")
ahoj
"ahoj"

&gt; (prin1 "ahoj")
"ahoj"
"ahoj"

&gt; (print "ahoj")

"ahoj"
"ahoj"


read - přečte token (tohle používá interpret
read-line - přečte řádku
read-char - přečte znak

&gt; (read-line)
radka textu
"radka textu" ;
NIL

&gt; (read-char)
a
#\a

&gt; (read)
( 1   2 a b)
(1 2 A B)
</pre>
</div>


<div class="object">
<div class="name">Interpret lispu (fakt funguje)</div>
<pre>
(defun interpret ()
	(print "hlaska&gt;")
	(print (eval (read)))
	(interpret)
)
</pre>
</div>


<div class="object">
<div class="name">Funkce, která čte vstup, dokud nedostane číslo a pak ho vytiskne</div>
<pre>
&gt;
(defun chcicislo ()
	(format t "zadej: ")
	(setf nacteno (read))
	(if (<span title="test na číslo">numberp</span> nacteno)
		(format t "~A ~%" nacteno)
		(chcicislo)
)	)

&gt; (chcicislo)
zadej: a
zadej: a
zadej: b
zadej: 25
25
NIL
</pre>
</div>



<div class="object">
<div class="name">Funkce, která n-krát vytiskne písmeno X</div>
<pre>
&gt;
(defun nkratx (n)
	(format t "X")
	(if (= n 1)
		()
		(nkratx (1- n))
	)
)

&gt; (nkratx 5)
XXXXX
</pre>
</div>


<div class="object">
<div class="name">Funkce, která načte dva seznamy a spojí je</div>
<pre>
&gt;
(defun spoj ()
	(format t "prvni: ")
	(setf prvni (read))
	(format t "druhy: ")
	(setf druhy (read))
	(append prvni druhy)
)

&gt;(spoj)
prvni: (1 2 3)
druhy: (4 5 6)
(1 2 3 4 5 6)
</pre>
</div>


<div class="object">
<div class="name">Funkce, která do seznamu přidá prvek na specifikovanou pozici</div>
<pre>
&gt;
(defun pridej (pr in se)
	(cond
		((null se) (list pr))
		((= in 0) (cons pr se))
		(T (cons (car se) (pridej pr (1- in) (cdr se))))
	)
)

&gt; (pridej 'a 2 '(1 2 3 4 5))
(1 2 A 3 4 5)
</pre>
</div>


<div class="object">
<div class="name">Pole (indexy jsou od nuly)</div>
<pre>
; Pole, indexy jsou od nuly
&gt; (setf x (make-array '(2 3)))
#2A((NIL NIL NIL) (NIL NIL NIL))
&gt; (aref x 0 1)
NIL
&gt; (setf (aref x 0 1) '(1 3))
(1 3)
&gt; (aref x 0 1)
(1 3)
</pre>
</div>


<div class="object">
<div class="name">Struktura, záznam</div>
<pre>
&gt; (defstruct zaznam
	(pol1 (progn (princ "Zadej cislo: ")(read)))
	(pol2 nil)
	pol3
)
ZAZNAM
&gt; (setf x (make-zaznam))
Zadej cislo: 23
#S(ZAZNAM :POL1 23 :POL2 NIL :POL3 NIL)
&gt; x
#S(ZAZNAM :POL1 23 :POL2 NIL :POL3 NIL)
&gt; (zaznam-pol1 x)
23
&gt; (setf (zaznam-pol1 x) 50)
50
&gt; (zaznam-pol1 x)
50
</pre>
</div>


<div class="object">
<div class="name">Hashovací tabulka</div>
<pre>
&gt; (setf ht (make-hash-table))
#S(HASH-TABLE :TEST FASTHASH-EQL)

&gt; (gethash 'klic ht)
NIL ;
NIL
&gt; (setf (gethash 'klic ht) 10)
10
&gt; (gethash 'klic ht)
10 ;
T
&gt; (setf (gethash 'klic2 ht) 2)
2

&gt; (maphash #'(lambda (k h) (format t "Klic: ~A, hodnota: ~A ~%" k h)) ht)
Klic: KLIC2, hodnota: 2
Klic: KLIC, hodnota: 10
NIL
</pre>
</div>


<div class="object">
<div class="name">Funkce, která vytiskne četnosti prvků v seznamu</div>
<pre>
&gt;
(defun cetnost (s)
	(setf ht (make-hash-table))
	(mapcar #'(lambda (x)
		(if (gethash x ht)
			(setf (gethash x ht) (1+ (gethash x ht)))
			(setf (gethash x ht) 1)
		)

	) s)

	(maphash #'(lambda (x y) (print (list x y))) ht)
)
CETNOST

&gt; (cetnost '(a c b c d a a b))
(D 1)
(B 2)
(C 2)
(A 3)
NIL
</pre>
</div>


<div class="object">
<div class="name">Bloky</div>
<pre>
&gt; (prog1 (+ 1 2) (+ 5 9) (+ 3 4))
3

&gt; (prog2 (+ 1 2) (+ 5 9) (+ 3 4))
14

&gt; (progn (+ 1 2) (+ 5 9) (+ 3 4))
7

&gt;
(block prvni
	(+ 1 2)
	(+ 3 4)
	(block druhy
		(+ 5 6)
		(return-from prvni 10)
	)
)
10

&gt;
(defun fn ()
	(format t "test")
	(return-from fn 10)
)
FN

&gt; (fn)
test
10
</pre>
</div>


<div class="object">
<div class="name">Cykly</div>
<pre>
&gt;
(dolist (i '(1 2 3) 'OK)
	(format t "~A ~%" (* i 2))
)
2
4
6
OK

&gt;
(dotimes (i 3 'OK)
	(format t "~A ~%" (* i 2))
)
0
2
4
OK

&gt;
(do
	(
		(i 1 (1+ i))
		(j 1 i)
		(k 1 j)
	)
	(
		(&gt; i 5) 'OK
	)
	(format t "~A ~A ~A ~%" i j k)
)
1 1 1
2 1 1
3 2 1
4 3 2
5 4 3
OK

&gt;
(do<span title="sekvenční provádění update akcí">*</span>
	(
		(i 1 (1+ i))
		(j 1 i)
		(k 1 j)
	)
	(
		(&gt; i 5) 'OK
	)
	(format t "~A ~A ~A ~%" i j k)
)
1 1 1
2 2 2
3 3 3
4 4 4
5 5 5
OK
</pre>
</div>


<div class="object">
<div class="name">Funkce, která vrátí T, pokud jsou rozdíly dvou sousedních čísel v seznamu menší než daná hodnota</div>
<pre>
&gt;
(defun rozdily (x s)
	(cond
		((and s (cdr s))
			(if (&lt; (abs (- (first s) (second s))) x)
				(rozdily x (cdr s))
			)
		)
		(T)
	)
)
ROZDILY

&gt; (rozdily 3 '(1 3 4 6 7))
T
&gt; (rozdily 3 '(1 3 4 8 9))
NIL


&gt;
(defun rozdily (x s)
	(setf j (car s))
	(dolist (i s)
		(if (&gt; (abs (- j i)) x)
			(return-from rozdily nil)
		)
		(setf j i)
	)

	T
)
ROZDILY

&gt; (rozdily 3 '(1 3 4 6 7))
T
&gt; (rozdily 3 '(1 3 4 8 9))
NIL
</pre>
</div>


<div class="object">
<div class="name">Funkce, která vloží mezi každé dva prvky seznamu hvězdičku</div>
<pre>
&gt;
(defun vloz (x s)
	(setf tmp ())

	(dolist (i s)
		(setf tmp (append tmp (list i)))
		(setf tmp (append tmp (list x)))
	)

	(butlast tmp)
)
VLOZ

&gt; (vloz '* '(1 2 3 4))
(1 * 2 * 3 * 4)
</pre>
</div>


<div class="object">
<div class="name">Makra</div>
<pre>
- výsledkem makra je seznam příkazů, ten se vykoná a vrátí se hodnota
- za zpětný apostrof se píší příkazy s parametry makra
- ,x - se nahradí hodnotou předanou za x
- ,@x - pokud je x seznam, nahradí se svými prvky

&gt; (setf tmp '(1 2 3 4))
(1 2 3 4)
&gt; `(tmp - ,tmp - ,@tmp)
(TMP - (1 2 3 4) - 1 2 3 4)

&gt;
(defmacro nastav3 (x)
	`(setf ,x 3)
)
NASTAV3

&gt; (macroexpand-1 '(nastav3 y))
(SETF Y 3) ;
T

&gt; (nastav3 y)
3
&gt; y
3
</pre>
</div>


<div class="object">
<div class="name">Lokální proměnné</div>
<pre>
&gt;
(let ((x 2) (y 3))
	(print x)
	(print y)
	(print (+ x y))
	'OK
)
2
3
5
OK

&gt;
(let ((x (gensym)))
	; x obsahuje unikátní jméno pro pomocnou proměnnou v makru
)
</pre>
</div>


<div class="object">
<div class="name">Makro, které zajistí výpis expandovaného výrazu</div>
<pre>
&gt;
(defmacro vypis (vyraz)
	`(pprint (macroexpand-1 ',vyraz))
)
VYPIS

&gt; (vypis '(+ 1 2))
'(+ 1 2)
</pre>
</div>


<div class="object">
<div class="name">Makro, které provede nkrát své tělo</div>
<pre>
&gt;
(defmacro nkrat (n &amp;rest a)
	(let ((i (gensym)))
		`(dotimes (,i ,n) ,@a)
	)
)
NKRAT

&gt; (nkrat 5 (princ "x"))
xxxxx
</pre>
</div>


<div class="object">
<div class="name">Makro cyklu for (řídícího proměnná, počáteční hodota, koncová hodnota, tělo)</div>
<pre>
&gt;
(defmacro for ((x y z) &amp;rest body)
	(let ((it (gensym)) (kroku (1+ (- z y))))
		`(dotimes (,it ,kroku) (setf ,x (+ ,y ,it)) ,@body)
	)
)
FOR

&gt; (macroexpand-1 '(for (x 5 9) (princ x)))
(DOTIMES (#:G8115 5) (SETF X (+ 5 #:G8115)) (PRINC X)) ;
T

&gt;(for (x 5 9) (princ x))
56789
NIL
</pre>
</div>


<div class="object">
<div class="name">Funkce, která ze dvou seznamů vytvoří seznam min. prvků na odpovídajících si pozicích</div>
<pre>
&gt;
(defun mensi (a b)
	(mapcar
		#'(lambda (x y)
			(if (&lt; x y)
				x
				y
			)
		)
		a b
	)
)
MENSI

&gt; (mensi '(1 8 9 4) '(7 2 3 10))
(1 2 3 4)
</pre>
</div>


<div class="object">
<div class="name">Funkce, která určí průnik dvou množin</div>
<pre>
; Pozn.: Predpokládá, že vstupní seznamy jsou opravdu množiny
;       (tj. seznam obsahuje daný prvek vždy právě jednou)

&gt;
(defun inters (a b)
	(setf ret ())

	(mapcar
		#'(lambda (x)
			(mapcar
				#'(lambda (y)
					(if (= x y)
						(setf ret (cons x ret))
					)
				)
				b
			)
		)
		a
	)

	ret
)
INTERS

&gt; (inters '(1 2 3) '(2 3 4))
(3 2)
</pre>
</div>

<div class="object">
<div class="name">Funkce, která vypočítá dosažitelné uzly ze zadaného uzlu pro orientovaný graf zadaný seznamem uzlů a jejich sousedů</div>
<pre>
&gt;
; Najde sousedy uzlu
(defun najdisousedy (uzel graf)
	(mapcar
		#'(lambda (i)
			(if (eq uzel (car i))
				(return-from najdisousedy i)
			)
		)
		graf
	)
)
NAJDISOUSEDY

&gt;
; Počítá dosažitelné uzly v grafu (předpokládá, že je graf acyklický)
(defun dosazitelnost-acykl (uzel graf)
	(setf ret ())

	(mapcar
		#'(lambda (i)
			(setf ret (union ret (list i)))
			(setf ret (union ret (dosazitelnost-acykl i graf)))
		)

		(cdr (najdisousedy uzel graf))
	)

	ret
)
DOSAZITELNOST-ACYKL

; Acyklický orientovaný graf
; a -&gt; b, c, d
; b -&gt; c
; c -&gt; d
; d
&gt; (setf graf '((a b c d) (b c) (c d) (d)))
((A B C D) (B C) (C D) (D))

&gt; (dosazitelnost-acykl 'a graf)
(B C D)
&gt; (dosazitelnost-acykl 'b graf)
(C D)
&gt; (dosazitelnost-acykl 'c graf)
(D)
&gt; (dosazitelnost-acykl 'd graf)
NIL
</pre>
</div>


<div class="object">
<div class="name">Funkce, která vrací prvek z listu podle předaných operací</div>
<pre>
&gt;
(defun best-of (S fn test)
	(setf tmp (car S))
	(mapc #'(lambda (z)
			(if (funcall test (funcall fn z) (funcall fn tmp))
				(setf tmp z)
			)
		)
	s)

	(list (funcall fn tmp) tmp)
)

&gt; (best-of '(1 -2 -4 3) #'abs #'&gt;)
(4 -4)
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
