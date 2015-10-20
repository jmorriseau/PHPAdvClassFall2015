<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Messages</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="bg-danger">
            <?php
            include './models/IMessage.php';
            include './models/Message.php';
            include './models/ErrorMessage.php';

            $errorMessage = new ErrorMessage();

            $errorMessage->addMessage('test', 'my test message');


            var_dump($errorMessage->getAllMessages());

            var_dump($errorMessage instanceof IMessage);

            var_dump($errorMessage->removeMessage('test'));

            var_dump($errorMessage->getAllMessages());
            ?>
        </div>
    </body>
</html>
