<?php
$p_title = 'Interpreter';
include_once 'p_begin.php';
?>

<h1>Borsch Interpreter</h1>

<?php
Img('img/borsch_sm.jpg', 'Borsch');
?>

<h3>Features</h3>

<ul>
<li>The code is very similar to PHP</li>
<li>Written in C++ with STL, clear OOP</li>
<li>No external library dependencies</li>
<li>Bool, int, float and string data types</li>
<li>Global and local variables</li>
<li>C/C++ like evaluation of expressions</li>
<li>If-else, for, while statements</li>
<li>Buildin and user defined functions</li>
<li>Return, break and continue structured jumps</li>
<li>Preprocessor file includes</li>
<li>Colored errors/warnings output</li>
<li><?php Web('xmldump', 'Development dumps'); ?> to the XML format</li>
</ul>


<h3>License</h3>

<p>This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; version 2 of the License.</p>

<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.</p>

<p>You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.</p>

<p><?php Blank('http://www.gnu.org/', '(whole text)'); ?></p>


<h3>Code example</h3>

<pre>
<b>[woq@plecka ~/borsch]$ cat scripts/factorial_inc.txt</b>
function factorial($number)
{
        if($number &lt; 2)
                return 1;
        else
                return $number * factorial($number - 1);
}
<b>[woq@plecka ~/borsch]$ cat scripts/factorial.txt</b>
include("scripts/factorial_inc.txt");

echo("Factorial of numbers from 0 to 9:\n");
echo("==================================\n");

for($i = 0; $i &lt;= 9; $i++)
        echo("Factorial of " + $i + " is " + factorial($i) + "\n");

<b>[woq@plecka ~/borsch]$ ./borsch</b>
Usage: ./borsch [--lex-dump] [--call-tree-dump] &lt;filename&gt;
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


<h3>Notes</h3>

<p>This interpreter was created as a semestral project to the <?php Blank('http://service.felk.cvut.cz/courses/X36PJP/', 'Programming Languages and Compilers'); ?> (X36PJP) at <?php Blank('http://www.cvut.cz/', 'Czech Technical University'); ?> in Prague, <?php Blank('http://www.fel.cvut.cz/', 'Faculty of Electrical Engineering'); ?>. Special thanks to <?php Blank('http://moon.felk.cvut.cz/~xvagner/', 'Ladislav Vagner'); ?>.</p>

<?php
include_once 'p_end.php';
?>
