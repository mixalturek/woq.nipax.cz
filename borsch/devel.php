<?php
$p_title = 'Development';
include_once 'p_begin.php';
?>

<h1>Development</h1>

<h2>Grammar (LL1)</h2>

<h3>Terminal Symbols</h3>

<ul>
<li>function</li>
<li>return</li>
<li>if</li>
<li>else</li>
<li>while</li>
<li>for</li>
<li>break</li>
<li>continue</li>
<li>var</li>
<li>func_name</li>
<li>{</li>
<li>}</li>
<li>(</li>
<li>)</li>
<li>,</li>
<li>;</li>
<li>!</li>
<li>=</li>
<li>+=</li>
<li>-=</li>
<li>*=</li>
<li>/=</li>
<li>%=</li>
<li>||</li>
<li>&amp;&amp;</li>
<li>&lt;</li>
<li>&gt;</li>
<li>&lt;=</li>
<li>&gt;=</li>
<li>==</li>
<li>!=</li>
<li>+</li>
<li>-</li>
<li>*</li>
<li>/</li>
<li>%</li>
<li>bool_val</li>
<li>int_val</li>
<li>float_val</li>
<li>string_val</li>
<li>++</li>
<li>--</li>
</ul>


<h3>Nonterminal Symbols</h3>

<ul>
<li>S</li>
<li>Params</li>
<li>Params_c</li>
<li>Block</li>
<li>Cmd</li>
<li>Cmd_c</li>
<li>Ee</li>
<li>E</li>
<li>E_c</li>
<li>A</li>
<li>A_c</li>
<li>B</li>
<li>B_c</li>
<li>C</li>
<li>C_c</li>
<li>D</li>
<li>D_c</li>
<li>F</li>
<li>F_c</li>
<li>G</li>
<li>G_c</li>
<li>L</li>
<li>L_c</li>
</ul>


<h3>Start Symbol</h3>

<ul>
<li>S</li>
</ul>


<h3>Rules</h3>

<ol>
<li><span class="nt">S</span> <span class="arrow">-&gt;</span></li>
<li><span class="nt">S</span> <span class="arrow">-&gt;</span> function func_name ( <span class="nt">Params</span> ) { <span class="nt">Block</span> } <span class="nt">S</span></li>
<li><span class="nt">S</span> <span class="arrow">-&gt;</span> <span class="nt">Cmd</span> <span class="nt">S</span> <div class="line" /></li>

<li><span class="nt">Params</span> <span class="arrow">-&gt;</span> var <span class="nt">Params_c</span></li>
<li><span class="nt">Params</span> <span class="arrow">-&gt;</span> <div class="line" /></li>
<li><span class="nt">Params_c</span> <span class="arrow">-&gt;</span> , var <span class="nt">Params_c</span></li>
<li><span class="nt">Params_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> { <span class="nt">Block</span> }</li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> ;</li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> <span class="nt">E</span> ;</li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> return <span class="nt">Ee</span> ;</li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> break ;</li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> continue ;</li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> while ( <span class="nt">E</span> ) <span class="nt">Cmd</span></li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> for ( <span class="nt">Ee</span> ; <span class="nt">Ee</span> ; <span class="nt">Ee</span> ) <span class="nt">Cmd</span></li>
<li><span class="nt">Cmd</span> <span class="arrow">-&gt;</span> if ( <span class="nt">E</span> ) <span class="nt">Cmd</span> <span class="nt">Cmd_c</span> <div class="line" /></li>

<li><span class="nt">Cmd_c</span> <span class="arrow">-&gt;</span> else <span class="nt">Cmd</span></li>
<li><span class="nt">Cmd_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">Block</span> <span class="arrow">-&gt;</span> <span class="nt">Cmd</span> <span class="nt">Block</span></li>
<li><span class="nt">Block</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">Ee</span> <span class="arrow">-&gt;</span> <span class="nt">E</span></li>
<li><span class="nt">Ee</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">E</span> <span class="arrow">-&gt;</span> <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E</span> <span class="arrow">-&gt;</span> - <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E</span> <span class="arrow">-&gt;</span> ! <span class="nt">A</span> <span class="nt">E_c</span> <div class="line" /></li>

