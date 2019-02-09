<?php
$p_title = 'Download';
include_once 'p_begin.php';
?>

<h1>Download</h1>

<h3></h3>

<table>
<tr>	<th>Version</th>	<th>Date</th>	<th>Download</th>	<th>Description</th>	</tr>

<tr>
<td>1.0 (latest stable)</td>
<td>2006-01-21</td>
<td><?php Down('down/borsch_2007-02-02.tar.gz'); ?></td>
<td>Platform independent</td>
</tr>

</table>


<h3>Compile and run</h3>

<pre>
<b>[woq@plecka ~]$ tar -xvvzf borsch.tar.gz</b>
<b>[woq@plecka ~]$ cd borsch</b>
<b>[woq@plecka ~/borsch]$ vim general.hpp</b>
# Edit the defines at the top of the file (debug/release, color output)
<b>[woq@plecka ~/borsch]$ make clean</b>
rm -f borsch *.o core
<b>[woq@plecka ~/borsch]$ make depend</b>
# Ignore errors about STL header files
<b>[woq@plecka ~/borsch]$ make</b>
g++ -c ccontext.cpp -std=c++98 -pedantic -Wall
g++ -c cexception.cpp -std=c++98 -pedantic -Wall
g++ -c clexan.cpp -std=c++98 -pedantic -Wall
# ...
g++ -c main.cpp -std=c++98 -pedantic -Wall
g++ -o borsch ccontext.o cexception.o .. arser.o main.o
<b>[woq@plecka ~/borsch]$ ./borsch scripts/factorial.txt</b>
Factorial of numbers from 0 to 9:
==================================
Factorial of 0 is 1
Factorial of 1 is 1
Factorial of 2 is 2
Factorial of 3 is 6
Factorial of 4 is 24
Factorial of 5 is 120
Factorial of 6 is 720
Factorial of 7 is 5040
Factorial of 8 is 40320
Factorial of 9 is 362880
<b>[woq@plecka ~/borsch]$</b>
</pre>


<h3>Tested at</h3>

<p>Tested on Debian (Sarge) GNU/Linux with</p>

<pre>
<b>[woq@plecka ~/borsch]$ uname -a</b>
Linux plecka 2.6.8-2-686 #1 Thu May 19 17:53:30 JST 2005 i686 GNU/Linux
[woq@plecka ~/borsch]$ make -v
GNU Make 3.80
Copyright (C) 2002  Free Software Foundation, Inc.
This is free software; see the source for copying conditions.
There is NO warranty; not even for MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.
<b>[woq@plecka ~/borsch]$ g++ -v</b>
Reading specs from /usr/lib/gcc-lib/i486-linux/3.3.5/specs
Configured with: ../src/configure -v --enable-languages=c,c++,java,f77,pascal,objc,ada,treelang --prefix=/usr --mandir=/usr/share/man --infodir=/usr/share/info --with-gxx-include-dir=/usr/include/c++/3.3 --enable-shared --enable-__cxa_atexit --with-system-zlib --enable-nls --without-included-gettext --enable-clocale=gnu --enable-debug --enable-java-gc=boehm --enable-java-awt=xlib --enable-objc-gc i486-linux
Thread model: posix
gcc version 3.3.5 (Debian 1:3.3.5-13)
<b>[woq@plecka ~/borsch]$</b>
</pre>

<?php
include_once 'p_end.php';
?>
