<?php  
    require "assets/includes/sessions.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | My Car Rentals</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/logo.png">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="assets/fontawsome/css/all.css">
</head>

<body class="bg-black background">
<div class="overlay position-absolute w-100 h-100 top-0 start-0"></div>
    <!-- Navbar -->
    <section>
        <?php include_once "assets/includes/nav.php"; ?>
    </section>


    <!-- Form -->
    <section class="container">
        <div class="card bg-card rounded-3">
            <div class="row">
                <div class="col-lg-6 mb-2 d-none d-lg-block">
                    <img src="assets/images/login.jpg" alt="" class="img-fluid h-100">
                </div>
                <div class="col-lg-6 my-4 d-flex justify-content-center align-items-center">
                    <form class="card form-card" method="POST" action="assets/app/login_config.php">
                        <?php echo errorMsg(); echo successMsg(); ?>
                        <h5 class="text-center card-header">Hello Again!, Login to your account</h5>
                        <div class="card-body">

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <button type="submit" name="login" class="btn btn-primary my-3 w-100">Login</button>
                        </div>

                        <div class="card-footer">
                            <p class="fs-6 text-black">Don't have an account? <a href="register">Create an Account</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>