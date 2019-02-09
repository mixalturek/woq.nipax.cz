<?
$p_title = 'HOWTO - GNU/Linux';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Povolení spustit grafické aplikace přes ssh</div>
<pre>
/etc/ssh/sshd.config, /etc/ssh/ssh.config
X11Forwarding yes

ssh -X uziv@poc
</pre>
</div>


<div class="object"><div class="name">Přepínání cz/en klávesnice</div>
<pre>
/etc/X11/xorg.conf, /etc/X11/XF86Config-4

Section "InputDevice"
	# ...

	Option		"XkbLayout"	"cz(qwerty),us,ru"
	Option		"XkbOptions"	"grp:shifts_toggle,grp_led:scroll"

#	Option		"XkbLayout"	"cz,us"
#	Option		"XkbOptions"	"grp:shift_toggle,grp_led:scroll"

	# Pokud to nepojede, tak zkusit
#	Option		"XkbOptions"	"grp:shifts_toggle,grp_led:scroll"
EndSection
</pre>
</div>


<div class="object">
<div class="name">Rotace obrazu (LCD na výšku)</div>
<pre>
/etc/X11/xorg.conf (pouze xorg, pod XFree nefunguje)

Section	"Device"
	Option		"RandRRotation"	"on"
EndSection

restartovat X server

xrandr -o right
</pre>
</div>


<div class="object">
<div class="name">Barevný prompt v xtermu</div>
<pre>
/etc/bash.bashrc
~/.bashrc

if [ `id -u` = "0" ]; then
    PS1='[\[\033[01;31m\]\u@\h\[\033[00m\] \[\033[01;34m\]\w\[\033[00m\]]\$ '
else
    PS1='[\[\033[01;32m\]\u@\h\[\033[00m\] \[\033[01;34m\]\w\[\033[00m\]]\$ '
fi

# Nastavení titulku okna na aktuální adresář "\e]2;title\a"
export PS1='\e]2;\w\a[\[\033[01;32m\]\u@\h\[\033[00m\] \[\033[01;34m\]\W\[\033[00m\]]\$ '

http://www-128.ibm.com/developerworks/linux/library/l-tip-prompt/
</pre>
</div>


<div class="object">
<div class="name">Vylepšení bashe</div>
<pre>
~/.bashrc

export PS1='[\[\033[01;32m\]\u@\h\[\033[00m\] \[\033[01;34m\]\w\[\033[00m\]]\$ '

alias grep='grep --color=auto -s --exclude-dir="\.svn"'
alias ls='ls -hF --color=auto'
alias df='df -h'
alias du='du -h'
alias xterm='xterm -bg black -fg white -fn 9x15'
alias term='aterm -sl 3000 -tr +sb -sr -si -sk -bg black -fg white -cr orange \
      -shading 50 -fn -misc-fixed-medium-r-normal-*-*-140-*-*-c-*-iso8859-2'

# Vypne pípání při chybě
[ -z "$DISPLAY" ] &amp;&amp; setterm -blength 0 || xset b off
</pre>
</div>


<div class="object">
<div class="name">Bash completion</div>
<pre>
vim /etc/bash.bashrc

# enable bash completion in interactive shells
if [ -f /etc/bash_completion ]; then
    . /etc/bash_completion
fi
</pre>
</div>


<div class="object">
<div class="name">Skript při odhlašovaní</div>
<pre>
# pouze text
~/.bash_logout

# pouze KDE
/usr/bin/startkde (na konci)
</pre>
</div>


<div class="object">
<div class="name">Nahrazování řetězců v bashi</div>
<pre>
[woq@woq ~]$ img='image.png'
[woq@woq ~]$ echo $img
image.png
[woq@woq ~]$ echo ${img%.*}
image
[woq@woq ~]$

<?php Blank('http://www.raphink.info/string-edition-in-bash-replacements');?>
</pre>
</div>


<div class="object">
<div class="name">Grub s obrázkem na pozadí</div>
<pre>
/boot/grub/menu.lst

splashimage=(hd0,0)/grub/splashimages/obrazek.xpm.gz

obrazek.xpm.gz musí být 640x480 s indexovanou paletou 14 barev
</pre>
</div>


<div class="object">
<div class="name">Grub instalace do MBR</div>
<pre>
grub-install (hd0)
</pre>
</div>


<div class="object">
<div class="name">Framebuffer (parametr vga u specifikace kernelu)</div>
<pre>
/boot/grub/menu.lst

title           Debian GNU/Linux, kernel 2.6.8-2-k7 (1024x768, 24b)
root            (hd0,0)
kernel          /vmlinuz-2.6.8-2-k7 root=/dev/hda5 ro vga=0x318
initrd          /initrd.img-2.6.8-2-k7
savedefault
boot

# Lenovo ThinkPad R400, 1280x800
vga=871
</pre>

<table border="1">
<tbody>
<tr>
<th>Colours</th><th>640x480</th><th>800x600</th><th>1024x768</th><th>1152x864</th><th>1280x1024</th><th>1400x1050</th><th>1600x1200</th></tr>
<tr><td>4 bits</td><td>?</td><td>0x302</td><td>?</td><td>?</td><td>?</td><td>?</td><td>?</td></tr>
<tr><td>8 bits</td><td>0x301</td><td>0x303</td><td>0x305</td><td>0x161</td><td>0x307</td><td>?</td><td>0x31C</td></tr>
<tr><td>15 bits</td><td>0x310</td><td>0x313</td><td>0x316</td><td>0x162</td><td>0x319</td><td>0x340</td><td>0x31D</td></tr>
<tr><td>16 bits</td><td>0x311</td><td>0x314</td><td>0x317</td><td>0x163</td><td>0x31A</td><td>0x341</td><td>0x31E</td></tr>
<tr><td>24 bits</td><td>0x312</td><td>0x315</td><td>0x318</td><td>?</td><td>0x31B</td><td>0x342</td><td>0x31F</td></tr>
<tr><td>32 bits</td><td>?</td><td>?</td><td>?</td><td>0x164</td><td>?</td><td>?</td><td>?</td></tr>
</tbody></table>
</div>


<div class="object">
<div class="name">Myš v konzoli</div>
<pre>
Nainstalovat a spustit démona gpm
</pre>
</div>


<div class="object">
<div class="name">Semtelovskej KOS</div>
<pre>
telnet-ssl -l turekm1 -8 kos.feld.cvut.cz
</pre>
</div>


<div class="object">
<div class="name">Balíčky (Debian)</div>
<pre>
# Apt
apt-get update
apt-get upgrade
apt-cache search fráze
apt-cache show název
apt-get install název
apt-get remove název

# Oprava závislostí
apt-get -f install

# Smaže dřív stáhlý nenainstalovaný balíčky (uvolnění místa na disku)
apt-get clean

# Instalace balíčků v adresáři
dpkg -i *.deb

# Rekonfigurace balíčku
dpkg reconfigure xserver-xfree86

# Rekonfigurace instalačního procesu
base-config

# Seznam všech balíčků + instalace
dpkg --get-selections &gt; pkg_list.txt
dpkg --set-selections &lt; pkg_list.txt
# apt-get install --reinstall `cat pkg_list.txt`

