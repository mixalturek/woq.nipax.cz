<?php
$p_title = 'TODO';
include_once 'p_begin.php';
?>

<h1>TODO</h1>

<ul>
<li>Fix the memory leaks while parsing file and CUnexpectedTokenException throw!</li>
<li>Fix function redefinition (two functions have the same name)</li>
<li>Save memory, singleton of script filenames, CNode and its folowers will contain
fileids only, not whole filename string</li>
<li>Add variable functions like isset(), unset()</li>
<li>Add casting support tobool(), toint(), tofloat(), tostring(), isnull()</li>
<li>CContext::m_functions replace std::list by something sorted</li>
<li>CLexan enhancement - CLexan, CLexanFile, CLexanString, preprocesor define('NUMBER', '10') with CLexanString</li>
<li>Use stack instead of recursion when including in CLexan</li>
<li>Add execute optimalizations</li>
<li>Remove coloring of the error/warning output. Use scripts in the colormake, colorgcc style</li>
<li>Add array and class support</li>
<li>Add support for script engines in foreign programs</li>
<li>Etc, etc, etc ;-)</li>
</ul>

<?php
include_once 'p_end.php';
?>
