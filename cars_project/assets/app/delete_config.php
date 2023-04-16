<?php
require "db_connect.php";
require "../includes/sessions.php";


if (!isset($_POST['delete']) || $_SESSION['role'] != 'admin') {
    $_SESSION['error_msg'] = "Fill the form to continue!";
    header("Location: logout");
}else{
    $id = $_POST['delete'];
    // $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id = ? AND role != 'admin' ";
    $stmt = mysqli_stmt_init($connectDB);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    $execute = mysqli_stmt_execute($stmt);
   
    if ($execute) {
        $_SESSION['success_msg'] = "Account deleted successfully!";
        header("Location: ../../admin/dashboard");
   }else{
        $_SESSION['error_msg'] = "Oops, Something went wrong!";
        header("Location: ../../admin/dashboard");
   }

}