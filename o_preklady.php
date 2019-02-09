<?
$p_title = 'Překlady';
include 'p_begin.php';
?>

<!--
<a id=""></a>
<div class="object">
<div class="head">
<?Img('img/preklady/', '');?>
<div class="name"></div>
<div class="date"></div>
<div class="address"><?Blank('');?></div>
<div class="address_o"><?Blank('');?></div>
</div>

<div class="descript"></div>
</div>
-->


<a id="octree"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/octree_sm.jpg', 'Octree');?>
<div class="name">Octree</div>
<div class="date">12.07.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/cl_gl_octree.php');?></div>
<div class="address_o"><?Blank('http://www.gametutorials.com/Tutorials/OpenGL/Octree.htm');?></div>
</div>

<div class="descript">Octree (octal tree, oktalový strom) je způsob rozdělování 3D prostoru na oblasti, který umožňuje vykreslit pouze tu část světa/levelu/scény, která se nachází ve výhledu kamery, a tím značně urychlit rendering. Může se také použít k detekcím kolizí.</div>
</div>


<a id="nehe_tut_41"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_41_sm.jpg', 'NeHe #41');?>
<div class="name">NeHe #41 - Volumetrická mlha a nahrávání obrázků pomocí IPicture</div>
<div class="date">22.02.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_41.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=41');?></div>
</div>

<div class="descript">V tomto tutoriálu se naučíte, jak pomocí rozšíření EXT_fog_coord vytvořit volumetrickou mlhu. Také zjistíte, jak pracuje IPicture kód a jak ho můžete využít pro nahrávání obrázků ve svých vlastních projektech. Demo sice není až tak komplexní jako některá jiná, nicméně i přesto vypadá hodně efektně.</div>
</div>


<a id="nehe_tut_47"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_47_sm.jpg', 'NeHe #47');?>
<div class="name">NeHe #47 - CG vertex shader</div>
<div class="date">08.02.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_47.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=47');?></div>
</div>

<div class="descript">Používání vertex a fragment (pixel) shaderů ke "špinavé práci" při renderingu může mít nespočet výhod. Nejvíce je vidět např. pohyb objektů do teď výhradně závislý na CPU, který neběží na CPU, ale na GPU. Pro psaní velice kvalitních shaderů poskytuje CG (přiměřeně) snadné rozhraní. Tento tutoriál vám ukáže jednoduchý vertex shader, který sice něco dělá, ale nebude předvádět ne nezbytné osvětlení a podobné složitější nadstavby. Tak jako tak je především určen pro začátečníky, kteří už mají nějaké zkušenosti s OpenGL a zajímají se o CG.</div>
</div>


<a id="nehe_tut_48"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_48_sm.jpg', 'NeHe #48');?>
<div class="name">NeHe #48 - ArcBall rotace</div>
<div class="date">26.01.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_48.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=48');?></div>
</div>

<div class="descript">Nebylo by skvělé otáčet modelem pomocí myši jednoduchým drag &amp; drop? S ArcBall rotacemi je to možné. Moje implementace je založená na myšlenkách Brettona Wadea a Kena Shoemakea. Kód také obsahuje funkci pro rendering toroidu - kompletně i s normálami.</div>
</div>


<a id="nehe_tut_46"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_46_sm.jpg', 'NeHe #46');?>
<div class="name">NeHe #46 - Fullscreenový antialiasing</div>
<div class="date">26.01.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_46.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=46');?></div>
</div>

<div class="descript">Chtěli byste, aby vaše aplikace vypadaly ještě lépe než doposud? Fullscreenové vyhlazování, nazývané též multisampling, by vám mohlo pomoci. S výhodou ho používají ne-realtimové renderovací programy, nicméně s dnešním hardwarem ho můžeme dosáhnout i v reálném čase. Bohužel je implementováno pouze jako rozšíření ARB_MULTISAMPLE, které nebude pracovat, pokud ho grafická karta nepodporuje.</div>
</div>


<a id="nehe_tut_45"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_45_sm.jpg', 'NeHe #45');?>
<div class="name">NeHe #45 - Vertex Buffer Object (VBO)</div>
<div class="date">04.01.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_45.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=45');?></div>
</div>

