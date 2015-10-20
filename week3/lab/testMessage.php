<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Messages</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="bg-primary">
        <?php
        include './models/IMessage.php';
        include './models/Message.php';

        $message = new Message();

        $message->addMessage('test', 'my test message');

        var_dump($message->getAllMessages());

        var_dump($message instanceof IMessage);

        var_dump($message->removeMessage('test'));

        var_dump($message->getAllMessages());
        ?>
        </div>
    </body>
</html>
