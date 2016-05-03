<head>
    <title>PHP ANPS Testing</title>
</head>

<body>
    <?php
    require('header.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //push notification
        $message = $_POST["message"];
        $deviceToken = $_POST["deviceToken"];

        if (!empty($message) && !empty($deviceToken))
        {
            sendNotification($message, $deviceToken);
        }
    } else
    {
        //display the form
        ?>
        <h2>Apple Push Notification Control </h2>

        <form method="post" action="APNS.php">
            <table>
                <tr>
                    <td>Message:</td> 
                    <td><input type="text" name="message"></td>
                </tr>

                <tr>
                    <td>Device Token:</td>
                    <td> <input type="text" name="deviceToken"></td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit"> 
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }

    function show($message)
    {
        echo "<h3>$message</h3>";
    }

    function sendNotification($message, $deviceToken)
    {
        show("Sending $message to $deviceToken...");
        $PASSPHRASE = 'appscore';
        $PEM = 'ck.pem';

        if (!file_exists($PEM))
        {
            show($PEM . " doesn't exist.");
            return;
        }

        if (!is_readable($PEM))
        {
            show($PEM . " is not readable!");
            return;
        }

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $PEM);
        stream_context_set_option($ctx, 'ssl', 'passphrase', $PASSPHRASE);
        $fp = stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
        if ($fp)
        {
            $body['aps'] = array(
                'alert' => $message,
                'sound' => 'default'
            );
            $payload = json_encode($body);
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
            $result = fwrite($fp, $msg, strlen($msg));
            fclose($fp);

            if (!$result)
                show('Message not delivered' . PHP_EOL);
            else
                show("Message: $message delived to: $deviceToken");
        }else
        {
            show("Failed to connect: $err $errstr" . PHP_EOL);
        }
    }

    require('footer.php');
    ?>
</body>
</html>