<div class="descript">Jeden z největších problémů jakékoli 3D aplikace je zajištění její rychlosti. Vždy byste měli limitovat množství aktuálně renderovaných polygonů buď řazením, cullingem nebo nějakým algoritmem na snižování detailů. Když nic z toho nepomáhá, můžete zkusit například vertex arrays. Moderní grafické karty nabízejí rozšíření nazvané vertex buffer object, které pracuje podobně jako vertex arrays kromě toho, že nahrává data do vysoce výkonné paměti grafické karty, a tak podstatně snižuje čas potřebný pro rendering. Samozřejmě ne všechny karty tato nová rozšíření podporují, takže musíme implementovat i verzi založenou na vertex arrays.</div>
</div>


<a id="nehe_tut_44"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_44_sm.jpg', 'NeHe #44');?>
<div class="name">NeHe #44 - Čočkové efekty</div>
<div class="date">04.01.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_44.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=44');?></div>
</div>

<div class="descript">Čočkové efekty vznikají po dopadu paprsku světla např. na objektiv kamery nebo fotoaparátu. Podíváte-li se na záři vyvolanou čočkou, zjistíte, že jednotlivé útvary mají jednu společnou věc. Pozorovateli se zdá, jako by se všechny pohybovaly skrz střed scény. S tímto na mysli můžeme osu z jednoduše odstranit a vytvářet vše ve 2D. Jediný problém související s nepřítomností z souřadnice je, jak zjistit, jestli se zdroj světla nachází ve výhledu kamery nebo ne. Připravte se proto na trochu matematiky.</div>
</div>


<a id="nehe_tut_43"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_43_sm.jpg', 'NeHe #43');?>
<div class="name">NeHe #43 - FreeType Fonty v OpenGL</div>
<div class="date">04.01.2004</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_43.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=43');?></div>
</div>

<div class="descript">Použitím knihovny FreeType Font rendering library můžete snadno vypisovat vyhlazené znaky, které vypadají mnohem lépe než písmena u bitmapových fontů z lekce 13. Náš text bude mít ale i jiné výhody - bezproblémová rotace, dobrá spolupráce s OpenGL vybíracími (picking) funkcemi a víceřádkové řetězce.</div>
</div>


<a id="kamera"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/kamera_sm.jpg', 'Třída kamery a Quaternionu');?>
<div class="name">Třída kamery a Quaternionu</div>
<div class="date">31.12.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/cl_gl_kamera.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=Quaternion_Camera_Class');?></div>
</div>

<div class="descript">Chcete si naprogramovat letecký simulátor? Směr letu nad krajinou můžete měnit klávesnicí i myší... Vytvoříme několik užitečných tříd, která vám pomohou s matematikou, která stojí za definováním výhledu kamery a pak všechno spojíme do jednoho funkčního celku.</div>
</div>


<a id="nehe_tut_35"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_35_sm.jpg', 'NeHe #35');?>
<div class="name">NeHe #35 - Přehrávání videa ve formátu AVI</div>
<div class="date">30.11.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_35.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=35');?></div>
</div>

<div class="descript">Přehrávání AVI videa v OpenGL? Na pozadí, povrchu krychle, koule, či válce, ve fullscreenu nebo v obyčejném okně. Co víc si přát...</div>
</div>


<a id="nehe_tut_36"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_36_sm.jpg', 'NeHe #36');?>
<div class="name">NeHe #36 - Radial Blur, renderování do textury</div>
<div class="date">02.11.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_36.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=36');?></div>
</div>

<div class="descript">Společnými silami vytvoříme extrémně působivý efekt radial blur, který nevyžaduje žádná OpenGL rozšíření a funguje na jakémkoli hardwaru. Naučíte se také, jak lze na pozadí aplikace vyrenderovat scénu do textury, aby pozorovatel nic neviděl.</div>
</div>


<a id="nehe_tut_40"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_40_sm.jpg', 'NeHe #40');?>
<div class="name">NeHe #40 - Fyzikální simulace lana</div>
<div class="date">23.10.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_40.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=40');?></div>
</div>

