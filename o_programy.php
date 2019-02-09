<?
$p_title = 'Programy';
include 'p_begin.php';
?>

<p>Všechny programy umístěné na této stránce jsou volné programové vybavení; můžete je šířit a modifikovat podle ustanovení Obecné veřejné licence GNU verze 2 (GNU GPL v2), vydané Free Software Foundation.</p>

<p>Programy jsou rozšiřovány v naději, že budou užitečné, avšak BEZ JAKÉKOLI ZÁRUKY; neposkytují se ani odvozené záruky PRODEJNOSTI anebo VHODNOSTI PRO URČITÝ ÚČEL.</p>

<p>Další podobnosti hledejte v textu Obecné veřejné licence GNU verze 2, který je dostupný například na <?Blank('http://www.gnu.org/');?> popř. český překlad na <?Blank('http://www.gnu.cz/');?>. Zdrojové kódy daného programu jsou vždy přiloženy k archivu (většinou adresář _src).</p>

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

<a id="kbi"></a>
<div class="object">
<div class="head">
<?php Img('img/prog/kbi.png', 'kbi');?>
<div class="name">kbi (utilita)</div>
<div class="date">30.09.2009</div>
<div class="technology">C++, Qt</div>
<div class="address"><?Down('down/prog/kbi.tar.gz');?></div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Dvacetiřádkový indikátor rozložení klávesnice založený na QEvent::KeyboardLayoutChange a QApplication::keyboardInputLocale(). Určen pro bezpanelové správce oken typu PekWM.</div>
</div>


<a id="x36jui"></a>
<div class="object">
<div class="name">X36JUI (semestrální práce)</div>
<div class="date">05.02.2009</div>
<div class="technology">Lisp</div>
<div class="address"><?Down('down/prog/x36jui.tar.gz');?></div>
<div class="rate">05 z 10</div>

<div class="descript">Hra na slepou bábu (Blind-Man) naprogramovaná v Lispu.</div>
</div>


<a id="hyper"></a>
<div class="object">
<div class="head">
<?php Img('img/prog/hyper_sm.png', 'Hyper');?>
<div class="name">Hyper (semestrální práce)</div>
<div class="date">05.02.2009</div>
<div class="technology">C++, SDL, OpenGL, fyzika</div>
<div class="address"><?Down('down/prog/hyper.zip');?></div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Simulátor gravitace do fyziky X36F2V.</div>
</div>


<a id="x36paa"></a>
<div class="object">
<div class="head">
<?Img('img/prog/x36paa_sm.png', 'X36PAA');?>
<div class="name">Úlohy do X36PAA (semestrální práce)</div>
<div class="date">20.01.2008</div>
<div class="technology">C++, STL, gnuplot, HTML</div>
<div class="address"><?Down('down/prog/x36paa.tar.gz');?></div>
<div class="rate">9 z 10</div>
</div>

<div class="descript">
<p>Úlohy z předmětu X36PAA - Problémy a algoritmy. Kompletní řešení včetně programů a reportů.</p>

<ul>
<li>Úloha #1 - Problému batohu řešený hrubou silou a heuristikou podle poměru cena/váha</li>
<li>Úloha #2 - Prohledávání stavového prostoru do šířky (BFS) a vlastní heuristika řešící zobecněný problém dvou kýblů</li>
<li>Úloha #3 - Problém batohu řešený metodou větví a hranic (B&amp;B), metodou dynamického programování a heuristikou podle poměru cena/váha s testem nejcennější věci</li>
<li>Úloha #4 - Experimentální hodnocení algoritmů pro řešení problému batohu</li>
<li>Úloha #5 - Problém batohu řešený genetickými algoritmy</li>
<li>Úloha #6 - Problém vážené splnitelnosti booleovské formule (SAT) řešený genetickými algoritmy</li>
</ul>
</div>
</div>


