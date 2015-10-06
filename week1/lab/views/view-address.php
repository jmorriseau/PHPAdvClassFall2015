<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../functions/dbconnect.php';
        require_once '../functions/util.php';

        $addresses = getAllAddresses();

        if ( count($addresses) > 0 ) {
            echo '<table class="table">';
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
            echo '</table>';
        } else {
            echo 'No results found';
        }
        ?>


    </body>
</html>

