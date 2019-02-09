<?php
$p_title = 'Specifications';
include_once 'p_begin.php';
?>

<h1>Language specifications</h1>

<p>The syntax of the language is similar to the PHP. This specification is <strong>very informal</strong> and mostly for those, who have already known something about programming.</p>


<h3>Data types</h3>

<ul>
<li>void</li>
<li>bool</li>
<li>int</li>
<li>float</li>
<li>string</li>
</ul>


<h3>Variables</h3>

<p>Variables begin with the '$' symbol and they can contain whatever data type. They are not declared, but you have to set some value before they are first used.</p>

<p>They are divided to the locally defined in the functions and globally defined in the global context. If you want to work with global variable in the function context, you need to use get_global() and set_global() buildin functions.</p>


<h3>Operators, priority of operators</h3>

<table>
<tr>	<th>Operators</th>	<th>Description</th>	</tr>
<tr>	<td>(), -, !, ++, --</td>	<td>parentheses, unary minus, not, incrementation, decrementation</td>	</tr>
<tr>	<td>*, /, %</td>	<td>mult, divide, modulo</td>	</tr>
<tr>	<td>+, -</td>		<td>plus, minus</td>	</tr>
<tr>	<td>&lt;, &gt;, &lt;=, &gt;=, ==, !=</td>		<td>less, greater, less or equal, ...</td>	</tr>
<tr>	<td>&amp;&amp;</td>	<td>logical AND</td>	</tr>
<tr>	<td>||</td>		<td>logical OR</td>	</tr>
<tr>	<td>=, +=, -=, *=, /=, %=</td>		<td>assignment, plus and assign, ...</td>	</tr>
</table>



<h3>Commands</h3>

<pre>
$a = 7;
$b = 5 + $a;

{
	$a = 7;
	$b = 5 + $a;
}
</pre>



<h3>Conditions</h3>

<pre>
if($a == 5)
	$b = 3;

if($a == 5)
	$b = 3;
else
	$b = "a is not equal five";

// Switch is not implemented
</pre>


<h3>Loops</h3>

<pre>
while($a &lt; 10)
	echo("\n" + $a++);

for($i = 0; $i &lt; 10; $i++)
{
	echo($i);
	echo("\n");
}

// Do-while loop is not implemented
</pre>


<h3>Structured jumps</h3>

<p>Break, continue and return structured jumps can be called. BUT!!! they are implemented by throwing exceptions so they can slowdown the program. You should consider their using!</p>


<h3>Functions</h3>

<pre>
// Return "some_value" string
function func()
{
	return "some_value";
}

$var = func();


// Return concatenated string
function cat($left, $right)
{
	return $left + $right;
}

$string = cat("left" + " middle ", "right");
$number = cat(1, 3);	// ;-)
</pre>


<h3>Buildin functions</h3>

<table>
<tr>	<th>Function</th>			<th>Description</th>	</tr>
<tr>	<td>echo(object)</td>			<td>Print the value to the standard output</td>	</tr>
<tr>	<td>exit(object)</td>			<td>Exit the script immediately</td>	</tr>
<tr>	<td>get_global("name")</td>		<td>Get value of a global variable</td>	</tr>
<tr>	<td>set_global("name", object)</td>	<td>Set value of a global variable</td>	</tr>
</table>


<h3>Including another scripts</h3>

<pre>
include("/absolute/path/to/the/script.txt");
include("interpret/exe/relative/path/script.txt");

/*
// This is not allowed, the filename has to be string
// constant, it is evaluated by the preprocessor

for($i = 0; $i &lt; 10; $i++)
	include("file" + $i + ".txt");	// Error
*/


// -I/include/path has not been implemented yet :-(
</pre>


<h3>Arrays, structures, classes, etc.</h3>

<p>Not implemented, sorry :-(</p>


<h3></h3>
<p></p>


<?php
include_once 'p_end.php';
?>
