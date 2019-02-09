<?php
$p_title = 'Dump';
include_once 'p_begin.php';
?>

<h1>XML Dump</h1>

<p>Borsch supports development dumps of the lexical elements and the interpreter internal form. Both are to the simple XML format.</p>

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
<b>[woq@plecka ~/borsch]$ ./borsch --lex-dump scripts/factorial.txt</b>
&lt;?xml version='1.0' encoding='utf-8' standalone='yes'?&gt;
&lt;tokens&gt;
    &lt;LEX_FUNC_NAME string=&quot;factorial&quot;/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_VARIABLE string=&quot;number&quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_LVA/&gt;
    &lt;LEX_IF/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_VARIABLE string=&quot;number&quot;/&gt;
    &lt;LEX_OP_LESS/&gt;
    &lt;LEX_INT int=&quot;2&quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_RETURN/&gt;
    &lt;LEX_INT int=&quot;1&quot;/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_ELSE/&gt;
    &lt;LEX_RETURN/&gt;
    &lt;LEX_VARIABLE string=&quot;number&quot;/&gt;
    &lt;LEX_OP_MULT/&gt;
    &lt;LEX_FUNC_NAME string=&quot;factorial&quot;/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_VARIABLE string=&quot;number&quot;/&gt;
    &lt;LEX_OP_MINUS/&gt;
    &lt;LEX_INT int=&quot;1&quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_RVA/&gt;
    &lt;LEX_FUNC_NAME string=&quot;echo&quot;/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_STRING string=&quot;Factorial of numbers from 0 to 9:&quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_FUNC_NAME string=&quot;echo&quot;/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_STRING string=&quot;==================================&quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_FOR/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_VARIABLE string=&quot;i&quot;/&gt;
    &lt;LEX_OP_ASSIGN/&gt;
    &lt;LEX_INT int=&quot;0&quot;/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_VARIABLE string=&quot;i&quot;/&gt;
    &lt;LEX_OP_LESS_EQ/&gt;
    &lt;LEX_INT int=&quot;9&quot;/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_VARIABLE string=&quot;i&quot;/&gt;
    &lt;LEX_OP_PLUS_PLUS/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_FUNC_NAME string=&quot;echo&quot;/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_STRING string=&quot;Factorial of &quot;/&gt;
    &lt;LEX_OP_PLUS/&gt;
    &lt;LEX_VARIABLE string=&quot;i&quot;/&gt;
    &lt;LEX_OP_PLUS/&gt;
    &lt;LEX_STRING string=&quot; is &quot;/&gt;
    &lt;LEX_OP_PLUS/&gt;
    &lt;LEX_FUNC_NAME string=&quot;factorial&quot;/&gt;
    &lt;LEX_LPA/&gt;
    &lt;LEX_VARIABLE string=&quot;i&quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_OP_PLUS/&gt;
    &lt;LEX_STRING string=&quot; &quot;/&gt;
    &lt;LEX_RPA/&gt;
    &lt;LEX_SEMICOLON/&gt;
    &lt;LEX_NULL/&gt;