<div class="descript">Přichází druhá část dvoudílné série o fyzikálních simulacích. Základy už známe, a proto se pustíme do komplikovanějšího úkolu - klávesnicí ovládat pohyby simulovaného lana. Zatáhneme-li za horní konec, prostřední část se rozhoupe a spodek se vláčí po zemi. Skvělý efekt.</div>
</div>


<a id="nehe_tut_42"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_42_sm.jpg', 'NeHe #42');?>
<div class="name">NeHe #42 - Více viewportů</div>
<div class="date">30.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_42.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=42');?></div>
</div>

<div class="descript">Tento tutoriál byl napsán pro všechny z vás, kteří se chtěli dozvědět, jak do jednoho okna zobrazit více pohledů na jednu scénu, kdy v každém probíhá jiný efekt. Jako bonus přidám získávání velikosti OpenGL okna a velice rychlý způsob aktualizace textury bez jejího znovuvytváření.</div>
</div>


<a id="nehe_tut_37"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_37_sm.jpg', 'NeHe #37');?>
<div class="name">NeHe #37 - Cel-Shading</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_37.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=37');?></div>
</div>

<div class="descript">Cel-Shading je druh vykreslování, při kterém výsledné modely vypadají jako ručně kreslené karikatury z komiksů (cartoons). Rozličné efekty mohou být dosaženy miniaturní modifikací zdrojového kódu. Cel-Shading je velmi úspěšným druhem renderingu, který dokáže kompletně změnit duch hry. Ne ale vždy... musí se umět a použít s rozmyslem.</div>
</div>


<a id="nehe_tut_34"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_34_sm.jpg', 'NeHe #34');?>
<div class="name">NeHe #34 - Generování terénů a krajin za použití výškového mapování textur</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_34.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=34');?></div>
</div>

<div class="descript">Chtěli byste vytvořit věrnou simulaci krajiny, ale nevíte, jak na to? Bude nám stačit obyčejný 2D obrázek ve stupních šedi, pomocí kterého deformujeme rovinu do třetího rozměru. Na první pohled těžko řešitelné problémy bývají častokrát velice jednoduché.</div>
</div>


<a id="nehe_tut_33"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_33_sm.jpg', 'NeHe #33');?>
<div class="name">NeHe #33 - Nahrávání komprimovaných i nekomprimovaných obrázků TGA</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_33.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=33');?></div>
</div>

<div class="descript">V lekci 24 jsem vám ukázal cestu, jak nahrávat nekomprimované 24/32 bitové TGA obrázky. Jsou velmi užitečné, když potřebujete alfa kanál, ale nesmíte se starat o jejich velikost, protože byste je ihned přestali používat. K diskovému místu nejsou zrovna šetrné. Problém velikosti vyřeší nahrávání obrázků komprimovaných metodou RLE. Kód pro loading a hlavičkové soubory jsou odděleny od hlavního projektu, aby mohly být snadno použity i jinde.</div>
</div>


<a id="nehe_tut_32"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_32_sm.jpg', 'NeHe #32');?>
<div class="name">NeHe #32 - Picking, alfa blending, alfa testing, sorting</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_32.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=32');?></div>
</div>

<div class="descript">V tomto tutoriálu se pokusím zodpovědět několik otázek, na které jsem denně dotazován. Chcete vědět, jak při kliknutí tlačítkem myši identifikovat OpenGL objekt nacházející se pod kurzorem (picking). Dále byste se chtěli dozvědět, jak vykreslit objekt bez zobrazení určité barvy (alfa blending, alfa testing). Třetí věcí, se kterou si nevíte rady, je, jak řadit objekty, aby se při blendingu správně zobrazily (sorting). Naprogramujeme hru, na které si vše vysvětlíme.</div>
</div>


<a id="nehe_tut_31"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_31_sm.jpg', 'NeHe #31');?>
<div class="name">NeHe #31 - Nahrávání a renderování modelů</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_31.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=31');?></div>
</div>

<div class="descript">Další skvělý tutoriál! Naučíte se, jak nahrát a zobrazit otexturovaný Milkshape3D model. Nezdá se to, ale asi nejvíce se budou hodit znalosti o práci s dynamickou pamětí a jejím kopírování z jednoho místa na druhé.</div>
</div>


