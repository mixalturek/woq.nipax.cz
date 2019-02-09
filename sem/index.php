<?php
$p_title = 'Hra `sem`';
include_once 'p_begin.php';
?>


<p>Aplikace p�edstavuje hru ve stylu klasick�ho Scorche nebo Worms�. Zat�m umo��uje pouze chozen� po v��kov�ch map�ch a st��len� v�etn� koliz� s ter�nem a v�buchy. Hra je naps�na v programovac�m jazyce C++ (�ist� OOP), vyu��v� knihoven STL (standardn� knihovna C++), <?php Blank('http://www.libsdl.org/', 'SDL');?> (aplika�n� k�d), <?php Blank('http://www.libsdl.org/projects/SDL_image/', 'SDL_image');?> (nahr�v�n� obr�zk�), <?php Blank('http://www.libsdl.org/projects/SDL_ttf/', 'SDL_ttf');?> (zobrazov�n� text�) a <?php Blank('http://www.opengl.org/', 'OpenGL');?> (rendering). Aplikace je tak� je p�ipravena pro pou�it� <?php Blank('http://www.gnu.org/software/gettext/', 'gettextu');?> (jazykov� mutace), ten v�ak je�t� nebyl napojen.</p>


<h3>Syst�mov� po�adavky, instalace, spu�t�n�...</h3>

<p>Aplikace je vyv�jena pod syst�my Debian Sarge GNU/Linux, Mandrakelinux 10.0 a Mandrakelinux 10.1 a byla testov�na pod MS Windows XP, MS Windows 2000 (emulace ve VMware) a MacOs X. Teoreticky by m�la fungovat v�ude tam, kde SDL (BeOS, MacOS Classic, FreeBSD, OpenBSD, BSD/OS, Solaris, IRIX, QNX, Windows CE, AmigaOS, Dreamcast, Atari, NetBSD, AIX, OSF/Tru64, SymbianOS), ale z d�vodu nedostupnosti nebyly tyto syst�my a platformy testov�ny.</p>

<p>V syst�mu by m�ly b�t nainstalov�ny ovlada�e grafick� karty nebo alespo� Mesa pro sorfwarov� rendering. Testy byly prov�d�ny na grafick�ch kart�ch nVIDIA GeForce4 MX, nVIDIA GeForce2 MX a ATI Radeon 7000. D�le by m�ly b�t v syst�mu p��tomn� (devel!!!) bal��ky knihoven <?php Blank('http://www.libsdl.org/', 'SDL');?>, <?php Blank('http://www.libsdl.org/projects/SDL_image/', 'SDL_image');?> a <?php Blank('http://www.libsdl.org/projects/SDL_ttf/', 'SDL_ttf');?>, jinak kompilace skon�� chybou.</p>


<?php
include_once 'p_end.php';
?>