# Instalace z experimentalu
aptitude -t experimental install package1 package2 package3...

### Instalace zdrojového balíčku ###

# Stáhnutí
apt-get source packagename

# Stáhnutí a kompilace
apt-get -b source packagename

# Ruční kompilace
cd packagedir
dpkg-buildpackage -rfakeroot -uc -b

# Instalace
dpkg -i file.deb
<?php Blank('http://www.debian.org/doc/manuals/apt-howto/ch-sourcehandling.en.html'); ?>


# Import gpg fingerprintu repozitáře
wget -O - http://deb.opera.com/archive.key | apt-key add -
<?php Blank('http://deb.opera.com/'); ?>


# SIGSEGV - třeba to pomůže
[root@woq ~]# apt-get (něco)
Neoprávněný přístup do paměti (SIGSEGV)

[root@woq ~]# mv /var/cache/apt/pkgcache.bin /var/cache/apt/pkgcache.bin_bak
[root@woq ~]# mv /var/cache/apt/srcpkgcache.bin /var/cache/apt/srcpkgcache.bin_bak


[woq@woq ~]$ apt-get moo
         (__)
         (oo)
   /------\/
  / |    ||
 *  /\---/\
    ~~   ~~
...."Have you mooed today?"...
[woq@woq ~]$


# Zjištění, do kterého balíčku patří soubor
[woq@evm bbd]$ apt-cache search makedepend
xutils-dev - X Window System utility programs for development
[woq@evm bbd]$ dpkg -S makedepend
xutils-dev: /usr/bin/makedepend
xutils-dev: /usr/share/man/man1/makedepend.1.gz
[woq@evm bbd]$ dpkg -S /usr/bin/makedepend
xutils-dev: /usr/bin/makedepend

# Informace o balíčku
[woq@evm bbd]$ apt-cache show xutils-dev
</pre>
</div>


<div class="object">
<div class="name">Průhledný term, čeština</div>
<pre>
aterm -fg orange -tr
aterm -sl 3000 -tr +sb -sr -si -sk -bg black -fg white -cr orange\
      -shading 50 -fn -misc-fixed-medium-r-normal-*-*-140-*-*-c-*-iso8859-2
</pre>
</div>


<div class="object">
<div class="name">Změna HW adresy síťovky</div>
<pre>
ifconfig eth0 down
ifconfig eth0 hw ether 00:04:61:4D:24:98
ifconfig eth0 up
dhclient

# cat /etc/network/interfaces
allow-hotplug eth0
iface eth0 inet dhcp
hwaddress ether 00:21:86:9E:D5:E0

# Nevyzkoušený
echo "/sbin/ifconfig eth0 hw ether 00:21:86:9E:D5:E0" > /etc/network/if-pre-up.d/change_adress
chmod +x /etc/network/if-pre-up.d/change_adress
</pre>
</div>


<div class="object">
<div class="name">OSD u centericq</div>
<pre>
~/.centericq/external

%action OSD
event msg
proto all
status online away na
options nowait
%exec
#!/bin/sh
echo $CONTACT_NICK | osd_cat \
	-f '-Deja-DejaVu Sans-Bold-r-Normal--0-300-0-0-p-0-iso8859-2' \
	-p bottom -A center -d 1 -O 1 -u white \
</pre>
</div>


<div class="object">
<div class="name">GNU/Emacs</div>
<pre>
# Psychiatr
M-x doctor

# Textovka
M-x dunnet
</pre>
</div>


<div class="object">
<div class="name">Virtuální CD-ROM (netestováno)</div>
<pre>
# Zkopírovat CD (možná /dev/hdX místo /dev/cdrom)
cp /dev/cdrom /tmp/cdrom-image

# Připojit
mount -o loop=/dev/loop0 /tmp/cdrom-image /mnt/cdrom
</pre>
</div>


<div class="object">
<div class="name">GRUB konfigurák</div>
<pre>
# /boot/grub/menu.lst

default		0
timeout		5
color		cyan/blue white/blue

title		Debian GNU/Linux
root		(hd0,6)
kernel		/boot/vmlinuz-2.6.8-2-686 root=/dev/hda7 ro vga=0x318
initrd		/boot/initrd.img-2.6.8-2-686
savedefault
boot

title		Windows XP Professional
root		(hd0,0)
makeactive
chainloader	+1
</pre>
</div>


<div class="object">
<div class="name">Swap disků pro Win na /dev/hdb</div>
<pre>
# /boot/grub/menu.lst

title Windows XP Professional
        map (hd0) (hd1)
        map (hd1) (hd0)
        root (hd1,0)
        rootnoverify (hd1,0)
        makeactive
        chainloader +1
</pre>
</div>


<div class="object">
<div class="name">Mountování win filesystému</div>
<pre>
# /etc/fstab
# Kdokoli může číst i zapisovat, neoznamuje, že nelze změnit práva

/dev/hda8  /mnt/bonus  vfat  defaults,umask=0000,quiet  0  2
/dev/hdb1  /mnt/win_c  ntfs  ro,user,noauto,umask=0000  0  0

<?php Blank('http://gentoo-wiki.com/HOWTO_Mount_MS_Windows_partitions_(FAT,NTFS)');?>
</pre>
</div>


<div class="object">
<div class="name">Nastavení zprávy, která se vypisuje po přihlášení do systému</div>
<pre>
/etc/motd
</pre>
</div>


<div class="object">
<div class="name">Nastavení aktuálního času</div>
<pre>
date -s 'Sat Jan 14 16:00 UTF 2006'
date -s 9:20:10

rdate -p time.sh.cvut.cz

# Synchronizace HW hodin
hwclock --systohc
</pre>
</div>


<div class="object">
<div class="name">Přidání dalšího WM do menu DM (netestováno)</div>
<pre>
Do adresáře /usr/share/xsessions/ přidat soubor pekwm.desktop

[Desktop Entry]
Encoding=ISO-8859-2
Name=PekWM
Comment=PekWM
Exec=/usr/local/bin/pekwm
Terminal=False
TryExec=/usr/local/bin/pekwm
Type=Application

[Window Manager]
SessionManaged=true

<?php Blank('http://www.abclinuxu.cz/clanky/recenze/fluxbox');?>
</pre>
</div>


<div class="object">
<div class="name">sudo</div>
<pre>
/etc/sudoers

uzivatel pocitac= NOPASSWD: /absolutni/cesta/k/programu
uzivatel ALL= NOPASSWD: /sbin/neco

Spuštění: sudo program

<?php Blank('http://www.linuxhomenetworking.com/linux-hn/addusers.htm');?>
</pre>
</div>


<div class="object">
<div class="name">Spuštění grafického programu pod jiným userem</div>
<pre>
gksu -u user program

# Alternativa k su, aby šly vytvářet okna i pod jiným uživatelem
sux
</pre>
</div>


<div class="object">
<div class="name">Roury</div>
<pre>
# Počet uživatelů, kteří se přihlásili od instalace systému
last | cut -c 1-9 | sort | uniq | wc -l

