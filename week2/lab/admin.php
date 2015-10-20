<?php
require_once './autoload.php';

$logout = filter_input(INPUT_GET, 'logout');

if ($logout == 1) {
    $_SESSION['user_id'] = null;
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
} else if (isset($_SESSION['user_id'])) {
    echo '<a href="?logout=1">Logout</a>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <p>You are on the admin page<p>

<?php ?>

            <!--<input type="submit" value="Log out" id="logout" class="btn btn-primary" />-->
    </body>
</html>



