<?php
//include "../conf.php"; // e-mail address, nothing else

class CItem
 {
   var $LHS;
   var $RHS; // array
   var $Pos;

   function CItem ( $LHS, $RHS, $Pos )
    {
      $this -> LHS = $LHS;
      $this -> RHS = $RHS;
      $this -> Pos = $Pos;
    }
   function ToStr ( )
    {
      $Res = $this -> Pos."_".$this -> LHS;

      for ( $i=0; $i < Count ( $this -> RHS ); $i ++ )
       {
         $Res .= "_".$this -> RHS[$i];
       }
      return ( $Res );
    }
 }
class CGrammar
 {
   var $N, $T, $P, $S;
   var $Err;
   /*------------------------------------------------------------------------*/
   function Splitter1 ( $Str )
    {
      $Tmp = EReg_Replace ( " +", " ", $Str );
      $Tmp = EReg_Replace ( "^ +", "", $Tmp );
      $Tmp = EReg_Replace ( " +$", "", $Tmp );
      return ( Explode ( " ", $Tmp));
    }
   /*------------------------------------------------------------------------*/
   function Splitter2 ( $Str )
    {
      $Tmp = EReg_Replace ( "-\>", " ", $Str );
      $Tmp = StrTr ( $Tmp, "\n\r ", "   " );
      $Tmp = EReg_Replace ( " +", " ", $Tmp );
      $Tmp = EReg_Replace ( "^ +", "", $Tmp );
      $Tmp = EReg_Replace ( " +$", "", $Tmp );
      return ( Explode ( " ", $Tmp));
    }
   /*------------------------------------------------------------------------*/
   function AddRule ( & $Ar, $Idx )
    {
      for ( $i = 0; $i < Count ( $Ar ); $i ++ )
       if ( $Ar[$i] == $Idx )
        return;
      $Ar[Count ( $Ar )] = $Idx;
    }
   /*------------------------------------------------------------------------*/
   function IsNonTerminal ( $N )
    {
      for ( $i=0; $i < Count ( $this -> N ); $i ++ )
       if ( $this -> N[$i] == $N )
        return ( 1 );
      return ( 0 );
    }
   /*------------------------------------------------------------------------*/
   function IsTerminal ( $T )
    {
      for ( $i=0; $i < Count ( $this -> T ); $i ++ )
       if ( $this -> T[$i] == $T )
        return ( 1 );
      return ( 0 );
    }
   /*------------------------------------------------------------------------*/
   function CGrammar ( $N, $T, $P, $S )
    {
      $this -> N = $this -> Splitter1 ( $N );
      $this -> T = $this -> Splitter1 ( $T );
      $this -> S = $S;
      $this -> Err = 0;

      // check that alphabets are disjoint and that S is from N

      for ( $i = 0; $i < Count ( $this -> N ); $i ++ )
       for ( $j = 0; $j < Count ( $this -> T ); $j ++ )
        if ( $this -> N[$i] == $this -> T[$j] )
         $this -> Err = -1;
      if ( ! $this -> IsNonTerminal ( $this -> S ) )
       $this -> Err = -2;
      $Rules = Explode ( "\n", $P );

      $Cnt   = 0;
      for ( $i=0; $i < Count ( $Rules ); $i ++ )
       {
         $Tmp = $this -> Splitter2 ( $Rules[$i] );
         if ( Count ( $Tmp ) && ( $Tmp[0] != "" ) )
          {
            $Tmp1 = Array ();
            for ( $j = 1; $j < Count ( $Tmp ); $j ++ )
             {
               $Tmp1[ Count ( $Tmp1 )] = $Tmp[$j];
               if (( ! $this -> IsNonTerminal ( $Tmp[$j] ) ) &&
                   ( ! $this -> IsTerminal ( $Tmp[$j] ) ) )
                $this -> Err = $i + 1;
             }
            if ( ! $this -> IsNonTerminal ( $Tmp[0] ) )
             $this -> Err = $i + 1;
            $this -> P[$Cnt++] = new CItem ( $Tmp[0], $Tmp1, "0" );
          }
       }

      for ( $i=0; $i < Count ( $this -> P ) - 1; $i ++ )
       {
         $X    = $this -> P[$i];
         $LHS1 = $X -> LHS;
         $X    = $this -> P[$i+1];
         $LHS2 = $X -> LHS;
         if ( $LHS1 != $LHS2 )
          for ( $j=$i+1; $j < Count ( $this -> P ); $j ++ )
           {
             $X    = $this -> P[$j];
             if ( $LHS1 == $X -> LHS )
              {
                // swap rules i+1 and j
                $Tmp             = $this -> P[$i+1];
                $this -> P[$i+1] = $this -> P[$j];
                $this -> P[$j]   = $Tmp;
                break;
              }
           }
       }
    }
   /*------------------------------------------------------------------------*/
   function First1Closure ( & $Set )
    {
      while ( 1 )
       {
         $OldSet = $Set;

         Reset ( $OldSet );
         while ( List ( $Key, $Val ) = Each ( $OldSet ) )
          {
            // if a dot is just before nonterminal, place the extended new item into the set
            if ( ( $Val -> Pos < Count ( $Val -> RHS ) ) &&
                 ( $this -> IsNonTerminal ( $Val -> RHS [$Val -> Pos] ) ) )
             {
               // create new rule of the form
               $Nonterm = $Val -> RHS [$Val -> Pos];


               for ( $i=0; $i < Count ( $this -> P ); $i ++ )
                {
                  $X = $this -> P[$i];
                  if ( $X -> LHS == $Nonterm )
                   {
                     $StrID        = $X -> ToStr ();
                     if ( !IsSet ( $Set[$StrID] ) )
                      $Set[$StrID]  = new CItem ( $X -> LHS, $X -> RHS, 0 );
                   }
                }
             }

            $Add    = Array ();
            $AddCnt = 0;
            if ( $Val -> Pos == Count ( $Val -> RHS ) )
             { // the dot is after RHS
               $Neterm = $Val -> LHS;
               Reset ( $Set );
               while ( List ( $Key1, $Val1 ) = Each ( $Set ) )
                if ( ( $Val1 -> Pos < Count ( $Val1 -> RHS ) ) &&
                     ( $Val1 -> RHS [$Val1 -> Pos] == $Neterm ) )
                 $Add [$AddCnt++] = new CItem ( $Val1 -> LHS, $Val1 -> RHS, $Val1 -> Pos + 1 );
             }
            for ( $i = 0; $i < Count ( $Add ); $i ++ )
             {
               $StrID = $Add [$i] -> ToStr ();
               if ( !IsSet ( $Set[$StrID] ) )
                $Set[$StrID] = $Add[$i];
             }
          }
         if ( Count( $OldSet ) == Count ( $Set ) ) break;
       }
      // set now contains dots in RHS ...
    }
   /*------------------------------------------------------------------------*/
   function First1 ( $Arr )
    {
      $Tmp          = new CItem ( "#", $Arr, 0 );
      $StrID        = $Tmp -> ToStr ();
      $Set [$StrID] = $Tmp;

      $this -> First1Closure ( $Set );


      $Res    = Array ();
      $ResCnt = 0;
      Reset ( $Set );
      while ( List ( $Key, $Val ) = Each ( $Set ) )
       {
         UnSet ( $Id );
         if ( $Val -> Pos < Count ( $Val -> RHS ) )
           {
             if ( $this -> IsTerminal ( $Val -> RHS[$Val -> Pos ] ) )
              $Id = $Val -> RHS[$Val -> Pos ];
           }
          else
           {
             if ( $Val -> LHS == "#" )
              $Id = "";
           }
         if ( IsSet ( $Id ) )
          {
            for ( $j = 0; $j < $ResCnt; $j ++ )
             if ( $Res[$j] == $Id )
              break;
            if ( $j == $ResCnt )
             $Res[$ResCnt++] = $Id;
          }
       }
      return ( $Res ); // a set of First1
    }
   /*------------------------------------------------------------------------*/
   function Follow1 ( $Nonterm )
    {
      $Tmp          = new CItem ( $Nonterm, Array ( $Nonterm ), "1" );
      $StrID        = $Tmp -> ToStr ();
      $Set [$StrID] = $Tmp;

      $Nullable = Array ( );
      for ( $i= 0; $i < Count ( $this -> P ); $i ++ )
       {
         $X = $this -> P[$i];
         if ( Count ( $X -> RHS ) == 0 )
          $Nullable[$X -> LHS] = 1;
       }

      while ( 1 )
       {
         $Cnt = Count ( $Nullable );
         for ( $i = 0; $i < Count ( $this -> P ); $i ++ )
          {
            $Null = 1;
            $X = $this -> P[$i];
            for ( $j = 0; $j < Count ( $X -> RHS ); $j ++ )
             if ( ! $Nullable [ $X -> RHS[$j] ] )
              $Null = 0;

            if ( $Null )
             $Nullable [ $X -> LHS ] = 1;
          }
         if ( $Cnt == Count ( $Nullable ) ) break;
       }

      while ( 1 )
       {
         $OldSet = $Set;
         // if the dot is at the end of a rule, add all rules where LHS is found

         $Add = Array ();
         Reset ( $OldSet );
         while ( List ( $Key, $Val ) = Each ( $OldSet ) )
          if ( $Val -> Pos == Count ( $Val -> RHS ) )
           {
             for ( $j=0; $j < Count ( $Add ); $j ++ )
              if ( $Add[$j] == $Val -> LHS )
               break;
             if ( $j == Count ( $Add ) )
              $Add [Count ( $Add )] = $Val -> LHS;
           }
         // add all rules from the G containing nonterminal from Add

         for ( $i=0; $i < Count ( $this -> P ); $i ++ )
          {
            $X = $this -> P[$i];
            for ( $j=0; $j < Count ( $X -> RHS ); $j ++ )
             for ( $k = 0; $k < Count ( $Add ); $k ++ )
              if ( $X -> RHS[$j] == $Add[$k] )
               {
                 $It = new CItem ( $X -> LHS, $X -> RHS, $j+1 );
                 $StrID = $It -> ToStr ();
                 if ( ! IsSet ( $Set[$StrID] ) )
                  $Set[$StrID] = $It;
               }
          }
         // move the dot over nullable nonterminals
         Reset ( $OldSet );
         while ( List ( $Key, $Val ) = Each ( $OldSet ) )
          if ( ( $Val -> Pos < Count ( $Val -> RHS ) ) &&
               ( $this -> IsNonTerminal ( $Val -> RHS [$Val -> Pos] ) ) &&
               ( $Nullable [$Val -> RHS [$Val -> Pos]] ) )
           {
             // skip it ..
             $It = new CItem ( $Val -> LHS, $Val -> RHS, $Val -> Pos + 1 );
             $StrID = $It -> ToStr ();
             if ( ! IsSet ( $Set[$StrID] ) )
              $Set[$StrID] = $It;
           }

         if ( Count( $OldSet ) == Count ( $Set ) ) break;
       }
      // now, the follow is first of the strings after the dot...

      $this -> First1Closure ( $Set );

      $Res    = Array ();
      $ResCnt = 0;
      Reset ( $Set );
      while ( List ( $Key, $Val ) = Each ( $Set ) )
       {
         UnSet ( $Id );
         if ( $Val -> Pos < Count ( $Val -> RHS ) )
           {
             if ( $this -> IsTerminal ( $Val -> RHS[$Val -> Pos ] ) )
              $Id = $Val -> RHS[$Val -> Pos ];
           }
          else
           {
             if ( $Val -> LHS == $this -> S )
              $Id = "";
           }
         if ( IsSet ( $Id ) )
          {
            for ( $j = 0; $j < $ResCnt; $j ++ )
             if ( $Res[$j] == $Id )
              break;
            if ( $j == $ResCnt )
             $Res[$ResCnt++] = $Id;
          }
       }
      return ( $Res );
    }
   /*------------------------------------------------------------------------*/
   function ParsingTable (  )
    {
      $First   = Array ();
      $Follow  = Array ();

      for ( $i=0; $i < Count ( $this -> P ); $i ++ )
       {
         $X = $this -> P [ $i ];
         $First[$i] = $this -> First1 ( $X  -> RHS );
       }

      for ( $i=0; $i < Count ( $this -> N ); $i ++ )
       $Follow[ $this -> N[$i] ] = $this -> Follow1 ( $this -> N [ $i ] );

      for ( $i = 0; $i < Count ( $this -> N ); $i ++ )
       {
         for ( $j = 0; $j < Count ( $this -> T ); $j ++ )
          $PT [$this -> N [$i] ] [ $this -> T [$j] ]  = Array ();
         $PT [$this -> N [$i] ] [ "" ]  = Array ();
       }

      for ( $i = 0; $i < Count ( $this -> P ); $i ++ )
       {
         $X = $this -> P[$i];
         $NonTerm = $X -> LHS;

         for ( $j = 0; $j < Count ( $First[$i] ); $j ++ )
          {
            $Term = $First[$i][$j];
            if ( $Term == "" )
              {
                for ( $k = 0; $k < Count ( $Follow [ $NonTerm ] ); $k ++ )
                 $this -> AddRule ( $PT [$NonTerm] [ $Follow [ $NonTerm ] [$k] ], $i );
              }
             else
              {
                $this -> AddRule ( $PT [ $NonTerm ] [ $Term ], $i );
              }
          }
       }
      return ( $PT );
    }
   /*------------------------------------------------------------------------*/
   function DumpGrammar ( )
    {
      echo "Gramatika G = ( {";
      $Comma = "";
      for ( $i=0; $i < Count ( $this -> N ); $i ++ )
       {
         echo $Comma.$this -> N[$i];
         $Comma = ", ";
       }
      echo "}, { ";
      $Comma = "";
      for ( $i=0; $i < Count ( $this -> T ); $i ++ )
       {
         echo $Comma.$this -> T[$i];
         $Comma = ", ";
       }
      echo "}, P, ".$this -> S."), kde P obsahuje pravidla:<br />";

      $Cnt = 1;
      echo "<table>\n";

      for ( $i=0; $i < Count ( $this -> P ); $i ++ )
       {
         $X = $this -> P[$i];
         echo "<tr><td>($Cnt)</td><td>".$X -> LHS."</td><td>-&gt;</td><td>";
         $Comma = "";
         for ( $j = 0; $j < Count ( $X -> RHS ); $j ++ )
          {
            echo $Comma . $X -> RHS[$j];
            $Comma = "&nbsp;";
          }
         $Cnt ++;
         if ( Count ( $X -> RHS ) == 0 )
          echo "&epsilon;";
         echo "</td></tr>\n";
       }
      echo "</table>\n";
    }
   /*------------------------------------------------------------------------*/
   function DumpFirst ( )
    {
      $Cnt = 1;
      echo "<table>\n";
      for ( $i=0; $i < Count ( $this -> P ); $i ++ )
       {
         $X = $this -> P[$i];
         echo "<tr><td>($Cnt)</td><td>".$X -> LHS."</td><td>-&gt;</td><td>";
         $Comma = "";
         for ( $j = 0; $j < Count ( $X -> RHS ); $j ++ )
          {
            echo $Comma . $X -> RHS[$j];
            $Comma = "&nbsp;";
          }
         if ( Count ( $X -> RHS ) == 0 )
          echo "&epsilon;";
         echo "</td><td width=\"50\">&nbsp;</td><td>";

         $First = $this -> First1 ( $X -> RHS );

         $Comma = "";
         for ( $j = 0; $j < Count ( $First ); $j ++ )
          {
            if ( $First[$j] == "" )
              echo "$Comma &epsilon;";
             else
              echo $Comma . $First[$j];
            $Comma = "&nbsp;";
          }

         $Cnt ++;
         echo "</td></tr>\n";
       }
      echo "</table>\n";
    }
   /*------------------------------------------------------------------------*/
   function DumpFollow ( )
    {
      echo "<table>\n";
      for ( $i=0; $i < Count ( $this -> N ); $i ++ )
       {
         echo "<tr><td>".$this -> N[$i]."</td><td width=\"50\"></td><td>";
         $Follow = $this -> Follow1 ( $this -> N[$i] );

         $Comma = "";
         for ( $j = 0; $j < Count ( $Follow ); $j ++ )
          {
            if ( $Follow[$j] == "" )
              echo "$Comma &epsilon;";
             else
              echo $Comma . $Follow[$j];
            $Comma = "&nbsp;";
          }
         echo "</td></tr>\n";
       }
      echo "</table>\n";
    }
   /*------------------------------------------------------------------------*/
   function DumpPTEntry ( & $Ar )
    {
      if ( Count ( $Ar ) > 1 )
        echo "<td bgcolor=\"#C04040\" align=\"center\" valign=\"top\">";
       else
        echo "<td align=\"center\" valign=\"top\">";
      if ( Count ( $Ar ) )
        {
          $Br = "";
          for ( $k = 0; $k < Count ( $Ar ); $k ++ )
           {
             echo $Br;
             // dump rule
             $X = $this -> P[ $Ar[$k] ];
             $RHS   = $X -> RHS;
             $Comma = "";
             for ( $l = 0; $l < Count ( $RHS ); $l ++ )
              {
                echo $Comma . $RHS[$l];
                $Comma = "&nbsp;";
              }
             if ( Count ( $RHS ) == 0 ) echo "&epsilon;";
             echo ", ".($Ar[$k] + 1);
             $Br = "<br />";
           }
        }
       else
        echo "&nbsp;";
      echo "</td>";
    }
   /*------------------------------------------------------------------------*/
   function DumpPT ( )
    {
      $PT = $this -> ParsingTable ();
      echo "<table border=\"1\" cellspacing=\"0\">\n";
      echo "<tr bgcolor=\"#A0A0A0\"><td>&nbsp;</td>";
      for ( $i = 0; $i < Count ( $this -> T ); $i ++ )
       {
         echo "<td align=\"center\">".$this -> T[$i]."</td>";
       }
      echo "<td>&epsilon;</td></tr>\n";

      for ( $i = 0; $i < Count ( $this -> N ); $i ++ )
       {
         echo "<tr><td bgcolor=\"A0A0A0\" align=\"center\" valign=\"top\">".$this -> N [$i]."</td>";

         for ( $j = 0; $j < Count ( $this -> T ); $j ++ )
          $this -> DumpPTEntry ( $PT [$this -> N[$i] ] [$this -> T[$j] ] );

         $this -> DumpPTEntry ( $PT [$this -> N[$i] ] [ "" ] );
         echo "</tr>\n";
       }
      echo "</table>\n";
    }
   /*------------------------------------------------------------------------*/
   function DumpFirstFollow ( )
    {
      $Cnt     = 1;
      $LastLHS = "";

      echo "<table border=\"1\" cellspacing=\"0\">\n";
      echo "<tr bgcolor=\"#A0A0A0\"><td>&nbsp;</td><td>&nbsp;</td><td>FIRST<sub>1</sub></td>";
      echo "<td>FOLLOW<sub>1</sub></td></tr>\n";

      for ( $i=0; $i < Count ( $this -> P ); $i ++ )
       {
         $X = $this -> P[$i];
         echo "<tr><td bgcolor=\"#A0A0A0\">($Cnt)</td><td>".$X -> LHS."&nbsp;-&gt;&nbsp;";
         $Comma = "";
         for ( $j = 0; $j < Count ( $X -> RHS ); $j ++ )
          {
            echo $Comma . $X -> RHS[$j];
            $Comma = "&nbsp;";
          }
         if ( Count ( $X -> RHS ) == 0 )
          echo "&epsilon;";
         echo "</td><td>";

         $First = $this -> First1 ( $X -> RHS );
         $Comma = "";
         for ( $j = 0; $j < Count ( $First ); $j ++ )
          {
            if ( $First[$j] == "" )
              echo "$Comma &epsilon;";
             else
              echo $Comma . $First[$j];
            $Comma = "&nbsp;";
          }

         $Cnt ++;
         echo "</td>";
         if ( $LastLHS != $X -> LHS )
          {
            $RowCnt = 1;
            for ( $j= $i + 1; $j < Count ( $this -> P ); $j ++ )
             {
               $Y = $this -> P[$j];
               if ( $X -> LHS == $Y -> LHS )
                 $RowCnt ++;
                else
                 break;
             }
            if ( $RowCnt == 1 )
              echo "<td>";
             else
              echo "<td rowspan=\"$RowCnt\">";
            $Follow = $this -> Follow1 ( $X -> LHS );
            $Comma = "";
            for ( $j = 0; $j < Count ( $Follow ); $j ++ )
             {
               if ( $Follow[$j] == "" )
                 echo "$Comma &epsilon;";
                else
                 echo $Comma . $Follow[$j];
               $Comma = "&nbsp;";
             }
            $LastLHS = $X -> LHS;
            echo "</td>";
          }
         echo "</tr>\n";
       }
      echo "</table>\n";

    }
   /*------------------------------------------------------------------------*/
 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
  <title>X36PJP: Programovací jazyky a pøekladaèe - výpoèet FIRST, FOLLOW a rozkladové tabulky</title>
 </head>
 <body bgcolor="#cccccc" text="#000000">

<? if ( $HTTP_GET_VARS["Ac"] == 'Ev' ): ?>
<?
  $G = new CGrammar ( StripSlashes ( $HTTP_POST_VARS["N"] ), StripSlashes ( $HTTP_POST_VARS["T"] ),
                      StripSlashes ( $HTTP_POST_VARS["P"] ), StripSlashes ( $HTTP_POST_VARS["S"] ) );
  $Err =  $G -> Err;
  if ( $Err == 0 )
   {
     $G -> DumpGrammar ();
     echo "<br /><b>FIRST<sub>1</sub>:</b><br />\n";
     $G -> DumpFirst ();
     echo "<br /><b>FOLLOW<sub>1</sub>:</b><br />\n";
     $G -> DumpFollow ();
     echo "<br /><b>FIRST<sub>1</sub>, FOLLOW<sub>1</sub>:</b><br />\n";
     $G -> DumpFirstFollow ();
     echo "<br /><b>Rozkladová tabulka pro LL(1) analyzátor:</b><br />\n";
     $G -> DumpPT ();
     echo "</body></html>";
     exit();
   }
?>
<? endif; ?>
<?
   if ( $Err == -1 ) echo "<font color\"#ff0000\">Chyba: Množina terminálù a neterminálù má neprázdný prùnik !</font><br />";
   if ( $Err == -2 ) echo "<font color\"#ff0000\">Chyba: Startovní symbol neni neterminál !</font><br />";
   if ( $Err >   0 ) echo "<font color\"#ff0000\">Chyba: Neznámý symbol v pravidle è. $Err !</font><br />";
/*
if ( !IsSet ( $HTTP_POST_VARS["N"] ) )
 {
   $HTTP_POST_VARS["N"] = "E E' T T' F";
   $HTTP_POST_VARS["T"] = "+ - * / ( ) a";
   $HTTP_POST_VARS["S"] = "E";
   $HTTP_POST_VARS["P"] = "E  -> T E'\nE  -> - T E'\nE' -> + T E'\nE' -> - T E'\nE' -> \nT  -> F T'\nT' -> * F T'\nT' -> / F T'\nT' -> \nF  -> a\nF  -> ( E )";
 }
 */
?>

<form method="post" action="./parsingtbl.php?Ac=Ev" target="_blank">
<table border="0" width="100%">
 <col width="200" />
 <col />
 <tbody>
  <tr>
   <td>Terminální abeceda T: </td>
   <td><input name="T" value="<? echo HTMLSpecialChars ( StripSlashes ( $HTTP_POST_VARS["T"] )); ?>" style="width: 100%"/></td>
  </tr>
  <tr>
   <td>Neterminální abeceda N: </td>
   <td><input name="N" value="<? echo StripSlashes ( $HTTP_POST_VARS["N"] ); ?>" style="width: 100%" /></td>
  </tr>
  <tr>
   <td valign="top">Pravidla P:</td>
   <td><textarea name="P" cols="70" rows="20" style="width: 100%"><? echo HTMLSpecialChars ( StripSlashes ( $HTTP_POST_VARS["P"] )); ?></textarea></td>
  </tr>
  <tr>
   <td>Poèáteèní symbol S</td>
   <td><input name="S" value="<? echo StripSlashes ( $HTTP_POST_VARS["S"] ); ?>" style="width: 100px" /></td>
  </tr>
  <tr>
   <td colspan="2" align="center"><input type="submit" value="Vypoèítat" /></td>
  </tr>
 </tbody>
</table>
</form>

<b>Návod:</b>
<ul>
 <li>Gramatiku je potøeba zadat kompletnì, tj. nejen množinu pravidel, ale i množiny N, T a poèáteèní symbol S.</li>

 <li>Terminální a neterminální symboly jsou tvoøeny <b>slovy</b>, oddìlovaèem je mezera. Pøíklad: <tt>ident var : , ;</tt> je možné zadání množiny terminálù.</li>

 <li>Pravidla se zadávají jedno na øádku, každé ve formì <tt>A -&gt; b C d E</tt>. Opìt, jednotlivé terminální a neterminální
  symboly musíte oddìlit mezerou. Epsilon pravidlo zadáte jako prázdné slovo, tj. napø. <tt>A -&gt; </tt></li>

 <li>Pokud dojde k timeoutu, mùžete si zkusit skript <a href="./parsingtbl.bin">stáhnout</a>, pøejmenovat na
  .php a provést na Vašem poèítaèi. Na zdejším poèítaèi je nastaven PHP timeout na 30 s, nemám možnost
  tuto hodnotu zmìnit.</li>
</ul>

<?php
// include "../footer.php";
?>
  <hr />
  <table width="100%">
   <tbody>
    <tr>
     <td align="left">
      Kontakt: <font color="#4040ff">xvagner &#x28;at)

 fel	(dot) cvut (dot) cz</font><br /><font size="-1">(C) 2000, L.Vagner</font>
     </td>
     <td align="right">
       <a href="http://validator.w3.org/check?uri=referer"><img border="0"
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
     </td>
    </tr>
   </tbody>
  </table>
 </body>
</html>