# Kolikrát se přihlásil někdo určitý
last | cut -c 1-9 | grep uzivatel | wc -l

# Musí být vytnuté umazávání starých logů (stačí jenom wtmp)
man logrotate
/etc/logrotate.conf
/var/log/wtmp - loguje přihlašování userů, viz příkaz last
</pre>
</div>


<div class="object">
<div class="name">Cron</div>
<pre>
# dotaz na časované akce
crontab -l

# nový, stane se aktivním hned po uložení
crontab -e

# spuštění při shodě všech položek najednou
# dvě hodnoty se oddělují čárkou, interval pomlčkou
# hvězdička znamená cokoli
# ------------- minute (0 - 59)
# | ----------- hour (0 - 23)
# | | --------- day of month (1 - 31)
# | | | ------- month (1 - 12)
# | | | | ----- day of week (0 - 6) (Sunday=0)
# | | | | |
# * * * * * command to be executed

// Každý den, ve čtyři ráno se spustí aktualizace locate
[root@woq ~/bin]# crontab -e
# m h  dom mon dow   command
  0 4  *   *   *     /usr/bin/updatedb
</pre>
</div>


<div class="object">
<div class="name">Miniaturní fonty v Xkách</div>
<pre>
apt-get install xfonts-base-transcoded
apt-get install xfonts-100dpi-transcoded
apt-get install dejavu

pak vlezes do adresare kde mas fonty
/etc/X11/fonts/misc a v tom adresari das prikaz
mkfontdir [ten ti spravi cesty k fontum]
pak restartuj X-ka [nejspis : ]] ]

			honzik :-)
</pre>
</div>


<div class="object">
<div class="name">Instalátor IE do Linuxu</div>
<pre>
<?php Blank('http://www.tatanka.com.br/ies4linux/');?>


./ies4linux --downloaddir ~/down --basedir /opt/ies4linux
            --bindir /usr/local/bin --no-install-flash
</pre>
</div>


<div class="object">
<div class="name">Klikátko na výběr distribuce</div>
<pre>
<?php Blank('http://www.zegeniestudios.net/ldc/');?>
</pre>
</div>


<div class="object">
<div class="name">Změna kurzoru myši</div>
<pre>
# ~/.Xdefaults:
Xcursor*theme: whiteglass

# Globálně
[woq@woq /usr/share/icons/default]# ls
default/  handhelds/  redglass/  whiteglass/
[woq@woq /usr/share/icons/default]# vim index.theme
[Icon Theme]
Inherits=redglass

Dají se stáhnout na
<?php Blank('http://www.kde-look.org/');?>
</pre>
</div>


<div class="object">
<div class="name">Obarvování textu v konzolových skriptech</div>
<pre>
echo -en "\E[34;1m"
echo "modrou barvou"
tput sgr0
echo "klasicky"
</pre>
</div>


<div class="object">
<div class="name">Stáhnutí celého webu</div>
<pre>
# Pouze na daném serveru
wget -m http://www.neco.cz

# Kompletní stáhnutí webu
wget --mirror --convert-links --html-extension --exclude-directories=forum,member http://www.cplusplus.com/

# I z jiných, do hloubky level
wget -H -r --level=1 -k -p http://www.neco.cz

# Ignoruje robots.txt
-erobots=off --wait 1

# HTTP autorizace
--http-user=user --http-password=password

# Přerušené stahování
wget -c soubor

# Všechny gif obrázky na dané stránce
wget -r -A.gif --level=1 http://server.cz/stranka.html
</pre>
</div>


<div class="object">
<div class="name">Backporty balíčků z Debian testing do stable</div>
<pre>
<?php Blank('http://www.backports.org/');?>
</pre>
</div>


<div class="object">
<div class="name">Testování slabých uživatelských hesel v systému</div>
<pre>
# Zákaz příliš krátkých hesel, slovníkových atd. - ověřování u passwd
/etc/pam.d/common-password (na konci)

# Slovníkový hesla - přidat slova do
/usr/share/john/password.lst

/usr/sbin/unshadow /etc/passwd /etc/shadow > passwd.1
/usr/sbin/john passwd.1
/usr/sbin/john -show passwd.1

# Nejmenší priorita
nice -n 19 /usr/sbin/john passwd.1

<?php Blank('http://www.openwall.com/john/');?>
</pre>
</div>


<div class="object">
<div class="name">cut</div>
<pre>
# Vypsat první sloupec ze souboru cs.dic a jako oddělovač použít /
cut -f 1 -d / cs.dic

# Počet lidí, kteří si zobrazili něco na webu
cut -f 1 -d ' ' /var/log/apache2/access.log | sort | uniq | wc -l
</pre>
</div>


<div class="object">
<div class="name">Velikost složek v adresáři</div>
<pre>
du --max-depth=1
</pre>
</div>


<div class="object">
<div class="name">Speciální proměnné shellu</div>
<pre>
$$ - PID shellu
$! - PID posledního procesu, který byl spuštěn na pozadí
$? - návratová hodnota posledního dokončeného procesu.
</pre>
</div>


<div class="object">
<div class="name">Vygenerování ssh klíče</div>
<pre>
ssh-keygen -b 4096 -t dsa
</pre>
</div>


<div class="object">
<div class="name">mplyer, mencoder</div>
<pre>
#instalace
# <?php Blank('http://www.mplayerhq.hu/');?>
# Rozbalit kodeky do /usr/local/lib/codecs
./configure --language=cs
make
cp mplayer mencoder /usr/local/bin


[woq@woq ~/.mplayer]$ cat ~/.mplayer/config
# Nastaveni titulku (cestina, velikost, pozice)
font=/usr/share/fonts/truetype/ttf-dejavu/DejaVuSans.ttf
subcp=cp1250
subpos=100
subfont-text-scale=3.5
[woq@woq ~/.mplayer]$


# Zakázání šetřiče
mplayer -stop-xscreensaver film.avi


# Spuštění filmu ve framebufferu
mplayer -vo fbdev film.avi

# Spuštění filmu s textovým výstupem
mplayer -vo aa film.avi
mplayer -vo caca film.avi

# Výstup z webkamery
mplayer tv://


# Synchronizace titulků a zvuků (při přehrávání pomocí kláves X a Y)
# Titulky můžou být přímo ve filmu, jazyky se pak přepnou pomocí klávesy B
mplayer film.avi -sub subtitles.sub -subdelay počet_sekund

# Průhlednost pozadí titulků
mplayer -sub-bg-alpha 0-255 film.avi


# Screenshot (klávesou S)
mplayer -vf screenshot film.avi


# Ukládání internetových streamů
mplayer mms://somewhere.com/strem.asf -dumpstream -dumpfile stream.asf -vc dummy -vo null
(-dumpaudio | -dumpvideo | -dumpstream)

mplayer mms://somewhere.com/strem.asf -ao pcm:file=stream.wav -vc dummy -vo null
oggenc stream.wav -o stream.ogg


# Spojení několika filmů dohromady
mencoder -oac copy -ovc copy -idx -o whole.mpg 1.mpg 2.mpg

