<?
$p_title = 'OpenGL a DirectX III. - VII.';
include 'p_begin.php';
?>

<div class="warning">Tento článek jsem psal s velice malými znalostmi o DirectX a především z pohledu OpenGL is the best, DirectX is shit, takže obsahuje spoustu chyb, nepřesností, bludů a bohužel i výmyslů. Pokud se přeci jen rozhodnete pro čtení, začněte nejprve <?Blank('http://www.root.cz/clanek/2352', 'tímto článkem');?>, který se vše pokoušel uvést na pravou míru. Vyšel neplánovaně jako třetí díl a předčasně ukončil celou, původně sedmidílnou, sérii. Při čtení nevěnujte pozornost každé větě zvlášť, ale zkuste pochopit celkový smysl. Prosím nepište mi na téma těchto článků...</div>


<!--

<p>Nedávno vyšel na root.cz článek <?Blank('http://www.root.cz/clanek/2314', 'Linuxové hry (47): Unreal Tournament 2004');?>. Jeho autor při popisu &quot;Technické stránky věci&quot; uvedl ne zcela šťastnou větu: <span class="cite">Bohužel je vidět, že v oblasti 3D grafiky se OpenGL nemůže DirectX v kvalitě obrazu rovnat</span>, a doplnil ji několika podrobnostmi. Pojďme se spolu podívat jestli je to pravda, nebo ten největší nesmysl, jaký kdy svět slyšel.</p>


<h3>Úvod</h3>

<p>V reakci na výše uvedený článek se vytvořila klasická &quot;náboženská válka&quot; typu MS Windows proti Linuxu. Strany se rozdělily na OpenGL programátory a na osoby v každém druhém příspěvku prohlašující (ne všichni!): <span class="cite">Slyšel jsem...</span>, <span class="cite">Moc tomu nerozumím...</span>, <span class="cite">Nejsem expert...</span> a podobně. Ti druzí jmenovaní nějakým způsobem mimo jiné vygenerovali, že OpenGL, na rozdíl od DirectX, vytváří jeden člověk - s prominutím NEJVĚTŠÍ BLBOST, JAKOU JSEM KDY SLYŠEL. V průběhu článku vysvětlím proč, zatím jen tolik, že o tom, co se skrývá pod pojmem DirectX rozhoduje <strong>výhradně jediná firma</strong> (Microsoft) a autorem OpenGL může být kdokoli, jehož implementace splňuje OpenGL standard a projde sérií testů. Dohled nad vývojem tohoto standardu má konsorcium ARB (Architecture Review Board), do kterého patří firmy jako SGI (Silicon Graphics Inc., tvůrce OpenGL standardu), DEC (Digital Equipment Corporation), HP (Hawlett-Packard), IBM, Intel, Microsoft, Sun Microsystems a další.</p>


<h3>Moje zkušenosti s 3D grafikou</h3>

<p>Já také nejsem expert :-], i když mi někdy připadá, že mě za něj někteří lidé považují. S OpenGL jsem se poprvé (jako programátor) setkal léta páně 2002. Po půl roce jsem jako &quot;Vánoční dárek&quot; (to by bylo na dlouho) dostal doménu <?Blank('http://nehe.ceske-hry.cz/');?> a byl mezi prvními, kteří o OpenGL začali psát v češtině (v současnosti vychází kvalitní seriály i na rootu). Tento web aktuálně obsahuje přes sto stránek o celkové velikosti cca. 2,8 MB (texty a skripty - ne FrontPage slátaniny). Témata jdou od absolutních základů po velmi pokročilé techniky. Jelikož jsem autorem/překladatelem cca. 70%, dá se říci, že OpenGL tak trochu rozumím... (Skrytou reklamu máme zdárně za sebou :-)</p>

<?Img('img/cl_local/gldx/gl.jpg', 'Logo OpenGL');?>

<p>Nicméně, horší to bude s DirectX částí, protože jsem o něm četl pouze jednu knihu <a href="#literatura">[1]</a>, která ale není zrovna kvalitní. Tímto nechci nikoho poškodit, radím pouze jako čtenář čtenáři. Úvod končí čtvrtou kapitolou na straně 115 a na zbylých 230 stranách se hojně využívá technika CTRL+C, CTRL+V. Výklad končí přibližně na úrovni <?Blank('http://nehe.ceske-hry.cz/tut_10.php', 'desátého NeHe Tutoriálu');?>, takže nikde daleko. Celkově nezáživný manuálově/dokumentační styl psaní.</p>

<p>Je mi jasné, že u DirectX části budu povětšinou, jak se říká, vařit z vody. S největší pravděpodobností neuvedu všechny jeho (ne:-)výhody, za což se předem omlouvám. Navrhoval bych proto, aby mě nějaký Direct-positive čtenář kontaktoval a předal mi nějaké praktické informace o DirectX, ty nemám žádné. Základní teorie mám dost z literatury. Potom bych mohl (případně bychom mohli společně) napsat další díl článku.</p>

<?Img('img/cl_local/gldx/dx.gif', 'Logo DirectX');?>


<h3>Z historie</h3>

<p>Na počátku osmdesátých let minulého století, v době, kdy výpočetní technice kraloval textový režim, se u společnosti <?Blank('http://www.sgi.com/', 'Silicon Graphics Inc.');?> začaly vyvíjet grafické stanice a knihovna IRIS GL (IRIX je unixový operační systém SGI počítačů), kterou lze považovat za přímého předka OpenGL. Jak šel vývoj dopředu, zbavovala se některých problematických rysů a dá se říct, že její poslední verze je s OpenGL téměř kompatibilní. Standard OpenGL vznikl na začátku devadesátých let (v <a href="#literatura">[3]</a> se uvádí rok 1992) a narozdíl od IRIS GL byl od počátku koncipován jako nezávislý na hardwaru, operačním systému a programovacím jazyce. Od té doby se změnil pouze minimálně, nejnovější verze je 1.5 a každý kdo dělá s OpenGL určitě ví, že se připravuje verze 2.0 (update: už vyšla).</p>

<p>V raných dobách OS Windows se hry vytvářely spíše pro MS-DOS. Důvodem byla několikavrstvá struktura Win API (Windows Application Programming Interface) a hlavně celková extrémní pomalost GDI (Graphic Device Interface), které se pro větší projekty (rozuměj jakékoli projekty) naprosto nehodilo. Kdysi jsem v něm udělal několik 2D her, tím mé pokusy skončily - díky, ale už ne.</p>

<p>Microsoft si byl problémů s GDI vědom, první pokus o jejich napravení se jmenoval WinG. Jednalo se o množinu funkcí, které umožňovaly přímý přístup do grafické paměti (do té doby to nešlo). Postupným vývojem vzniklo Game SDK (Game Software Development Kit), které se za nějakou dobu přejmenovalo na DirectX.</p>