<a id="nehe_tut_30"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_30_sm.jpg', 'NeHe #30');?>
<div class="name">NeHe #30 - Detekce kolizí</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_30.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=30');?></div>
</div>

<div class="descript">Na podobný tutoriál jste už jistě netrpělivě čekali. Naučíte se základy o detekcích kolizí, jak na ně reagovat a na fyzice založené modelovací efekty (nárazy, působení gravitace ap.). Tutoriál se více zaměřuje na obecnou funkci kolizí než zdrojovým kódům. Nicméně důležité části kódu jsou také popsány. Neočekávejte, že po prvním přečtení úplně všemu z kolizí porozumíte. Je to komplexní námět, se kterým vám pomohu začít.</div>
</div>


<a id="nehe_tut_29"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_29_sm.jpg', 'NeHe #29');?>
<div class="name">NeHe #29 - Blitter, nahrávání .RAW textur</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_29.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=29');?></div>
</div>

<div class="descript">V této lekci se naučíte, jak se nahrávají .RAW obrázky a konvertují se do textur. Dozvíte se také o blitteru, grafické metodě přenášení dat, která umožňuje modifikovat textury poté, co už byly nahrány do programu. Můžete jím zkopírovat část jedné textury do druhé, blendingem je smíchat dohromady a také roztahovat. Maličko upravíme program tak, aby v době, kdy není aktivní, vůbec nezatěžoval procesor.</div>
</div>


<a id="nehe_tut_28"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_28_sm.jpg', 'NeHe #28');?>
<div class="name">NeHe #28 - Bezierovy křivky a povrchy, fullscreen fix</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_28.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=28');?></div>
</div>

<div class="descript">David Nikdel je osoba stojící za tímto skvělým tutoriálem, ve kterém se naučíte, jak se vytvářejí Bezierovy křivky. Díky nim lze velice jednoduše zakřivit povrch a provádět jeho plynulou animaci pouhou modifikací několika kontrolních bodů. Aby byl výsledný povrch modelu ještě zajímavější, je na něj namapována textura. Tutoriál také eliminuje problémy s fullscreenem, kdy se po návratu do systému neobnovilo původní rozlišení obrazovky.</div>
</div>


<a id="nehe_tut_27"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_27_sm.jpg', 'NeHe #27');?>
<div class="name">NeHe #27 - Stíny</div>
<div class="date">09.09.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_27.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=27');?></div>
</div>

<div class="descript">Představuje se vám velmi komplexní tutoriál na vrhání stínů. Efekt je doslova neuvěřitelný. Stíny se roztahují, ohýbají a zahalují i ostatní objekty ve scéně. Realisticky se pokroutí na stěnách nebo podlaze. Se vším lze pomocí klávesnice pohybovat ve 3D prostoru. Pokud ještě nejste se stencil bufferem a matematikou jako jedna rodina, nemáte nejmenší šanci.</div>
</div>


<a id="nehe_tut_26"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_26_sm.jpg', 'NeHe #26');?>
<div class="name">NeHe #26 - Odrazy a jejich ořezávání za použití stencil bufferu</div>
<div class="date">23.06.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_26.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=26');?></div>
</div>

<div class="descript">Tutoriál demonstruje extrémně realistické odrazy za použití stencil bufferu a jejich ořezávání, aby nevystoupily ze zrcadla. Je mnohem více pokrokový než předchozí lekce, takže před začátkem čtení doporučuji menší opakování. Odrazy objektů nebudou vidět nad zrcadlem nebo na druhé straně zdi a budou mít barevný nádech zrcadla - skutečné odrazy.</div>
</div>


<a id="nehe_tut_24"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_24_sm.jpg', 'NeHe #24');?>
<div class="name">NeHe #24 - Výpis OpenGL rozšíření, ořezávací testy a textury z TGA obrázků</div>
<div class="date">19.05.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_24.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=24');?></div>
</div>

