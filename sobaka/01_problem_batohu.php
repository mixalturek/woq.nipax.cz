<?php
$p_title = 'Problém batohu';
include_once 'p_begin.php';
?>


<div class="headers_numbering">

<div class="datetime">Sat, 17 Jan 09 17:07:44 +0100</div>

<h2>Obsah</h2>

<ol>
<li>Obsah</li>

<li>Hrubou silou a heristikou podle poměru cena/váha
	<ol>
	<li>Zadání</li>
	<li>Specifikace problému
		<ol>
		<li>Zadáno je</li>
		<li>Cílem je</li>
		</ol>
	</li>
	<li>Řešení hrubou silou</li>
	<li>Řešení heuristikou podle poměru cena/váha</li>
	<li>Závěr</li>
	</ol>
</li>

<li>Metodou větví a hranic, dynamickým programováním a heuristikou
	<ol>
	<li>Zadání</li>
	<li>Specifikace problému
		<ol>
		<li>Zadáno je</li>
		<li>Cílem je</li>
		</ol>
	</li>
	<li>Řešení metodou větví a hranic</li>
	<li>Řešení dynamickým programováním</li>
	<li>Řešení heuristikou podle poměru cena/váha s testem nejcennější věci</li>
	<li>Měření</li>
	<li>Závěr</li>
	</ol>
</li>

<li>Experimentální hodnocení algoritmů pro problém batohu
	<ol>
	<li>Zadání</li>
	<li>Úvod
		<ol>
		<li>Kvalita řešení</li>
		<li>Výpočetní náročnost</li>
		</ol>
	</li>
	<li>Kvalita řešení</li>
	<li>Výpočetní náročnost
		<ol>
		<li>Základní konfigurace generátoru instancí</li>
		<li>Závislost počtu stavů na velikosti instance</li>
		<li>Závislost počtu stavů na poměru kapacity batohu k sumární váze věcí</li>
		<li>Závislost počtu stavů na velikosti batohu (dynamické programování)</li>
		<li>Závislost počtu stavů na charakteru granularity</li>
		<li>Závislost počtu stavů na maximální ceně věci</li>
		</ol>
	</li>
	<li>Závěr</li>
	</ol>
</li>

<li>Genetickými algoritmy
	<ol>
	<li>Zadání</li>
	<li>Popis implementovaného genetického algoritmu</li>
	<li>Měření</li>
	<li>Závěr</li>
	</ol>
</li>

<li>A z toho všeho plyne...</li>
</ol>



<h2>Hrubou silou a heristikou podle poměru cena/váha</h2>

<h3>Zadání</h3>

<ul>
<li>Naprogramujte řešení 0/1 problému batohu <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#bruteforce', 'hrubou silou'); ?>. Na <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#bench', 'zkušebních datech'); ?> pozorujte závislost výpočetního času na <i>n</i>.</li>
<li>Naprogramujte řešení 0/1 problému batohu <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#greedy', 'heuristikou podle poměru cena/váha.'); ?> Pozorujte
	<ul>
	<li>závislost výpočetního času na <i>n</i>. Grafy jsou vítány (i pro exaktní metodu).</li>
	<li>průměrné zhoršení proti exaktní metodě</li>
	<li>maximální <em>relativní</em> chybu. Absolutní chyba nic neříká!</li>
	</ul>
</li>
</ul>





<h3>Specifikace problému</h3>

<h4>Zadáno je</h4>

<ul>
<li>celé číslo n (počet věcí)</li>
<li>celé číslo M (kapacita batohu)</li>
<li>konečná množina V = {v<sub>1</sub>, v<sub>2</sub>, ..., v<sub>n</sub>} (hmotnost věcí)</li>
<li>konečná množina C = {c<sub>1</sub>, c<sub>2</sub>, ..., c<sub>n</sub>} (cena věcí)</li>
</ul>

<h4>Cílem je</h4>

<p>Najít takovou podmnožinu množiny věcí, která se ještě vejde do batohu, a zároveň je její cena nejvyšší možná. Řečeno formálněji: Najít množinu X = {x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub>}, x<sub>i</sub> = {0, 1}, tak, aby platilo:</p>

<ul>
<li>v<sub>1</sub>x<sub>1</sub> + v<sub>2</sub>x<sub>2</sub> + ... + v<sub>n</sub>x<sub>n</sub> &lt;= M</li>
</ul>

<p>(tj. batoh nebyl přetížen) a aby výraz</p>

<ul>
<li>c<sub>1</sub>x<sub>1</sub> + c<sub>2</sub>x<sub>2</sub> + ... + c<sub>n</sub>x<sub>n</sub></li>
</ul>

<p>nabýval maximální hodnoty pro všechny takové množiny.</p>






<h3>Řešení hrubou silou</h3>

<p>Algoritmus iteruje přes všechny kombinace věcí, v každém průchodu se vypočte jejich celková hmotnost a hodnota. Pokud je hmotnost nižší než nosnost batohu a zároveň jejich cena vyšší než dosud nejvyšší nalezená, označí se dané řešení jako řešení problému, které je po průchodu všemi kombinacemi vypsáno.</p>

<pre>
Knapsack()
{
	opt = 0;					// Nulové optimální řešení
	for (i = 0; i &lt; 2^n; i++)			// Všechny kombinace
	{
		cur = {x1, x2, ..., xn}			// Další kombinace
		if (hm(cur) &lt;= M)			// Vejde se do batohu?
			if (cena(cur) >= cena(opt))	// Dosud nejlepší?
				opt = cur;		// Označí jako dosud nejlepší
	}
	print(opt);					// Zobrazí výsledek
}
</pre>

Po spouštění programu byly získány očekávané výsledky. Rychle rostoucí čas potřebný k výpočtu a jeho trend je zřejmý už při n = 25. Naměřené hodnoty jsou zaneseny do tabulky a rovněž do grafu, jedná se vždy o sumu časů všech padesáti datových sad.

<table>
<tr>	<th>n</th>	<th>čas [s]</th>	</tr>
<tr>	<td>4</td>	<td>0.000292</td>	</tr>
<tr>	<td>10</td>	<td>0.03996</td>	</tr>
<tr>	<td>15</td>	<td>1.6481</td>		</tr>
<tr>	<td>20</td>	<td>66.412</td>		</tr>
<tr>	<td>22</td>	<td>286.350</td>	</tr>
<tr>	<td>25</td>	<td>2583.32</td>	</tr>
</table>

