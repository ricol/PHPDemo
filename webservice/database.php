<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$link = -1;

function openDB()
{
    global $link;
    $link = mysql_connect('127.0.0.1', 'root', '123') or die('Cannot connect to the DB');
    mysql_select_db('db', $link) or die('Cannot select the DB');
}

function closeDB()
{
    global $link;
    if ($link != -1)
    {
        mysql_close($link);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST))
{
    openDB();

    $input = json_decode($HTTP_RAW_POST_DATA);
    $number = (Integer) $input->number;
    $value = $input->value;

    // check the email address in the users table
    $tablename = "test";

    // insert the number of value into the table
    for ($i = 0; $i < $number; $i++)
    {
        $sql = "INSERT INTO $tablename (VALUE) VALUES ('$value')";
        $queryResult = mysql_query($sql);
    }

    // read the total number of value from the table
    $sql = "SELECT COUNT(*) AS COUNT FROM $tablename WHERE VALUE = '$value'";
    $queryResult = mysql_query($sql);

    $count = 0;
    while ($row = mysql_fetch_row($queryResult))
    {
        $count = $row[0];
    }

    $sql = "DELETE FROM $tablename WHERE VALUE = '$value'";
    mysql_query($sql);

    $sql = "SELECT COUNT(*) AS COUNT FROM $tablename WHERE VALUE = '$value'";
    $queryResult = mysql_query($sql);

    $after = 0;
    while ($row = mysql_fetch_row($queryResult))
    {
        $after = $row[0];
    }

    $result = array("status" => ($count == $number ? 0 : 1), "expected" => (Integer) $number, "actual" => (Integer) $count, "cleaned" => (Integer) $after);

    header('Content-type: application/json');
    echo(json_encode($result));

    closeDB();
}
    