# Oříznutí začátku a konce filmu
mencoder old.avi -ss 00:04:26 -endpos 01:35:59 -ovc copy -oac copy -o new.avi

# Základní konverze
mencoder filename.avi -ovc lavc -oac lavc -ffourcc DX50 -o output.avi

<?php Blank('http://www.mplayerhq.hu/DOCS/man/en/mplayer.1.html');?>
</pre>
</div>


<div class="object">
<div class="name">Titulky</div>
<pre>
# Spojení dvou dohromady
subs -o vystup.srt cd1.srt cd2.srt

# Přečasování
subs -o vystup.srt -p p1_film  p1_titulky   -p p2_film  p2_titulky   vstup.srt
subs -o vystup.srt -p 00:00:12 00:00:21,283 -p 01:18:21 01:18:31,717 vstup.srt
</pre>
</div>


<div class="object">
<div class="name">Příkazy</div>
<pre>
# Zpráva všem přihlášeným uživatelům
echo "nejaka zprava" | wall

# Informace o uživateli z /etc/passwd
finger uživatel

# Rozdělení souboru
split soubor -b 1440k prefix

# Hledání na disku
find adresář -name soubor

# find all files | grep extensions | remove directories at the begining
find . -type f | grep -G '\.\(.pp\|h\|c\)$' | sed 's/^.*\///'

# Změna kódování souboru
iconv -f staré -t nové

# Diff, merge, patch
diff súbor1 súbor2
merge súbor1 súbor2 súbor3
patch zdrojový_soubor patch_soubor

# Nastavení ledek na klávesnici
setleds +num -caps -scroll

# Testy chyb s pamětí v programu
valgrind program
</pre>
</div>


<div class="object">
<div class="name">MS fonty</div>
<pre>
apt-get install msttcorefonts
apt-get install x-ttcidfont-conf
</pre>
</div>


<div class="object">
<div class="name">Screen</div>
<pre>
^a ?		nápověda

^a c		nové okno
^a n		přepínání oken
^a p		přepínání oken
^a A		nastavení jména okna
^a [číslo]	přepnutí na určité okno

^a d		odpojí screen od terminálu
screen -r	připojení ke screenu
screen -r [pid]	připojení k určitému screenu

^a S		rozdělení okna na víc regionů (částí)
^a TAB		přepíná mezi regiony

screen -x	připojí se k existujícímu screenu (dva lidi vidí to samé)

<?php Blank('http://www.abclinuxu.cz/clanky/tipy/gnu-screen');?>
</pre>
</div>


<div class="object">
<div class="name">Resource limity (počet procesů, otevřených souborů, paměť...)</div>
<pre>
ulimit
/etc/security/limits.conf
</pre>
</div>


<div class="object">
<div class="name">Diskové kvóty</div>
<pre>
# Upravit /etc/fstab
/dev/md6        /home           ext3    defaults,quota  0       2

# Není nutný, ale nejjednodušší cesta
shutdown -r now

# Software
apt-get install quota
apt-get install quotatool

# Nastavení kvót všem uživatelům (ve skupině users)
# Soft limit 1GB, hard limit 5GB, grace period 7 dní, libovolný počet souborů
# + Nutné volat quotatool pro každého nově vytvářeného uživatele!
for login in $( cat /etc/passwd | grep '.*:.*:.*:100:.*' | cut -d : -f 1 ); do
       echo $i
       quotatool -u $login -b -q 1000M -l '5000 Mb' /home
done

# Statistiky pro roota
repquota -as

# Statistiky pro uživatele
quota
</pre>
</div>


<div class="object">
<div class="name">Forwardování emailů</div>
<pre>
Do ~/.forward napsat emailovou adresu

# Musí být
chmod go-w $HOME
chmod go-w $HOME/.forward

# Komu budou chodit maily od apache, ftp, security...
/etc/aliases
</pre>
</div>


<div class="object">
<div class="name">LaTeX, Beamer (prezentace)</div>
<pre>
apt-get install latex-beamer
apt-get install latex-ucs

# V /etc/texmf/fmt.d/00tetex.cnf odkomentovat řádky, které začínají na
# cont-cz, csplain, cslatex, pdfcsplain, pdfcslatex

update-fmtutil
texconfig init

pdfcslatex soubor.tex

<?php Blank('http://www.abclinuxu.cz/clanky/navody/beamer-latex-na-prezentace');?>

<?php Blank('http://www.abclinuxu.cz/clanky/navody/beamer-latex-na-prezentace-2-obrazky-tabulky-skryvani');?>

<?php Blank('http://www.debian.cz/users/localization.php');?>

# PDF
\usepackage{hyperref}
\hypersetup{ pdftitle={xxx}, pdfauthor={xxx} }
</pre>
</div>


<div class="object">
<div class="name">LaTeX triky</div>
<pre>
<?php Blank('http://www.dd.chalmers.se/latex/tips_e.html');?>
</pre>
</div>


<div class="object">
<div class="name">LaTeX - obsah a seznam obrázků na společné stránce</div>
<pre>
\usepackage{tocloft}
</pre>
</div>


<div class="object">
<div class="name">Český slovník pro ispell</div>
<pre>
apt-get install iczech
</pre>
</div>


<div class="object">
<div class="name">České fortunes</div>
<pre>
apt-get install fortunes-cs
</pre>
</div>


<div class="object">
<div class="name">Konfigurace sítě přes dhcp</div>
<pre>
[woq@woq ~]$ cat /etc/network/interfaces
auto lo
iface lo inet loopback

auto eth0
iface eth0 inet dhcp
</pre>
</div>


<div class="object">
<div class="name">Screenshot </div>
<pre>
# Celá plocha
import -window root screenshot.png

# Aktivní okno
import -frame screenshot.png

# Delay
import -delay n/100sekundy -window root screnshot.png

# Vzdáleně
import -window root -display :0 screnshot.png


# PekWM (Scroll_Lock... neobjevil jsem, jak použít PrintScreen/SysRq)
KeyPress = "Scroll_Lock"
{
	Actions = &quot;Exec import -window root /home/woq/tmp/gimp/`date +%F_%H-%M-%S`.png &amp;&quot;
}
KeyPress = "Mod1 Scroll_Lock"
{
	Actions = &quot;Exec import -frame /home/woq/tmp/gimp/`date +%F_%H-%M-%S`.png &amp;&quot;
}
</pre>
</div>


<div class="object">
<div class="name">Apache</div>
<pre>
# Počet procesů
&lt;IfModule prefork.c&gt;
StartServers         5
MinSpareServers      5
MaxSpareServers     10
MaxClients          20
MaxRequestsPerChild  0
&lt;/IfModule&gt;
</pre>
</div>


