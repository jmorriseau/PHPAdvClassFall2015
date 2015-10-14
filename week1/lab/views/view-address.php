<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../main.css" type="text/css">
    </head>
    <body>
        <?php
        //include necessary files
        require_once '../functions/dbconnect.php';
        require_once '../functions/util.php';

        //get all the address records from the db and set them to an array
        $addresses = getAllAddresses();
        echo '<div class="main"><h1>Addresses </h1>
                    <div class="shift">
                        <a href="../index.php">Click here</a> to go back to the main page.
              </div>';
        //if there are address records display them in a table
        if (count($addresses) > 0) {
            echo '<table class="table table-bordered">';
            echo '<tr>';
            echo '<th>' . 'Full Name' . '</th>';
            echo '<th>' . 'Email' . '</th>';
            echo '<th>' . 'Address Line 1' . '</th>';
            echo '<th>' . 'City' . '</th>';
            echo '<th>' . 'State' . '</th>';
            echo '<th>' . 'ZIP' . '</th>';
            echo '<th>' . 'Birthday' . '</th>';
            echo '</tr>';
            foreach ($addresses as $value) {
                echo '<tr>';
                echo '<td>' . $value["fullname"] . '</td>';
                echo '<td>' . $value["email"] . '</td>';
                echo '<td>' . $value["addressline1"] . '</td>';
                echo '<td>' . $value["city"] . '</td>';
                echo '<td>' . $value["state"] . '</td>';
                echo '<td>' . $value["zip"] . '</td>';
                echo '<td>' . $value["birthday"] . '</td>';
                echo '</tr>';
            }
            echo '</table></div>';
        } else {
            echo 'No results found';
        }
        ?>

    </body>
</html>