<?php img('img/01/brute_force.png', 'Graf pro řešení hrubou silou'); ?>

<p>Algoritmus má složitost O(2<sup>n</sup>), což je počet všech možných stavů, ve kterých se může batoh nacházet. Exponenciální doba trvání je jasná i z grafu. Jedinou výhodou tohoto algoritmu je, že vždy vypočítá optimální řešení.</p>





<h3>Řešení heuristikou podle poměru cena/váha</h3>

<p>Heuristika nejdříve seřadí věci sestupně podle poměru cena/hmotnost. V další fázi se postupně zkouší přidávat jednotlivé věci do batohu (ty s nejvyšším poměrem nejdříve). Poté, co se projdou všechny věci, je obnoveno jejich původní pořadí v datové struktuře a vypsán výsledek.</p>

<pre>
Knapsack()
{
	T = {t1, t2, ..., tn};			// Seznam věcí
	sort(T);				// Řazení podle cena/hmotnost sestupně
	ret = 0;				// Nulování řešení
	for(i = 0; i &lt; n; i++)			// Všechny věci
	{
		if(hm(cur) + hm(ret) &lt;= M)	// Vejde se ještě?
			batoh.add(cur);		// Vložit do batohu
	}
	print(batoh);				// Zobrazí výsledek
}
</pre>

<p>Heuristiky nezajišťují vždy stoprocentně správné vyřešení daného problému, nicméně přinášejí obrovské časové úspory. Aby byla doba trvání vůbec měřitelná, byl výpočet prováděn tisíckrát a získaná hodnota poté vydělena. V tabulce jsou taktéž uvedeny průměrné a maximální relativní odchylky od optima pro jednotlivá n. Je patrné, že pro malá n se heuristikou dopouštíme relativně velké chyby, s rostoucím n však tato chyba postupně klesá.</p>

<table>
<tr>	<th>n</th>	<th>čas [ms]</th>	<th>Prům. rel. odchylka</th>	<th>Max. rel. odchylka</th>	</tr>
<tr>	<td>4</td>	<td>0.252</td>		<td>2.175</td>	<td>36.364</td>		</tr>
<tr>	<td>10</td>	<td>0.496</td>		<td>1.104</td>	<td>11.480</td>		</tr>
<tr>	<td>15</td>	<td>0.768</td>		<td>0.305</td>	<td>2.770</td>		</tr>
<tr>	<td>20</td>	<td>1.044</td>		<td>0.449</td>	<td>4.079</td>		</tr>
<tr>	<td>22</td>	<td>1.096</td>		<td>0.542</td>	<td>3.018</td>		</tr>
<tr>	<td>25</td>	<td>1.208</td>		<td>0.425</td>	<td>2.588</td>		</tr>
<tr>	<td>27</td>	<td>1.416</td>		<td>0.289</td>	<td>1.845</td>		</tr>
<tr>	<td>30</td>	<td>1.524</td>		<td>0.383</td>	<td>1.749</td>		</tr>
<tr>	<td>32</td>	<td>1.648</td>		<td>0.274</td>	<td>2.278</td>		</tr>
<tr>	<td>35</td>	<td>1.824</td>		<td>0.188</td>	<td>1.817</td>		</tr>
<tr>	<td>37</td>	<td>1.940</td>		<td>0.181</td>	<td>1.176</td>		</tr>
<tr>	<td>40</td>	<td>2.112</td>		<td>0.153</td>	<td>0.946</td>		</tr>
</table>

<?php img('img/01/cost_weight.png', 'Graf pro heuristiku cena/váha'); ?>

<p>Pokud není uvažována složitost řazení, má tento algoritmus (heuristika) lineární složitost, ne vždy se však nalezne optimální řešení problému.</p>





<h3>Závěr</h3>

Každý další předmět, který se uvažuje při vkládání do batohu při řešení hrubou silou, extrémně zvyšuje výpočetní čas. Heuristika tuto dobu výrazně snižuje, nicméně ne vždy nalézá optimální řešení problému.

<p>Oba programy byly napsány v jazyce C++ s použitím šablon ze standardní knihovny STL. Programy byl spouštěny na počítači s procesorem AMD Atlon XP 1800+ pod operačním systému Debian Etch GNU/Linux. Doba jejich trvání byla pro jednotlivé datové soubory měřena pomocí standardního programu time (položka user).</p>








<h2>Metodou větví a hranic, dynamickým programováním a heuristikou</h2>


<h3>Zadání</h3>

<ul>
<li>Naprogramujte řešení 0/1 problému batohu metodou větví a hranic (B&amp;B) tak, aby omezujícím faktorem byla hodnota optimalizačního kritéria. Tj. použijte ořezávání shora (překročení kapacity batohu) i zdola (stávající řešení nemůže být lepší než nejlepší dosud nalezené)</li>
<li> Naprogramujte řešení 0/1 problému batohu nebo alespoň 0/1 exaktního problému batohu bez cen metodou <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#dyn', 'dynamického programování.'); ?></li>
<li>Naprogramujte řešení 0/1 problému batohu <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#comb1', 'heuristikou podle poměru cena/hmotnost s testem nejcennější věci.'); ?></li>
</ul>

<p>Zpráva by měla obsahovat:</p>

<ul>
<li>Popis implementovaných metod</li>
<li>Srovnání výpočetních časů hrubé síly, B&amp;B a dynamického programování (grafy vítány)</li>
<li>Srovnání vylepšené heuristiky s původní</li>
<li>Zhodnocení naměřených výsledků</li>
</ul>





<h3>Specifikace problému</h3>

<h4>Zadáno je</h4>

<ul>
<li>celé číslo n (počet věcí)</li>
<li>celé číslo M (kapacita batohu)</li>
<li>konečná množina V = {v<sub>1</sub>, v<sub>2</sub>, ..., v<sub>n</sub>} (hmotnost věcí)</li>
<li>konečná množina C = {c<sub>1</sub>, c<sub>2</sub>, ..., c<sub>n</sub>} (cena věcí)</li>
</ul>

<h4>Cílem je</h4>