<a id="icqstatusindicator"></a>
<div class="object">
<div class="head">
<?Img('img/prog/icqstatusindicator_sm.png', 'ICQ status indicator');?>
<div class="name">ICQ status indicator for centericq/centerim (krize)</div>
<div class="date">09.12.2007</div>
<div class="technology">PHP</div>
<div class="address"><?Down('down/prog/icqstatusindicator.txt');?></div>
<div class="rate">7 z 10</div>
</div>

<div class="descript">Krizové řešení další změny ICQ protokolu firmou AOL, která způsobuje, že jsou všichni lidé v kontaktlistu uvedeni jako offline. Program načte seznam kontaktů z konfiguračních souborů centericq a ve vygenerované HTML stránce zobrazí jejich stavové indikátory.</div>
</div>


<a id="borsch"></a>
<div class="object">
<div class="head">
<?Img('img/prog/borsch_sm.jpg', 'Borsch');?>
<div class="name">Borsch interpreter (semestrální práce)</div>
<div class="date">03.02.2007</div>
<div class="technology">C++</div>
<div class="address"><?Blank('http://woq.nipax.cz/borsch/');?></div>
<div class="rate">09 z 10</div>
</div>

<div class="descript">Interpret programovacího jazyka Borsch, který je velice podobný PHP. Podporuje datové typy bool, int, float a string, konstanty, globální a lokální proměnné, vyhodnocování výrazů ve stylu C/C++, if-else, for, while řídící struktury, zabudované a uživatelsky definované funkce, return, break, continue strukturované skoky a inkludování souborů na úrovni preprocesoru.</div>
</div>


