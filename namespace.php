<?php

include "namespace/namespace_demo.php";

new my\Person();

new my\first\Person();

new my\second\Person();

use my\Person;

new Person();

use my\first\Person as my_first_person;

new my_first_person();

use my\second\Person as my_second_person;

new my_second_person();