<div class="descript">V této lekci se naučíte, jak zjistit, která OpenGL rozšíření (extensions) podporuje vaše grafická karta. Vypíšeme je do středu okna, se kterým budeme moci po stisku šipek rolovat. Použijeme klasický 2D texturový font s tím rozdílem, že texturu vytvoříme z TGA obrázku. Jeho největšími přednostmi jsou jednoduchá práce a podpora alfa kanálu. Odbouráním bitmap už nebudeme muset inkludovat knihovnu glaux.</div>
</div>


<a id="nehe_tut_25"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_25_sm.jpg', 'NeHe #25');?>
<div class="name">NeHe #25 - Morfování objektů a jejich nahrávání z textového souboru</div>
<div class="date">14.04.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_25.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=25');?></div>
</div>

<div class="descript">V této lekci se naučíte, jak nahrát souřadnice vrcholů z textového souboru a plynulou transformaci z jednoho objektu na druhý. Nezaměříme se ani tak na grafický výstup jako spíše na efekty a potřebnou matematiku okolo. Kód může být velice jednoduše modifikován k vykreslování linkami nebo polygony.</div>
</div>


<a id="nehe_tut_21"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_21_sm.jpg', 'NeHe #21');?>
<div class="name">NeHe #21 - Přímky, antialiasing, časování, pravoúhlá projekce, základní zvuky a jednoduchá herní logika</div>
<div class="date">21.03.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_21.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=21');?></div>
</div>

<div class="descript">První opravdu rozsáhlý tutoriál - jak už plyne z gigantického názvu. Doufejme, že taková spousta informací a technik dokáže udělat šťastným opravdu každého. Strávil jsem dva dny kódováním a kolem dvou týdnů psaním tohoto HTML souboru. Pokud jste někdy hráli hru Admiar, lekce vás vrátí do vzpomínek. Úkol hry sestává z vyplnění jednotlivých políček mřížky. Samozřejmě se musíte vyhýbat všem nepřátelům.</div>
</div>


<a id="nehe_tut_20"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_20_sm.jpg', 'NeHe #20');?>
<div class="name">NeHe #20 - Maskování</div>
<div class="date">20.01.2003</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_20.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=20');?></div>
</div>

<div class="descript">Černé okraje obrázků jsme dosud ořezávali blendingem. Ačkoli je tato metoda efektivní, ne vždy transparentní objekty vypadají dobře. Modelová situace: vytváříme hru a potřebujeme celistvý text nebo zakřivený ovládací panel, ale při blendingu scéna prosvítá. Nejlepším řešením je maskování obrázků.</div>
</div>


<a id="nehe_tut_19"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_19_sm.jpg', 'NeHe #19');?>
<div class="name">NeHe #19 - Částicové systémy</div>
<div class="date">16.12.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_19.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=19');?></div>
</div>

<div class="descript">Chtěli jste už někdy naprogramovat exploze, vodní fontány, planoucí hvězdy a jiné skvělé efekty, nicméně kódování částicových systémů bylo buď příliš těžké nebo jste vůbec nevěděli, jak na to? V této lekci zjistíte, jak vytvořit jednoduchý, ale dobře vypadající částicový systém. Extra přidáme duhové barvy a ovládání klávesnicí. Také se dozvíte, jak pomocí triangle stripu jednoduše vykreslovat velké množství trojúhelníků.</div>
</div>


<a id="nehe_tut_18"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_18_sm.jpg', 'NeHe #18');?>
<div class="name">NeHe #18 - Quadratics</div>
<div class="date">18.11.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_18.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=18');?></div>
</div>

<div class="descript">Představuje se vám báječný svět quadraticů. Jedním řádkem kódu snadno vytváříte komplexní objekty typu koule, disku, válce ap. Pomocí matematiky a trochy plánování lze snadno morphovat jeden do druhého.</div>
</div>


<a id="nehe_tut_17"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_17_sm.jpg', 'NeHe #17');?>
<div class="name">NeHe #17 - 2D fonty z textur</div>
<div class="date">11.11.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_17.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=17');?></div>
</div>

<div class="descript">V této lekci se naučíte, jak vykreslit font pomocí texturou omapovaného obdélníku. Dozvíte se také, jak používat pixely místo jednotek. I když nemáte rádi mapování 2D znaků, najdete zde spoustu nových informací o OpenGL.</div>
</div>


