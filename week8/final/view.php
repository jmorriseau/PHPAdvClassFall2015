<?php
include './autoload.php';
include './templates/login_signup.html.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Page</title>        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        
        <!--for facebook share-->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
<?php

$logout = filter_input(INPUT_GET, 'logout');

if ($logout == 1) {
    $_SESSION['user_id'] = null;
}

if (!isset($_SESSION['user_id'])) {
        echo'<div id="header_right">';
        echo '<input type="button" value="Log in" id="login" />';
        echo '<input type="button" value="Sign up" id="sign_up" />';
        echo '</div>';
} else if (isset($_SESSION['user_id'])) {
    echo '<div class="logout"><a href="?logout=1">Logout</a></div>';
}
?>
        <!--log in and sign up buttons-->
<!--        <div id="header_right">
            <input type="button" value="Log in" id="login" />
            <input type="button" value="Sign up" id="sign_up" />
        </div>-->
        <!--end log in and sign up-->

        <!-- not needed but he had one on his-->
<!--        <p><a href=".">Home</a></p>-->

        <?php
        $files = array();
        $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
        $dir = new DirectoryIterator($directory);
        foreach ($dir as $fileInfo) {
            if ($fileInfo->isFile()) {
                $files[$fileInfo->getMTime()] = $fileInfo->getPathname();
            }
        }

        //sort the files by latest upload first
        krsort($files);
        //ksort($files);
        ?>
        <!--        display each file -->
        <div class="view_table">
            <?php
            foreach ($files as $key => $path):
                ?> 
                <div class="meme"> 
                    <img src="<?php echo $path; ?>" /> <br />
                    <?php echo date("l F j, Y, g:i a", $key); ?>
                    <!-- Place this tag where you want the share button to render. -->
                    <div class="g-plus" data-action="share" data-href="<?php echo $path; ?>"></div> 
                    <div class="mail"><a href='mailto:?subject=I wanted you to see this image&amp;body=Check out this site" . <?php echo $path; ?> "'
                                         title="Share by Email">
                            <img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png">
                        </a></div>
                    <div class="fb-share-button" data-href="<?php echo $path; ?>" data-layout="button_count"></div>
                </div>

            <?php endforeach; ?>
        </div>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>

        <script>
            $("#login").on("click", function () {
                $("#login_popup").css({"top": $("#login").position().top + 40, "right": 15}).show();
            });

            $("#sign_up").on("click", function () {
                $("#signup_popup").css({"top": $("#sign_up").position().top + 40, "right": 15}).show();
            });
        </script>
    </body>
</html>