<p>Najít takovou podmnožinu množiny věcí, která se ještě vejde do batohu, a zároveň je její cena nejvyšší možná. Řečeno formálněji: Najít množinu X = {x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub>}, x<sub>i</sub> = {0, 1}, tak, aby platilo:</p>

<ul>
<li>v<sub>1</sub>x<sub>1</sub> + v<sub>2</sub>x<sub>2</sub> + ... + v<sub>n</sub>x<sub>n</sub> &lt;= M</li>
</ul>

<p>(tj. batoh nebyl přetížen) a aby výraz</p>

<ul>
<li>c<sub>1</sub>x<sub>1</sub> + c<sub>2</sub>x<sub>2</sub> + ... + c<sub>n</sub>x<sub>n</sub></li>
</ul>

<p>nabýval maximální hodnoty pro všechny takové množiny.</p>






<h3>Řešení metodou větví a hranic</h3>

<p>Algoritmus rekurzivně prochází všechny zadané věci, v každém zanoření se rozhoduje, zda určitá věc bude ve výsledném množině, či ne. Ořezávání se provádí podle dvou jednoduchých pravidel. 1) Rekurze se v dané větvi ukončí, když přidání aktuální věci přetíží batoh. 2) Do batohu se fiktivně přidají všechny zbývající/neprověřené věci a pokud je celková cena tohoto fiktivního řešení menší než cena dosud nejlepšího nalezeného, tak se rekurze v dané větvi opět ukončí.</p>

<pre>
Knapsack(index, cost, weight, things)
{
	// End of recursion?
	if(index >= n)
		return;

	// Actual thing won't be there
	if(cost + remaining_costs > currently_the_best)
		SolveKnapsack(index + 1, cost, weight, things);

	// Actual thing will be there
	if(weight + actual_thing.weight &lt;= M)
	{
		if(cost + remaining_costs > currently_the_best)
		{
			// Update the best solution
			if(cost + actual_thing.cost > currently_the_best)
			{
				currently_the_best = cost + actual_thing.cost;
				things[index] = true;
				resolution_things = things;
			}

			things[index] = true;

			SolveKnapsack(index + 1,
				cost + actual_thing.cost,
				weight + actual_thing.weight,
				things);
		}
	}
}

Knapsack(0, 0, 0, 0);
</pre>







<h3>Řešení dynamickým programováním</h3>

<p>Algoritmus si v pseudopolynomiálním čase vygeneruje dvourozměrnou tabulku s výsledky řešení jednotlivých podproblémů a poté pouze zobrazí výsledek na požadovaném indexu tabulky.</p>

<pre>
void Knapsack(ID, n, M, data)
{
	ZeroFirstRow(table);
	ZeroFirstColumn(table);

	// Calculate table items
	for(i = 1; i &lt;= M; i++)
	{
		for(j = 1; j &lt;= n; j++)
		{
			if(cur.weight > i)
			{
				table(actual).cost = table(left).cost;
				table(actual).weight = table(left).weight;
				table(actual).things = table(left).things;
			}
			else
			{
				if(table(left).cost > table(down).cost + cur.cost)
				{
					table(actual).cost = table(left).cost;
					table(actual).weight = table(left).weight;
					table(actual).things = table(left).things;
				}
				else
				{
					table(actual).cost = table(down).cost + cur.cost;
					table(actual).weight = table(down).weight + cur.weight;
					table(actual).things = table(down).things;
					table(actual).things[j-1] = true;
				}
			}
		}
	}

	DisplaySolution(table[n, M]);
}
</pre>







<h3>Řešení heuristikou podle poměru cena/váha s testem nejcennější věci</h3>

<p>Výsledek původní heuristiky podle poměru cena/váha z první úlohy je srovnán s řešením, kdy obsahem batohu bude pouze nejcennější věc. Jako výsledek se vezme to řešení, které vychází lépe.</p>

<pre>
Knapsack(ID, n, M, data)
{
	T = {t1, t2, ..., tn};			// Seznam věcí
	sort(T);				// Řazení podle cena/hmotnost sestupně
	ret = 0;				// Nulování řešení
	for(i = 0; i &lt; n; i++)			// Všechny věci
	{
		if(hm(cur) + hm(ret) &lt;= M)	// Vejde se ještě?
			knapsack.add(cur);	// Vložit do batohu
	}

	thing = FindMostValuableThing();	// Nejhodnotnější věc

	if(thing.cost > knapsack.sumOfCosts())	// Je dražší než původní řešení?
	{
		knapsack.removeAllThings();	// Odstraní všechny věci
		knapsack.add(thing);		// Vloží pouze nejcennější věc
	}

	print(knapsack);			// Zobrazí výsledek
}
</pre>






<h3>Měření</h3>

<p>Následující tabulka obsahuje dobu trvání spuštění programu vždy pro padesát testovacích instancí problému batohu, které jsou uvedené na <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html', 'webu předmětu'); ?>.</p>

<table>
<tr>	<td></td>	<th colspan="3">čas [s]</th>	</tr>
<tr>	<th>n</th>	<th>Hrubá síla</th>	<th>B&amp;B</th>	<th>Dyn. prog.</th>	</tr>
<tr>	<td>4</td>	<td>0.000292</td>	<td>0.005</td>		<td>0.003</td>	</tr>
<tr>	<td>10</td>	<td>0.03996</td>	<td>0.008</td>		<td>0.004</td>	</tr>
<tr>	<td>15</td>	<td>1.6481</td>		<td>0.013</td>		<td>0.012</td>	</tr>
<tr>	<td>20</td>	<td>66.412</td>		<td>0.073</td>		<td>0.021</td>	</tr>
<tr>	<td>22</td>	<td>286.350</td>	<td>0.259</td>		<td>0.022</td>	</tr>
<tr>	<td>25</td>	<td>2583.32</td>	<td>1.720</td>		<td>0.028</td>	</tr>
<tr>	<td>27</td>	<td>-</td>		<td>6.609</td>		<td>0.037</td>	</tr>
<tr>	<td>30</td>	<td>-</td>		<td>52.371</td>		<td>0.049</td>	</tr>
<tr>	<td>32</td>	<td>-</td>		<td>0.910 *</td>	<td>0.051</td>	</tr>
<tr>	<td>35</td>	<td>-</td>		<td>2.339 *</td>	<td>0.064</td>	</tr>
<tr>	<td>37</td>	<td>-</td>		<td>2.522 *</td>	<td>0.069</td>	</tr>
<tr>	<td>40</td>	<td>-</td>		<td>18.719 *</td>	<td>0.082</td>	</tr>
</table>

