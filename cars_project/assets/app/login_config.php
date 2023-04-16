<?php
require "db_connect.php";
require "../includes/sessions.php";

if (!isset($_POST['login'])) {
    $_SESSION['error_msg'] = "Fill the form to continue!";
    header("Location: ../../login");
} else {
    // 1. Collect the data
    $email = $_POST['email'];
    $password = $_POST['password'];


    // 2.   Check for empty fields
    if (trim($email) === "" || trim($password) === "") {
        $_SESSION['error_msg'] = "Fields can not be empty!";
        header("Location: ../../login");
    }
    // 3.  Checked for valid email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_msg'] = "Invalid Email!";
        header("Location: ../../login");
    }else{

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        $execute = mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $numRow = mysqli_num_rows($result);

        $row = mysqli_fetch_assoc($result);

        // 4. Check if the email exists
        if($numRow < 1){
            $_SESSION['error_msg'] = "Account does not exist!";
            header("Location: ../../login");
        }
        elseif (!password_verify($password, $row['passwords'])) {
            $_SESSION['error_msg'] = "Incorrect Password!";
            header("Location: ../../login");
        }else{
            $_SESSION['user'] =  $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['success_msg'] = "Welcome to your dashboard ". $row['full_name'];

            if ($row['role'] === 'admin') {
                header('Location: ../../admin/dashboard');
            }else{
                header('Location: ../../users/dashboard');
            }
        }

    }
}
