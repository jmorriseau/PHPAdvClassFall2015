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
        
    if(empty($fullname)){
        $error[] = 'Full name is required.';
    }
    else if (!preg_match($nameRegex, $fullname))
    {
        $error[] = 'Name is in an invalid format.';
    }
    
    if(empty($email)){
        $error[] = 'Email is required.';
    }
    else if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
        $error[] = 'Invalid email address.';
    }
    
    if(empty($address)){
        $error[] = 'Adress Line 1 is required.';
    }
    else if (!preg_match($addressRegex, $address))
    {
        $error[] = 'Addreess Line 1 is in an invalid format.';
    }
    
    if(empty($city)){
        $error[] = 'City is required.';
    }
    else if (!preg_match($cityRegex, $city))
    {
        $error[] = 'City is in an invalid format.';
    }
    
    if(empty($state)){
        $error[] = 'State is required.';
    }
    
    if(empty($zip)){
        $error[] = 'ZIP is required.';
    }
    else if (!preg_match($zipRegex, $zip))
    {
        $error[] = 'ZIP code is in an invalid format.';
    }
    
    if(empty($birthday)){
        $error[] = 'Birthday is a required field.';
    }
    else if (!is_null($birthday)) {
            date("F j, Y, g:i a",strtotime($birthday));             
        }
    
    if (is_array($error) && count($error) > 0) {
        $isValid = false;
            foreach ($error as $err) {
                echo '<p>', $err, '</p>';
            }
        }
    
    if ($isValid){
        addAddress($fullname, $email, $address, $city, $state, $zip, $birthday);
        echo 'Address Added';
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

<div class="container">
    <h1>Add an Address</h1>
    <form action="#" method="post">   
        Full Name: <input name="fullname" value="<?php echo $fullname ?>" /> <br />
        Email: <input name="email" value="<?php echo $email ?>" /> <br />
        Address Line 1: <input name="address" value="<?php echo $address ?>" /> <br />
        City: <input name="city" value="<?php echo $city ?>" /> <br />
        State: <input name="state" value="<?php echo $state ?>" /> <br />
        ZIP: <input name="zip" value="<?php echo $zip ?>" /> <br />
        Birthday: <input type="date" name="birthday" value="<?php echo $birthday ?>" /> <br />
        <input type="submit" value="submit" class="btn btn-primary" />
    </form>
</div>




