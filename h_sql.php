<?
$p_title = 'HOWTO - SQL';
include 'p_begin.php';
?>


<p>Kvalitní kniha o SQL: Martin Gruber: Mistrovství v SQL, SoftPress 2004</p>


<!--
<div class="object">
<div class="name"></div>
<pre>

</pre>
</div>
-->


<div class="object">
<div class="name">Vytvoření tabulky</div>
<pre>
-- Vlastnosti sloupců
-- NOT NULL
-- DEFAULT
-- UNIQUE
-- PRIMARY KEY
-- REFERENCES
-- CHECK

-- Není funkční příklad (všechno pohromadě)
CREATE TABLE tabulka
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	jmeno VARCHAR(20) NOT NULL UNIQUE,
	cislo INT CHECK (cislo &lt; 50),
	mesto VARCHAR(20) DEFAULT = 'Praha' CHECK (mesto IN ('Praha', 'Brno')),
	cizi_klic INT UNSIGNED NOT NULL REFERENCES jina_tabulka(id),

	-- nebo omezeni zvlast
	PRIMARY KEY (id),
	UNIQUE (jmeno),
	CHECK (cislo &lt; 50),
	CHECK (mesto IN ('Praha', 'Brno'))
	FOREIGN KEY (cizi_klic) REFERENCES jina_tabulka(id)
) ENGINE=INNODB;
</pre>
</div>


<div class="object">
<div class="name">Zrušení tabulky</div>
<pre>
DROP TABLE tabulka [CASCADE CONSTRAINTS]
</pre>
</div>


<div class="object">
<div class="name">Změna struktury tabulky</div>
<pre>
ALTER TABLE tabulka ADD nový_sloupec vlastnosti_sloupce;
ALTER TABLE tabulka ALTER COLUMN sloupec ADD DEFAULT 'implicitní_hodnota';
ALTER TABLE tabulka ADD CONSTRAINT io | DROP CONSTRAINT io
...
</pre>
</div>


<div class="object">
<div class="name">Přidání cizích klíčů</div>
<pre>
ALTER TABLE tabulka ADD(FOREIGN KEY(sloupec) REFERENCES jina_tabulka);
</pre>
</div>


<div class="object">
<div class="name">Zrušení tabulky</div>
<pre>
DROP TABLE tabulka
</pre>
</div>


<div class="object">
<div class="name">Spouštěné referenční akce</div>
<pre>
-- ON UPDATE
-- ON DELETE

-- CASCADE cizí klíč se změní zároveň s rodičovským
-- SET NULL
-- SET DEFAULT
-- NO ACTION