<p>Jeho prvních několik verzí bylo prakticky téměř nepoužitelných (jako u mnoha dalších MS technologií), v současnosti jich existuje devět a jsou mezi sebou většinou nekompatibilní. To znamená, že pokud používáte DX5 a chcete přejít na DX6, musíte se vše začít učit od znova a všechen dosavadní kód upravit nebo dokonce kompletně přepsat (často bývá rychlejší). V současné době je DirectX ve verzi 9.0.</p>

<p>Uvedením DirectX vyvolal Microsoft na jednu stranu pozitivní, na druhou negativní rozruch. (Windows) vývojáři her konečně dostali ucelený balík komponent - DirectDraw pro 2D grafiku, Direct3D pro 3D grafiku, DirectSound pro zvuky, DirectNet pro síťování atd. Nejdiskutovanější bylo právě Direct3D. Většina specialistů z oboru se shodovala na tom, že nevznikl žádný důvod k zavedení nového standardu. OpenGL plně postačovalo všem aplikacím a bylo prověřené časem. I když Direct3D disponuje prakticky stejnými funkcemi jako OpenGL, styl programování se naprosto liší.</p>

<p>Dále už budeme porovnávat pouze OpenGL a Direct3D, protože určitě chápete, že srovnávat 3D grafiku např. se zvuky nebo síťováním dost dobře nejde :-)</p>


<h3>Programátorské hledisko</h3>

<p>Narozdíl od strukturovaného OpenGL je Direct3D objektově orientované. Jaký je mezi tím rozdíl? V případě OpenGL se na začátku programu vytvoří okno s jeho podporou a pak je možné odkudkoli volat jakékoli OpenGL specifické funkce. V případě Direct3D se musí vytvořit objekt Direct3D (IDirect3D9), s jeho pomocí zařízení Direct3D (IDirect3DDevice9) a přes volání jejich metod programátor pracuje. Objektově orientované programování sice preferuji také, ale v případě DirectX mi připadá hodně těžkopádné - alespoň v porovnání s OpenGL.</p>

<p>Jedním z nejdůležitějších charakteristik jakéhokoli API je pro programátora délka zdrojového kódu, který musí napsat, aby program něco udělal. John Carmack, autor her Quake, uvádí <a href="#literatura">[3]</a>, že kód programu plnící stejnou funkci je v Direct3D i čtyřikrát delší než v OpenGL. Můžeme si to bez problémů ověřit. Z učebnice Direct3D <a href="#literatura">[1]</a>, str. 180, 181 uvedu jednoduchou renderovací funkci, která na černém pozadí vykresluje jeden obarvený trojúhelník - bez textur, světel či jakýchkoli maticových operací (translace, rotace). Následně vše přepíši do OpenGL.</p>

<pre>
///////////////////////////////////////////
// Direct3D 9.0
///////////////////////////////////////////

struct VLASTNIVERTEX
{
  FLOAT x, y, z, rhw;
  DWORD barva;
}

void Vykresleni()
{
  VLASTNIVERTEX vrchTrojuhl[] =
  {
    {400.0, 180.0, 0.0, 1.0, D3DCOLOR_XRGB(255,0,0)},
    {500.0, 380.0, 0.0, 1.0, D3DCOLOR_XRGB(0,255,0)},
    {300.0, 380.0, 0.0, 1.0, D3DCOLOR_XRGB(0,0,255)},
  };

  IDirect3DVertexBuffer9* pVertexBuffer = NULL;
  HRESULT hVysledek = g_pZarizeniDirect3D-&gt;CreateVertexBuffer(
    3*sizeof(VLASTNIVERTEX), 0, D3DFVF_XYZRHW | D3DFVF_DIFFUSE,
    D3DPOOL_DEFAULT, &amp;pVertexBuffer, NULL);

  if (FAILED(hVysledek))
  {
    DXTRACE_ERR(&quot;Chyba při vytv. vertex bufferu.&quot;, hVysledek);
  }

  VOID* pVrcholy;
  hVysledek = pVertexBuffer-&gt;Lock(0, 0, (viod**)&amp;pVrcholy, 0);
  if (FAILED(hVysledek))
  {
    DXTRACE_ERR(&quot;Chyba při zamyk. vertex bufferu.&quot;, hVysledek);
  }
  memcpy(pVrcholy, vrchTrojuhl, sizeof(vrchTrojuhl));
  pVertexBuffer-&gt;Unlock();

  g_pZarizeniDirect3D-&gt;Clear(0, NULL, D3DCLEAR_TARGET,
    D3DCOLOR_XRGB(0,0,0), 1.0, 0);
  g_pZarizeniDirect3D-&gt;SetStreamSource(0, pVertexBuffer, 0,
    sizeof(VLASTNI_VERTEX));
  g_pZarizeniDirect3D-&gt;SetFVF(D3DFVF_XYZRHW | D3DFVF_DIFFUSE);
  g_pZarizeniDirect3D-&gt;BeginScene();
  g_pZarizeniDirect3D-&gt;DrawPrimitive(D3DPT_TRIANGLELIST, 0, 1);
  g_pZarizeniDirect3D-&gt;EndScene();

  g_pZarizeniDirect3D-&gt;Present(NULL, NULL, NULL, NULL);

  if (pVertexbuffer)
    pVertexBuffer-&gt;Release();
}
</pre>

<p>To samé v OpenGL...</p>

<pre>
///////////////////////////////////////////
// OpenGL
///////////////////////////////////////////

void Vykresleni()
{
        glClearColor(0.0f, 0.0f, 0.0f, 0.0f);
        glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);
        glLoadIdentity();

        glBegin(GL_TRIANGLES);
                glColor3ub(255,0,0); glVertex2i(400,480);
                glColor3ub(0,255,0); glVertex2i(500,380);
                glColor3ub(0,0,255); glVertex2i(300,380);
        glEnd();

        glFlush();
        SDL_GL_SwapBuffers();
}
</pre>

<p>Pozn.: Při inicializaci se nesmí definovat perspektiva, ale pravoúhlá projekce (glOrtho()) o rozměrech 800x600. Funkce glClearColor() se obvykle dává také do inicializace, ve vykreslení je jen kvůli tomu, aby kód plně odpovídal Direct3D. Pokud provozujete OpenGL ve Win32 API, určitě používáte místo SDL_GL_SwapBuffers() funkci SwapBuffers(), SDL má tu výhodu, že lze kód bez větších problémů přenášet mezi Linuxem, Windows a dalšími operačními systémy.</p>

<?Img('img/cl_local/gldx/rgb_triangle_sm.png', 'RGB trojúhelník');?>

