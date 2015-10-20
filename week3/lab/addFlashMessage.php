<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a Flash Message</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="bg-info message-box">
            <?php
            session_start();

            include './models/IMessage.php';
            include './models/Message.php';
            include './models/FlashMessage.php';

            $message = new FlashMessage();

            $message->addMessage('help', 'fix this, please');

            var_dump($message instanceof IMessage);
            ?>
        </div>
    </body>
</html>
