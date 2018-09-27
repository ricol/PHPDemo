<?php

require_once('common/header.php');

require_once 'common/functions.php';

/*
 * Read input from stdin and provide input before running code

  fscanf(STDIN, "%s\n", $name);
  echo "Hi, ".$name;

 */

$test = 0;

beginTest(++$test);

$str1 = "";
$str2 = "";

echo isAnagrams($str1, $str2) ? "true" : "false";
echo "<br />";
echo "<br />";


beginTest(++$test);

$data = [1, 4, 5, 7, 8, 9];
$difference = 3;

echo analyse($data, $difference);

echo "<br />";
echo "<br />";

beginTest(++$test);
$data = [1, 2, 3, 4, 5, 6, 7, 8];

for ($i = 0; $i <= 10; $i++)
{
    $result = reverse($data, $i);
    echo "Reverse amount: " . $i . "<br />";
    foreach ($result as $value)
        echo $value . " ";
    echo "<br />";
}

beginTest(++$test);
for ($value = 2; $value <= 10; $value += 1)
{
    $r = sqrtnew($value, 0.0000000000001);
    $real = sqrt($value);
    $difference = abs($r - $real);
    echo "Square root of " . $value . " is: " . $r . " [Sqrt($value) = " . $real . "] [Difference: $difference] " . "<br />";
}

beginTest(++$test);
for ($i = 2; $i <= 10; $i++)
{
    $number = get_number_of_binary_1_from($i);
    printf("Number of 1 in %b[%d] is: %d<br />", $i, $i, $number);
}

beginTest(++$test);

$data = [2, 3, 4, 5, 6];
$s = 0;
$old = $s;
foreach ($data as $value)
{
    $s ^= $value;
    printf("%05b[%d] ^= %05b[%d] => %05b[%d]<br />", $old, $old, $value, $value, $s, $s);
    $old = $s;
}

beginTest(++$test);

$data = [2, 3, 5, 2, 3, 4, 6, 8, 2, 3, 3, 3, 4, 5, 6];
$majority = find_majority($data);
echo "Majority: " . $majority;

beginTest(++$test);

$data = [];
for ($i = 0; $i < 10; $i++)
{
    $data[] = rand(0, 10);
}

for ($i = 0; $i < count($data); $i++)
    echo "data[" . $i . "] = " . $data[$i] . "<br />";
sort($data);
echo "sorted <br />";
for ($i = 0; $i < count($data); $i++)
    echo "data[" . $i . "] = " . $data[$i] . "<br />";

for ($value = 0; $value < 10; $value++)
{
    echo find_i_j($data, $value) . "<br />";
}