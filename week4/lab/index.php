<?php
require_once './autoload.php';
?>

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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <!--        //templates-->
        <form enctype="multipart/form-data" action="#" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="uploadfile" type="file" />
            <input type="submit" value="Save file" />
        </form>
        <?php
        
        $util = new Util();

        $errors = array();

        if ($util->isPostRequest()) {          
            
            try {
                $fileuploaded = new FileUpload();
                $keyName = 'uploadfile';
                $fileuploaded->addFile($keyName);
                $message = 'File is uploaded successfully.';
            } catch (Exception $ex) {
                $errors[] = $ex->getMessage();
            }
                        
        }
        ?>
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
    </body>
</html>