<p>Vrátím se ještě k té délce kódu, v případě, že byste je chtěli porovnat číselně, pak D3D verze měla celkem 47 řádků, 108 slov a 1367 písmen, OpenGL pouze 14 řádků, 22 slov a 335 písmen. V poměru to činí u řádků 47 / 14 = 3.35, slov 108 / 22 = 4.9 a znaků 1367 / 335 = 4.08 ...čtyřnásobná délka kódu tedy plus mínus platí. Zčásti je to i tím, že v D3D sekci byly použity dlouhé identifikátory, ale za to já nemůžu, jak jsem napsal výše, jedná se o doslovný přepis z učebnice D3D. Dokonce jsem identifikátor vrcholyTrojuhelniku musel zkrátit pouze na vrchTrojuhl, aby se kód vešel na řádek.</p>

<pre>
[woq@localhost tmp]$ wc *txt
  47  108 1367 dx.txt
  14   22  335 gl.txt
</pre>

<p>Uživatele programu zdrojové kódy absolutně nezajímají a hlavně jim nerozumí, takže nepředpokládám, že jste předchozí výpisy zkoumali podrobně. Jenom tak jimi v rychlosti prolétněte a zkuste říci, který z nich je přehlednější. Dále si všimněte v D3D sekci kódu řádku if(FAILED(hVysledek)), který se provede při chybě ve vytváření/zamykání vertex bufferu. V OpenGL se toto dělat nemusí/nelze a to ani při použití vertex arrays, které více odpovídají D3D stylu programování.</p>

<p>Nic podobného, jako je samostatné volání funkcí glVertex*() Direct3D neumí. Vertex arrays jsou sice výhodnější při renderování velkých množství souvisejících vertexů (bodů), které jsou vždy na konstantní pozici (3D světy, výškové mapy, 3D modely ap.), protože odpadají ztráty na výkonu při mnoha volání funkcí, nicméně u pohyblivých nesouvisejících trojúhelníků, kde často ani nebývá dopředu znám jejich počet (typicky částicové systémy) bývá použití vertex arrays těžkopádné a spíše méně vhodné, navíc se zbytečně alokuje systémová paměť. V OpenGL si může programátor zvolit, co považuje za výhodnější. Pokud je chytrý a používá extensiony, může všechna data dokonce uložit v paměti grafické karty jako tzv. VBO (Vertex Buffer Object), tím se eliminuje vliv &quot;délky drátů&quot; při posílání dat na grafickou kartu. Ale toto pravděpodobně jde i v D3D.</p>

-->


<h3>Podpora &quot;starých&quot; funkcí</h3>

<p>Mnoho lidí, mezi nimi i autor výše uvedeného článku o UT 2004 si myslí, že cituji: <span class="cite">Bohužel je vidět, že v oblasti 3D grafiky se OpenGL nemůže DirectX v kvalitě obrazu rovnat. Zatímco DX 9.0 představuje hardwarovou podporu bump mapingu, pixel shaderů a krásných světelných efektů, musíme se v OpenGL spokojit s poněkud horší kvalitou obrazu.</span></p>

<p>Z tohoto citátu je jasně vidět, že tito lidé ABSOLUTNĚ neví, o čem mluví nebo v jeho případě dokonce píšou. Mohu jen odkázat na NeHe Tutoriály <?Blank('http://nehe.ceske-hry.cz/tut_22.php', '22 - Bump Mapping a Multitexturing');?> (tady je ale bump mapping počítán ještě softwarově :-( a <?Blank('http://nehe.ceske-hry.cz/tut_47.php', '47 - CG vertex shader');?>.</p>

<?Img('img/cl_local/gldx/tut_22_sm.jpg', 'Bump Mapping (SW) a Multitexturing (HW)');?>

<?Img('img/cl_local/gldx/tut_47_sm.jpg', 'Vertex shader (HW)');?>

<p>No, a co se týče světel, nevím, jestli je tohle v D3D <b>9.0</b> oproti jeho předchozím verzím nějaká převratná novinka (není), ty jsou v OpenGL od samého začátku - cca. 15 let.</p>

<p>Na druhou stranu D3D ještě donedávna nemělo ani takové základní funkce jako backface culling <a href="#literatura">[3]</a>! Pro ty, co neví, o čem je řeč... Jakýkoli polygon se vždy renderuje &quot;dvakrát&quot;, nejdříve přední strana a pak zadní (zjednodušeně řečeno) - samozřejmě v programu se vertexy definují pouze jednou. Když se podíváte na list papíru uvidíte přední stranu a po otočení zadní (ve skutečném světě už jako přední, pro OpenGL stále zadní).</p>

<p>U uzavřených objektů, které nikdy nepůjdou vidět zevnitř (bedna ve scéně) nebo zvenku (skybox, místnost), se toho může využít a jednu stranu odstranit. V OpenGL stačí jediná funkce:</p>

<pre>
glCullFace(GL_FRONT);// Odstraňovat přední strany
glCullFace(GL_BACK);// Odstraňovat zadní strany
glCullFace(GL_FRONT_AND_BACK);// Odstraňovat obě strany
</pre>

<p>No dobře, dvě funkce, ještě se to musí zapnout...</p>

<pre>
glEnable(GL_CULL_FACE);
</pre>

<p>Abyste viděli názorně, o co se jedná, screenshot z NeHe Tutoriálu č. <?Blank('http://nehe.ceske-hry.cz/tut_11.php', '11 - Efekt vlnící se vlajky');?>. Mimochodem první OpenGL tutoriál, který jsem přeložil do češtiny...</p>

<?Img('img/cl_local/gldx/tut_11_sm.jpg', 'Přední strana vyplněná, zadní linkami');?>

<p>Pozn.: Zde nebyl použit culling, ale tzv. módy polygonů - na tomto jde totiž culling vidět :-), ve skutečnosti při ořezání polygonu neuvidíte nic. Obě techniky pracují na stejném principu.</p>

<pre>
glPolygonMode(GL_BACK, GL_FILL);// Zadní strana vyplněná
glPolygonMode(GL_FRONT, GL_LINE);// Přední strana mřížkou
</pre>

<p>Abychom trochu zrychlili, o dalších základních věcech, které GL umí a D3D ne, pouze citát z <a href="#literatura">[3]</a>:</p>

<div class="cite">OpenGL v immediate módu umí všechno to, co Direct3D, a navíc poskytuje další funkce, jako třeba odstraňování zadních stěn před vykreslením (face-culling), správu šablon a paměti textur, trojrozměrné textury, akumulační buffer (používá se třeba k navození efektu rychlého pohybu s rozmazáním - motion blur), podporu parametrických křivek a ploch, atd.</div>

<p>Pozn.: Tento zdroj je už relativně starý (min. 3 roky), takže u nových verzí DX už všechno nemusí být pravda (např. zmíněný face-culling).</p>

<p>Na druhou stranu se zabývá i věcmi, které D3D umí lépe:</p>

<div class="cite">OpenGL i Direct3D používají Goraudovo stínování. Direct3D má teoretické předpoklady i pro Phonogovo stínování, které by posunulo grafický výstup blíže k realitě, tato funkce však nebyla dosud implementována. Protějškem display-list módu OpenGL je u Direct3D tzv. retained mode. Tady poskytuje Direct3D podstatně lepší služby než OpenGL. Objekty na scéně je možné seskupovat do hierarchických struktur, s kterými se dá pracovat na objektovém principu. Podobné funkce jsou u OpenGL dostupné pouze prostřednictvím určitých rozšíření. Za vymoženosti nového přístupu potom programátor zaplatí sníženým výkonem programu.</div>

<p>BTW: Goraudovo a Phongovo stínování - nikdy jsem se nedočetl, jaký je mezi nimi rozdíl, snad jen to, že Phongovo je lepší. Všude bývá uvedeno, že ho OpenGL narozdíl od DirectX nepodporuje... a vždycky u této zprávy bývá malými písmeny, že v DirectX ještě není implementováno :-).</p>