<p>Ze souborů instancí označených hvězdičkou byla odstraněna konfigurace, která způsobovala, že se metoda B&amp;B chovala téměř jako metoda hrubou silou, a tudíž nebylo možné získat výsledky během relativně krátkého času. V příkladu níže jsou hodnoty hmotností takové, že se batoh hned ze začátku nepřetíží, cena poslední věci způsobí, že prořezávání nezafunguje ani podle ceny. Z tohoto příkladu je vidět, že B&amp;B může být výrazně závislá na složení vstupních dat problému a v nejhorším případě může dosahovat původní exponenciální složitosti.</p>

<pre>
9405 32 450 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14
14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14
14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 450 449
</pre>

<?php img('img/01/dp.png', 'Graf pro dynamické programování'); ?>
<?php img('img/01/bb.png', 'Graf pro metodu B&amp;B'); ?>
<?php img('img/01/bb_dp.png', 'Společný graf pro dynamické programování a B&amp;B'); ?>

<p>Porovnají-li se výstupy z programů a správné výsledky uváděné na <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html', 'webu předmětu'); ?> v diffovacím nástroji (diff, Meld, Araxis Merge...), je vidět, že některé z uvedených instancí mají více optimálních řešení. Protože je výsledná cena všech věcí v batohu v obou případech stejná, nejedná se o chybu v programu.</p>

<pre>
Horní řádek: výsledky z webu předmětu
Dolní řádek: výsledky získané metodou dynamického programování

9588 40 4805  1 <b>1</b> 1 1 1 1 1 1 1 0 0 0 1 1 1 1 0 1 1 1 1 1 1 1 1 0 1 0 0 1 1 1 1 0 <b>1</b> 1 1 <b>0</b> 0 1
9588 40 4805  1 <b>0</b> 1 1 1 1 1 1 1 0 0 0 1 1 1 1 0 1 1 1 1 1 1 1 1 0 1 0 0 1 1 1 1 0 <b>0</b> 1 1 <b>1</b> 0 1

9596 40 4244  1 1 1 1 1 1 1 1 0 1 1 1 1 <b>0</b> 0 0 1 <b>0</b> 1 1 <b>1</b> 1 1 0 1 <b>1</b> 1 0 1 1 1 1 0 1 1 1 0 1 <b>0</b> 1
9596 40 4244  1 1 1 1 1 1 1 1 0 1 1 1 1 <b>1</b> 0 0 1 <b>1</b> 1 1 <b>0</b> 1 1 0 1 <b>0</b> 1 0 1 1 1 1 0 1 1 1 0 1 <b>1</b> 1
</pre>

<p>Všechny programy byly napsány v jazyce C++ s použitím šablon ze standardní knihovny STL. Programy byly spouštěny na počítači s procesorem Intel Celeron 1,7 GHz pod operačním systémem Debian Sarge GNU/Linux. Doba jejich trvání byla pro jednotlivé datové soubory (tedy vždy 50 různých instancí problému) měřena pomocí standardního programu time (položka user).</p>

<h3>Závěr</h3>

<p>Srovná-li se heuristika z první úlohy s kombinovanou heuristiou, že vidět, že porovnání výsledků a zvolení lepší hodnoty, opravdu pomáhá. U malých instací je to více zřetelné než u velkých. Nevyžadují-li se naprosto přesné výsledky je implementovaná heuristika vhodným řešením. Odchylka od optimálního řešení je poté maximálně 50% (<?php blank('http://service.felk.cvut.cz/courses/36PAA/greedyproof.html', 'důkaz na stránkách předmětu'); ?>).</p>

<p>Pokud je nutné přesné řešení, vychází nejlépe dynamické programování. To ale může být na druhou stranu limitováno velikostí dostupné paměti použité pro cachování mezivýsledků.</p>

<p>U většiny instancí problému se bude velice dobře chovat i metoda větví a hranic. Doba hledání řešení je však závislá i na vlastních hodnotách v zadání problému a za určitých okolností může dokonce narůst na původní exponenciální složitost metody hrubé síly.</p>











<h2>Experimentální hodnocení algoritmů pro problém batohu</h2>

<h3>Zadání</h3>

<ul>
<li>Prozkoumejte citlivost metod řešení problému batohu na parametry instancí generovaných <?php blank('http://service.felk.cvut.cz/courses/X36PAA/wknapgen.html', 'generátorem náhodných instancí'); ?>. Máte-li podezření na další závislosti, modifikujte <?php blank('http://service.felk.cvut.cz/courses/X36PAA/wknapgen.html#source', 'zdrojový tvar'); ?> generátoru.</li>
<li>Na základě zjištění navrhněte a proveďte experimentální vyhodnocení kvality řešení a výpočetní náročnosti.</li>
<li>Pokud možno, prezentujte algoritmy jako body v ploše, jejíž souřadnice jsou výše uvedená kritéria.</li>
</ul>





<h3>Úvod</h3>

<p>Pro řešení problému batohu existuje mnoho <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html', 'algoritmů'); ?> jak exaktních, tak přibližných. O jejich vlastnostech toho není mnoho známo, pouze pro <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#combined', 'kombinované heuristiky'); ?> byla dokázána maximální chyba. Chceme-li vědět více, musíme vyhodnocovat experimentálně.</p>

<p>Budeme sledovat dva podstatné parametry - <i>kvalitu řešení</i> a <i>výpočetní náročnost</i>. Uvedeme-li obě tyto veličiny do vztahu, dozvíme se, pro
které kombinace nároků na čas a kvalitu je ten který algoritmus nejvýhodnější.</p>


<h4>Kvalita řešení</h4>

<p>Pro instance, kde známe exaktní řešení, se kvalita dá měřit absolutně. Tam, kde srovnáváme heuristiky mezi sebou, můžeme srovnávat pouze relativně. Tyto dva způsoby hodnocení je potřeba rozlišovat a konzistentně mezi nimi volit.</p>


<h4>Výpočetní náročnost</h4>

