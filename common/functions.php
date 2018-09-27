<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function analyse($data, $difference)
{
    $total = 0;
    $pairs = array();
    $len = count($data);

    for ($i = 0; $i < $len; $i++)
    {
        $num1 = $data[$i];
        for ($j = 0; $j < $len; $j++)
        {
            if ($i != $j)
            {
                $num2 = $data[$j];
                if ($num1 + $difference == $num2)
                {
                    if (!isset($pairs[$num1]))
                    {
                        $pairs[$num1] = $num2;
                        $total++;
                    }
                }
            }
        }
    }

    return $total;
}

function reverse($data, $reverseAmount)
{
    $result = [];

    $len = count($data);
    $index = $len - $reverseAmount % $len;

    for ($i = $index; $i < $len; $i++)
        $result[] = $data[$i];

    for ($i = 0; $i < $index; $i++)
        $result[] = $data[$i];

    return $result;
}

function sqrtnew($n, $precision)
{
    $x = $n;

    while (abs($x * $x - $n) > $precision)
    {
        $y = $x * $x - $n;
        $a = $y - 2.0 * $x * $x;
        $x = (-1 * $a) / (2.0 * $x);
    }

    return $x;
}

function isAnagrams($str1, $str2)
{
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $data = array();

    if ($len1 == 0 && $len2 == 0) return false;
    if ($len1 == 0 || $len2 == 0) return false;
    if ($len1 != $len2) return false;

    for ($i = 0; $i < $len1; $i++)
    {
        $bFound = false;

        for ($j = 0; $j < $len2; $j++)
        {
            if ($str1[$i] == $str2[$j] && !in_array($j, $data))
            {
                $bFound = true;
                $data[] = $j;
                break;
            }
        }

        if (!$bFound) return false;
    }

    return true;
}

function get_number_of_binary_1_from($num)
{
    $n = $num;
    $result = 0;

    do
    {
        if ($n & 1 == 1) $result++;
        $n >>= 1;
    }while ($n != 0);

    return $result;
}

function find_majority($data)
{
    if (empty($data)) return null;

    $dict = [];

    foreach ($data as $value)
    {
        if (isset($dict[$value])) $dict[$value] ++;
        else $dict[$value] = 1;
    }

    $max = array_keys($dict)[0];
    foreach ($dict as $key => $value)
    {
        echo "dict[" . $key . "] = " . $value . "<br />";
        if ($value > $max) $max = $key;
    }

    return $max;
}

function find_i_j($data, $value)
{
    $result = false;

    for ($i = count($data) - 1; $i >= 0; $i--)
    {
        for ($j = $i - 1; $j >= 0; $j--)
        {
            if ($data[$i] - $data[$j] == $value)
            {
                $result = true;
                break;
            }
        }

        if ($result) break;
    }

    if ($result)
    {
        echo "Result: data[" . $i . "] - data[" . $j . "] = $value <br />";
    }

    return $result ? "YES" : "NO";
}

function beginTest($num)
{
    echo "<hr /> <h4>Test " . $num . "...</h3>";
}
