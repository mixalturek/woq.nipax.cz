<?php
$p_title = 'T��dy';
include_once 'p_begin.php';
?>

<p>T��dy jsou programov�ny co nejobecn�ji, tak�e by nem�l b�t probl�m je pou��t i v libovoln�m jin�m projektu jako z�kladn� k�d. Pokud v� projekt nebude d�le ���en pod n�kterou z GNU licenc� (viz <?php Web('o_license', 'licence');?>) nebo jim kompatibiln�, budete moci tento k�d pou��vat pouze po nahr�n� z dynamicky linkovan� knihovny.</p>

<pre>
CApplication			- general application class
	CApplicationEx		- extended application (splash img, fps, fonts)
		CFirstApp	- class of the real application

CMenu				- general menu class
	CSimpleMenu		- rendering of menu

CSceneObject			- general object in the scene
	CCamera			- 3D camera class
	CTerrain		- terrain class
	CBillboard		- textured billboard (object from one quad)
		CBullet		- bullet class for shooting
		CParticle	- class of one particle
		CPlayer		- player class (not whole implemented yet)
	CParticleEngine		- particle engine

CSceneObjectManager		- Objects manager (sorting of transparent objs)
CTextureManager			- texture manager
CImage				- image class (SDL_Image)
CGLExt				- support for OpenGL extensions
CVector				- 3D vector class
CColor				- RGBA color class
CIni				- .INI configuration support
CFont				- text support (SDL_ttf)
CGrid				- objects from lines
CCheat				- cheat class
</pre>

<?php
include_once 'p_end.php';
?>