<a id="teplochod"></a>
<div class="object">
<div class="head">
<?Img('img/prog/teplochod_sm.png', 'Teplochod');?>
<div class="name">Teplochod (téměř účetní software)</div>
<div class="date">23.07.2006</div>
<div class="technology">PHP, MySQL</div>
<div class="address"><?Down('down/prog/teplochod.tar.gz');?></div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Maminka mi vždy říkala, že v jednoduchosti je síla! Teplochod je jednoduchý do takové míry, že neumí téměř nic, nicméně i nic v tomto případě plně dostačuje ;-) Umožňuje vám průběžně si zapisovat částky, které jste vydělali a kolik utratili a on vám na oplátku spočítá, kolik peněz jste vydělali :-) a kolik utratili :-(.</div>
</div>


<a id="trn"></a>
<div class="object">
<div class="name">trn (semestrální práce)</div>
<div class="date">06.04.2006</div>
<div class="technology">C++, pthread vlákna, unixové procesy</div>
<div class="address"><?Down('down/prog/trn.tar.gz');?></div>
<div class="rate">05 z 10</div>

<div class="descript">Semestrální práce z předmětu Operační systémy (X36OSY). V systému je n překladatelů. Klienti vstupují do systému a alokují si překladate. Pokud není žádný překladatel volný, pak klient odchází ze systému. Pokud má klient svého překladatele, pak generuje náhodné znaky a-z a A-Z a zapisuje je do fronty. Překladatel vybírá znaky z fronty a transformuje malé znaky na velké a opačně. Pokud překladatel přeloží všechny znaky pak se zablokuje dokud nepříjde další klient. Výstup: Informace o překladatelích, klientech, frontách a přeložených znacích.</div>
</div>


<a id="convert"></a>
<div class="object">
<div class="name">Convert (skriptík)</div>
<div class="date">12.04.2006</div>
<div class="technology">PHP, JavaScript</div>
<div class="address"><?Down('down/prog/convert.tar.gz');?></div>
<div class="rate">02 z 10</div>

<div class="descript">Rychlá utilitka na konverzi adresáře obrázků z jednoho formátu do jiného (pomocí convert z ImageMagick) a jejich zobrazení na webu.</div>
</div>


<a id="pkg"></a>
<div class="object">
<div class="name">Package Manager, System Dependencies (semestrální práce)</div>
<div class="date">06.04.2006</div>
<div class="technology">PHP</div>
<div class="address"><?Down('down/prog/pkg.tar.gz');?></div>
<div class="rate">05 z 10</div>

<div class="descript">Semestrální práce z předmětu Teoretická informatika (X36TIN). Jedná se o simulaci balíčkovacího systému, kdy jsou definované určité závislosti mezi jednotlivými balíčky a něco se instaluje, potom zase odinstaluje atd.</div>
</div>


<a id="x36skd"></a>
<div class="object">
<div class="head">
<?Img('img/prog/x36skd.png', 'X36SKD');?>
<div class="name">X36SKD - programy (semestrální práce)</div>
<div class="date">06.01.2006</div>
<div class="technology">ASM (Atmel AVR)</div>
<div class="address"><?Down('down/prog/x36skd.tar.gz');?></div>
<div class="rate">03 z 10</div>
</div>

<div class="descript">Kompletní vypracování všech úloh do předmětu Strojový kód a data - faktoriál, display, časovač, joystick, informační panel (bug!), x86 FP jednotka.</div>
</div>


<a id="bbpp"></a>
<div class="object">
<div class="head">
<?Img('img/prog/bbpp_sm.png', 'BBPP');?>
<div class="name">BBPP (program do školy)</div>
<div class="date">25.12.2005</div>
<div class="technology">C/C++, SDL</div>
<div class="address"><?Down('down/prog/bbpp.tar.gz');?></div>
<div class="rate">03 z 10</div>
</div>

<div class="descript">Navrhněte SSO se vstupy x,y,z a dvěma výstupy. Na x,y vstupují od nejnižšího řádu dvě BIN čísla. Pokud se z=1, chci výstup, který bude specifikovat, které z čísel je větší.</div>
</div>


<a id="kostky"></a>
<div class="object">
<div class="head">
<?Img('img/prog/kostky_sm.png', 'Kostky');?>
<div class="name">Kostky (prográmek)</div>
<div class="date">24.04.2004</div>
<div class="technology">C++, SDL</div>
<div class="address"><?Down('down/prog/kostky.tar.gz');?> (Linux, Windows netestováno)</div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Program zobrazuje v dolní části okna spoustu kostiček, které lze kliknutím myši zachytit a následně s nimi pohybovat. Jsou implementovány i kolize a také vlastní barevný kurzor, jenž se po kliknutí na nějakou kostku změní na jiný.</div>
</div>


<a id="odrazy"></a>
<div class="object">
<div class="head">
<?Img('img/prog/odrazy_sm.png', 'Odrazy');?>
<div class="name">Odrazy (ovladatelné demo)</div>
<div class="date">12.04.2004</div>
<div class="technology">C++, SDL</div>
<div class="address"><?Down('down/prog/odrazy.tar.gz');?> (Linux, Windows netestováno)</div>
<div class="rate">06 z 10</div>
</div>

<div class="descript">Program vykresluje objekt, se kterým je možno pomocí šipek pohybovat. Stisk nemění polohu přímo, ale je jím ovlivněno zrychlení, v každém průchodu je pozice zvětšována o rychlost. Také je aplikována gravitace. V případě, že objekt narazí do stěny (okraj okna), odrazí se a jeho rychlost je o něco zmenšena. Jako bonus byl v programu implementován pomocí událostí i jeden cheat. Na klávesnici se naťuká posloupnost &quot;cheat&quot;. Co se stane, uvidíte po spuštění ;-).</div>
</div>


<a id="fire"></a>
<div class="object">
<div class="head">
<?Img('img/prog/fire_sm.png', 'Oheň');?>
<div class="name">Oheň (demo)</div>
<div class="date">07.03.2004</div>
<div class="technology">C++, SDL</div>
<div class="address"><?Down('down/prog/fire.tar.gz');?> (Linux, Windows netestováno)</div>
<div class="rate">05 z 10</div>
</div>

