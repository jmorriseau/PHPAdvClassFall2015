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
        <title>Display Uploads</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        
        $util = new Util();
        $errors = array();

        if ($util->isPostRequest()) {
            
            $filename = filter_input(INPUT_POST, 'filename');

            try {
                $scarlet = new Remove();
                $scarlet->removeFile($filename);
                $message = 'File was deleted successfully.';
            } catch (Exception $ex) {
                $errors[] = $ex->getMessage();
            }
        }
        
        $directory = scandir('./uploads');
        ?>

        
            <table class="table">
                <thead><td> File Name </td><td>File Type</td><td>File Size</td></thead>
                    <?php foreach ($directory as $file) : ?>
                        <?php if (!is_dir($file)) : ?>
                            <?php 
                            $finfo = new finfo(FILEINFO_MIME_TYPE);
                            $size = filesize('./uploads/' . $file);                            
                            ?>
                            <tr>
                                <td><a href="./uploads/<?php echo basename($file);  ?>" target="_blank"> <?php echo basename($file);  ?> </a></td>
                                <?php $type = $finfo->file('./uploads/' . $file);?>
                                <td> <?php echo $type ?> </td> 
                                <td> <?php echo $size ?> </td>
                                <td> 
                                    <form action="#" method="POST">
                                        <input class="btn" type="submit" value="Delete" />
                                        <input type="hidden" value="<?php echo basename($file) ?>" name="filename"/>
                                    </form>
                                </td>
                            </tr>

                                                
                        <?php endif; ?>
                    <?php endforeach; ?>

            </table>

        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        <br />
        <div><a href="./index.php">Add files</a></div>


    </body>
</html>
