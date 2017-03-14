<?php

require_once 'common/functions.php';

/*
 * Read input from stdin and provide input before running code

  fscanf(STDIN, "%s\n", $name);
  echo "Hi, ".$name;

 */

$str1 = "";
$str2 = "";

echo "Test1..." . "<br />";
echo isAnagrams($str1, $str2) ? "true" : "false";
echo "<br />";
echo "<br />";


echo "Test2..." . "<br />";
$data = [1, 4, 5, 7, 8, 9];
$difference = 3;

echo analyse($data, $difference);

echo "<br />";
echo "<br />";

echo "Test3..." . "<br />";
$data = [1, 2, 3, 4, 5, 6, 7, 8];

for ($i = 0; $i <= 10; $i++)
{
    $result = reverse($data, $i);
    echo "Reverse amount: " . $i . "<br />";
    foreach ($result as $value)
        echo $value . " ";
    echo "<br />";
}

echo "<br />";
echo "Test4..." . "<br />";
for ($value = 2; $value <= 10; $value += 0.1)
{
    $r = sqrtnew($value, 0.0000000000001);
    $real = sqrt($value);
    $difference = abs($r - $real);
    echo "Square root of " . $value . " is: " . $r . " [Sqrt($value) = " . $real . "] [Difference: $difference] " . "<br />";
}

echo "Test5..." . "<br />";
for ($i = 2; $i <= 10; $i++)
{
    $number = get_number_of_binary_1_from($i);
    printf("Number of 1 in %b[%d] is: %d<br />", $i, $i, $number);
}

echo "Test6..." . "<br />";

$data = [2, 3, 4, 5, 6];
$s = 0;
$old = $s;
foreach ($data as $value)
{
    $s ^= $value;
    printf("%05b[%d] ^= %05b[%d] => %05b[%d]<br />", $old, $old, $value, $value, $s, $s);
    $old = $s;
}