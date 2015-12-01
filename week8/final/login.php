<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
    </head>
</head>
<body>
    <?php
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');


    $util = new Util();
    $validtor = new Validator();
    $login = new Login();

    $errors = array();

    if ($util->isPostRequest()) {
        if (!$validtor->emailIsValid($email)) {
            $errors[] = 'Email is not valid';
        }
        if (!$validtor->passwordIsValid($password)) {
            $errors[] = 'Password cannot be empty';
        }
        if (count($errors) <= 0) {

            $user_id = $login->verify($email, $password);
            if ($user_id > 0) {
                $_SESSION['user_id'] = $user_id;
                header('Location:add_image.php');
            } else {
                $message = 'Log in failed';
            }
        }
    }
    ?>

    <?php include './templates/errors.html.php'; ?>
    <?php include './templates/messages.html.php'; ?>
    <?php include './templates/login-form.html.php'; ?>
    
</body>
</html>
