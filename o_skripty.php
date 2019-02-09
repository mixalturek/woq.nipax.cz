<?
$p_title = 'Skripty';
include 'p_begin.php';
?>

<p>Všechny skripty umístěné na této stránce jsou volné programové vybavení; můžete je šířit a modifikovat podle ustanovení Obecné veřejné licence GNU verze 2 (GNU GPL v2), vydané Free Software Foundation.</p>

<p>Skripty jsou rozšiřovány v naději, že budou užitečné, avšak BEZ JAKÉKOLI ZÁRUKY; neposkytují se ani odvozené záruky PRODEJNOSTI anebo VHODNOSTI PRO URČITÝ ÚČEL.</p>

<p>Další podobnosti hledejte v textu Obecné veřejné licence GNU verze 2, který je dostupný například na <?Blank('http://www.gnu.org/');?> popř. český překlad na <?Blank('http://www.gnu.cz/');?>.</p>


<a id="dot2pdf.sh"></a>
<div class="object">
<div class="name">dot2pdf.sh</div>
<div class="date">02.11.2009</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2009 Michal Turek
# License: GNU GPL v2
#
# Converts Doxygen/dot diagrams to PDF format,
# that can be used in pdflatex as vector images
#
# Doxyfile settings
# DOT_CLEANUP = NO

for file in *.dot
do
	name=`echo ${file} | cut -f1 -d.`
	echo "${name}.dot -> ${name}.pdf"
	dot -Tsvg -o ${name}.svg ${name}.dot
	rsvg-convert -f pdf -o ${name}.pdf ${name}.svg
	rm ${name}.svg
done
</pre>
</div>


<a id="change_volume.sh"></a>
<div class="object">
<div class="name">change_volume.sh</div>
<div class="date">29.03.2009</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2009 Michal Turek
# License: GNU GPL v2
#
# Change volume and display OSD slider at the bottom of the screen

