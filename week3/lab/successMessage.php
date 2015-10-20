<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Success Messages</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="bg-success">
            <?php
            include './models/IMessage.php';
            include './models/Message.php';
            include './models/SuccessMessage.php';

            $successMessage = new SuccessMessage();

            $successMessage->addMessage('test', 'my test message');

            var_dump($successMessage->getAllMessages());

            var_dump($successMessage instanceof IMessage);

            var_dump($successMessage->removeMessage('test'));

            var_dump($successMessage->getAllMessages());
            ?>
        </div>
    </body>
</html>
