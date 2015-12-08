<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>        
    </head>
    <body>
        <?php
        
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $signupField = filter_input(INPUT_POST, 'signup');


        $util = new Util();
        $validtor = new Validator();
        $signup = new Signup();

        $errors = array();

        if ($util->isPostRequest() && $signupField !== null) {

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not valid';
            }
            if ($signup->emailExists($email)) {
                $errors[] = 'Email already exists';
            }
            if (!$validtor->passwordIsValid($password)) {
                $errors[] = 'Password cannot be empty';
            }


            if (count($errors) <= 0) {

                if ($signup->save($email, $password)) {
                    $message = 'Signup complete. Please <a href="index.php">Log in</a>.';
                } else {
                    $message = 'Signup failed';
                }
            }
        }
        ?>

        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>  
        <?php include './templates/signup-form.php'; ?>

    </body>
</html>