<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> = <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> += <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> -= <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> *= <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> /= <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> %= <span class="nt">A</span> <span class="nt">E_c</span></li>
<li><span class="nt">E_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">A</span> <span class="arrow">-&gt;</span> <span class="nt">B</span> <span class="nt">A_c</span> <div class="line" /></li>

<li><span class="nt">A_c</span> <span class="arrow">-&gt;</span> || <span class="nt">B</span> <span class="nt">A_c</span></li>
<li><span class="nt">A_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">B</span> <span class="arrow">-&gt;</span> <span class="nt">C</span> <span class="nt">B_c</span> <div class="line" /></li>

<li><span class="nt">B_c</span> <span class="arrow">-&gt;</span> &amp;&amp; <span class="nt">C</span> <span class="nt">B_c</span></li>
<li><span class="nt">B_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">C</span> <span class="arrow">-&gt;</span> <span class="nt">D</span> <span class="nt">C_c</span> <div class="line" /></li>

<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> &lt; <span class="nt">D</span> <span class="nt">C_c</span></li>
<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> &gt; <span class="nt">D</span> <span class="nt">C_c</span></li>
<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> &lt;= <span class="nt">D</span> <span class="nt">C_c</span></li>
<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> &gt;= <span class="nt">D</span> <span class="nt">C_c</span></li>
<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> == <span class="nt">D</span> <span class="nt">C_c</span></li>
<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> != <span class="nt">D</span> <span class="nt">C_c</span></li>
<li><span class="nt">C_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">D</span> <span class="arrow">-&gt;</span> <span class="nt">F</span> <span class="nt">D_c</span> <div class="line" /></li>

<li><span class="nt">D_c</span> <span class="arrow">-&gt;</span> + <span class="nt">F</span> <span class="nt">D_c</span></li>
<li><span class="nt">D_c</span> <span class="arrow">-&gt;</span> - <span class="nt">F</span> <span class="nt">D_c</span></li>
<li><span class="nt">D_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">F</span> <span class="arrow">-&gt;</span> <span class="nt">G</span> <span class="nt">F_c</span> <div class="line" /></li>

<li><span class="nt">F_c</span> <span class="arrow">-&gt;</span> * <span class="nt">G</span> <span class="nt">F_c</span></li>
<li><span class="nt">F_c</span> <span class="arrow">-&gt;</span> / <span class="nt">G</span> <span class="nt">F_c</span></li>
<li><span class="nt">F_c</span> <span class="arrow">-&gt;</span> % <span class="nt">G</span> <span class="nt">F_c</span></li>
<li><span class="nt">F_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">G</span> <span class="arrow">-&gt;</span> bool_val</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> int_val</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> float_val</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> string_val</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> ( <span class="nt">E</span> )</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> ++ var</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> -- var</li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> var <span class="nt">G_c</span></li>
<li><span class="nt">G</span> <span class="arrow">-&gt;</span> func_name ( <span class="nt">L</span> ) <div class="line" /></li>

<li><span class="nt">G_c</span> -> ++</li>
<li><span class="nt">G_c</span> -> --</li>
<li><span class="nt">G_c</span> -> <div class="line" /></li>

<li><span class="nt">L</span> <span class="arrow">-&gt;</span> <span class="nt">E</span> <span class="nt">L_c</span></li>
<li><span class="nt">L</span> <span class="arrow">-&gt;</span> <div class="line" /></li>

<li><span class="nt">L_c</span> <span class="arrow">-&gt;</span> , <span class="nt">E</span> <span class="nt">L_c</span></li>
<li><span class="nt">L_c</span> <span class="arrow">-&gt;</span> <div class="line" /></li>
</ol>


<h3>Parsing Table</h3>

<p>Parsing table for LL1 grammar was generated by the script <?php Blank('http://moon.felk.cvut.cz/~xvagner/x36pjp/cv/parsingtbl.php', 'parsingtbl.php'); ?> (unknown license, <?php Web('parsingtbl', 'local copy'); ?>), which was written by L. Vagner. <a href="parsing_table.html">The output</a> of the script is here.</p>


