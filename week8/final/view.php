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
            echo '<div class="logout button"><a href="?logout=1">Logout</a></div>';
            echo '<div class="action_btn button"><a href="add_image.php">Upload Image</a></div>';
        }
        ?>
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
        ?>

        <?php
        if (!isset($_SESSION['user_id'])) {
            echo '<div class="view_table">';

            foreach ($files as $key => $path) {
                echo '<div class=meme>';

                echo '<img src="' . $path . '" /> <br />';
                echo date("l F j, Y, g:i a", $key);
                echo '<div class="g-plus" data-action="share" data-href="' . $path . '"></div>';
                echo '<div class="mail"> <a href="mailto:?subject=I wanted you to see this image&amp;body=Check out this site"' . $path . '"title="Share by Email">
                            <img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png">
                        </a>
                    </div>';
                echo '<div class="fb-share-button" data-href="' . $path . '" data-layout="button_count"></div>';
                echo '</div>';
            }

            echo '</div>';
        } else if (isset($_SESSION['user_id'])) {
            $util = new Util();

            if ($util->isPostRequest()) {

                $filename = filter_input(INPUT_POST, 'filename');

                $removeFromFolder = new Remove();
                $removeFromFolder->removeFile($filename);
                $removeFromDB = new Login();
                $removeFromDB->removeUserPhotos($filename);
            }

            $results = new Login();
            $userPhotos = array();

            $userPhotos = $results->getUserPhotos($_SESSION['user_id']);
            if ($userPhotos) {
                echo '<div class="view_table">';
                
                foreach ($userPhotos as $uPhoto) {
                    echo '<div class="meme">';
                    //echo '<p>User ID ' . $stuff['user_id'] . '<br />';
                    //echo 'Photo ID ' . $stuff['photo_id'] . '<br />';
                    echo '<img src="' . $directory . '\\' . $uPhoto['filename'] . '."/> <br />';
                    echo '<div class="g-plus" data-action="share" data-href="' . $directory . '\\' . $uPhoto['filename'] . '"></div>';
                    echo '<div class="mail"> <a href="mailto:?subject=I wanted you to see this image&amp;body=Check out this site"' . $directory . '\\' . $uPhoto['filename'] . 'title="Share by Email">'
                    . '<img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png"> </a> </div>';
                    echo '<div class="fb-share-button" data-href="' . $directory . '\\' . $uPhoto['filename'] . '" data-layout="button_count"></div><br /><br />';
                    echo '<form action="#" method="POST">
                        <input class="btn" type="submit" value="Delete" />
                        <input type="hidden" value="' . $uPhoto['filename'] . '" name="filename"/>
                      </form>';
                    echo '</div>';
                }
                
                echo '</div>';
            }
        }
        ?>



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