&lt;/tokens&gt;
<b>[woq@plecka ~/borsch]$ ./borsch --call-tree-dump scripts/factorial.txt</b>
&lt;?xml version='1.0' encoding='utf-8' standalone='yes'?&gt;
&lt;Script&gt;
    &lt;GlobalCommands&gt;
        &lt;FunctionCall name="echo&quot;&gt;
            &lt;Parameters&gt;
                &lt;Value type=&quot;string&quot;&gt;Factorial of numbers from 0 to 9:&lt;/Value&gt;
            &lt;Parameters&gt;
        &lt;/FunctionCall&gt;
        &lt;FunctionCall name=&quot;echo&quot;&gt;
            &lt;Parameters&gt;
                &lt;Value type=&quot;string&quot;&gt;==================================&lt;/Value&gt;
            &lt;Parameters&gt;
        &lt;/FunctionCall&gt;
        &lt;Loop&gt;
            &lt;Init&gt;
                &lt;BinaryOperator type=&quot;LEX_OP_ASSIGN&quot;&gt;
                    &lt;LeftTree&gt;
                        &lt;Variable name=&quot;i&quot;/&gt;
                    &lt;/LeftTree&gt;
                    &lt;RightTree&gt;
                        &lt;Value type=&quot;int&quot;&gt;0&lt;/Value&gt;
                    &lt;/RightTree&gt;
                &lt;/BinaryOperator&gt;
            &lt;/Init&gt;
            &lt;Condition&gt;
                &lt;BinaryOperator type=&quot;LEX_OP_LESS_EQ&quot;&gt;
                    &lt;LeftTree&gt;
                        &lt;Variable name=&quot;i&quot;/&gt;
                    &lt;/LeftTree&gt;
                    &lt;RightTree&gt;
                        &lt;Value type=&quot;int&quot;&gt;9&lt;/Value&gt;
                    &lt;/RightTree&gt;
                &lt;/BinaryOperator&gt;
            &lt;/Condition&gt;
            &lt;Inc&gt;
                &lt;UnaryOperator type=&quot;LEX_OP_PLUS_PLUS_POST&quot;&gt;
                    &lt;Variable name=&quot;i&quot;/&gt;
                &lt;/UnaryOperator&gt;
            &lt;/Inc&gt;
            &lt;Body&gt;
                &lt;FunctionCall name=&quot;echo&quot;&gt;
                    &lt;Parameters&gt;
                        &lt;BinaryOperator type=&quot;LEX_OP_PLUS&quot;&gt;
                            &lt;LeftTree&gt;
                                &lt;BinaryOperator type=&quot;LEX_OP_PLUS&quot;&gt;
                                    &lt;LeftTree&gt;
                                        &lt;BinaryOperator type=&quot;LEX_OP_PLUS&quot;&gt;
                                            &lt;LeftTree&gt;
                                                &lt;BinaryOperator type=&quot;LEX_OP_PLUS&quot;&gt;
                                                    &lt;LeftTree&gt;
                                                        &lt;Value type=&quot;string&quot;&gt;Factorial of &lt;/Value&gt;
                                                    &lt;/LeftTree&gt;
                                                    &lt;RightTree&gt;
                                                        &lt;Variable name=&quot;i&quot;/&gt;
                                                    &lt;/RightTree&gt;
                                                &lt;/BinaryOperator&gt;
                                            &lt;/LeftTree&gt;
                                            &lt;RightTree&gt;
                                                &lt;Value type=&quot;string&quot;&gt; is &lt;/Value&gt;
                                            &lt;/RightTree&gt;
                                        &lt;/BinaryOperator&gt;
                                    &lt;/LeftTree&gt;
                                    &lt;RightTree&gt;
                                        &lt;FunctionCall name=&quot;factorial&quot;&gt;
                                            &lt;Parameters&gt;
                                                &lt;Variable name=&quot;i&quot;/&gt;
                                            &lt;Parameters&gt;
                                        &lt;/FunctionCall&gt;
                                    &lt;/RightTree&gt;
                                &lt;/BinaryOperator&gt;
                            &lt;/LeftTree&gt;
                            &lt;RightTree&gt;
                                &lt;Value type=&quot;string&quot;&gt;&lt;/Value&gt;
                            &lt;/RightTree&gt;
                        &lt;/BinaryOperator&gt;
                    &lt;Parameters&gt;
                &lt;/FunctionCall&gt;
            &lt;/Body&gt;
        &lt;/Loop&gt;
    &lt;/GlobalCommands&gt;
    &lt;GlobalFunctions&gt;
        &lt;Function name=&quot;factorial&quot;&gt;
            &lt;Parameter&gt;number&lt;/Parameter&gt;
            &lt;If&gt;
                &lt;Condition&gt;
                    &lt;BinaryOperator type=&quot;LEX_OP_LESS&quot;&gt;
                        &lt;LeftTree&gt;
                            &lt;Variable name=&quot;number&quot;/&gt;
                        &lt;/LeftTree&gt;
                        &lt;RightTree&gt;
                            &lt;Value type=&quot;int&quot;&gt;2&lt;/Value&gt;
                        &lt;/RightTree&gt;
                    &lt;/BinaryOperator&gt;
                &lt;/Condition&gt;
                &lt;UnaryOperator type=&quot;LEX_RETURN&quot;&gt;
                    &lt;Value type=&quot;int&quot;&gt;1&lt;/Value&gt;
                &lt;/UnaryOperator&gt;
            &lt;/If&gt;
            &lt;Else&gt;
                &lt;UnaryOperator type=&quot;LEX_RETURN&quot;&gt;
                    &lt;BinaryOperator type=&quot;LEX_OP_MULT&quot;&gt;
                        &lt;LeftTree&gt;
                            &lt;Variable name=&quot;number&quot;/&gt;
                        &lt;/LeftTree&gt;
                        &lt;RightTree&gt;
                            &lt;FunctionCall name=&quot;factorial&quot;&gt;
                                &lt;Parameters&gt;
                                    &lt;BinaryOperator type=&quot;LEX_OP_MINUS&quot;&gt;
                                        &lt;LeftTree&gt;
                                            &lt;Variable name=&quot;number&quot;/&gt;
                                        &lt;/LeftTree&gt;
                                        &lt;RightTree&gt;
                                            &lt;Value type=&quot;int&quot;&gt;1&lt;/Value&gt;
                                        &lt;/RightTree&gt;
                                    &lt;/BinaryOperator&gt;
                                &lt;Parameters&gt;
                            &lt;/FunctionCall&gt;
                        &lt;/RightTree&gt;
                    &lt;/BinaryOperator&gt;
                &lt;/UnaryOperator&gt;
            &lt;/Else&gt;
        &lt;/Function&gt;
        &lt;Function name=&quot;echo&quot;&gt;
            &lt;Parameter&gt;param&lt;/Parameter&gt;
        &lt;/Function&gt;
        &lt;Function name=&quot;exit&quot;&gt;
            &lt;Parameter&gt;param&lt;/Parameter&gt;
        &lt;/Function&gt;
        &lt;Function name=&quot;get_global&quot;&gt;
            &lt;Parameter&gt;name&lt;/Parameter&gt;
        &lt;/Function&gt;
        &lt;Function name=&quot;set_global&quot;&gt;
            &lt;Parameter&gt;name&lt;/Parameter&gt;
            &lt;Parameter&gt;value&lt;/Parameter&gt;
        &lt;/Function&gt;
    &lt;/GlobalFunctions&gt;
&lt;/Script&gt;
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

<?php
include_once 'p_end.php';
?>
