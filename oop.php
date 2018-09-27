<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Animal
{

    protected function test()
    {
        echo "<p>Animal.test()</p>";
    }

    function show()
    {
        echo "<p>Animal</p>";
    }

}

class Person extends Animal
{

    function show()
    {
        echo "<p>Person</p>";
    }

}

class Male extends Person
{

    function show()
    {
        echo "<p>Male</p>";
    }

}

$male = new Male();
$animal = new Animal();
$person = new Person();

$objects = [$male, $animal, $person];
foreach ($objects as $object)
{
    $object->show();
}