<h3>Podpora HW funkcí nových grafických karet</h3>

<p>Právě na tomto tématu spočívá tíha největší mystifikace &quot;DX fandů&quot;. (Tedy kromě toho, že se <span class="cite">OpenGL nemůže ve vlastnostech zobrazení...</span> atd.) Ti, co v životě neslyšeli o tzv. OpenGL rozšířeních (OpenGL extensions) a naopak slyšeli, že se OpenGL standard od svého uvedení na začátku devadesátých let minulého století nijak výrazně nezměnil, pravděpodobně kroutí nechápavě hlavou. Ani se jim nedivím, vždyť karty před patnácti lety &quot;skoro nepodporovaly ani textový režim&quot; (nad tím v uvozovkách nepřemýšlejte :-).</p>

<p>Modelová situace: Výrobce karty (NVIDIA, Ati...) přidá novou převratnou vlastnost, při jejímž použití se extrémně urychlí rendering. Za jak dlouho ji může Woq programátor (analogie na Frantu uživatele, pro naše Linuxové kamarády BFU) použít? Pokud si tuto kartu koupí, aby měl na čem testovat, a používá OpenGL... <strong>ihned</strong>. Přestože nebyla vytvořena žádná nová verze (jak bylo uvedeno, standard se téměř nezměnil), díky extensionům je možné zpřístupnit jakékoli HW funkce karty.</p>

<p>To, jaká OpenGL rozšíření vaše karta podporuje, můžete zjistit hned několika způsoby. Každého asi napadnou webové stránky výrobce. Tuto možnost bohužel nemám ověřenou, v praxi jsem ji nikdy nepotřeboval - hned pochopíte. Ve Win bych něco takového hledal asi ve vlastnostech obrazovky, Linux má příkaz &quot;glinfo&quot;.</p>

<code>
<div>[woq@localhost tmp]$ <b>glinfo</b></div>
<div><b>GL_VERSION</b>: 1.4.1 NVIDIA 53.36</div>
<div><strong>GL_EXTENSIONS</strong>: GL_ARB_imaging GL_ARB_multitexture GL_ARB_point_parameters GL_ARB_point_sprite GL_ARB_texture_compression GL_ARB_texture_cube_map GL_ARB_texture_env_add GL_ARB_texture_env_combine GL_ARB_texture_env_dot3 GL_ARB_texture_mirrored_repeat GL_ARB_transpose_matrix GL_ARB_vertex_buffer_object GL_ARB_vertex_program GL_ARB_window_pos GL_S3_s3tc GL_EXT_texture_env_add GL_EXT_abgr GL_EXT_bgra GL_EXT_blend_color GL_EXT_blend_minmax GL_EXT_blend_subtract GL_EXT_clip_volume_hint GL_EXT_compiled_vertex_array GL_EXT_draw_range_elements GL_EXT_fog_coord GL_EXT_multi_draw_arrays GL_EXT_packed_pixels GL_EXT_paletted_texture GL_EXT_point_parameters GL_EXT_rescale_normal GL_EXT_secondary_color GL_EXT_separate_specular_color GL_EXT_shared_texture_palette GL_EXT_stencil_wrap GL_EXT_texture_compression_s3tc GL_EXT_texture_cube_map GL_EXT_texture_edge_clamp GL_EXT_texture_env_combine GL_EXT_texture_env_dot3 GL_EXT_texture_filter_anisotropic GL_EXT_texture_lod GL_EXT_texture_lod_bias GL_EXT_texture_object GL_EXT_vertex_array GL_IBM_rasterpos_clip GL_IBM_texture_mirrored_repeat GL_KTX_buffer_region GL_NV_blend_square GL_NV_fence GL_NV_fog_distance GL_NV_light_max_exponent GL_NV_packed_depth_stencil GL_NV_pixel_data_range GL_NV_point_sprite GL_NV_register_combiners GL_NV_texgen_reflection GL_NV_texture_env_combine4 GL_NV_texture_rectangle GL_NV_vertex_array_range GL_NV_vertex_array_range2 GL_NV_vertex_program GL_NV_vertex_program1_1 GL_NVX_ycrcb GL_SGIS_generate_mipmap GL_SGIS_multitexture GL_SGIS_texture_lod GL_SUN_slice_accum</div>
<div><b>GL_RENDERER</b>: GeForce2 MX/AGP/SSE2</div>
<div><b>GL_VENDOR</b>: NVIDIA Corporation</div>
<div><b>GLU_VERSION</b>: 1.3</div>
<div><b>GLU_EXTENSIONS</b>: GLU_EXT_nurbs_tessellator GLU_EXT_object_space_tess</div>
<div><b>GLUT_API_VERSION</b>: 5</div>
<div><b>GLUT_XLIB_IMPLEMENTATION</b>: 15</div>
<div>[woq@localhost tmp]$</div>
</code>

<p>S největší pravděpodobností bude tento příkaz dostupný pouze s nainstalovanými NVIDIA drivery, takže pokud u vás nefunguje zkuste prohrabat Ovládací centrum (MDK) nebo KDE nastavení prostředí - někde jsem to tam viděl. V neposlední řadě můžete zkusit NeHe Tutoriál <?Blank('http://nehe.ceske-hry.cz/tut_24.php', '24 - Výpis OpenGL rozšíření');?>, respektive program, který se v něm vytváří.</p>

<?Img('img/cl_local/gldx/tut_24_sm.jpg', 'Výpis OpenGL rozšíření');?>

<p>Při kódování programu se detekce dostupnosti rozšíření provádí přes volání funkce glGetString(GL_EXTENSIONS), která vrátí ukazatel na řetězec mezerami oddělených názvů podporovaných rozšíření (podobné jako u výpisu glinfo výše). Pokud je dané rozšíření podporováno, zavolá se SDL_GL_GetProcAddress() (ve Win32 API wglGetProcAddress()), které vrátí ukazatel na &quot;HW funkci&quot; implementující dané rozšíření. Na následujícím obrázku je vyobrazen hardwarový multitexturing.</p>

<?Img('img/cl_local/gldx/hw_multitex.jpg', 'Multitexturing (HW)');?>

