<?php
// put your code here

require_once '../functions/dbconnect.php';
require_once '../functions/util.php';


$fullname = filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$birthday = filter_input(INPUT_POST, 'birthday');

$zipRegex = '/^[0-9]{5}(?:-[0-9]{4})?$/';
$nameRegex = '/^[A-Z][-a-zA-Z]+$/';
$addressRegex = '/^([0-9]+ )?[a-zA-Z ]+$/';
$cityRegex = '/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/';
$isValid = true;
$error = array();


if (isPostRequest()) {

    if (empty($fullname)) {
        $error[] = 'Full name is required.';
    } else if (!preg_match($nameRegex, $fullname)) {
        $error[] = 'Name is in an invalid format.';
    }

    if (empty($email)) {
        $error[] = 'Email is required.';
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $error[] = 'Invalid email address.';
    }

    if (empty($address)) {
        $error[] = 'Adress Line 1 is required.';
    } else if (!preg_match($addressRegex, $address)) {
        $error[] = 'Addreess Line 1 is in an invalid format.';
    }

    if (empty($city)) {
        $error[] = 'City is required.';
    } else if (!preg_match($cityRegex, $city)) {
        $error[] = 'City is in an invalid format.';
    }

    if (empty($state)) {
        $error[] = 'State is required.';
    }

    if (empty($zip)) {
        $error[] = 'ZIP is required.';
    } else if (!preg_match($zipRegex, $zip)) {
        $error[] = 'ZIP code is in an invalid format.';
    }

    if (empty($birthday)) {
        $error[] = 'Birthday is a required field.';
    } else if (!is_null($birthday)) {
        date("F j, Y, g:i a", strtotime($birthday));
    }

    if (is_array($error) && count($error) > 0) {
        $isValid = false;
        foreach ($error as $err) {
            echo '<div class="alert alert-warning alert-size"><p>', $err, '</p></div>';
        }
    }

    if ($isValid) {
        addAddress($fullname, $email, $address, $city, $state, $zip, $birthday);
        echo '<div class="alert alert-success alert-size"><p>Address Added</p></div>';
        $fullname = '';
        $email = '';
        $address = '';
        $city = '';
        $state = '';
        $zip = '';
        $birthday = '';
    }
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../main.css" type="text/css">
<div class="main">
    <h1>Add an Address</h1>
    <div class="shift">
        <a href="../index.php">Click here</a> to go back to the main page.
    </div>
    <form action="#" method="post" role="form">   
        <div class="form-group">Full Name:</div> <input name="fullname" value="<?php echo $fullname ?>" class="form-control" />
        <div class="form-group">Email:</div> <input name="email" value="<?php echo $email ?>" class="form-control"/> <br />
        <div class="form-group">Address Line 1:</div> <input name="address" value="<?php echo $address ?>" class="form-control"/>
        <div class="form-group">City:</div> <input name="city" value="<?php echo $city ?>" class="form-control"/>
        <div class="form-group">State:</div> <input name="state" value="<?php echo $state ?>" class="form-control"/>
        <div class="form-group">ZIP:</div> <input name="zip" value="<?php echo $zip ?>" class="form-control"/>
        <div class="form-group">Birthday:</div> <input type="date" name="birthday" value="<?php echo $birthday ?>" class="form-control"/>
        <input type="submit" value="submit" class="btn btn-primary btn-move" />
    </form>
</div>