<div class="descript">Klasický oheň - na nejnižším řádku se generují náhodné pixely z palety barev ohně, které se s rostoucí výškou postupně rozmazávají. V programu je dále definován kurzor myši ve tvaru &quot;zaměřovače&quot; (černé kolečko s bílým středem; na screenshotu není vidět), kterým je možné do ohně přidávat bílé pixely.</div>
</div>


<a id="grid"></a>
<div class="object">
<div class="head">
<?Img('img/prog/grid_sm.png', 'Grid');?>
<div class="name">Grid (demo)</div>
<div class="date">20.02.2005</div>
<div class="technology">C++, SDL, OpenGL</div>
<div class="address"><?Down('down/prog/grid.tar.gz');?> (Linux, Windows netestováno)</div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Jedná se o jednoduché demíčko ovládané myší, ve kterém se hráč pohybuje mřížkou. Díky periodickému opakování elementárních buněk nelze nikdy dojít na okraj. Kód je založen na jedné malé knihovně (zatím nezveřejněna), kterou se v poslední době snažím dát dohromady.</div>
</div>


<a id="tele"></a>
<div class="object">
<div class="head">
<?Img('img/prog/tele_sm.png', 'Tele');?>
<div class="name">Tele</div>
<div class="date">15.12.2004</div>
<div class="technology">Java (Borland JBuilder X 10 pod Solarisem)</div>
<div class="address"><?Down('down/prog/tele.tar.gz');?></div>
<div class="rate">03 z 10</div>
</div>

<div class="descript">Jednoduchý prográmek na způsob telefonního seznamu. Umožňuje vkládat, odebírat, listovat a ukládat do textového souboru (načítání automaticky při startu). Skončil jako kámošova ročníkovka ;-)</div>
</div>


<a id="c2html"></a>
<div class="object">
<div class="name">c2html (utilita)</div>
<div class="date">30.01.2004</div>
<div class="technology">C</div>
<div class="address"><?Down('down/prog/c2html.tar.gz');?></div>
<div class="rate">04 z 10</div>

<div class="descript">Kódový název: fwc2hcfl - Free Woq's C To HTML Convertor For Linux :-). Tento jednoduchý program pro příkazovou řádku je Linuxovým portem CPP na WEB. Uvnitř pracuje prakticky stejně jako on, ale je mu možné předat přes parametry main i více souborů pro označkování najednou, např. takto: <code>c2html *.h *.cpp</code></div>
</div>


<a id="vordped"></a>
<div class="object">
<div class="head">
<?Img('img/prog/vordped_sm.png', 'WQ VórdPed 2.0');?>
<div class="name">WQ VórdPed 2.0 (textový editor)</div>
<div class="date">14.07.2003</div>
<div class="technology">MS Visual C++ 6.0, MFC</div>
<div class="address"><?Down('down/prog/vordped.rar');?></div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Noutped (třída CEditView) měl jednu velkou nevýhodu: nedokázal pracovat se soubory většími než 65 536 znaků. VórdPed je založen na bázi třídy CRichEditView a tudíž už tento problém nemá. Vnitřně sice umí pracovat s textem ve formátu RTF, ale protože nebyly napojeny ovládací prvky pro otevírání a ukládání, o editaci textu ani nemluvě, musel jsem tyto akce naprogramovat sám. Z lenosti jsem zvolil pouze klasický text/plain formát souborů (.txt). Kromě obyčejných editorových funkcí umí nahrazovat text ve více souborech najednou, automaticky vybírat celá slova, zalamovat/nezalamovat řádky, měnit fonty (neukládá se!), barvu pozadí atd... Nejlepší z celého programu je ale stejně dialog O aplikaci :-)</div>
</div>


<a id="asm_archiv"></a>
<div class="object">
<div class="name">Archiv programů v ASM i8051</div>
<div class="date">27.06.2003</div>
<div class="technology">ASM i8051</div>
<div class="address"><?Down('down/prog/asm_i8051.rar');?></div>
<div class="rate">02 z 10</div>