<p>Výpočetní náročnost se měří ještě hůře. Celkový čas výpočtu zahrnuje všechny vlivy, selhává však při porovnání výsledků z různých strojů. Zahrnuje také vlivy, které nejsou důležité - například způsob implementace datových struktur. Proto jako měřítko výpočetní složitosti volíme <i>počet testovaných stavů</i>. Poněvadž celkové počty stavů instancí lze snadno odvodit, máme měřítko účinnosti dané výpočetní metody.</p>





<h3>Kvalita řešení</h3>

<p>Problém batohu jsme řešili pouze dvěma heuristikami - <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#greedy', 'heuristikou podle poměru cena/hmotnost'); ?> a <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#comb1', 'heuristikou podle poměru cena/hmotnost s testem nejcennější věci'); ?>. Chování obou heuristik byla podrobně rozebrána už při minulých úlohách, a proto na tomto místě budou pouze ve stručnosti okomentovány výsledky.</p>

<p>Heuristika podle poměru cena/váha má polynomiální časovou složitost, a proto přináší obrovské časové úspory. Na druhou stranu je patrné, že pro malé počty věcí se dopouští relativně velké chyby, s jejich rostoucím počtem však tato chyba postupně klesá. Chyba je v principu způsobena postupným vkládáním jednotlivých věcí podle nejvyššího poměru cena/váha, kdy se už netestuje, zda by některá kombinace odstatních věcí byla výhodnější.</p>

<p>Druhá z heuristik je kombinací předchozí metody a testu na vložení pouze nejcennější věci. Jelikož vybírá lepší z obou řešení, bude její kvalita, vzhledem k první metodě, vždy lepší, náročnost výpočtu se však nijak výrazně nezvýší a stále bude polynomiální. Je dokonce <?php blank('http://service.felk.cvut.cz/courses/36PAA/greedyproof.html', 'dokázáno'); ?>, že odchylka od optimálního řešení může být maximálně 50%.</p>

<p>Metody <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#bruteforce', 'hrubé síly'); ?>, <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#dyn', 'dynamického programování'); ?> i metoda větví a hranic vracejí vždy optimální řešení, a proto je zbytečné, o kvalitě jimi vrácených řešení, jakkoli diskutovat.</p>





<h3>Výpočetní náročnost</h3>

<h4>Základní konfigurace generátoru instancí</h4>

<p>Metoda <?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html#bruteforce', 'hrubé síly'); ?> prochází všechny možné kombinace jednotlivých věcí v batohu, a proto je její složitost vždy exponenciální (2<sup>n</sup>) a nezávisí na žádném z parametrů uvedených v tabulce. Podobně se chovají obě heuristiky, pracují však s polynomiální složitostí. Vzhledem k výše uvedeným důvodům nebudou tyto tři metody z hlediska výpočetní složitosti dále uvažovány.</p>

<p>Následující tabulka definuje implicitní nastavení generátoru instancí, při jednotlivých testech se bude hýbat vždy pouze s jedním parametrem. Pokud by se hýbalo více parametry najednou, daly by se možná najít i jiné závislosti, nicméně by to bylo časově velice náročné.</p>

<table>
<tr><th>Parametr</th>					<th>Hodnota</th></tr>
<tr><td>Velikost instance</td>				<td>20</td></tr>
<tr><td>Počet instancí&nbsp;</td>			<td>50</td></tr>
<tr><td>Maximální váha věci</td>			<td>100</td></tr>
<tr><td>Maximální cena věci</td>			<td>250</td></tr>
<tr><td>Poměr kapacity batohu k sumární váze</td>	<td>0.6</td></tr>
<tr><td>Charakter granularity</td>			<td>Nerozlišovat</td></tr>
<tr><td>Exponent závislosti granularity</td>		<td>1</td></tr>
</table>

<p>Aby byly výsledky více vypovídající, je pro každé nastavení konfigurace generováno vždy padesát různých instancí problému (viz parametr <em>Počet instancí</em>), získané hodnoty jsou průměrovány a následně zanášeny do grafu.</p>

<p>Pro měření byly použity implementace jednotlivých metod ze třetí úlohy. Byly upraveny, aby nevypisovaly jednotlivá řešení, ale pouze hodnoty počtu navštívených stavů.</p>


<h4>Závislost počtu stavů na velikosti instance</h4>

<p>Jak bylo zjištěno už v úloze číslo tři, dynamické programování vychází při vyšších hodnotách počtu instancí mnohem lépe než metoda B&amp;B. Ta se může v nejhorším případě chovat téměř jako metoda hrubou silou, nicméně v praxi se nejhorší konfigurace vyskytují spíše zřídka. Dynamické programování, na druhou stranu, závisí nejen na počtu věcí, ale také na velikosti batohu (pseudopolynomiální složitost).</p>

<table>
<tr>	<td></td> <th colspan="2">Počet stavů</th>		</tr>
<tr>	<th>n</th>   <th>Dynamické programování</th> <th>B&amp;B</th>		</tr>
<tr>	<td>05</td> <td>924</td> <td>24</td>		</tr>
<tr>	<td>10</td> <td>3324</td> <td>253</td>		</tr>
<tr>	<td>15</td> <td>7161</td> <td>1429</td>		</tr>
<tr>	<td>20</td> <td>12392</td> <td>9890</td>	</tr>
<tr>	<td>25</td> <td>19853</td> <td>69985</td>	</tr>
<tr>	<td>30</td> <td>28052</td> <td>638518</td>	</tr>
<tr>	<td>35</td> <td>37512</td> <td>5009287</td>	</tr>
<tr>	<td>40</td> <td>48343</td> <td>26312804</td>	</tr>
</table>

<?php img('img/01/velikost_instance.png', 'Graf závislosti počtu navštívených stavů na velikosti instance'); ?>


<h4>Závislost počtu stavů na poměru kapacity batohu k sumární váze věcí</h4>

<p>Optimální řešení se může skládat z několika málo věcí nebo z téměř všech věcí. Podle toho, "z které strany" řešení hledáme, můžeme prozkoumat větší nebo menší část stavů. Pro poměr větší než jedna je pochopitelně řešením soubor všech věcí. Zadáme-li maximální váhu věci a rozložení (granularitu), je tím (statisticky) určena i sumární váha. Proto kapacitu batohu určujeme nepřímo, poměrem k sumární váze.</p>

