<?php
require "db_connect.php";
require "../includes/sessions.php";


if (!isset($_POST['update'])) {
    $_SESSION['error_msg'] = "Fill the form to continue!";
    header("Location: logout");
} else {
    $fullName = $_POST['fname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    if (trim($fullName) === "" || trim($phone) === "" || trim($gender) === "" ) {
        $_SESSION['error_msg'] = "Field can not be empty!";
        header("Location: ../../users/edit");
   }else{
        $sql = "UPDATE users SET full_name = ?, phone = ?, gender = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "sssi", $fullName,$phone,$gender, $_SESSION['user']);
        $execute = mysqli_stmt_execute($stmt);
       
        if ($execute) {
            $_SESSION['success_msg'] = "Account updated successfully!";
            header("Location: ../../users/edit");
       }else{
            $_SESSION['error_msg'] = "Oops, Something went wrong!";
            header("Location: ../../users/edit");
       }
   }
}
