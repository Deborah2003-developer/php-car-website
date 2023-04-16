<?php
require "db_connect.php";
require "../includes/sessions.php";


if (!isset($_POST['upload_picture'])) {
    $_SESSION['error_msg'] = "Fill the form to continue!";
    header("Location: logout");
}else{
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpLoc = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $ext = explode(".",$fileName);
    // $ext = array_pop($ext);
    $ext = end($ext);
    $ext  = strtolower($ext);
    $allowedFiles = ['jpg','jpeg','png','gif','webp'];

    

    if (!in_array($ext, $allowedFiles)) {
        $_SESSION['error_msg'] = "Invalid file type, file must either be jpg, jpeg, png, gif, or webp!";
        header("Location: ../../users/edit");
    }
    elseif ($fileError != 0) {
        $_SESSION['error_msg'] = "File is corrupted!";
        header("Location: ../../users/edit");
    }
    elseif ($fileSize > 5000000) {
        $_SESSION['error_msg'] = "File is too large. max: 5mb!";
        header("Location: ../../users/edit");
    }else{
        // Generate a new name for the file
        //   echo  $fileNewName = time().$ext;
        //   echo  $fileNewName = rand(1,999999999999).'.'.$ext;

        $fileNewName = "profile".$_SESSION['user'].'.'.$ext;
        $location = "../images/uploads/";

        if (!move_uploaded_file($fileTmpLoc, $location.$fileNewName)) {
            $_SESSION['error_msg'] = "Failed to upload file!";
            header("Location: ../../users/edit");
        }else{
            $sql = "UPDATE users SET avatar = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt, "si", $fileNewName, $_SESSION['user']);
            $execute = mysqli_stmt_execute($stmt);
           
            if ($execute) {
                $_SESSION['success_msg'] = "Upload Successful!";
                header("Location: ../../users/edit");
           }else{
                $_SESSION['error_msg'] = "Oops, Something went wrong!";
                header("Location: ../../users/edit");
           }
        }
    }
}