<div class="descript">Pár prográmků, které jsem nastřádal za třetí ročník na Wakuovce. Většinou se jedná o rozblikání LED diod &quot;na sto a jeden způsob&quot;, ale i věci s tlačítky, přepínači, klávesnicí, sedmi segmentovým displejem a podobně. Dá se říci, že pro programátora platformy PC velice praktické. U zdrojových kódů je i celé zadání a pro větší čitelnost i pár vlastních komentářů.</div>
</div>


<a id="woqsaver"></a>
<div class="object">
<div class="head">
<?Img('img/prog/woqsaver_sm.png', 'Woq Saver');?>
<div class="name">Woq Saver (šetřič obrazovky)</div>
<div class="date">26.05.2003</div>
<div class="technology">MS Visual C++ 6.0, Win API, OpenGL, scrnsave.lib</div>
<div class="address"><?Down('down/prog/woqsaver.rar');?></div>
<div class="rate">06 z 10</div>
</div>

<div class="descript">Šetřič obrazovky, který vykresluje moje logo. Je vystavěn na bázi knihovny ScrnSave.lib (součástí Visual Studia), v archivu jsou také zdrojové kódy pro vytvoření prázdného šetřiče. Velice zapůsobí, když se při prezentaci maturitního výrobku na dataprojektoru najednou zobrazí vaše rotující logo :-)</div>
</div>


<a id="tfc"></a>
<div class="object">
<div class="head">
<?Img('img/prog/tfc_sm.png', 'Texture Font Creator');?>
<div class="name">Texture Font Creator (utilita)</div>
<div class="date">04.02.2003</div>
<div class="technology">MS Visual C++ 6.0, MFC</div>
<div class="address"><?Down('down/prog/tfc.rar');?></div>
<div class="rate">04 z 10</div>
</div>

<div class="descript">Programem lze snadno vygenerovat texturový font na bázi jakéhokoli fontu nainstalovaného v systému. Bitmapu můžete využít pro na platformě nezávislý výstup textu (viz 17. lekce NeHe OpenGL Tutoriálů). Vytváří se plná ASCII sada, takže s českými znaky problémy nebudou.</div>
</div>


<a id="noname"></a>
<div class="object">
<div class="head">
<?Img('img/prog/noname_sm.png', 'noname');?>
<div class="name">noname (hra)</div>
<div class="date">22.02.2003 (jarní prázdniny)</div>
<div class="technology">MS Visual C++ 6.0, Win API, OpenGL</div>
<div class="address"><?Down('down/prog/noname.tar.gz');?></div>
<div class="rate">05 z 10 (nedodělaný)</div>
</div>

<div class="descript">Nedodělaná 2D (pohled shora) vesmírná střílečka, která nemá ani své jméno. Naleznete v ní perfektní implementaci prvního Newtonova zákona. Tvořeno pro Max Corporation (nyní už neexistuje), jehož členem jsem jednu dobu byl.</div>
</div>


<a id="text3d"></a>
<div class="object">
<div class="head">
<?Img('img/prog/text3d_sm.png', '3D Text 1.2');?>
<div class="name">3D Text 1.2 (generátor 3D textů)</div>
<div class="date">26.01.2003</div>
<div class="technology">MS Visual C++ 6.0, MFC, OpenGL</div>
<div class="address"><?Down('down/prog/text3d.rar');?></div>
<div class="rate">04 z 10</div>
</div>

<div class="descript">Program slouží k vytváření ozdobných 3D textů. Mezi nastavitelné vlastnosti mimo jiné patří: font, barva textu i pozadí, drátěný model/polygony, mapování textur a další. Všechna nastavení lze samozřejmě ukládat do souboru pro pozdější obnovení. Program také umožňuje exportovat scénu do obrázku ve formátech BMP a JPG.</div>
</div>