<div class="object">
<div class="name">Regulární výrazy</div>
<table>
<tr>
<th>Zápis</th>
<th>Význam</th>
</tr>
<tr>
<td><tt>a</tt></td>
<td>znak <tt>a</tt></td>
</tr>
<tr>
<td><tt>.</tt></td>
<td>libovolný znak</td>
</tr>
<tr>
<td><tt>\.</tt></td>
<td>znak <tt>.</tt> (podobně i pro<tt>( ) [ ] { } ? + -</tt> a další znaky)</td>
</tr>
<tr>
<td><tt>[abc0-9]</tt></td>
<td>jeden ze znaků <tt>a</tt>, <tt>b</tt>, <tt>c</tt> nebo znak z intervalu <tt>0</tt> až <tt>9</tt></td>
</tr>
<tr>
<td><tt>[^abc0-9]</tt></td>
<td>libovolný znak kromě znaků <tt>a</tt>, <tt>b</tt>, <tt>c</tt> a znaků z intervalu <tt>0</tt> až <tt>9</tt></td>
</tr>
<tr>
<td><tt>|</tt></td>
<td>alternativa (tj. jako <tt>+</tt> v obyčejných RV)</td>
</tr>
<tr>
<td><tt>*</tt></td>
<td>iterace předchozího RV (0 až nekonečno)</td>
</tr>
<tr>
<td><tt>+</tt></td>
<td>pozitivní iterace předchozího RV (1 až nekonečno)</td>
</tr>
<tr>
<td><tt>?</tt></td>
<td>podmíněnost předchozího RV (0 nebo 1 krát)</td>
</tr>
<tr>
<td><tt>{n}</tt></td>
<td>iterace předchozího RV (právě <tt>n</tt>-krát)</td>
</tr>
<tr>
<td><tt>{n,}</tt></td>
<td>iterace předchozího RV (alespoň <tt>n</tt>-krát)</td>
</tr>
<tr>
<td><tt>{,n}</tt></td>
<td>iterace předchozího RV (nejvýše <tt>n</tt>-krát)</td>
</tr>
<tr>
<td><tt>{m,n}</tt></td>
<td>iterace předchozího RV (nejméně <tt>m</tt>-krát, nejvýše<tt>n</tt>-krát)</td>
</tr>
<tr>
<td><tt>( )</tt></td>
<td>seskupení (pro změnu priority)</td>
</tr>
<tr>
<td><tt>^</tt> na začátku RV</td>
<td>vzor se musí vyskytovat na začátku prohledávaného textu</td>
</tr>
<tr>
<td><tt>$</tt> na konci RV</td>
<td>vzor se musí vyskytovat na konci prohledávaného textu</td>
</tr>
</table>
</div>


<div class="object">
<div class="name">Kontrola disku</div>
<pre>
badblocks -v -o /root/badbl.txt /dev/hda8
</pre>
</div>


<div class="object">
<div class="name">Přidání modulu do Apache</div>
<pre>
a2enmod userdir
/etc/init.d/apache2 force-reload
</pre>
</div>


<div class="object">
<div class="name">Run dialog - Alt+F2</div>
<pre>
apt-get install gmrun

~/.pekwm/keys

Global
{
#	KeyPress = "Mod1 F2" { Actions = "ShowCmdDialog" }
	KeyPress = "Mod1 F2" { Actions = "Exec gmrun &amp;" }

	# ...
}
</pre>
</div>


<div class="object">
<div class="name">Quakovská konzole :D</div>
<pre>
apt-get install tilda
</pre>
</div>


<div class="object">
<div class="name">Rekurzivní grep</div>
<pre>
grep -r -I 'retezec' ./

-r rekurzivní průchod podadresářů
-I procházet pouze textové soubory
hledaný řetězec
kde začít
</pre>
</div>


<div class="object">
<div class="name">Convert, jhead</div>
<pre>
# Změna velikosti obrázku
convert -sample 1280x1024 input.jpg output.jpg
convert -sample 1280x1024 -quality 90 input.jpg output.jpg

# Animovaný GIF
convert -delay 100 *.png hnusny_blikajici_banner.gif

# Konverze obrázků do jednoho PDF
convert *.jpg soubor.pdf

# Automatická rotace obrázků (v exif musí být uložená orientace)
jhead -autorot *

# Změna data uloženého v exif informacích
exif --tag="Date and Time" --ifd="0" --set-value="YYYY:MM:DD HH:MM:SS" image.jpg
exif --tag="DateTime" --ifd="0" --set-value="YYYY:MM:DD HH:MM:SS" image.jpg
</pre>
</div>


<div class="object">
<div class="name">Konzole (Ctrl+Alt+Fx)</div>
<pre>
vim /etc/console-tools/config

# České znaky místo obdélníčků
SCREEN_FONT=lat2-sun16
SCREEN_FONT_vc2=lat2-sun16
SCREEN_FONT_vc3=lat2-sun16
SCREEN_FONT_vc4=lat2-sun16
SCREEN_FONT_vc5=lat2-sun16
SCREEN_FONT_vc6=lat2-sun16
APP_CHARSET_MAP=iso02

# Zapnutý Num Lock
LEDS=+num
</pre>
</div>


<div class="object">
<div class="name">Záložky v mc</div>
<pre>
ctrl+\ nebo ctrl+4
</pre>
</div>


<div class="object">
<div class="name">mc, wget, fetch - hesla k serverům</div>
<pre>
chmod 0600 ~/.netrc
cat ~/.netrc
machine m1
login l1
password p1

machine m2
login l2
password p2
</pre>
</div>



<div class="object">
<div class="name">SVN - subversion</div>
<pre>
# Vytvoření repozitáře
svnadmin create /absolute/path/to/repos

svn import /tmp/localproj file:///path/to/repos/localproj -m "Initial import"

svn mkdir trunk tags branches
svn commit -m "Create normal infrastructure"

# Checkout do aktuálního adresáře
svn co file:///absolute/path/to/repos
svn co svn+ssh://computer.com/absolute/path/to/repos

# Checkout konkrétní revize
svn checkout -r number file:///path

# Branch
svn copy trunk branches/new_branch -m "New branch"

# Tag
svn copy trunk tags/new_tag -m "New tag"

# Grafický klient
kdesvn
rapidsvn

# Grafický diff
meld
kdiff3

# Backup
svnadmin dump /path/to/reponame &gt; repository.dump
svnadmin create /path/to/reponame
svnadmin load /path/to/reponame &lt; repository.dump
</pre>
</div>


<div class="object">
<div class="name">Odstranění .svn podadresářů</div>
<pre>
find -name .svn -exec rm -rf {} \;
</pre>
</div>


<div class="object">
<div class="name">Úplné formátování FAT filesystému</div>
<pre>
mkfs.vfat -c -v -F 32 -n disk /dev/hdd1

-c spustí badblocks
-v verbose
-F FAT32 se implicitně nevytváří
-n label
</pre>
</div>


<div class="object">
<div class="name">Obarvení souborů v ls</div>
<pre>
eval `dircolors`
LS_COLORS="$LS_COLORS*.JPG=01;35:*.GIF=01;35:*.jpeg=01;35:*.pcx=01;35:*.png=01;35:*.pnm=01;35:*.bz2=01;31:*.mpg=01;38:*.mpeg=01;38:*.MPG=01;38:*.MPEG=01;38:*.m4v=01;038:*.mp4=01;038:*.swf=01;038:*.avi=01;38:*.AVI=01;38:*.wmv=01;38:*.WMV=01;38:*.asf=01;38:*.ASF=01;38:*.mov=01;38:*.MOV=01;38:*.mp3=01;39:*.ogg=01;39:*.MP3=01;39:*.Mp3=01;39"
export LS_OPTIONS='--color=auto'
alias ls='ls $LS_OPTIONS'

