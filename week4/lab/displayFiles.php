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
        $directory = scandir('./uploads');
        ?>

        <table class="table"><thead><td> File Name </td><td>File Type</td><td>File Size</td></thead>
                <?php foreach ($directory as $file) : ?>
                    <?php if (!is_dir($file)) : ?>
                        <?php
                        echo '<tr><td><a href="./uploads/' . $file . '" target="_blank">' . basename($file) .'</a></td>';
                        $img = getimagesize('./uploads/' . $file);
                        echo '<td>' . $img['mime'] . '</td>';
                        $size = filesize('./uploads/' . $file);
                        echo '<td>' . $size . '</td>';
                        echo '<td> <button class="btn">Delete</button> </td></tr>'
                        ?>                      
                    <?php endif; ?>
                <?php endforeach; ?>
        
        </table>


</body>
</html>
