<?php
    require('header.php');
    require('common.php');

    print "<h3 align='center'>Welcome To PHP World!</h3>";

# This is a comment, and
# This is the second line of the comment
// This is a comment too. Each style comments only
# First Example

    show("echo");
    showMsg("I love " . "Lisa" . "!");

    show("constant");

    define("MINSIZE", 50);

    showMsg(MINSIZE);
    showMsg(constant("MINSIZE")); // same thing as the previous line

    $x = 5;
    $y = 10;

    show("If");

    $d = date("D");

    if ($d == "Fri")
        echo "Have a nice weekend!";

    elseif ($d == "Sun")
        echo "Have a nice Sunday!";
    else
        echo "Have a nice day!";

    show("switch");

    $d = date("D");

    switch ($d)
    {
        case "Mon":
            echo "Today is Monday";
            break;

        case "Tue":
            echo "Today is Tuesday";
            break;

        case "Wed":
            echo "Today is Wednesday";
            break;

        case "Thu":
            echo "Today is Thursday";
            break;

        case "Fri":
            echo "Today is Friday";
            break;

        case "Sat":
            echo "Today is Saturday";
            break;

        case "Sun":
            echo "Today is Sunday";
            break;

        default:
            echo "Wonder which day is this ?";
    }

    show("for");

    $a = 0;
    $b = 0;

    for ($i = 0; $i < 5; $i++)
    {
        $a += 10;
        $b += 5;
    }

    echo ("At the end of the loop a=$a and b=$b" );

    show("while");

    $i = 0;
    $num = 50;

    while ($i < 10)
    {
        $num--;
        $i++;
    }

    echo ("Loop stopped at i = $i and num = $num" );

    show("do...while");

    $i = 0;
    $num = 0;

    do
    {
        $i++;
    } while ($i < 10);
    echo ("Loop stopped at i = $i" );

    show("string");

    $string1 = "Hello World";
    $string2 = "1234";

    echo $string1 . " " . $string2;
    echo $string1 + $string2;

    show("get browser");

// now try it
    $ua = getBrowser();
    $yourbrowser = "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];

    print_r($yourbrowser);

    show("random");

    srand(microtime() * 1000000);
    for ($i = 0; $i < 10; $i++)
    {
        $num = rand(1, 10);
        showMsg("Random num: $num");
    }

    show("function");

    function myTest()
    {
        global $x, $y;
        $y = $x + $y;
        showMsg("y: $y");
    }

    myTest();

    showMsg($y); // outputs 15

    function addFive($num)
    {
        $num += 5;
    }

    function addSix(&$num)
    {
        $num += 6;
    }

    $orignum = 10;
    addFive($orignum);

    echo "Original Value is $orignum<br />";

    addSix($orignum);
    echo "Original Value is $orignum<br />";

    show("array");
    $array = array("ricolwang", "wangxinghe", "qianchunyan");
    foreach ($array as $value)
    {
        showMsg($value . "<br />");
    }

    show("function: array_push");
    array_push($array, "RICOLWANG", "WANGXINHGE", "QIANCHUNYAN");
    foreach ($array as $value)
    {
        showMsg($value . "<br />");
    }

    show('hash');
    $hash = array("ricolwang" => 32, "wangxinghe" => 31, "qianchunyan" => 28);
    foreach ($hash as $key => $value)
    {
        showMsg($key . " => " . $value . "<br />");
    }

    show('added new key value pairs to the hash');
    $hash["WANGXINGHE"] = 32;
    $hash["RICOLWANG"] = 20;

    foreach ($hash as $key => $value)
    {
        showMsg($key . " => " . $value . "<br />");
    }

    show("globals");

    $data = array(
        $GLOBALS,
        $_SERVER,
        $_REQUEST,
        $_POST,
        $_GET,
        $_FILES,
        $_ENV,
        $_COOKIE,
        $_SESSION);

    $count = 0;
    foreach ($data as $value)
    {
        $count++;
        showMsg("Index: $count");
        foreach ($value as $item)
        {
            show($item);
        }
    }

    show("json");

    $data = array(
        "library" => "Odegaard",
        "category" => "fantasy",
        "year" => 2012,
        "books" => array(
            array("title" => "Harry Potter", "author" => "J.K. Rowling"),
            array("title" => "The Hobbit", "author" => "J.R.R. Tolkien"),
            array("title" => "Game of Thrones", "author" => "George R. R. Martin"),
            array("title" => "Dragons of Krynn", "author" => "Margaret Weis"),
        )
    );

    show("to json string");
    $strJson = json_encode($data);
    print $strJson;
    show("to json object");
    $jsonObject = json_decode($strJson);

    foreach ($jsonObject as $key => $value)
    {
        showMsg("$key => $value");
    }

    show("phpinfo()");
    phpinfo();
    
    class Person
    {
        var $name;
        var $age;
        
        function __construct($name, $age)
        {
            $this->$name = $name;
            $this->$age = $age;
        }
        
        function __destruct()
        {
            ;
        }
        
        function speak()
        {
            
        }
        
        function show()
        {
            echo("<li>");
            echo("<ol>$name</ol");
            echo("<ol>$age</ol");
            echo("</li>");
        }
    }
    
    $aPerson = new Person();
    $aPerson->$name = "ricol";
    $aPerson->$age = 32;
    $aPerson->show();
    
    require('footer.php');
?>

