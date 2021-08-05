<?php

require 'database/DataBase.php';

//$database = new DataBase($myconn);
if (isset($_POST['action']) and $_POST['action'] == "register") {
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pass']);
    $country = htmlentities($_POST['country']);
    $response =DataBase::register($email, $pass, $country);
    echo $response;

} else if (isset($_GET['action']) and $_GET['action'] == "login") {
    $email = htmlentities($_GET['email']);
    $pass = htmlentities($_GET['pass']);
    $response = DataBase::signin_user($email, $pass);
    echo $response;

} else

    if (isset($_POST['action']) and $_POST['action'] == "reset") {
        $email = htmlentities($_POST['email']);

        $isValidemail = DataBase::get_email("email", $email);
        if ($isValidemail) {
        $token = generate_token($email);
        $updateToken = DataBase::updateresetToken($token, $email);
        if ($updateToken) {
            $sub = "Password reset message from Erectone";
            $mess = "please click on the following link to reset your account password http://" . $_SERVER['SERVER_NAME'] . '/erect1/verifypassword/' . $token . " please ignore if you are not the one that requested for the password reset";
            $isSendMail = send_mail($email, $mess, $sub);
            if ($isSendMail) {
                echo "email has been sent to " . $email;
            } else {
                echo "email can not be sent for now try later";
            }

        } else {
            echo "You can not reset your password base on some security policy contact the costumer care";
        }

    } else {
        echo "Invalid Email Address";
    }

} else

if (isset($_POST['action']) and $_POST['action'] == "newpassword") {
    $password = htmlentities($_POST['password']);
    $token = htmlentities($_POST['token']);

    echo DataBase::updatePassword($token, $password);

}

if (
    isset($_POST['expdate'])
    and !empty($_POST['expdate'])
    and isset($_POST['ccv']) and
    !empty($_POST['ccv'])
    and
    isset($_POST['cnumber']) and
    !empty($_POST['cnumber'])
) {
    $response = DataBase::addcard(htmlentities($_POST['cnumber']), htmlentities($_POST['ccv']), htmlentities($_POST['expdate']));
    if ($response) {
        echo("<script>alert('Card Added');</script>");
        header("location:card");
    } else {
        echo("<script>alert('Card not save');</script>");
        header("location:card");

    }
}
if (isset($_POST['action']) and $_POST['action'] == "currency") {
    $currency = htmlentities($_POST['currency']);
    $_SESSION['currency'] = $currency;
}
if (isset($_POST['action']) and $_POST['action'] === "paystack") {
    $response = $_POST['response'];
    $ammount = htmlentities($_POST['amt']);
    $response = DataBase::updatetrans("dollar", $response, $ammount);
    echo $response;
}
if (isset($_POST['action']) and $_POST['action'] === "mainpay") {
    $response = $_POST['response'];
    $ammount = htmlentities($_POST['amt']);
    $response = DataBase::updatetrans("bit", $response, $ammount);
    echo $response;
}