<p>Na druhou stranu, pokud rozšíření dostupné není, může programátor zkusit vše dopočítat softwarově na CPU - např. jednoduchý multitexturing lze vytvořit, mimo jiné, dvěma objekty na stejném místě, ten druhý musí být průhledný. Pokud si zvětšíte screenshot NeHe Tutoriálu <?Blank('http://nehe.ceske-hry.cz/tut_26.php', '26 - Odrazy a jejich ořezávání za použití stencil bufferu');?>, uvidíte na plážovém míči &quot;odrazy světla&quot;, způsobilo je vykreslení druhého poloprůhledného a stejně velkého objektu s jinou texturou.</p>

<?Img('img/cl_local/gldx/tut_26_sm.jpg', 'Multitexturing (SW)');?>

<p>V případě složitějších extensionů (dobrým příkladem jsou vertex a fragment shadery), může být SW implementace &quot;doma na koleně&quot; nereálná, takže buď aplikace daný grafický efekt nepoužije, nebo pokud je tato funkce pro program zásadní, vyhodí program při inicializaci MessageBox() s &quot;Extension XXX is not supported!&quot; a ukončí se.</p>

<p>Kód pro zpřístupnění jakékoli HW funkce karty v OpenGL, může vypadat např. takto (ukázka na multitexturingu):</p>

<pre>
#include &lt;glext.h&gt;// Hlavička pro extensiony

// Globální ukazatele na multitexturing funkce
PFNGLACTIVETEXTUREARBPROC glActiveTextureARB = NULL;
PFNGLMULTITEXCOORD2FARBPROC glMultiTexCoord2fARB = NULL;

// V Inicializaci
  if(IsExtensionSupported(&quot;GL_ARB_multitexture&quot;))
  {
    glActiveTextureARB = (PFNGLACTIVETEXTUREARBPROC)
      SDL_GL_GetProcAddress(&quot;glActiveTextureARB&quot;);
    glMultiTexCoord2fARB = (PFNGLMULTITEXCOORD2FARBPROC)
      SDL_GL_GetProcAddress(&quot;glMultiTexCoord2fARB&quot;);

    if(!glActiveTextureARB || !glMultiTexCoord2fARB)
    {
      // Multitexturing se nepodařilo inicializovat
      // Použít verzi bez HW multitexturingu
    }
  }
  else
  {
    // Multitexturing není podporován
    // Použít verzi bez HW multitexturingu
  }
</pre>

<p>A jak to probíhá u Direct3D? Opět stejný scénář: Woq programátor si za dvacet tisíc koupí novou brutaltotalultraextra grafickou kartu a chce začít ve svých programech implementovat všechny její vymoženosti. S největší pravděpodobností si nějakou dobu počká až se &quot;Ó, veliký Microsoft&reg;&quot; uráčí vydat DirectX 23.0 a po dvacáté druhé se naučí kompletně změněné API. Mezitím cena karty klesne na desetinu a až pak může začít programovat.</p>

<p>Ne, omlouvám se, trochu jsem to přehnal, nicméně dost lidí to tak vidí (já také). V praxi je to tak, že Microsoft spolupracuje s výrobci karet, takže např. shadery vznikly mimo jiné také díky tomu, že začal pracovat na herní konzole XBox <a href="#literatura">[2]</a>.</p>


<h3>Architektura</h3>

<p>Z dosavadního popisu je více než jasné, že se architektura OpenGL a Direct3D výrazně liší.</p>

<?Img('img/cl_local/gldx/arch_gl.png', 'Architektura OpenGL');?>

<p>OpenGL představuje cca. 150 funkcí, s jejichž pomocí programátor komunikuje přímo s hardwarem karty. Pokud se v počítači 3D akcelerátor nenachází, mohou se všechny výpočty realizovat softwarově. Obecně se dá říci, že o tom, co se pošle hardwaru a co ne, rozhoduje výhradně implementace OpenGL (ten, kdo ji naprogramoval) a každá implementace pracuje jinak. Jedinou podmínkou však je, že se pro aplikaci musí navenek tvářit, že podporuje naprosto vše a předem definovaným způsobem.</p>

<p>Téměř všechny změny v OpenGL (1.1, 1.2 atd.) spočívají v přidání extensionů, které už za dobu od svého uvedení podporuje naprostá většina běžně používaných karet, do &quot;základního standardu&quot;. Původně navržená koncepce tedy zůstává prakticky nezměněna. Kromě toho je vždy možné jakékoli HW funkce nových karet, které se nenachází v &quot;základním standardu&quot; používat přes extensiony.</p>

<p>Jedinou nevýhodou rozšíření (a docela podstatnou) je jejich množství. Několik desítek, by bylo ještě bez větších problémů, nicméně v současnosti začíná jejich počet u nových grafických karet dosahovat řádu stovek (odhaduji cca. 200) a stále roste. Druhou nevýhodou je, že naprostá většina z nich je málo popsaná. Samozřejmě myslím v češtině, anglicky mluvící (rozuměj čtoucí :-) programátoři větší problémy mít nebudou.</p>

<p>Architektura Direct3D je oproti OpenGL, které leží přímo na hardwaru, o něco složitější. Aplikační vrstva (to, co píše programátor) komunikuje s vrstvou Direct3D, rozhraní je v tomto případě vždy jednotné a to, co se nachází ve standardu Direct3D dané verze, je vždy možno provést, přičemž nezáleží na tom, jestli je toho HW schopen. Poslední z vrstev, když nepočítáme DDI (Device Driver Interface, tzv. ovladače karty), je vrstva HAL (Hardware Abstraction Layer), kterou dodává každý výrobce grafické karty a která defakto vrstvě Direct3D oznamuje: &quot;Ano, toto udělám na hardwaru, nestarej se o to.&quot;, respektive: &quot;Ne, toto hardware neumí, musíš to dopočítat softwarově.&quot; Obecně se dá říci, že vrstva Direct3D musí být schopna kompletně všechny efekty provést softwarově a teoreticky umět vykreslovat i bez jakékoli grafické karty v počítači.</p>

<?Img('img/cl_local/gldx/arch_dx1.gif', 'Architektura Direct3D 9.0');?>

<p>Abych pravdu řekl, jsem tak trochu na rozpacích, protože to, co jsem právě napsal vůbec nemusí být pravda - tedy celkový smysl je určitě správný, ale podrobnosti mohou být jinak. Zkrátka, tak tomu rozumím já, v DirectX opravdu neprogramuji.</p>

<p>Vycházel jsem ze zdroje <a href="#literatura">[1]</a>. Zdroj <a href="#literatura">[3]</a> uvádí trochu odlišnou strukturu, ve které zkratka HAL neznamená &quot;Hardware Abstraction Layer&quot;, ale &quot;Hardware Activation Layer&quot;. Dále je přidána vrstva HEL (Hardware Emulation Layer), která filtruje vstupní funkce (to, co píše programátor) a rozhoduje, jestli je grafická karta umí provést nebo ne. V případě, že ne, vypočte se efekt softwarově pomocí této vrstvy, pokud ano, použije se HAL, která požádá hardware. Dále je přístupná i vrstva DirectDraw, kterou Direct3D používá pro mapování textur. Důvodem takto komplikované struktury je možnost aplikace manipulovat s ovladači a dotazovat se na to, co karta ve skutečnosti umí.</p>

