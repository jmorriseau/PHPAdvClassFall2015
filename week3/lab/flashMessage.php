<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Flash Messages</title>
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
            
             /*$_SESSION['flashmessages'] = array(
                 'testing' => 'FlashMessage test'
                 );*/
            
            include './models/IMessage.php';
            include './models/Message.php';
            include './models/FlashMessage.php';

            $flashMessage = new FlashMessage();

            $flashMessage->addMessage('test', 'my test message');


            var_dump($flashMessage->getAllMessages());

            var_dump($flashMessage instanceof IMessage);

            var_dump($flashMessage->removeMessage('test'));

            var_dump($flashMessage->getAllMessages());
            
            print_r($_SESSION)
            ?>
        </div>
    </body>
</html>