CREATE TABLE `sessions`
(
	`id_user` INT UNSIGNED NOT NULL ,
	FOREIGN KEY ( `id_user` ) REFERENCES users ( id_user )
			ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;
</pre>
</div>


<div class="object">
<div class="name">Vložení řádku</div>
<pre>
INSERT INTO tabulka (položky) VALUES (hodnoty);
</pre>
</div>


<div class="object">
<div class="name">Vkládání s využitím dat z jiné tabulky</div>
<pre>
INSERT INTO admins (id_user, id_webpage)
	SELECT (SELECT id_user FROM users WHERE login='root'),
		id_webpage FROM webpages;

INSERT INTO dnycelkem(datum, celkem)
	SELECT datum, SUM(hodnota)
	FROM objednavky
	GROUP BY datum;

-- Naplnění hned při vytvoření
CREATE TABLE kolik_kopii (rod_c CHAR(10), pocet SMALLINT)
AS SELECT rod_c, COUNT(c_kopie) FROM vypujcky GROUP BY rod_c;
</pre>
</div>


<div class="object">
<div class="name">Smazání řádků</div>
<pre>
DELETE FROM tabulka WHERE omezení_řádků;
</pre>
</div>


<div class="object">
<div class="name">Aktualizace hodnot</div>
<pre>
UPDATE tabulka SET sloupec = hodnota WHERE omezení_řádků;
UPDATE tabulka SET sloupec = sloupec*1.1 WHERE omezení_řádků;
</pre>
</div>


<div class="object">
<div class="name">Základní dotazy</div>
<pre>
-- Všechny sloupce
SELECT * FROM tabulka;

-- Určité sloupce
SELECT sloupce FROM tabulka;

-- Jedinečné řádky, zpomaluje!
SELECT DISTINCT sloupce FROM tabulka;

-- Omezení řádků
-- =, &gt;, &lt;, &lt;=, &lt;=, &lt;&gt; AND, OR, NOT
SELECT sloupce FROM tabulka WHERE podmínky;
</pre>
</div>


<div class="object">
<div class="name">Speciální operátory</div>
<pre>
-- Test více hodnot najednou
SELECT sloupce FROM tabulka WHERE mesto = 'Praha' OR mesto = 'Brno';
SELECT sloupce FROM tabulka WHERE mesto IN ('Praha', 'Brno');

-- Rozsah, včetně okrajových hodnot
-- První musí být menší než druhá, převádí se to na &gt;= AND &lt;=
SELECT sloupce FROM tabulka WHERE sloupec BETWEEN 50 AND 100;

-- Rozsah, bez okrajových hodnot
SELECT sloupce FROM tabulka
WHERE sloupec BETWEEN 50 AND 100 AND NOT sloupec IN (50, 100);

-- Neúplně specifikované řetězce
-- '_' právě jeden znak
-- '%' nula a více znaků
SELECT sloupce FROM tabulka WHERE retezec LIKE 'P%';

-- Escape znaky
-- hledá dvojici _/
SELECT sloupce FROM tabulka WHERE retezec LIKE '%/_//%' ESCAPE '/';

-- Výběr NULLových hodnot
SELECT sloupce FROM tabulka WHERE sloupec IS (NOT) NULL;
</pre>
</div>


<div class="object">
<div class="name">Agregační funkce</div>
<pre>
-- COUNT(sloupec) počet vybraných řádků
-- SUM(sloupec) součet hodnot
-- AVG(sloupec) aritmetický průměr hodnot
-- MAX(sloupec) maximální hodnota
-- MIN(sloupec) minimální hodnota

-- Počet řádků v tabulce
SELECT COUNT(*) FROM tabulka;

-- Počet různých hodnot ve sloupci
-- Bez DISTINCT počet neNULLových hodnot
SELECT COUNT(DISTINCT sloupec) FROM tabulka;

-- Součet plateb za jednotlivé dny
SELECT datum, SUM(platby) FROM tabulka GROUP BY datum;

-- Počet (např. zpráv ve fóru) za jednotlivé dny
SELECT datum, COUNT(*) FROM messages GROUP BY datum;

-- Pouze dny, ve kterých byl počet zpráv větší než deset
-- WHERE se provádí nad řádky původní tabulky
-- HAVING nad řádky s agregovanými hodnotami
SELECT datum, COUNT(*) FROM messages GROUP BY datum HAVING COUNT(*) > 10;

-- Průměr ze všech řádků, včetně NULLových
SELECT AVG(COALESCE(cena, 0)) FROM tabulka;
</pre>
</div>


<div class="object">
<div class="name">Pojmenování výstupních sloupců, vkládání textu do výstupu</div>
<pre>
SELECT sloupec * 100 AS procentualne, '%' FROM tabulka;
</pre>
</div>


<div class="object">
<div class="name">Datum, čas, v každém SQL je to trochu jinak :-(</div>
<pre>
-- Tohle mi fungovalo v MySQL
RRRR-MM-DD HH:MM:SS
2004-08-28 11:27:46

-- A tohle je z jiného zdroje (asi IBM cosi)
DD/MM/RRRR HH:MM:SS

-- Hodnotový výraz
INTERVAL YEAR TO MONTH '4/11'

-- 4 roky a 11 měsíců po určitém datu
DATE '2/4/98' + INTERVAL YEAR TO MONTH '4/11'

-- Interval z dvou dat (vytvoří INTERVAL DAY '2')
DATE '2/4/98' - DATE '2/2/98'
</pre>
</div>


<div class="object">
<div class="name">Přetypování</div>
<pre>
CAST ('12/03/2001' AS DATE)
</pre>
</div>


<div class="object">
<div class="name">Podmíněné výrazy</div>
<pre>
-- Dvě možnosti, nelze je míchat
SELECT CASE jmeno WHEN 'Bžeťa' THEN 'Bženda' ELSE jmeno END FROM tabulka;
SELECT CASE WHEN jmeno = 'Bžeťa' THEN 'Bženda' ELSE jmeno END FROM tabulka;

-- Když jsou obě hodnoty stejné, vrátí NULL
SELECT NULLIF(jmeno, 'Bžeťa') FROM tabulka;

-- Vrátí první z hodnot, která není NULLová
-- Pokud jsou všechny NULL, vrátí NULL
SELECT COALESCE(prijmeni, login, jmeno) FROM tabulka;

-- Autoincrement ;-)
-- Pokud nemá žádný řádek, inkrementuje se nula, jinak maximální ID
-- Problém byl s vložením prvního řádku
INSERT INTO tabulka (id) VALUES(1 + COALESCE(SELECT MAX(id) FROM tabulka, 0));
</pre>
</div>


<div class="object">
<div class="name">Řazení výstupu</div>
<pre>
-- ASC vzestupně (implicitní)
-- DESC sestupně

SELECT * FROM tabulka ORDER BY sloupec1 DESC, sloupec2 ASC;
</pre>
</div>


<div class="object">
<div class="name">Přirozené spojení tabulek</div>
<pre>
SELECT t1.sloupce, t2.sloupce
FROM t1, t2
WHERE t1.mesto = t2.mesto;
</pre>
</div>


<div class="object">
<div class="name">Speciální operátory spojení</div>
<pre>
-- CROSS JOIN křížové spojení (celý kartézský součin)
-- NATURAL JOIN přirozené spojení (podle jména!)
-- UNION JOIN všechny řádky z tabulky A s NULL ve sloupcích z B a naopak

-- INNER JOIN vnitřní spojení (INNER je implicitní, neuvádí se)
-- OUTER JOIN vnější spojení, obsahuje i NULL hodnoty
-- LEFT OUTER JOIN všechny řádky z A spárované nebo nespárované s B
-- RIGHT OUTER JOIN všechny řádky z B spárované nebo nespárované s A
-- FULL OUTER JOIN všechny řádky z obou, nespojené části mají NULL

-- Přirozené spojení (klasicky)
SELECT sloupce FROM t1 a, t2 b WHERE a.mesto = b.mesto;

-- Přirozené spojení (podle jmen sloupců)
SELECT sloupce FROM t1 a NATURAL JOIN t2 b;

-- Přirozené spojení pomocí predikátu v ON
SELECT sloupce FROM t1 a, t2 b ON a.mesto = b.mesto WHERE podmínka;

-- Přirozené spojení pomocí USING se jménem sloupce
SELECT sloupce FROM t1 a, t2 b USING (mesto) WHERE podmínka;

-- Všichni prodejci s objednávkami k určitému datu
-- Kdyby nebylo vnější, vynechali by se prodejci, kteří neměli objednávky
SELECT sloupce FROM prodejci NATURAL LEFT OUTER JOIN objednavky
WHERE datum = '10/03/2000';
</pre>
</div>


<div class="object">
<div class="name">Poddotazy, vhnízďování dotazů</div>
<pre>
-- Celkový počet zpráv zaslaných do diskuze ke článku clanek.php
SELECT count(*) FROM messages WHERE id_webpage
	= (SELECT id_webpage FROM webpages WHERE filename = 'clanek.php');

-- Poddotaz musí generovat právě jednu hodnotu
-- Pokud jich generuje víc, musí se použít místo = operátor IN

-- Korelované poddotazy: parametry z vnějšího dotazu se používají i ve vnitřním
</pre>
</div>


<div class="object">
<div class="name">Poddotazové operátory</div>
<pre>
-- EXIST true, pokud poddotaz něco nalezl
-- ANY/SOME true, pokud se rovná některé z vrácených hodnot
-- ALL podmínka platí pro všechny
-- UNIQUE unikátní výstup, právě jedna výstupní hodnota

-- Vybrat zakazniky, pokud je alespoň jeden z nich z Morávky
SELECT * FROM zakaznici
WHERE EXISTS (SELECT * FROM zakaznici WHERE city='Morávka');

-- Všichni prodejci, kteří mají alespoň jednoho zákazníka ze stejného města
-- U ANY lze použít třeba menší než, u IN ne
SELECT * FROM prodejci WHERE city IN (SELECT city FROM zakaznici);
SELECT * FROM prodejci WHERE city = ANY (SELECT city FROM zakaznici);

-- All pomocí EXIST
-- Najdi kino, které hraje všechna představení
-- Najdi takové kino, pro něž neexistuje představení,
-- které není dáváno tímto kinem
SELECT název_k FROM Kina K
WHERE NOT EXISTS (SELECT * FROM Představení P
		WHERE K.název_k &lt;&gt; P.název_k);
</pre>
</div>


<div class="object">
<div class="name">Slučování dotazů</div>
<pre>
-- UNION sloučí výstup ze dvou dotazů do jednoho, automaticky vylučuje duplikáty
-- UNION ALL nevylučuje duplikáty
-- UNION CORRESPONDING ??? (SELECT * ... UNION CORRESPONDING SELECT * ...)
-- INTERSECT průnik výstupu dvou dotazů
-- EXCEPT odečte výstup druhého dotazu od prvního (někdy jako MINUS)

-- Všichni prodejci a zákazníci z Morávky
SELECT jmeno FROM prodejci WHERE city = "Morávka"
UNION
SELECT jmeno FROM zákazníci WHERE city = "Morávka"
ORDER BY 1; -- sloupce nemají jména
</pre>
</div>


<div class="object">
<div class="name">Postupné dotazování</div>
<pre>
WITH
	r1 AS SELECT nazev_k FROM program,
	r2 AS SELECT jmeno_f FROM film WHERE herec='Bžeťa',
	r AS SELECT * FROM r1 CROSS JOIN r2,
	s AS (SELECT * FROM r) EXCEPT (SELECT nazev_k, jmeno_f FROM program),
	t AS SELECT DISTINCT nazev_k FROM s
(SELECT DISTINCT nazev_k FROM program)
EXCEPT (SELECT * FROM t);
</pre>
</div>


<div class="object">
<div class="name">Pohledy</div>
<pre>
CREATE VIEW lidi_z_moravky AS SELECT name FROM lidi WHERE city = 'Moravka';
-- Odteď se může lidi_z_moravky používat, jako kdyby to byla klasická tabulka
-- Aby šlo UPDATE a INSERT, musí to být jednoznačná operace
</pre>
</div>


<div class="object">
<div class="name">Přístupová práva</div>
<pre>
-- ALTER
-- SELECT
-- INSERT
-- UPDATE
-- DELETE
-- REFERENCES
-- INDEX
-- DROP
-- ALL PRIVILEGES

-- V příkladech je Bženda vlastníkem schématu (tabulek)

GRANT SELECT ON tabulka TO Bžéťa;
GRANT SELECT, UPDATE(sloupce) ON tabulka TO Bžéťa;
GRANT SELECT ON tabulka TO PUBLIC; -- všem uživatelům

-- Bžéťa bude moct taky udělovat práva
GRANT SELECT ON tabulka TO Bžéťa WITH GRANT OPTION;

-- Tohle už dělá Bžéťa
GRANT SELECT ON Bženda.tabulka TO někdo_s_Bž_na_začátku;

-- Odebrání práv Bžéťovi
REVOKE UPDATE ON tabulka FROM Bžéťa
</pre>
</div>


<div class="object">
<div class="name">Transakce</div>
<pre>
COMMIT WORK; -- změny se stanou trvalé
ROLLBACK WORK; -- zahození změn

-- Možná se to jmenuje jinak :-(
SET AUTOCOMMIT ON; -- zapne automatické potvrzování změn
SET AUTOCOMMIT OFF; -- vypne
</pre>
</div>


<div class="object">
<div class="name">Funkce pro datum a čas (možná jenom MySQL)</div>
<pre>
HOUR(soupec)
MINUTE(soupec)
SECOND(soupec)
DAYNAME(soupec)
DAYOFMONTH(soupec)
MONTHNAME(soupec)
MONTH(soupec)
YEAR(soupec)
ADDDATE(sloupec, INTERVAL x typ)
SUBDATE(sloupec, INTERVAL x typ)
CURDATE()
CURTIME()
NOW()
UNIX_TIMESTAMP(datum)
DATE_FORMAT(sloupec, '%d.%m.%Y') -- DD.MM.YYY
TIME_FORMAT(sloupec, '%H:%i:%s') -- HH:MM:SS
</pre>
</div>


<?
include 'p_end.php';
?>