<?Img('img/cl_local/gldx/arch_dx2.png', 'Jiná verze architektury Direct3D');?>

<p>Kdybych měl určit, která z těchto dvou verzí je správná, rozhodl bych se asi pro tu první. Především proto, že je to tištěná kniha a ne PDF dokument stáhnutý z internetu a že od verzí DX novějších (tuším) než 7 chybí podpora 2D grafiky (kniha je o verzi 9.0). DirectDraw bylo tehdy sloučeno s Direct3D a už jako takové neexistuje.</p>

<p>Tak či tak, získal jsem zcela neplánovaný důkaz, že se po přechodu na novější verzi DirectX můžete začít učit spoustu věcí od znova. Opět podotýkám, že se OpenGL změnilo pouze minimálně...</p>


<h3>Shrnutí architektury - výhody a nevýhody</h3>

<p>Stručně a neodborně, jak tedy Direct3D pracuje? Jeho hlavní výhodou je, že lze všechny převratné funkce nových grafických karet spustit i na starých kartách, a to i přesto, že nic takového vůbec nepodporují. Direct3D nemá nic podobného OpenGL extensionům, proto aby udrželo krok, musí se neustále a co nejrychleji inovovat a přidávat do sebe nové vlastnosti.</p>

<p>Na jednu stranu programátoři mají jistotu, že když nějakou extrémně novou funkci použijí, tak se provede i na starém hardwaru (softwarově), který v době svého vzniku neměl nejmenší tušení, že něco podobného bude kdy existovat. Na druhou stranu, při počítání většiny věcí na CPU, bude program tak pomalý, že to stejně nemá význam - hra (většinou se jedná o hry) bude prostě nehratelná.</p>

<p>Osobně si nedokážu představit, že by na softwaru běžel např. vertex/fragment shader - označení FPS (počet snímků za sekundu) by jednoznačně ztratilo jakýkoli význam, spíše by se mohlo počítat za kolik minut/hodin se vykreslí jeden snímek. Nevím, jestli může DirectX programátor nějak zjistit, co karta podporuje (asi ano) a podle toho se rozhodnout, jestli použít efekt přes kompletní emulaci pomocí DirectX (efekt, jak by ho provedl HW), částečnou emulaci vlastním kódem (analogický efekt v horší/mizerné kvalitě) nebo daný efekt nepoužít - v OpenGL je tohle na denním pořádku - o všem rozhoduje programátor aplikace. Akorát, že kdyby chtěl OpenGL programátor použít kompletní softwarovou emulaci, jak ji dělá Direct3D, musel by si vše naprogramovat sám, což jak jistě uznáte, je prakticky neproveditelné... nicméně Microsoft to musí provádět v každé verzi Direct3D.</p>

<p>Zmíněné architektury mají ve svém důsledku ještě jeden efekt. Když někdo implementuje OpenGL ve svém zařízení, má množinu funkcí, které budou fungovat hardwarově a množinu, kterou musí implementovat softwarově, aby byly pro aplikaci dostupné naprosto všechny funkce nacházející se v obecném standardu. V případě Direct3D, které si do sebe naváže ovladače karty, aby s nimi mohlo obousměrně komunikovat a zjišťovat si, co karta podporuje a co ne, se musí provádět náročné testy pro všechny karty, se kterými bude pracovat. U OpenGL toto odpadá.</p>


<h3>Přenositelnost programů</h3>

<p>Právě se dostáváme k opravdové lahůdce. Dosud jsem nezmínil, že DirectX je vázáno na technologii COM (Common Object Model) navrženou, stejně jako DirectX, Microsoftem. Nebudu se o ní zbytečně rozepisovat především proto, že v podstatě nevím, o co jde :-). Nicméně co vím s naprostou jistotou, je to, že funguje výhradně pod Windows.</p>

<p>Co se dá ještě říci o přenositelnosti DirectX? Asi jen to, že dříve nefungovalo ani ve Windows NT <a href="#literatura">[3]</a>. Po odklonu Microsoftu od &quot;dosovských Windows&quot; (Win 9x) se s tím však muselo něco udělat, takže v současnosti funguje, když nikde jinde, tak alespoň ve všech Windows (tedy 9x, Me, NT, 2000, XP), což ovšem např. uživatelům Linuxu, MacOS a dalších až tak stačit nemusí :-(</p>

<p>Naproti tomu je OpenGL od samého začátku koncipováno jako nezávislé na platformě, operačním systému (a programovacím jazyce). V současnosti ho lze najít téměř všude: Unix-like systémy (IRIX, Unix, Linux, Sun Solaris, Free/Open/Net-BSD...), Dos-like systémy (MS-Dos (neviděl jsem to, ale prý ano <a href="#literatura">[3]</a>), Win 3.x, Windows 9x, Me), Windows NT-like (Windows NT, 2000, XP, IBM OS/2), MacOS, BeOS a dalších. Lze ho najít i na některých palmtopech <a href="#literatura">[3]</a>.</p>

<p>Teoreticky (toto je jen můj postřeh) by mohlo fungovat i na mobilech s Javou, protože nejnovější verze tohoto programovacího jazyka OpenGL přímo podporují. Otázkou je především rychlost a to, jestli v mobilech není pouze nějaká osekaná verze - s tímto opravdu nemám zkušenosti.</p>

<p>Bohužel, jak už to bývá, mnoho programátorů jednu z nejdůležitějších vlastností OpenGL, přenositelnost, doslova vyhazuje oknem (toto není narážka na <b>ten</b> OS, ale jen slovní obrat :-), protože váží své aplikace na nepřenositelné systémové API - většinou Win32 API. Existuje množství knihoven, díky kterým mohou být OpenGL programy s velmi malým úsilím libovolně přenositelné na úrovni zdrojových kódů. Jmenuji pouze dvě, pravděpodobně nejpoužívanější, se kterými mám (kromě Win32 API) nějaké zkušenosti: GLUT (OpenGL Utility Toolkit) a SDL (Simple DirectMedia Layer). GLUT zná asi každý OpenGL programátor, takže se mu moc věnovat nebudu. Dá se říci, že je to (oficiální) rozšíření OpenGL o nejvíce systémově závislé funkce, jako je vytváření oken a práce s nimi.</p>

<p><?Blank('http://www.libsdl.org/', 'SDL');?> je doma na Linuxu, jedná se o knihovnu určenou primárně pro tvorbu 2D her, ale díky tomu, že přímo podporuje OpenGL, není problém ani s 3D grafikou. Používám ji od té doby, co jsem přešel na Linux (už to bude skoro rok) a v současnosti pracuji na základním kódu pro OpenGL aplikace, který je/bude kompletně vystavěn na SDL a jeho podknihovnách (SDL_Image, SDL_Sound, SDL_Net aj.). Takže až někde uvidíte nápis <strong>Free3D (33D) Basecode</strong>, je to moje práce :-). Zatím je to sice projekt jednoho člověka, ale kdyby se chtěl někdo přidat...</p>

