<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace my;

class Person
{

    function __construct()
    {
        echo __CLASS__ . "<br />";
    }

}

namespace my\first;

class Person
{

    function __construct()
    {
        echo __CLASS__ . "<br />";
    }

}

namespace my\second;

class Person
{

    function __construct()
    {
        echo __CLASS__ . "<br />";
    }

}
