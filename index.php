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
        echo("<h3>Welcome!</h3>");

        foreach (['form.php', 'test.php', 'login.php', 'logout.php', 'curl.php', 'xml.php', 'auth.php', 'basicAuth.php',
        'digestAuth.php', 'APNS.php', 'namespace.php', 'datastructure.php', 'oop.php', 'syntax.php'] as $file)
            echo("<a href='$file'>$file</a><br />");
        ?>
    </body>
</html>