<?Img('img/cl_local/gldx/fps_kde_sm.png', 'OpenGL pod Linuxem (KDE - Plastik)');?>

<?Img('img/cl_local/gldx/fps_enlight_sm.png', 'OpenGL pod Linuxem (Enlightenment)');?>

<?Img('img/cl_local/gldx/fps_win_sm.png', 'OpenGL pod MS Windows XP');?>


<h3>Rychlost renderingu</h3>

<p>Jedna z posledních věcí, které se budeme v tomto článku věnovat, je rychlost OpenGL a Direct3D programů. Původně jsem chtěl z internetu stáhnout nějaké Direct3D zdrojové kódy a přepsat je do OpenGL, nicméně mě upoutal v <a href="#literatura">[3]</a> začátek jednoho odstavce: <span class="cite">Přímé srovnání grafického výkonu OpenGL a Direct3D je docela komplikované, protože obě API mají trochu jiné konečné určení. OpenGL a Direct3D je navíc třeba srovnávat pouze pod Windows, protože jinde Direct3D nechodí.</span></p>

<p>Než jsem tedy začal stahovat D3D programy, zkusil jsem nejprve OpenGL program, na kterém právě dělám (ten částicový systém výše), spustit pod Mandrake 10.0 Linuxem a následně ve Windows XP (na stejném počítači), jiné operační systémy jsou pro mě v tuto chvíli nedostupné.</p>

<p>To, co teď napíšu, rozhodně neberte jako &quot;další kydání na Windows&quot;. Abych pravdu řekl, výsledná FPS mě, stejně jako určitě i vás, totálně šokovala. Přestože se jednalo o naprosto stejný zdrojový kód zkompilovaný akorát pro dva různé systémy, byly výsledky extrémně odlišné. Pro kompilaci bylo ve Windows použito vývojové prostředí MS Visual C++ 6.0 a v Linuxu standardní g++ (KDevelop):</p>

<pre>
[woq@localhost tmp]$ g++ --version
g++ (GCC) 3.3.2 (Mandrake Linux 10.0 3.3.2-6mdk)
Copyright (C) 2003 Free Software Foundation, Inc.
This is free software; ...atd.
</pre>

<p>Následující tabulka vyjadřuje hodnoty FPS programu po ustálení v &quot;klidovém stavu počítače&quot; - tzn. nic se nemačká na klávesnici, nehýbá se myší apod. Jsou uvedeny minimální a maximální hodnoty. Možná by bylo lepší spočítat průměr za např. tisíc překreslení, ale nechtělo se mi s tím hrát - rozdíly jsou tak zřetelné, že hovoří za vše.</p>

<table>
<thead>
<tr><td></td>                                   <td colspan="2"><b>FPS - OpenGL</b></td></tr>
<tr><td></td>                                   <td><b>Okno</b></td>    <td><b>Fullscreen</b></td></tr>
</thead>
<tbody>
<tr><td><b>Win XP</b></td>                      <td>37.0 až 38.5</td>   <td>58.8 až 62.5</td></tr>
<tr><td><b>Linux (KDE)</b></td>         <td>62.5 až 66.7</td>   <td>76.9 až 71.4</td></tr>
<tr><td><b>Linux (Enlightenment)</b></td>       <td>38.0 až 83.0</td>   <td>42.0 až 93.0</td></tr>
</tbody>
</table>

<p>Pozn.: Námitka, že to dělá stáří Visual C++ (vyšlo myslím 1998), neobstojí. Zkoušel jsem to i v nejnovějším Dev-C++ a hodnoty byly prakticky stejné. Navíc ve Windows byl kromě testovaného programu spuštěn pouze Total Commander, kdežto v Linuxu mám standardně po pracovních plochách rozházených nejméně deset dalších aplikací ((průměrně) 5 KWritů, Operu, Konqueror, Gimp, KDevelop, Konzoli, do toho Apache, MySQL... je toho fakt hodně).</p>

<p>Kvůli těmto ne zrovna pozitivním výsledkům (ve Windows) jsem se rozhodl, porovnání s DirectX neprovádět, opravdu asi záleží hodně na tom, pod jakým systémem se spustí. Mimochodem, to víte, že OpenGL běží ve Windows vlastně na Direct3D? I když to v programu nikde explicitně neurčíte, po spuštění v Debug (F5 ve Visual C++), se zobrazí TRACE() zpráva ohledně DDRAW.DLL. Kdysi jsem o tom viděl i nadpis nějakého článku na <?Blank('http://www.opengl.org/');?>.</p>

<p>A ještě si neodpustím jednu zmínku o rychlosti DirectX. Kdysi se v počítačových časopisech rozšířila zpráva, že se po instalaci nové verze (buď 6 nebo 7, už nevím) zvýší výkon grafické karty až o 40 procent. Všichni jásali, ale napadlo vůbec někoho: &quot;A nešlo to udělat pořádně už v té minulé verzi?!&quot;.</p>


<h3>Citace (ne)profesionála</h3>

<p>Bernard Lidický, který vede jeden z nejstarších free-vývojových týmů v ČR - <?Blank('http://hippo.nipax.cz/', 'Hippo Games');?>, byl pro mě vždy programátorským a Linuxovým GURU. Právě on mě opravdu dostal k Linuxu - před tím to byly jen takové krátkodobé pokusy. Ale proč to sem píšu, před časem mi poslal článek o tvorbě počítačových her <a href="#literatura">[4]</a>. O DirectX v něm píše, cituji:</p>

<div class="cite">
<p>Důvody proč ne DirectX</p>

<ul>
<li>API se mi zdá příliš komplikované a zabere hodně času se naučit s ním pracovat.</li>
<li>Je potřeba napsat hodně kódu, aby program vůbec něco dělal.</li>
<li>API se často mění. A mění se tak, že není zpětně kompatibilní. Tedy nová verze znamená nové ponoření se do manuálů a přepisování programu. Je otázka, zda je vývoj opravdu tak rychlý, nebo je API tak nevhodně navržené, že se musí s každou novou verzí celé změnit.</li>
<li>U verzí menších než 7 je <strong>lživá</strong> dokumentace. Nezapomenu, když jsem týden od rána do večera seděl u počítače a marně se snažil použít rotaci nebo poloprůhlednost. V manuálu k DX7 bylo pak pod čarou napsáno: Currently not implemented.</li>
<li>U verzí novějších než 7 pro změnu chybí podpora 2D grafiky. Tedy i 2D hra potřebuje pro svůj běh 3D akceleraci, aby se hýbala rychle.</li>
<li>Poslední (a pro mě zásadní, protože používám Linux) nevýhoda je dostupnost pouze na Windows. Může se stát, že jednoho krásného dne opustíte Windows a přestěhujete se do Linuxu. Hru Kulič jsem pod Linux přeportoval za 3 hodiny, ale u Bombiče napsaného v DirectX8 jsem to raději ani nezkoušel. Znamenalo by to kompletní přepsání programu.</li>
</ul>