<a id="noutped"></a>
<div class="object">
<div class="head">
<?Img('img/prog/noutped_sm.png', 'WQ Noutped 1.1');?>
<div class="name">WQ Noutped 1.1 (textový editor)</div>
<div class="date">01.01.2003</div>
<div class="technology">MS Visual C++ 6.0, MFC (CEditView)</div>
<div class="address"><?Down('down/prog/noutped.rar');?></div>
<div class="rate">06 z 10</div>
</div>

<div class="descript">Oproti svému staršímu a hlavně slavnějšímu bratrovi Poznámkovému bloku (MS Notepad) má WQ Noutped spoustu vylepšení. Obsahuje menu a stavový řádek, umožňuje náhled před tiskem, má funkci pro záměnu jednoho textu za druhý, klávesové zkratky pro otevírání, ukládání apod. (<b>UŽ</b> ve Win XP obsahuje i MS Notepad). Naprogramován během 5 minut bez napsání jediné řádky kódu - CEditView z MFC. Proč něco podobného nemohli hoši z Redmondu vytvořit už před dvaceti lety?</div>
</div>


<a id="cppnaweb"></a>
<div class="object">
<div class="head">
<?Img('img/prog/cppnaweb_sm.png', 'CPP na WEB 1.1');?>
<div class="name">CPP na WEB 1.1 (utilita)</div>
<div class="date">27.12.2002</div>
<div class="technology">MS Visual C++ 6.0, MFC</div>
<div class="address"><?Down('down/prog/cppnaweb.rar');?></div>
<div class="rate">03 z 10</div>
</div>

<div class="descript">Chcete vložit zdrojové kódy C/C++ na www stránku tak, aby byly správně zformátované? Můžete použít tento program, převod je správný cca. na 95% - záleží na úpravě souboru (mezery místo tabulátorů, složené závorky u sekcí ap.). Pro vstup se využívá paměťově mapovaný soubor, který se chová jako pole znaků, výpis zajišťuje klasická fprintf(). V současné době bych se bez tohoto programu asi uznačkoval k smrti, opravdu hodně pomůže.</div>
</div>


<a id="soustavy"></a>
<div class="object">
<div class="head">
<?Img('img/prog/soustavy_sm.png', 'Soustavy');?>
<div class="name">Soustavy (matematický software)</div>
<div class="date">17.09.2002</div>
<div class="technology">MS Visual C++ 6.0, MFC</div>
<div class="address"><?Down('down/prog/soustavy.rar');?></div>
<div class="rate">08 z 10</div>
</div>

<div class="descript">Ano, wokenní elipsa, správně! Při použití jednoduše nastavíte číselnou soustavu zadání a výsledku, do horního editboxu zapíšete číslo a kliknete na tlačítko Převeď. Při šťastné kombinaci planet a souhvězdí (rozuměj: zadáte platné číslice, soustavu v intervalu od 2 do 36 a nezapíšete moc velké číslo (cca. 10 míst - podle soustavy)) se v dolním editboxu zobrazí výsledek. Na převod čísel jsem si naprogramoval vlastní C++ třídu, asi o týden později jsem náhodou našel standardní C funkce ze stdlib.h, které plní naprosto stejný účel :-(</div>
</div>


<a id="escot"></a>
<div class="object">
<div class="head">
<?Img('img/prog/escot_sm.png', 'eSčot');?>
<div class="name">eSčot (simulátor)</div>
<div class="date">17.07.2002</div>
<div class="technology">MS Visual C++ 6.0, MFC, GDI grafika</div>
<div class="address"><?Down('down/prog/escot.rar');?></div>
<div class="rate">07 z 10</div>
</div>

<div class="descript">Existují spousty leteckých simulátorů, automobilových simulátorů, simulátorů války i budovatelské simulátory, ale do dnešní doby nikoho nenapadlo vytvořit simulátor klasického ruského sčotu a přitom je to taková užitečná věc. Co dělat, když vám ve vaší nové kalkulačce dojdou baterky - sáhnete po sčotu a tady máte jeden elektronický... program eSčot. Mimochodem, uvnitř naleznete perfektní OOP zdroják! Někdy se může stát, že se bude vykreslovat i pozadí kuliček - neznámý problém s průhledností ikon.</div>
</div>


<a id="kk2"></a>
<div class="object">
<div class="head">
<?Img('img/prog/kk2_sm.png', 'Komplexní kalkulačka 2.0');?>
<div class="name">Komplexní kalkulačka 2.0 (matematický software)</div>
<div class="date">05.07.2002</div>
<div class="technology">MS Visual C++ 6.0, MFC</div>
<div class="address"><?Down('down/prog/kk2.rar');?></div>
<div class="rate">06 z 10</div>
</div>

<div class="descript">Druhá verze programu už vypadá jako opravdová kalkulačka &quot;z masa a kostí&quot;. Tlačítko OFF nemá dokonce ani kalkulačka ve Windows :-]. Chlubí se perfektním designem, novými funkcemi a snadnějším použitím. Oproti první verzi lze v mocnině a odmocnině zadat i reálné číslo. Může se počítat v algebraickém i exponenciálním/goniometrickém tvaru, které se mezi sebou dají snadno převádět. Opět věnováno Petru Krejčímu.</div>
</div>