<table>
<tr>	<td></td> <th colspan="2">Počet stavů</th>		</tr>
<tr>	<th>kapacita / &sum; váha</th> <th>Dynamické programování</th> <th>B&amp;B</th>		</tr>
<tr>	<td>0.1</td> <td>2174</td> <td>1463</td>		</tr>
<tr>	<td>0.2</td> <td>4263</td> <td>9806</td>		</tr>
<tr>	<td>0.3</td> <td>6602</td> <td>27432</td>		</tr>
<tr>	<td>0.4</td> <td>8364</td> <td>32352</td>		</tr>
<tr>	<td>0.5</td> <td>10728</td> <td>16280</td>		</tr>
<tr>	<td>0.6</td> <td>12582</td> <td>10549</td>		</tr>
<tr>	<td>0.7</td> <td>14601</td> <td>4446</td>		</tr>
<tr>	<td>0.8</td> <td>17023</td> <td>2151</td>		</tr>
<tr>	<td>0.9</td> <td>18402</td> <td>1514</td>		</tr>
<tr>	<td>1.0</td> <td>20907</td> <td>1272</td>		</tr>
</table>

<?php img('img/01/pomer_kapacity_batohu_k_sumarni_vaze.png', 'Graf závislosti počtu navštívených stavů na poměru kapacity batohu k sumární váze'); ?>

<p>Z grafu je jasně patrné, že u dynamického programování je křivka rovnoměrně rostoucí. Zajímavější je však metoda větví a hranic, přibližně do hodnoty poměru 0.4 je křivka rostoucí a poté postupně klesá.</p>

<p>Pokud je sumární váha věcí výrazně vyšší, než je kapacita batohu (hodnotou poměru je nízké číslo), zafunguje ořezávání shora, protože se již velice brzy detekuje překročení kapacity batohu. V opačném případě dochází zase spíše k ořezávání zdola - některé z již nalezených řešení je lepší než aktuálně prověřované. Při poměru jedna a vyšší se do batohu vejdou úplně všechny věci. Zdá se, že nejhorší možný poměr je okolo hodnoty 0.4, kdy pořádně nepracuje ani jedno z prořezávání, a kvůli tomu se prověřuje mnohem více stavů, než v ostatních případech.</p>

<p> Například v ukázce konfigurace níže jsou hodnoty hmotností takové, že se batoh hned ze začátku nepřetíží a cena poslední věci způsobí, že prořezávání nezafunguje ani podle ceny. Z tohoto příkladu je vidět, že metoda B&amp;B může být výrazně závislá na složení vstupních dat problému a v nejhorším případě může dosahovat původní exponenciální složitosti metody hrubé síly. V dalším textu bude pro toto používáno označení "vhodnost instance".</p>

<pre>
9405 32 450 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14
14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14
14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 14 450 449
</pre>


<h4>Závislost počtu stavů na velikosti batohu (dynamické programování)</h4>

<p>Program s dynamickým programováním byl napsán nerekurzivně, tj. počítá se celá tabulka se všemi stavy a poté se vybírá hodnota v pravém horním rohu, a proto by měl být průběh v minulé kapitole (Závislost počtu stavů na poměru kapacity batohu k sumární váze) přímkou rovnoběžnou s osou x. Nicméně při inspekci jednotlivých instancí problému, začínají kapacity cca. u hodnoty 100 (~0.1) a poté postupně rostou až do 1000 (~1.0). Tímto způsobem tedy generátor nastavoval požadovaný poměr.</p>

<p>Kdyby byl program napsán rekurzivně, nepočítaly by se vždy všechny stavy a nejednalo by se o přímku - křivka by se s většími kapacitami batohu postupně zakřivovala do vodorovnějšího stavu.</p>

<?php img('img/01/kapacita_batohu.png', 'Graf závislosti počtu navštívených stavů na kapacitě batohu (dynamické programování)'); ?>


<h4>Závislost počtu stavů na charakteru granularity</h4>

<p>Podle vyneseného grafu se zdá, že granularita (převaha malých či velkých věcí) na počet kroků k řešení má v případě dynamického programování vliv. Je to zejména patrné u vyššího počtu věcí, trojce křivek se zřetelně rozbíhá.</p>

<table>
<tr>	<td></td> <th colspan="6">Počet stavů</th>		</tr>
<tr>	<td></td>  <th colspan="3">Dynamické programování</th> <th colspan="3">B&amp;B</th>		</tr>
<tr>	<th>n</th> <th>malé</th>	<th>nerozl.</th>	<th>velké</th>	<th>malé</th>	<th>nerozl.</th>	<th>velké</th></tr>
<tr>	<td>05</td> <td>393</td>	<td>924</td>	<td>1501</td>	<td>23</td>	<td>24</td>	<td>24</td>	</tr>
<tr>	<td>10</td> <td>1251</td>	<td>3324</td>	<td>5388</td>	<td>224</td>	<td>253</td>	<td>286</td>	</tr>
<tr>	<td>15</td> <td>2652</td>	<td>7161</td>	<td>11783</td>	<td>1496</td>	<td>1429</td>	<td>17561</td>	</tr>
<tr>	<td>20</td> <td>4968</td>	<td>12392</td>	<td>20576</td>	<td>4760</td>	<td>9890</td>	<td>17561</td>	</tr>
<tr>	<td>25</td> <td>7719</td>	<td>19853</td>	<td>31561</td>	<td>21305</td>	<td>69985</td>	<td>137054</td>	</tr>
<tr>	<td>30</td> <td>10866</td>	<td>28052</td>	<td>45479</td>	<td>122636</td>	<td>638518</td>	<td>982906</td>	</tr>
<tr>	<td>35</td> <td>15370</td>	<td>37512</td>	<td>61134</td>	<td>396766</td>	<td>5009287</td>	<td>6875663</td>	</tr>
<tr>	<td>40</td> <td>19546</td>	<td>48343</td>	<td>79869</td>	<td>2271841</td>	<td>26312804</td>	<td>23822808</td>	</tr>
</table>

<?php img('img/01/charakter_granularity_dyn.png', 'Graf závislosti počtu navštívených stavů na charakteru granularity (dynamické programování)'); ?>

<p>U metody větví a hranic tak jasný vliv granularity vidět není. Do počtu věcí 35 je situace podobná, jako u dynamického programování, ale celou situaci nabourává hodnota 40. Toto chování si vysvětluji nevhodným složením jednotlivých věcí v batohu, pravděpodobně byly vygenerovány instance, pro které není tato metoda až tak vhodná. Odhadoval bych, že výkonnost algoritmu bude spíše záviset na "vhodnosti instance" pro tuto metodu, než na granularitě.</p>

