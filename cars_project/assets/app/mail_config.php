<?php
require "db_connect.php";
require "../includes/sessions.php";


if (!isset($_POST['send'])) {
    $_SESSION['error_msg'] = "Fill the form to continue!";
    header("Location: ../../contact");
} else {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // $message = wordwrap($message, 70, "\n\r");

    // $to = "info@earlycode.net";
    $to = $email;

    // $headers = "From: support@cars.com";
    // $headers = "From: Cars <support@cars.com>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= "From: Cars <support@cars.com>" . "\r\n";

    $mail = mail($to, $subject, $message, $headers);

    if ($mail) {
        $_SESSION['success_msg'] = "Message has been sent!";
        header("Location: ../../contact");
    } else {
        $_SESSION['error_msg'] = "Oops, Something went wrong!";
        header("Location: ../../contact");
    }
}