<p>Možná výhoda je, že pro DirectX je hodně tutoriálů. Proč je jich hodně? Možná proto, že jsou potřeba, aby to normální programátoři pochopili.</p>
</div>

<p>Abyste si nemysleli, on tomu fakt rozumí... :-]</p>

<?Img('img/cl_local/gldx/kulic2_sm.png', 'Kulič 2 - final beta 0.005');?>

<p>Linux i Windows verzi Kuliče, včetně zdrojových kódů, možno stáhnout na webu Hippo Games.</p>


<h3>Fahrenheit</h3>

<p>Pod tímto pojmem se skrývá projekt Microsoftu a SGI, který by spojil OpenGL a DirectX do jediného nového standardu. Pokud se chcete dočíst několik podrobností o jeho návrhu, odkazuji na <a href="#literatura">[3]</a>. Důvod, proč o něm nebudu psát, je ten, že byl ze strany Microsoftu vypovězen, a to z důvodu pomalosti vývoje u SGI. Osobně nedokáži posoudit, jestli jsem měl slovo &quot;vypovězen&quot; v minulé větě blíže specifikovat příslovci &quot;bohužel&quot; nebo &quot;naštěstí&quot;.</p>


<h3>Jak se portují programy</h3>

<p>Skončíme na začátku rychlým popisem problémů ohledně portace počítačových her a obecně jakýchkoli programů na jiné systémy, než pro které byly primárně vyvíjeny. Připomínám, že díky recenzi UT 2004 defakto vznikl celý tento článek.</p>

<p>Obecně se dá říci, že pokud na něco takového, jako je přenositelnost programu, od samého začátku nemyslíte, bývá nejlepší cestou veškeré portování (ve smyslu složitých úprav zdrojových kódů) ignorovat a začít dělat na úplně jiném programu, kde s během na více systémech počítáte od začátku.</p>

<p>Po svém přechodu z Windows na Linux jsem &quot;takovou blbost&quot;, jako je pokus o portaci, zkoušel u jediného programu, který však dosud denně používám při své práci. Jedná se o textovou aplikaci, které se při spuštění do parametrů main() předají jména C/C++ souborů a ona je označkuje do HTML. Při psaní tutoriálů o programování se nemusíte starat o formátování zdrojových kódů.</p>

<p>Přestože se jednalo o jednoduchý program skládající se z jediné funkce, muselo se nejprve přepsat wokenní rozhraní do textu, ale s tím se samozřejmě muselo počítat. Dále se muselo odbourat rozhraní přes paměťově mapované soubory (soubor se chová jako obyčejné pole, o načítání dat, buffery ap. se stará Windows), přepsat veškeré znaky '\' v diskových cestách na '/', přepsat Windows typy proměnných (DWORD, LPCTSTR...) na céčkovské typy (unsigned int, const char * ...) atd. atd. atd. - práce na dvě hodiny (celý program zabral tři :-).</p>

<p>Osobně si portaci jednou napsaného DirectX programu do OpenGL (nemyslím současný vývoj), aby mohl být spuštěn ve více systémech, naprosto nedokážu představit. A pokud by to už nějaký hyperaktivní programátor dělal, určitě nečekejte, že by po spuštění obě verze vypadaly stejně. Čím déle na portaci pracujete, tím více začínáte ignorovat podrobnosti typu: <span class="cite">Power upy nesvítí, kapky deště nejsou 3D a vrhané stíny se nerozmazávají podle vzdálenosti od světelného zdroje.</span></p>

<p>Podrobnosti zkrátka přestanou být podstatné, smysl hry je zachován. Nicméně nazývat to jako lenost programátorů... dalo by se to tak sice říct, ale fakt nevím. Chtěl bych vidět, jak by vypadala vaše verze. Jedno však vím jistě - paření her a kritizování jejich programátorů je určitě jednodušší...</p>


<a id="literatura"></a>
<h3>Literatura</h3>

<ul>
<li>[0] Vlastní zkušenosti s 3D grafikou</li>
<li>[1] Clayton Walnum: Programujeme grafiku v Microsoft&reg; Direct3D (9.0), Computer Press 2004, první vydání, 358 stran</li>
<li>[2] Chip 01/2004, Hardwarový fotorealismus: Možnosti moderních 3D grafických akcelerátorů, str. 96-100)</li>
<li>[3] <?Blank('http://nehe.ceske-hry.cz/cl_gl_referat.pdf', 'Daniel Čech: OpenGL - Referát na praktikum z informatiky (PDF)');?> - Opravdu kvalitní text</li>
<li>[4] <?Blank('http://nehe.ceske-hry.cz/cl_sdl_hry.pdf', 'Bernard Lidický: Několik poznámek k tvorbě počítačových her (PDF)');?> - Věnuje se především tématům, jaké hry programovat a v čem (přenositelné knihovny Allegro a SDL)</li>
<li>[5] <?Blank('http://www.root.cz/clanek/2314', 'Linuxové hry (47): Unreal Tournament 2004</a> - Hlavní impuls pro vznik tohoto článku');?> - Hlavní impuls pro vznik tohoto článku</li>
</ul>


<h3>Další informace</h3>

<ul>
<li>Seriál o DirectX na Chip CD - vychází/vycházel (už neodebírám) hodně dlouho</li>
<li><?Blank('http://www.root.cz');?> - Vychází zde (i) články o OpenGL a spřízněných technologiích</li>
<li><?Blank('http://nehe.ceske-hry.cz/');?> - Rozsáhlý server o OpenGL (můj :-)</li>
<li><?Blank('http://nehe.gamedev.net/');?> - To samé (a spousta věcí navíc) anglicky</li>
<li><?Blank('http://www.opengl.org/');?> - Domovská stránka OpenGL</li>
<li><?Blank('http://www.microsoft.com/windows/directx');?> - Domovská stránka DirectX</li>
<li><?Blank('http://www.libsdl.org/');?> - SDL, knihovna pro vývoj přenositelných her</li>
</ul>


<p>Použité názvy programových produktů, firem apod. mohou být ochrannými známkami nebo registrovanými ochrannými známkami příslušných vlastníků. Linux je registrovaná obchodní známka pana Linuse Torvaldse.</p>

<div class="author">Michal Turek - Woq <?Email('WOQ@seznam.cz');?></div>
<div class="cl_date">01.08.2004</div>

<?
include 'p_end.php';
?>