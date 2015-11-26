<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            function showRef($page)
            {
                echo("<a href='$page'>$page</a><br />");
            }

            echo("<h3>Welcome!</h3>");

            showRef('form.php');
            showRef('test.php');
            showRef('login.php');
            showRef('logout.php');
            showRef('curl.php');
            showRef('xml.php');
        ?>

        <?php
            $xml = file_get_contents('http://weather.yahooapis.com/forecastrss?p=USNY0996');
            $data = simplexml_load_string($xml);
            echo $data;
        ?>
    </body>
</html>