<?php img('img/01/charakter_granularity_bb.png', 'Graf závislosti počtu navštívených stavů na charakteru granularity (B&amp;B)'); ?>


<h4>Závislost počtu stavů na maximální ceně věci</h4>

<p>Zdá se, že ani jedna z metod není závislá na maximální ceně věcí, měření bylo pro obě metody provedeno dvakrát s různými instancemi. U dynamického programování je kolísání pravděpodobně způsobeno ne vždy stejnými kapacitami batohu. Metodu větví a hranic spíše ovlivňuje "vhodnost instance" než maximální cena věci. Pokud by mezi těmito parametry i byly nějaké závislosti, nemáme moc velkou šanci je z testovacích dat zjistit.</p>

<table>
<tr>	<td></td> <th colspan="4">Počet stavů</th>		</tr>
<tr>	<td></td>  <th colspan="2">Dynamické programování</th> <th colspan="2">B&amp;B</th>		</tr>
<tr>	<th>max. cena</th> 	<th>#1</th>	<th>#2</th>	<th>#1</th>	<th>#2</th>	</tr>
<tr>	<td>250</td> 		<td>12481</td>	<td>12647</td>	<td>8279</td>	<td>11777</td>	</tr>
<tr>	<td>500</td> 		<td>12816</td>	<td>12561</td>	<td>11479</td>	<td>12281</td>	</tr>
<tr>	<td>750</td> 		<td>12874</td>	<td>13064</td>	<td>10329</td>	<td>15424</td>	</tr>
<tr>	<td>1000</td> 		<td>13001</td>	<td>12540</td>	<td>10464</td>	<td>8343</td>	</tr>
<tr>	<td>1250</td> 		<td>13058</td>	<td>12973</td>	<td>13633</td>	<td>9234</td>	</tr>
<tr>	<td>1500</td> 		<td>12690</td>	<td>12301</td>	<td>12232</td>	<td>11484</td>	</tr>
<tr>	<td>1750</td> 		<td>12398</td>	<td>12780</td>	<td>9837</td>	<td>9693</td>	</tr>
<tr>	<td>2000</td> 		<td>12778</td>	<td>12341</td>	<td>10629</td>	<td>10250</td>	</tr>
<tr>	<td>2250</td> 		<td>12742</td>	<td>12906</td>	<td>10491</td>	<td>11619</td>	</tr>
<tr>	<td>2500</td> 		<td>12914</td>	<td>12453</td>	<td>9428</td>	<td>12088</td>	</tr>
<tr>	<td>2750</td> 		<td>12698</td>	<td>12875</td>	<td>10853</td>	<td>11449</td>	</tr>
<tr>	<td>3000</td> 		<td>12874</td>	<td>12747</td>	<td>11509</td>	<td>12085</td>	</tr>
</table>

<?php img('img/01/max_cena.png', 'Graf závislosti počtu navštívených stavů na maximální ceně'); ?>





<h3>Závěr</h3>

<p>V této úloze bylo prakticky ověřeno chování jednotlivých algoritmů pro řešení problému batohu. Výsledky - ve formě tabulek, grafů a komentářů - lze najít přímo u textů zabývajících se daným parametrem.</p>














<h2>Genetickými algoritmy</h2>


<h3>Zadání</h3>

<ul>
<li>Zvolte si heuristiku, kterou budete řešit problém vážené splnitelnosti booleovské formule (simulované ochlazování, simulovaná evoluce, tabu prohledávání).</li>
<li>Tuto heuristiku použijte pro řešení problému batohu. Můžete použít dostupné instance problému (<?php blank('http://service.felk.cvut.cz/courses/X36PAA/knapsolv.html', 'zde'); ?>), anebo si vygenerujte své instance <?php blank('http://service.felk.cvut.cz/courses/X36PAA/wknapgen.html', 'pomocí generátoru'); ?>. Používejte instance s větším počtem věcí (&gt;30).</li>
<li>Hlavním cílem domácí práce je seznámit se s danou heuristikou, zejména se způsobem, jakým se nastavují její parametry (rozvrh ochlazování, selekční tlak, tabu lhůta...) a modifikace (zjištění počáteční teploty, mechanismus selekce, tabu atributy...). Není-li Vám cokoli jasné, prosíme ptejte se na cvičeních.</li>
<li>Problém batohu není příliš obtížný, většinou budete mít k dispozici globální maxima (exaktní řešení) z předchozích prací, například z dynamického programování.</li>
</ul>





<h3>Popis implementovaného genetického algoritmu</h3>

<p>Vlastní genetický algoritmus je relativně jednoduchý. Na začátku se inicializuje populace na náhodné hodnoty a poté se vstoupí do while cyklu. V něm se postupně kopírují nejlepší jedinci z předchozí populace, provádějí se rekombinace s mutacemi a z nejlepších výsledků se vytvoří nová populace. Cyklus se zastaví poté, co se určitý počet generací nemění nejlepší známé řešení problému. Aby se výsledek ještě vylepšil, je celý algoritmus spuštěn několikrát nezávisle na sobě a vybírá se nejlepší z nalezených lokálních maxim.</p>

<pre>
SolveKnapsack()
{
	for(SeveralSeparateRuns)
	{
		InitializePopulation();

		while(BestSolutionIsChanging())
		{
			CopyBestFromPreviousPopulation();
			Recombinations();
			Mutations();
			Selection();
		}
	}

	DisplayBest();
}
</pre>

<p>Přesné chování genetického algoritmu lze upravit následujícími konstantami.</p>

<p>NUM_SEPARATE_RUNS definuje počet nezávislých spuštění genetického algoritmu nad danými daty, které jsou přidány kvůli alespoň částečnému odstranění problémů s lokálními maximy, přesnost výsledku se výrazně zvyšuje. Pokud se přesáhne STOP_BEST_NOT_CHANGED populací a nejlepší známé řešení se už dále nemění, je algoritmus ukončen.</p>

