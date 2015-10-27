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
    </head>
    <body>
        <?php
        // put your code here
        
        //DIRECTORY_SEPARATOR 
        
        $directory = scandir('./uploads');

        
        ?>
        
        
        <?php foreach( $directory as $file) : ?>
            <?php if(!is_dir($file)) : ?>
        <?php echo 'File name ' . basename($file);
        echo 'File size ' . filesize($directory);
        
        ?>
<!--                <img src="./uploads///<?php echo $file;?>" />-->
            <?php endif; ?>
        <?php endforeach; ?>
    </body>
</html>