dircolors --print-database
ls --color=auto
</pre>
</div>


<div class="object">
<div class="name">Nejčastěji používané příkazy v konzoli</div>
<pre>
history|awk '{print $2}'|awk 'BEGIN {FS="|"} {print $1}'|sort|uniq -c|sort -rn|head -10
</pre>
</div>


<div class="object">
<div class="name">Nastavení výchozího WWW prohlížeče v Thunderbirdu</div>
<pre>
Úpravy - Předvolby - Rozšířené - Obecné - Editor předvoleb

network.protocol-handler.app.http
/usr/bin/opera

network.protocol-handler.app.https
/usr/bin/opera
</pre>
</div>


<div class="object">
<div class="name">Thunderbird rozšíření</div>
<pre>
Display Mail User Agent
XNote
</pre>
</div>


<div class="object">
<div class="name">Opera - otevření nového tabu z jiné aplikace</div>
<pre>
opera -newtab URL
opera -newbackgroundpage URL
</pre>
</div>


<div class="object">
<div class="name">Opera - nastavení prostředního tlačítka myši</div>
<pre>
Tools - Preferences - Shortcuts - Middle click options
</pre>
</div>


<div class="object">
<div class="name">Opera - ztmavování stránky při hledání</div>
<pre>
opera:config#UserPrefs|DimSearchOpacity
</pre>
</div>


<div class="object">
<div class="name">České texty v PekWM</div>
<pre>
// Mělo by to jít vyřešit definicí fontu v tématu, nicméně tohle
// funguje opravdu spolehlivě ;-)

// PFont.cc
void PFont::draw(Drawable dest, int x, int y, const char *text,
    uint max_chars, uint max_width, PFont::TrimType trim_type)
{
    if (text == NULL) {
        return;
    }

    uint offset = x, chars = max_chars;
    bool free_text = false;
    char *real_text = (char*) text;

    <b>char* tmp = real_text;
    while(*tmp != '\0')
    {
        switch(*tmp)
        {
        case 'ú': case 'ů': *tmp = 'u'; break;
        case 'ě': case 'é': *tmp = 'e'; break;
        case 'š': *tmp = 's'; break;
        case 'č': *tmp = 'c'; break;
        case 'ř': *tmp = 'r'; break;
        case 'ž': *tmp = 'z'; break;
        case 'ý': *tmp = 'y'; break;
        case 'á': *tmp = 'a'; break;
        case 'í': *tmp = 'i'; break;
        case 'ó': *tmp = 'o'; break;
        case 'ď': *tmp = 'd'; break;
        case 'ť': *tmp = 't'; break;
        case 'ň': *tmp = 'n'; break;
        case 'Ú': case 'Ů': *tmp = 'U'; break;
        case 'Ě': case 'É': *tmp = 'E'; break;
        case 'Š': *tmp = 'S'; break;
        case 'Č': *tmp = 'C'; break;
        case 'Ř': *tmp = 'R'; break;
        case 'Ž': *tmp = 'Z'; break;
        case 'Ý': *tmp = 'Y'; break;
        case 'Á': *tmp = 'A'; break;
        case 'Í': *tmp = 'I'; break;
        case 'Ó': *tmp = 'O'; break;
        case 'Ď': *tmp = 'D'; break;
        case 'Ť': *tmp = 'T'; break;
        case 'Ň': *tmp = 'N'; break;
        default: break;
        }

        tmp++;
    }</b>

    // ...
}
</pre>
</div>


<div class="object">
<div class="name">Konfigurace .Xdefaults</div>
<pre>
[woq@woq ~]$ cat ~/.Xdefaults
xterm*foreground: white
xterm*background: black
xterm*cursorColor: orange
xterm*visualbell: on
xterm*font: -misc-fixed-medium-r-normal-*-*-140-*-*-c-*-iso8859-2

yeahconsole*consoleHeight: 40
yeahconsole*screenWidth: 1020
yeahconsole*xOffset: 120
yeahconsole*stepSize: 0
yeahconsole*toggleKey: None+F1
yeahconsole*handleWidth: 1
yeahconsole*handleColor: white
yeahconsole*cursorColor: orange
yeahconsole*visualbell: on
yeahconsole*font: -misc-fixed-medium-r-normal-*-*-120-*-*-c-*-iso8859-2

[woq@woq ~]$ xrdb -merge ~/.Xdefaults
[woq@woq ~]$
</pre>
</div>


<div class="object">
<div class="name">Opera flashblock</div>
<pre>
<?php Blank('http://userjs.org/scripts/general/enhancements/hide-objects'); ?>
</pre>
</div>


<div class="object">
<div class="name">Nahrazení mezer a speciálních znaků ve jménech souborů</div>
<pre>
<?php Blank('http://detox.sourceforge.net/'); ?>
</pre>
</div>


<div class="object">
<div class="name">Spojení souborů podle sloupců</div>
<pre>
[woq@woq ~]$ cat 1.txt
1 0.1
2 0.1
3 0.1
4 0.1
5 0.1
[woq@woq ~]$ cat 2.txt
1 0.2
2 0.2
3 0.2
4 0.2
5 0.2
[woq@woq ~]$ paste 1.txt 2.txt
1 0.1   1 0.2
2 0.1   2 0.2
3 0.1   3 0.2
4 0.1   4 0.2
5 0.1   5 0.2
[woq@woq ~]$ join 1.txt 2.txt
1 0.1 0.2
2 0.1 0.2
3 0.1 0.2
4 0.1 0.2
5 0.1 0.2
[woq@woq ~]$
</pre>
</div>


<div class="object">
<div class="name">Odeslání emailů z příkazové řádky</div>
<pre>
mail -s 'předmět' emailová@adresa.cz &lt; text_emailu.txt
mutt -s 'předmět' -a příloha emailová@adresa.cz &lt; text_emailu.txt
</pre>
</div>


<div class="object">
<div class="name">Zamknutí plochy</div>
<pre>
xscreensaver-command -lock
</pre>
</div>


<div class="object">
<div class="name">Je zapnutá OpenGL akcelerace?</div>
<pre>
# balíček mesa-utils
glxinfo | grep "direct rendering"
</pre>
</div>


<div class="object">
<div class="name">xterm fonty</div>
<pre>
LANG=cs_CZ
-misc-fixed-medium-r-normal-*-*-140-*-*-c-*-iso8859-2

export LANG=cs_CZ.UTF-8
xterm -fn '-misc-fixed-medium-r-normal-*-*-140-*-*-c-*-iso10646-1'
</pre>
</div>


<div class="object">
<div class="name">Slovník v Opeře</div>
<pre>
# search.ini