<a id="miny"></a>
<div class="object">
<div class="head">
<?Img('img/prog/miny_sm.png', 'Miny');?>
<div class="name">Miny (hra)</div>
<div class="date">03.06.2002</div>
<div class="technology">MS Visual C++ 6.0, MFC, GDI grafika, FMOD zvuky</div>
<div class="address"><?Down('down/prog/miny.rar');?></div>
<div class="rate">05 z 10 (CHIP CD 08/2002 známka 07 z 10 :)</div>
</div>

<div class="descript">Tato hra je inspirována Wokenní hrou Miny. Důležité odlišnosti bych viděl například v postavě hráče ovládané kurzorovými šipkami, také není důležité, zda objevíte všechny miny, ale spíše, že dojdete se svým hráčem do cíle označeného křížkem. Mohou vám pomoci různé objekty, jako například mapa nebo život, dokonce i nečekaný teleport v důsledku šlápnutí na minu. Napíšete-li během hry &quot;jsem v pasti&quot;, budete moci používat cheaty, ale nikomu to neříkejte! :-] Někdy mohou vzniknout problémy s nezobrazující se ikonou hráče a nemožnost spuštění programu kvůli neznámé chybě se zvuky. Registrační číslo: E5Z6RUW9FSD1 (tehdy jsem ještě nedělal do open source).</div>
</div>


<a id="text"></a>
<div class="object">
<div class="head">
<?Img('img/prog/text_sm.png', 'Text');?>
<div class="name">Text - ročníková práce z Pascalu (textový editor)</div>
<div class="date">??.05.2002</div>
<div class="technology">Pascal (TP6)</div>
<div class="address"><?Down('down/prog/text.rar');?></div>
<div class="rate">01 z 10</div>
</div>

<div class="descript">Program vznikl za 10! vyučovacích hodin jako ročníková práce v Pascalu, takže prosím omluvte všechny chyby a především totální improvizaci a chaos ve zdrojových kódech; omlouvám se především lidem, kteří znají OOP - jsem si toho vědom (taková narážka sám na sebe)... Program poslouží k vytváření a editaci jednoduchých textových souborů. Není kompatibilní s MS Wordem, takže budete muset vystačit pouze s text/plain formátem (.txt). Program dále neumožňuje rolovat (v Pascalu není třída CScrollView :), tudíž se nedostanete k řádku vyššímu než cca. dvacet. V žádném případě se nepokoušejte, když píšete cestu při otvírání nebo ukládání, bez napsání ničeho stisknout klávesu ESC! Jo, ještě nefunguje klávesa ENTER při psaní a některá velká písmena (blokují je šipky, END, HOME ap.). Všechny tyto chyby byly objeveny při odevzdání a určitě jich zůstala spousta neobjevených (viz zobrazení netištitelných znaků ve Wordu a další už opravdu neznám ani já, ale určitě tam budou). Celkově práce ohodnocena jedničkou - také nechápu.</div>
</div>