<h2>Semantics</h2>

<h3>Semantics table</h3>

<table>
<tr>	<th>Nonterminal</th>	<th>Inheritable</th>	<th>Synthesized</th>	</tr>
<tr>	<td>S</td>		<td></td>	<td></td>	</tr>
<tr>	<td>Params</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>Params_c</td>	<td></td>	<td>rettree</td>	</tr>
<tr>	<td>Cmd</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>Cmd_c</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>Block</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>Ee</td>		<td></td>	<td>rettree</td>	</tr>

<tr>	<td>E</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>E_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>A</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>A_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>B</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>B_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>C</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>C_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>D</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>D_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>F</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>F_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>G</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>G_c</td>		<td>optree</td>	<td>rettree</td>	</tr>
<tr>	<td>L</td>		<td></td>	<td>rettree</td>	</tr>
<tr>	<td>L_c</td>		<td></td>	<td>rettree</td>	</tr>
</table>


<h2>Semantic rules</h2>

<ol>
<li>nothing;</li>
<li>global_block.push_back(Cmd.rettree);</li>
<li>context.AddFunction(new function(name, Params.rettree, Block.rettree));</li>
<li>Params.rettree = Params_c.rettree; Params.rettree.push_front(var.name);</li>
<li>Params.rettree = NULL;</li>
<li>Params_c_0.rettree = Params_c_1.rettree; Params_c_0.rettree.push_front(var.name);</li>
<li>Params_c.rettree = NULL;</li>
<li>Cmd.rettree = Block.rettree;</li>
<li>Cmd.rettree = NULL;</li>
<li>Cmd.rettree = E.rettree;</li>
<li>Cmd.rettree = Ee.rettree;</li>
<li>Cmd.rettree = new break;</li>
<li>Cmd.rettree = new continue;</li>
<li>Cmd.rettree = new loop(NULL, E.rettree, NULL, Cmd.rettree);</li>
<li>Cmd.rettree = new loop(Ee_0.rettree, Ee_1.rettree, Ee_2.rettree, Cmd.rettree);</li>
<li>Cmd.rettree = new ifelse(E.rettree, Cmd.rettree, Cmd_c.rettree);</li>
<li>Cmd_c.rettree = Cmd.rettree;</li>
<li>Cmd_c.rettree = NULL;</li>
<li>Block_0.rettree = Block_1_rettree; Block_0.rettree.push_front(Cmd.rettree);</li>
<li>Block.rettree = NULL;</li>
<li>Ee.rettree = E.rettree;</li>
<li>Ee.rettree = NULL;</li>
<li>E_c.optree = A.rettree; E.rettree = E_c.rettree;</li>
<li>E_c.optree = A.rettree; E.rettree = new op_minus(E_c.rettree);</li>
<li>E_c.optree = A.rettree; E.rettree = new op_not(E_c.rettree);</li>
<li>E_c_1.optree = A.rettree; E_c_0.rettree = E_c_1.rettree;</li>
<li>E_c_1.optree = A.rettree; E_c_0.rettree = new op_plus_as(E_c_1.rettree);</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>E_c.rettree = E_c.optree;</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>G.rettree = new bool_value(bool_val.value);</li>
<li>by analogy</li>
<li>by analogy</li>
<li>by analogy</li>
<li>G.rettree = E.rettree;</li>
<li>G.rettree = new pre_inc(var.name);</li>
<li>by analogy</li>
<li>G_c.optree = new variable(var.name); G.rettree = G_c.retree;</li>
<li>G_c.optree = new function_call(func_name.name, L.rettree);</li>
<li>G_c.rettree = new post_inc(var.name)</li>
<li>by analogy</li>
<li>G_c.rettree = G_c.optree;</li>
<li>L.rettree = L_c.rettree; L.rettree.push_front(E.rettree);</li>
<li>L.rettree = NULL;</li>
<li>L_c_0.rettree = L_c_1.rettree; L_c_0.rettree.push_front(E.rettree);</li>
<li>L_c.rettree = NULL;</li>
</ol>

<?php
include_once 'p_end.php';
?>
