<?php include("src/Distance.php");

echo "Hamming Distance Test <br><br>";


//If one of inputs is not string will return error
$hamming_test1 = new Hamming(1234,"test");
echo "Hamming_test1 : a= 1234, b= \"test\"<br>".$hamming_test1->cal_distance()."<br><br>";

//If two inputs doesnt have the same length then return error
$hamming_test2 = new Hamming("teest","test");
echo "Hamming_test2 : a= \"teest\", b= \"test\"<br>".$hamming_test2->cal_distance()."<br><br>";;

//If two inputs are same then will return 0
$hamming_test3 = new Hamming("test ","test");
echo "Hamming_test3 : a= \"test \", b= \"test\"<br>".$hamming_test3->cal_distance()."<br><br>";

$hamming_test4 = new Hamming("tist ","test");
echo "Hamming_test4 :  a= \"tist \", b= \"test\"<br>".$hamming_test4->cal_distance()."<br><br>";

echo "Hamming helper function a= \"tset\",\"test\"<br>".Hamming::distance("tset","test")."<br><br>";


echo "Levenshtein Distance Test <br><br>";
//If one of inputs is not string will return error
$Levenshtein_test1 = new Levenshtein(1234,"test");
echo "Levenshtein_test1 : a= 1234, b= \"test\"<br> ".$Levenshtein_test1->cal_distance() ."<br><br>";

$Levenshtein_test2 = new Levenshtein("test","test");
echo "Levenshtein_test2 : a= \"test\", b= \"test\"<br> ".$Levenshtein_test2->cal_distance() ."<br><br>";

$Levenshtein_test3 = new Levenshtein("teest","test");
echo "Levenshtein_test3 :a= \"teest\", b= \"test\"<br> ".$Levenshtein_test3->cal_distance() ."<br><br>";

$Levenshtein_test4 = new Levenshtein("tst","test");
echo "Levenshtein_test4 : a= \"tst\", b= \"test\"<br> ".$Levenshtein_test4->cal_distance() ."<br><br>";

$Levenshtein_test5 = new Levenshtein("tist","test");
echo "Levenshtein_test5 : a= \"tist\", b= \"test\"<br> ".$Levenshtein_test5->cal_distance() ."<br><br>";

$Levenshtein_test6 = new Levenshtein("this is a test","this is test");
echo "Levenshtein_test6 : a= \"this is a test\", b= \"this is test\"<br> ".$Levenshtein_test6->cal_distance() ."<br><br>";

echo "Levenshtein Helper function  a= \"this is test\", b= \"the is test\"<br>".Levenshtein::distance("this is test","the is test")."<br><br>";

echo "Helper function if the class name is Distance <br>".Distance::distance("test ","test");

?>