<a id="kameny"></a>
<div class="object">
<div class="head">
<?Img('img/prog/kameny_sm.png', 'Kameny');?>
<div class="name">Kameny (hra)</div>
<div class="date">??.02.2002 (jarní prázdniny)</div>
<div class="technology">MS Visual C++ 6.0, MFC, GDI grafika</div>
<div class="address"><?Down('down/prog/kameny.rar');?></div>
<div class="rate">04 z 10</div>
</div>

<div class="descript">Jedná se o klon známé hry Tetris, kterou, myslím si, není třeba blíže specifikovat. Chtěl bych poděkovat Vlastimilu Šprtovi, který mě k naprogramování této pařby inspiroval (ve hře je jeho photo!!! a věnování :). Autorství patří spíše mému bratrovi, protože skoro všechno vymyslel on, já jen psal do počítače. U této hry mě programování opravdu chytlo.</div>
</div>


<a id="kk1"></a>
<div class="object">
<div class="head">
<?Img('img/prog/kk1_sm.png', 'Komplexní kalkulačka 1.0');?>
<div class="name">Komplexní kalkulačka 1.0 (matematický software)</div>
<div class="date">??.11.2001</div>
<div class="technology">MS Visual C++ 6.0, MFC</div>
<div class="address"><?Down('down/prog/kk1.rar');?></div>
<div class="rate">02 z 10</div>
</div>

<div class="descript">Toto není obyčejná kalkulačka, je kouzelná... počítá s komplexními čísly. Nepotěší ani tak matematiky, jako spíše elektrotechniky, kterým pomůže ke snadnějšímu řešení obvodů střídavého proudu symbolicko-komplexní metodou, kupříkladu obvodů s ideálními prvky RLC :) Věnováno Petru Krejčímu, který nás (nám) tyto metody učil (diktoval).</div>
</div>


<a id="nepust"></a>
<div class="object">
<div class="head">
<?Img('img/prog/nepust_sm.png', 'Nepust');?>
<div class="name">Nepust (vir/trojský kůň)</div>
<div class="date">05.10.2001</div>
<div class="technology">C</div>
<div class="address"><?Down('down/prog/nepust.rar');?></div>
<div class="rate">01 z 10</div>
</div>

<div class="descript">Program slouží k zastavení spouštění OS, ale dá se bohužel/naštěstí snadno obejít. Na klávesnici stačí stisknout kombinaci CTRL+Pause (Break) nebo nabootovat přes spouštěcí disketu. V autoexec.bat potom smažte řádek &quot;c:\nepust.exe&quot; a z disku soubor stejného jména. K použití stačí pouze jedno spuštění na daném počítači. Autor se necítí být zodpovědný za použití tohoto programu uživatelem, protože ho spouští on, také se necítí být zodpovědný za různé &quot;vtípky kamarádů&quot;. Mimochodem objednal si ho Luděk Hezina pro Vlastimila Šprtu :-) a co vím, nebyl nikdy použit :-(.</div>
</div>


<a id="word2000"></a>
<div class="object">
<div class="head">
<?Img('img/prog/word2000_sm.png', 'Word 2000 for MS-DOS');?>
<div class="name">Word 2000 for MS-DOS (textový editor)</div>
<div class="date">??.08.2001</div>
<div class="technology">C, textový režim</div>
<div class="address"><?Down('down/prog/word2000.rar');?></div>
<div class="rate">01 z 10</div>
</div>

<div class="descript">Program umožňuje vytváření nebo čtení *.txt souborů. Velmi velká uživatelská příjemnost, velmi mnoho funkcí. Po Hello, World! a kvadratické rovnici se jedná o můj třetí program vůbec a vzhledem k této skutečnosti je docela vymakaný, jinak ale nic moc.</div>
</div>


<?
include 'p_end.php';
?>