<p>NUM_COPIED_BEST_PARRENTS definuje, kolik nejlepších rodičů se automaticky zkopíruje do nově vytvářené populace. Mohli bychom se ocitnout v situaci, že po aplikování rekombinací a mutací získáme horší výsledek, než byl ten, ze kterého jsme vyšli. Zkopírování nejlepších rodičů zajistí, že v takovém případě populace tolik nezdegraduje.</p>

<p>POPULATION_SIZE udává velikost populace, nad kterou se provádí rekombinace a mutace, které se ukládají do pomocné populace o velikosti NEW_POPULATION_SIZE. Po aplikaci genetických operátorů se z ní vybírají nejlepší jedinci a vytváří se nová populace o původní velikosti.</p>

<p>NUM_MUTATIONS_IN_POPULATION obsahuje počet náhodných mutací, které se provedou při vytváření nové populace.</p>

<pre>
#define NUM_SEPARATE_RUNS		5
#define STOP_BEST_NOT_CHANGED		20
#define NUM_COPIED_BEST_PARRENTS	3
#define POPULATION_SIZE			20
#define NEW_POPULATION_SIZE		50
#define NUM_MUTATIONS_IN_POPULATION	5
</pre>







<h3>Měření</h3>

<p>Jistým problémem GA je, že i pro stejná vstupní data vrací při opakovaných spuštěních odlišná řešení, která mohou být i výrazně odlišná. Je to způsobeno tím, že se výchozí populace inicializuje na náhodné hodnoty a i selekce spolu s mutacemi se provádějí náhodně. Nemáme proto naprosto žádnou záruku, že se výsledné řešení bude blížit k optimálnímu nebo že se bude pohybovat v určitém rozsahu. Na druhou stranu níže uvedený graf nejlepší dosažené ceny v závislosti na vytvářených populacích ukazuje, že se ceny postupně vyvíjejí ke stále lepším. Pro výpočty a vynesení grafu byla použita následující instance problému:</p>

<ul>
<li>ID: 9550</li>
<li>Počet věcí: 40</li>
<li>Kapacita batohu: 600</li>
<li>Hmotnost a cena věcí: 14 223 38 230 3 54 1 214 13 118 4 147 15 16 2 104 5 56 49 154 40 106 24 234 18 34 33 195 7 74 10 129 12 159 42 37 41 10 11 185 6 243 45 87 32 57 20 87 9 26 16 201 39 0 23 128 39 194 21 10 46 1 8 28 30 59 26 130 35 160 22 91 34 180 19 16 31 1 17 72</li>
<li>Exaktní řešení: 4068</li>
</ul>

<?php img('img/01/costs.png', 'Vývoj cen pro jednotlivá spuštění'); ?>

<p>Pozn.: Jsem si vědom toho, že linky nejsou v tomto grafu zrovna nejvhodnější, ale při vynášení jednotlivých bodů je výstup z gnuplotu hodně nepřehledný.</p>

<p>Jelikož je GA pro podobné instance problému velice rychlou metodou, je možné algoritmus spouštět vícekrát po sobě a poté uživateli zobrazit nejlepší z dosažených řešení. Jeden průchod pro výše uvedená nastavení a instanci problému, který se ukončil po 35. generaci, trval 4 ms (měřeno pomocí standardního programu time, položka user).</p>





<h3>Závěr</h3>

<p>Při vypracovávání této práce jsem s překvapením zjistil, že naprogramovat si vlastní genetický algoritmus není vůbec složité. Velice mi při tom pomohl naprosto skvělý popis genetických algoritmů od Marka Obitka (<?php blank('http://cs.felk.cvut.cz/~xobitko/ga/', 'http://cs.felk.cvut.cz/~xobitko/ga/'); ?>), který jsem náhodou objevil při pročítání <?php blank('http://agenda.cern.ch/fullAgenda.php?ida=a0635', 'prezentace o genetických algoritmech'); ?> z University of Extremadura (Spain).</p>

<p>Hlavním problémem při programování GA je správné nastavení konfiguračních parametrů tak, aby algoritmus pracoval co nejlépe. Popravdě jsem nenašel žádný zaručený způsob, jak toho dosáhnout a po určitém čase jsem se jednoduše spokojil s hodnotami, které fungují celkem dobře, ale optimální asi nebudou. Jelikož se v GA používá funkce random() v podstatě všude, je velice obtížné (rychle a jednoznačně) určit, zda je určitá změna daného parametru prospěšná, či nikoliv. Vždy je nutné nad danými daty spustit program vícekrát, průměrovat výsledky a donekonečna porovnávat. A ani poté si člověk nemůže být úplně jistý.</p>

<p>Hodně dobrým příkladem může být parametr NUM_MUTATIONS_IN_POPULATION, který určuje kolik mutací se provede při vytváření každé populace. Na jednu stranu by to mělo být relativně vysoké číslo, abychom se dokázali dostat z lokálního maxima, ale na druhou stranu naprostá většina mutací způsobuje zhoršení a degradaci populace a jen několik málo z nich může být přínosem. Ten se ale opět - kvůli náhodnému výběru rodičů pro rekombinaci - nemusí vůbec projevit. V limitním případě se při příliš vysokém počtu mutací může z GA stát spíše random search, při příliš nízkém se běh zastaví v lokálním maximu.</p>

<p>Jiným parametrem může být velikost populace POPULATION_SIZE. Při čtení různých materiálů o GA, kdy jsem teprve zjišťoval, jak vlastně fungují, jsem několikrát viděl zmíněno, že základní populace by měla být spíše malá cca. 20 až 50 jedinců. To je sice pravda, ale velikost pomocného bufferu NEW_POPULATION_SIZE, do kterého se generují rekombinace a mutace a z nichž se poté selekcí vybírají jedinci nové populace, tak jednoznačná není. Čím bude menší, tím méně kombinací budeme generovat a naopak čím bude větší, tím bude program pomalejší. Opět je nutné najít rozumné optimum.</p>



<h2>A z toho všeho plyne...</h2>

<p>..., že nemá cenu se příliš pokoušet přeskládávat věci, stejně se do těch 20 kil povolených v letadle s věcma na půl roku není šance vejít. Optimální řešení existuje, nicméně Problém batohu je <em>NP-úplný</em>. Tohle všechno jsme se učili na <?php blank('http://www.fel.cvut.cz/', 'FELu'); ?>, heč! ;-)</p>

</div>


<?php
include_once 'p_end.php';
?>
