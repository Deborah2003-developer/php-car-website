<?php
     require "db_connect.php";
    require "../includes/sessions.php";

     date_default_timezone_set("Africa/Lagos");

    if (!isset($_POST['register'])) {
        $_SESSION['error_msg'] = "Fill the form to continue!";
       header("Location: ../../register");
    }else{
       $fullName = $_POST['fname'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];
       $gender = $_POST['gender'];
       $password = $_POST['password'];
       $c_password = $_POST['c_password'];
     //  echo $date = date("Y-m-d h:i:s");
       $date = date("Y-m-d");
 
        // 1.   Check for empty fields
       if (trim($fullName) === "" || trim($email) === "" || trim($phone) === "" || trim($gender) === "" ) {
            $_SESSION['error_msg'] = "Field can not be empty!";
            header("Location: ../../register");
       }
       
       // 4. Check if the email exists
       
       elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error_msg'] = "Invalid Email!";
            header("Location: ../../register");
       }

          // 2.  Checked for valid email
          $sql = "SELECT * FROM users WHERE email = ?";
          $stmt = mysqli_stmt_init($connectDB);
          mysqli_stmt_prepare($stmt,$sql);
          mysqli_stmt_bind_param($stmt, "s", $email);
          $execute = mysqli_stmt_execute($stmt);
   
          $result = mysqli_stmt_get_result($stmt);
          $numRow = mysqli_num_rows($result);
       if($numRow > 0){
               $_SESSION['error_msg'] = "Account already exist!";
               header("Location: ../../register");
          
       }
     // 3.  Check password length
       elseif (strlen($password) < 8){
            $_SESSION['error_msg'] = "Password too short!";
            header("Location: ../../register");
       }
     // 4.  Check if passwords match
       elseif ($password !== $c_password){
        $_SESSION['error_msg'] = "Passwords do not match!";
        header("Location: ../../register");
       }
       else{
          // 5. Encrypt the password
          $hash = password_hash($password, PASSWORD_DEFAULT);

          // 6.  Save the Data

          // a. Write out the SQL command
          $sql = "INSERT INTO users(full_name,email,phone,gender,passwords,created_at) VALUES(?,?,?,?,?,?)";

          // b.Initialize connection to database
          $stmt = mysqli_stmt_init($connectDB);
          // c. Prepare connection with sql
          mysqli_stmt_prepare($stmt,$sql);
          
          // d. Bind the values to the statements
          mysqli_stmt_bind_param($stmt,"ssssss", $fullName,$email,$phone,$gender,$hash,$date);
          $execute = mysqli_stmt_execute($stmt);

          if ($execute) {
               $_SESSION['success_msg'] = "Account created successfully!";
               header("Location: ../../register");
          }else{
               $_SESSION['error_msg'] = "Oops, Something went wrong!";
               header("Location: ../../register");
          }


       }
       
    }
// 