[Search Engine 15]
Name=CZ -> EN
Verbtext=0
URL=http://slovnik.seznam.cz/search.py?wd=%s&amp;lg=cz_en
Query=
Key=ce
Is post=0
Has endseparator=0
Encoding=utf-8
Search Type=0
Position=-1
Nameid=0
Deleted=0

[Search Engine 16]
Name=EN -> CZ
Verbtext=0
URL=http://slovnik.seznam.cz/search.py?wd=%s&amp;lg=en_cz
Query=
Key=ec
Is post=0
Has endseparator=0
Encoding=utf-8
Search Type=0
Position=-1
Nameid=0
Deleted=0

[Search Engine 17]
Name=RU -> CZ
Verbtext=0
URL=http://slovnik.seznam.cz/search.py?wd=%s&amp;lg=ru_cz
Query=
Key=rc
Is post=0
Has endseparator=0
Encoding=iso-8859-2
Search Type=0
Position=-1
Nameid=0
Deleted=0

[Search Engine 18]
Name=CZ -> RU
Verbtext=0
URL=http://slovnik.seznam.cz/search.py?wd=%s&amp;lg=cz_ru
Query=
Key=cr
Is post=0
Has endseparator=0
Encoding=iso-8859-2
Search Type=0
Position=-1
Nameid=0
Deleted=0
</pre>
</div>


<div class="object">
<div class="name">SW Raid</div>
<pre>
# Vytvoření
mdadm --create /dev/md0 --level=raid5 -raid-devices=4 /dev/hdb1 /dev/hdb2 /dev/hdd1 /dev/hdd2
mkfs.ext3 /dev/md0

# Vlastnosti
mdadm --detail /dev/md0

# Odstranění vadného disku
mdadm --fail /dev/md0 /dev/hdb2
mdadm --remove /dev/md0 /dev/hdb2

# Nahrazení vadného disku
mdadm --add /dev/md0 /deb/hdb2

# Uložení informací o raid, kvůli restartu
echo "DEVICE partitions" > /etc/mdadm.conf
mdadm --detail --scan >> /etc/mdadm.conf
echo "MAILADDR root" >> /etc/mdadm.conf

</pre>
</div>


<div class="object">
<div class="name">Změna hlasitosti z příkazové řádky</div>
<pre>
# Na padesát procent
aumix -v 50

# O pět procent více
aumix -v +5

# O pět procent méně
aumix -v -5

# ~/.pekwm/keys
KeyPress = "Shift F11" { Actions = "Exec aumix -v -2 &amp;" }
KeyPress = "Shift F12" { Actions = "Exec aumix -v +2 &amp;" }
</pre>
</div>


<div class="object">
<div class="name">Zobrazení změny hlasitosti pomocí OSD</div>
<pre>
# Spustit po spuštění správce oken
osdsh &amp;
(sleep 1 &amp;&amp; osdctl -m 1) &amp;
</pre>
</div>


<div class="object">
<div class="name">Poslání zprávy přihlášenému uživateli</div>
<pre>
who

echo 'test' | write uživatel terminál
</pre>
</div>


<div class="object">
<div class="name">CVS</div>
<pre>
# login
# SET HOME=path
cvs -d :pserver:servername:/path login

# checkout (MM/DD/YYYY)
cvs -d:pserver:username@servername:/path co -r REVISION_NUMBER path
cvs -d:pserver:username@servername:/path co -r TAG -D "MM/DD/YYYY HH:SS" path

# release tag
cvs -d:pserver:username@servername:/path rtag -r BRANCH NEW_TAG path

# branch tag
cvs -d:pserver:username@servername:/path rtag -r BRANCH -b NEW_BRANCH path

# commit
cvs ci -m "message" path

# update
cvs update path

# revision remove
cvs admin -o revision path
</pre>
</div>


<div class="object">
<div class="name">Nastavení práv pro vstup do adresáře a všech jeho podadresářů</div>
<pre>
chmod -R +X *

man: "execute only if the file is a directory or already has execute
permission for some user (X)"
</pre>
</div>


<div class="object">
<div class="name">mkdir, cd</div>
<pre>
function mcd() { mkdir -p "$1" &amp;&amp; cd "$1"; }
</pre>
</div>


<div class="object">
<div class="name">Konverze .ps do .pdf</div>
<pre>
ps2pdf soubor.ps
</pre>
</div>


<div class="object">
<div class="name">Instalace nových databází slov do StarDict</div>
<pre>
Rozbalit data do /usr/share/stardict/dic

<?php Blank('http://www.pc-guru.cz/anglicko-cesky-slovnik-zdarma-stardict-linux'); ?>

<?php Blank('http://stardict.sourceforge.net/'); ?>

<?php Blank('http://stardict.sourceforge.net/Dictionaries_ru.php'); ?>
</pre>
</div>


<div class="object">
<div class="name">Filesystém v souboru</div>
<pre>
# 30 GB, 0% for root
dd if=/dev/zero of=/filesystem bs=1024 count=30000000
losetup /dev/loop0 /filesystem
mkfs -t ext2 -m 0 -v /dev/loop0
mkdir /mnt/loop
mount -t ext2 /dev/loop0 /mnt/loop

umount mntdir
losetup -d /dev/loop0

# /etc/fstab
/filesystem /mnt/loop  ext2  loop,noauto  0  0
</pre>
</div>


<div class="object">
<div class="name">Formátování nového disku</div>
<pre>
# -cc readwrite test
# -L label
# reserve 1% for user root
mkfs.ext3 -cc -L data -m 1 /dev/sdb1
</pre>
</div>


<div class="object">
<div class="name">Změna rozložení klávesnice</div>
<pre>
setxkbmap us
setxkbmap cz qwerty
setxkbmap ru cv
setxkbmap ru phonetic
</pre>
</div>


<div class="object">
<div class="name">Redefinice kláves</div>
<pre>
# Monitorování událostí X serveru
xev

# Výpis mapy kláves
xmodmap -pm
xmodmap -pk
xmodmap -pke

# ThinkPad R400
227 = Fn
174 = snížení hlasitosti
176 = zvýšení hlasitosti
115 = LWIN
227 = RWIN
234 = vlevo od šipky nahoru
233 = vpravo od šipky nahoru

# Nastavení nových významů kláves
xmodmap -e 'keycode 234 = KP_Subtract'
xmodmap -e 'keycode 233 = KP_Add'
</pre>
</div>


<div class="object">
<div class="name">Defaultní nastavení systému</div>
<pre>
update-alternatives --config qmake

# GUI
galternatives
	x-cursor-theme
	www-browser
	x-terminal-emulator
	x-www-browser
	gnome-www-browser
</pre>
</div>


<div class="object">
<div class="name"></div>
<pre>
# cat /etc/fstab
/dev/mmcblk0p1  /mnt/mmc  vfat  user,noauto  0  0
</pre>
</div>


<div class="object">
<div class="name">Informace o hardware v počítači</div>
<pre>
hwinfo
</pre>
</div>


<div class="object">
<div class="name">Potlačení detailů při bootování</div>
<pre>
[woq@woq ~]$ cat /boot/grub/menu.lst | grep quiet
# defoptions=quiet vga=0x0318
kernel          /boot/vmlinuz-2.6.26-1-686 root=/dev/sda5 ro quiet vga=0x0318
[woq@woq ~]$
</pre>
</div>