if [ $# -lt 1 ]; then
        echo 'Usage:'
        echo "$0 <relative volume>"
        echo "$0 +2"
        echo "$0 -2"
        exit
fi

aumix -v $1
killall osd_cat
osd_cat -d 1 -p bottom -c green -b percentage -P `aumix -q | head -1 | sed 's/vol \(.*\),.*/\1/'` -T Volume


[woq@evm ~]$ cat ~/.pekwm/keys | grep change_volume.sh
        KeyPress = "Shift F11" { Actions = "Exec change_volume.sh -2 &amp;" }
        KeyPress = "Shift F12" { Actions = "Exec change_volume.sh +2 &amp;" }
[woq@evm ~]$
</pre>
</div>


<a id="kbswitch.pl"></a>
<div class="object">
<div class="name">kbswitch.pl</div>
<div class="date">22.12.2008</div>
<div class="technology">Perl</div>
<pre>
#!/usr/bin/perl -w
#
# Copyright (C) 2008 Michal Turek
# License: GNU GPL v2
#
# Switch keyboard layouts (us, cz...) with osd indication
#
# Available layouts are in
#	/usr/share/X11/xkb/rules/base.lst
#	/usr/share/X11/xkb/symbols.dir

use constant FILENAME_KB =&gt; "/home/woq/.kbswitch.txt";
use constant FILENAME_KBA =&gt; "/home/woq/.kbswitch_active.txt";

open(FILE_KBA, "&lt; ".FILENAME_KBA) or die("Unable to open ".FILENAME_KBA);
@data = &lt;FILE_KBA&gt;;
$curpos = $data[0] + 1;
close(FILE_KBA);

open(FILE_KBA, "&gt; ".FILENAME_KBA) or die("Unable to open ".FILENAME_KBA);
print(FILE_KBA $curpos);
close(FILE_KBA);

open(FILE_KB, "&lt; ".FILENAME_KB) or die("Unable to open ".FILENAME_KB);
@data = &lt;FILE_KB&gt;;
$lng = @data[$curpos % @data];
close(FILE_KB);

print $lng;
`setxkbmap $lng`;
`echo '$lng' | osd_cat -p bottom -o -70 -A center -d 1 -O 1 -u white -f '-dejavu-dejavu sans-bold-r-normal--33-240-100-100-p-222-iso8859-1'`;

############################################
[woq@woq ~]$ cat .kbswitch.txt
us
cz qwerty
ru cv
</pre>
</div>


<a id="ziptool.py"></a>
<div class="object">
<div class="name">ziptool.py</div>
<div class="date">29.06.2008</div>
<div class="technology">Python</div>
<div class="address"><?Down('down/skripty/ziptool.txt');?></div>

<div class="descript">Simple tool for archiving directories using ZIP.</div>
</div>


<a id="kam.sh"></a>
<div class="object">
<div class="name">kam.sh</div>
<div class="date">11.05.2008</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2008 Michal Turek
# License: GNU GPL v2
#
# Display original file from symbolic link (recursive)

if [ $# -lt 1 ]; then
	echo "Usage:"
	echo "$0 &lt;symbolic link&gt;"
	exit 1
fi

readlink $1 > /dev/null
if [ $? -eq 1 ]
then
	echo "Specified file $1 is not a symbolic link."
	exit 1
fi

path=$1
finish=0
while [ $finish -eq 0 ]; do
	newpath=`readlink $path`
	finish=$?
	if [ $finish -eq 0 ]; then
		path=$newpath
	fi
done

echo $path
</pre>
</div>


<a id="jpgcompress.sh"></a>
<div class="object">
<div class="name">jpgcompress.sh</div>
<div class="date">15.10.2007</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2007 Michal Turek
# License: GNU GPL v2
#
# Compress all *.jpg files in the current directory to the specified quality

if [ $# -lt 1 ]; then
	echo "Usage:"
	echo "$0 &lt;jpg quality&gt;"
	echo "$0 80"
	exit
fi

for filename in $( ls -1 *.jpg *.JPG 2> /dev/null );
do
	echo "$filename"
	name=`echo "$filename" | cut -f1 -d.`
	convert -quality $1 "$filename" "${name}_q$1.jpg"
done
</pre>
</div>


<a id="exifdate.sh"></a>
<div class="object">
<div class="name">exifdate.sh</div>
<div class="date">16.09.2007</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2007 Michal Turek
# License: GNU GPL v2
#
# Set the image filenames to the date readed from the exif information
# Usage: Just run the script in directory with images

for filename in $( ls -1 *.jpg *.JPG 2&gt; /dev/null );
do
	newname=`exif -mt 0x9003 "$filename" | tr ' ' '_' | tr ':' '-'`.jpg

	if [ "$newname" != '.jpg' ]; then
		mv -iv "$filename" "$newname"
	else
		echo "Couldn't find exif data: $filename";
	fi
done
</pre>
</div>


<a id="m3u_generator.sh"></a>
<div class="object">
<div class="name">m3u_generator.sh</div>
<div class="date">24.03.2007</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2007 Michal Turek
# License: GNU GPL v2
#
# Generates m3u playlist from the files in the specified directory
# Usage: ./m3u_generator directory &gt; directory.m3u

if [ $# -lt 1 ]; then
	echo "Usage:"
	echo "$0 &lt;directory&gt;"
	exit
fi

find $1 -type f
</pre>
</div>


<a id="mencoder_beg_end.sh"></a>
<div class="object">
<div class="name">mencoder_beg_end.sh</div>
<div class="date">04.03.2007</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2007 Michal Turek
# License: GNU GPL v2
#
# Oreze zacatek a konec filmu

if [ $# -lt 3 ]; then
	echo "Usage:"
	echo "$0 &lt;film&gt;  &lt;start&gt;  &lt;end&gt;"
	echo "$0 old.avi 00:02:20 01:36:30"
	echo "End parameter is end position in the newly generated file."
	exit
fi

mv $1 $1_bak
mencoder $1_bak -ss $2 -endpos $3 -ovc copy -oac copy -o $1
</pre>
</div>


<a id="backup"></a>
<div class="object">
<div class="name">backup</div>
<div class="date">02.02.2007</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2007 Michal Turek
# License: GNU GPL v2
#
# Backup important directories

tar -czf /root/backup/`date +%F`.tar.gz /etc /var/lib/mysql 2> /dev/null

# crontab -e
# Every Saturday at 12 am
# 0 12 *   *   5     /root/backup/backup.sh
</pre>
</div>


<a id="icqcountdown"></a>
<div class="object">
<div class="name">ICQ countdown</div>
<div class="date">13.11.2006</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# Dlja Natalju Valjentinovnu Dmitrenko k dnu raždénija

if [ $# -lt 1 ]; then
        echo "Usage:"
        echo "$0 &lt;icq number or nickname&gt;"
        exit
fi

for ((i=10;i>=0;i=i-1)); do
	echo $i | centericq -p icq -s msg -t $1
	sleep 2
done

echo 'Vsjo lucsee...!'
</pre>
</div>


<a id="htmltable"></a>
<div class="object">
<div class="name">HTMLtable</div>
<div class="date">31.10.2006</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# Vytvoří HTML tabulku z hodnot v souboru oddělených bílými znaky

echo '&lt;html&gt;&lt;head&gt;&lt;title&gt;titulek&lt;/title&gt;&lt;/head&gt;'
echo '&lt;body&gt;&lt;h1&gt;nadpis&lt;/h1&gt;&lt;table border="1"&gt;'

cat $1 | sed 's/^[ 	]*/&lt;tr&gt;&lt;td&gt;/' |
	sed 's/[ 	]*$/&lt;\/td&gt;&lt;\/tr&gt;/' |
	sed 's/[ 	][ 	]*/&lt;\/td&gt;&lt;td&gt;/g'

echo '&lt;/table&gt;&lt;/body&gt;&lt;/html&gt;'
</pre>
</div>


<a id="convertformat"></a>
<div class="object">
<div class="name">convertformat.sh</div>
<div class="date">28.09.2006</div>
<div class="technology">Bash, convert</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# This converts all images in the current directory from one format to another

if [ $# -lt 2 ]; then
        echo 'Usage:'
        echo "$0 &lt;source extension&gt; &lt;target extension&gt;"
        echo "$0 png jpg"
        exit
fi

for file in *.$1; do
        echo $file
        file=${file%.*}
        convert $file.$1 $file.$2
done
</pre>
</div>


<a id="skriptik"></a>
<div class="object">
<div class="name">Skriptík</div>
<div class="date">16.07.2006</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# Hádejte, co to dělá :-O

if [ $# -lt 4 ]; then
        echo "Usage:"
        echo "$0 &lt;file.xml&gt; &lt;status&gt; &lt;source_dir&gt; &lt;target_dir&gt;"
        exit
fi

for i in $( cat $1 | grep "status=\"$2\"" | sed 's/.*name="\([^"]*\)".*/\1/' ); do
       mkdir -p `echo "$4/$i" | tr '\\' '/' | sed 's/\(.*\)\/.*/\1/'`
       cp -v `echo "$3/$i" | tr '\\' '/'` `echo "$4/$i" | tr '\\' '/'`
done
</pre>
</div>


<a id="umount_usb_if_mounted"></a>
<div class="object">
<div class="name">umount_usb_if_mounted</div>
<div class="date">02.06.2006</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# This script automatically umounts usb flash disk if mounted. You can
# call it at logout time (~/.bash_logout, /usr/bin/startkde, etc.)

cat /etc/mtab | grep "/mnt/usb.*user=`id -un`" > /dev/null

if [ $? -eq 0 ]; then
        umount /mnt/usb
fi
</pre>
</div>


<a id="ctar"></a>
<div class="object">
<div class="name">ctar, ctard</div>
<div class="date">15.04.2006</div>
<div class="technology">Bash</div>
<pre>
#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# This script compress whole directory to the directory.tar.gz archive

if [ $# -lt 1 ]; then
        echo 'Usage:'
        echo "$0 &lt;directory&gt;"
        exit
fi

tar -cvzf `echo $1 | sed 's/\///'`.tar.gz $1


#!/bin/bash
#
# Copyright (C) 2006 Michal Turek
# License: GNU GPL v2
#
# This script compress whole directory to the directory_date.tar.gz archive

if [ $# -lt 1 ]; then
        echo 'Usage:'
        echo "$0 &lt;directory&gt;"
        exit
fi

tar -cvzf `echo $1 | sed 's/\///'`_`date +%F`.tar.gz $1
</pre>
</div>


<a id="passwd_mysql"></a>
<div class="object">
<div class="name">passwd -&gt; MySQL</div>
<div class="date">15.12.2005</div>
<div class="technology">PHP</div>
<div class="address"><?Down('down/skripty/passwd_mysql.tar.gz');?></div>

<div class="descript">PHP skript pro importování dat o uživatelích z /etc/passwd a /etc/shadow do MySQL databáze. Z důvodu bezpečnosti raději nespouštět pomocí webového serveru, ale přes /usr/bin/php. Z důvodu nečitelnosti /etc/shadow obyčejnými uživateli musí mít proces rootovská práva.</div>
</div>


<?
include 'p_end.php';
?>