<a id="nehe_tut_16"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_16_sm.jpg', 'NeHe #16');?>
<div class="name">NeHe #16 - Mlha</div>
<div class="date">04.11.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_16.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=16');?></div>
</div>

<div class="descript">Tato lekce rozšiřuje použitím mlhy lekci 7. Naučíte se používat tří různých filtrů, měnit barvu a nastavit oblast působení mlhy (v hloubce). Velmi jednoduchý a efektní efekt.</div>
</div>


<a id="nehe_tut_15"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_15_sm.jpg', 'NeHe #15');?>
<div class="name">NeHe #15 - Mapování textur na fonty</div>
<div class="date">21.10.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_15.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=15');?></div>
</div>

<div class="descript">Po vysvětlení bitmapových a 3D fontů v předchozích dvou lekcích jsem se rozhodl napsat lekci o mapování textur na fonty. Jedná se o tzv. automatické generování koordinátů textur. Po dočtení této lekce budete umět namapovat texturu opravdu na cokoli - zcela snadno a jednoduše.</div>
</div>


<a id="nehe_tut_14"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_14_sm.jpg', 'NeHe #14');?>
<div class="name">NeHe #14 - Outline fonty</div>
<div class="date">07.10.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_14.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=14');?></div>
</div>

<div class="descript">Bitmapové fonty nestačí? Potřebujete kontrolovat pozici textu i na ose z? Chtěli byste fonty s hloubkou? Pokud zní vaše odpověď ano, pak jsou 3D fonty nejlepší řešení. Můžete s nimi pohybovat na ose z a tím měnit jejich velikost, otáčet je, prostě dělat vše, co nemůžete s obyčejnými. Jsou nejlepší volbou ke hrám a demům.</div>
</div>


<a id="nehe_tut_13"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_13_sm.jpg', 'NeHe #13');?>
<div class="name">NeHe #13 - Bitmapové fonty</div>
<div class="date">01.10.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_13.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=13');?></div>
</div>

<div class="descript">Často kladená otázka týkající se OpenGL zní: Jak zobrazit text? Vždycky jde namapovat texturu textu. Bohužel nad ním máte velmi malou kontrolu. A pokud nejste dobří v blendingu, většinou skončíte smixováním s ostatními obrázky. Pokud byste chtěli znát lehčí cestu k výstupu textu na jakékoli místo s libovolnou barvou nebo fontem, potom je tato lekce určitě pro vás. Bitmapové fonty jsou 2D písma, které nemohou být rotovány. Vždy je uvidíte zepředu.</div>
</div>


<a id="nehe_tut_12"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_12_sm.jpg', 'NeHe #12');?>
<div class="name">NeHe #12 - Display list</div>
<div class="date">19.08.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_12.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=12');?></div>
</div>

<div class="descript">Chcete vědět, jak urychlit vaše programy v OpenGL? Jste unaveni z nesmyslného opisování již napsaného kódu? Nejde to nějak jednodušeji? Nešlo by například jedním příkazem vykreslit otexturovanou krychli? Samozřejmě, že jde. Tento tutoriál je určený speciálně pro vás. Předvytvořené objekty a jejich vykreslování jedním řádkem kódu. Jak snadné...</div>
</div>


<a id="nehe_tut_11"></a>
<div class="object">
<div class="head">
<?Img('img/preklady/nehe_11_sm.jpg', 'NeHe #11');?>
<div class="name">NeHe #11 - Efekt vlnící se vlajky</div>
<div class="date">03.08.2002</div>
<div class="address"><?Blank('http://nehe.ceske-hry.cz/tut_11.php');?></div>
<div class="address_o"><?Blank('http://nehe.gamedev.net/data/lessons/lesson.asp?lesson=11');?></div>
</div>

<div class="descript">Naučíme se jak pomocí sinusové funkce animovat obrázky. Pokud znáte standardní šetřič Windows Létající 3D objekty (i on by měl být programovaný v OpenGL), tak budeme dělat něco podobného.</div>
</div>


<?
include 'p_end.php';
?>
