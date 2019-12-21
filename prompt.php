<?php
include("src/Distance.php");
$string1 = readline('inter 1st string :');//ask the user to inputs the strings and insert them in var
$string2 = readline('inter 2nd string :');
echo "Levenshtein :".Levenshtein::distance($string1,$string2)." operations \n";