<div class="object">
<div class="name">Konverze iso-8859-2 souborů na utf-8</div>
<pre>
for filename in *.txt ;
do
	echo "$filename"
	iconv --from-code=ISO-8859-2 --to-code=UTF-8 $filename > utf_$filename
done
</pre>
</div>


<div class="object">
<div class="name">Ovladače grafické karty na ThinkPad R400</div>
<pre>
# /etc/X11/xorg.conf
Section "Device"
        Identifier      "Configured Video Device"
        <strong>Driver          "intel"</strong>
EndSection

[woq@evm ~]$ glxinfo | grep direct
direct rendering: Yes
[woq@evm ~]$ xrandr | head -n3
Screen 0: minimum 320 x 200, current 1280 x 800, maximum 1280 x 1280
VGA disconnected (normal left inverted right x axis y axis)
LVDS connected 1280x800+0+0 (normal left inverted right x axis y axis) 304mm x 190mm
[woq@evm ~]$
</pre>
</div>


<div class="object">
<div class="name">Vypnutí touchpadu</div>
<pre>
# /etc/X11/xorg.conf
Section "InputDevice"
        Identifier      "Synaptics Touchpad"
        Driver          "synaptics"
        Option          "SendCoreEvents"        "true"
        Option          "Device"                "/dev/psaux"
        Option          "Protocol"              "auto-dev"
        Option          "HorizScrollDelta"      "0"
        <strong>Option          "SHMConfig"             "on"</strong>
EndSection

# Zapnutí vypnutí
synclient TouchpadOff=1
synclient TouchpadOff=0

# Automatické vypnutí během psaní
syndaemon -t -d

<?php Blank('http://www.root.cz/clanky/jak-si-pri-psani-na-notebooku-vypnout-touchpad/'); ?>
</pre>
</div>


<div class="object">
<div class="name">sftp</div>
<pre>
[woq@evm ~]$ sftp user@server
sftp> ls
sftp> cd directory
sftp> put local/filesystem/path/file
sftp> exit
[woq@evm ~]$
</pre>
</div>


<div class="object">
<div class="name"></div>
<pre>
# Chyba při bootování
/usr/bin/mysqlcheck: Got error: 1045: Access denied for user
'debian-sys-maint'@'localhost' (using password: YES) when trying to connect

# Zjištění hesla
cat /etc/mysql/debian.cnf

# Nastavení práv
GRANT ALL PRIVILEGES ON *.* TO 'debian-sys-maint'@'localhost' IDENTIFIED BY '&lt;password&gt;' WITH GRANT OPTION;
</pre>
</div>


<div class="object">
<div class="name">Záloha MBR disku</div>
<pre>
# Záloha
dd if=/dev/hda of=mbr.backup bs=512 count=1

# Obnovení celého MBR
dd of=/dev/hda if=mbr.backup bs=512 count=1

# Obnovení MBR bez tabulky oddílů
dd of=/dev/hda if=mbr.backup bs=1 count=446

# bootloader 446 bytů
# partitition table 4x16 bytů (64 bytů)
# checksum 2 byty
</pre>
</div>


<div class="object">
<div class="name">Nahrazení HTML entit za znaky</div>
<pre>
recode html..utf8 &lt;&lt;&lt; '&amp;&ndash;&amp;'
</pre>
</div>


<div class="object">
<div class="name">Soubory v home, které nepatří aktuálnímu uživateli</div>
<pre>
# Nalezení
find ~ ! -user ${USER}

# Automatické nastavení práv
find ~ ! -user $USER -exec sudo chown ${USER}:"{}" \;

<?php Blank('http://www.tuxradar.com/content/command-line-tricks-smart-geeks'); ?>
</pre>
</div>


<div class="object">
<div class="name">Vzdálené ovládání MPlayeru :-O</div>
<pre>
mkfifo ~/mplayer-control
mplayer -slave -input file=/home/user/mplayer-control
filetoplay

echo "pause" > ~/mplayer-control

ssh user@host "echo pause > mplayer-control"

<?php Blank('http://www.tuxradar.com/content/command-line-tricks-smart-geeks'); ?>
</pre>
</div>


<div class="object">
<div class="name">Změna portu SSH serveru</div>
<pre>
/etc/ssh/sshd_config
Listen port_number

ssh -p port_number
~/.ssh/config
</pre>
</div>


<div class="object">
<div class="name">Přehrání mp3 adresáře v náhodném pořadí</div>
<pre>
~/.bashrc
alias mplayer_mp3='mplayer `ls -1 *.mp3 | shuf`'
</pre>
</div>


<div class="object">
<div class="name">Šifrování a skrývání souborů</div>
<pre>
# Šifrování
tar -c file1 file2... | ccencrypt &gt; stuff
ccdecrypt &lt; stuff | tar x

# Zapouzdření do jiného souboru
steghide embed --embedfile stuff --coverfile img_1416.jpg
steghide extract --stegofile img_1416.jpg

<?php Blank('http://www.tuxradar.com/content/command-line-tricks-smart-geeks'); ?>
</pre>
</div>


<div class="object">
<div class="name">PID procesu</div>
<pre>
ps aux | grep program
pidof program
</pre>
</div>


<div class="object">
<div class="name">Zpřístupnění souborů v aktuálním adresáři přes HTTP</div>
<pre>
python -m SimpleHTTPServer port
</pre>
</div>


<div class="object">
<div class="name">Hibernate, suspend</div>
<pre>
/etc/default/acpi-support
</pre>
</div>


<div class="object">
<div class="name">Alternativní DNS</div>
<pre>
/etc/resolv.conf

#OpenDNS
nameserver 208.67.222.222
nameserver 208.67.220.220

# Google Public DNS
nameserver 8.8.8.8
nameserver 8.8.4.4

<?php Blank('http://petrkrcmar.blog.root.cz/2009/12/22/jak-a-k-cemu-alternativni-dns-server/'); ?>
</pre>
</div>


<div class="object">
<div class="name">Hex editor</div>
<pre>
<?php Blank('http://wxhexeditor.sourceforge.net/'); ?>
</pre>
</div>


<div class="object">
<div class="name">Ascii diagramy</div>
<pre>
<?php Blank('http://www.asciiflow.com/'); ?>
<?php Blank('http://ditaa.org/'); ?>
</pre>
</div>


<div class="object">
<div class="name">Konverze HTML stránky do PDF</div>
<pre>
<?php Blank('http://web2pdfconvert.com/'); ?>
<?php Blank('http://www.alistapart.com/articles/boom'); ?>
</pre>
</div>


<div class="object">
<div class="name">Paralel login</div>
<pre>
# Whatever user
kdmctl reserve

# Ctrl+Alt+F7, Ctrl+Alt+F8, ...
</pre>
</div>


<!--
<div class="object">
<div class="name"></div>
<pre>
<?php Blank(''); ?>
</pre>
</div>
-->


<?php Img('img/tux_flamethrower.jpg', '')?>


<?
include 'p_end.php';
?>
