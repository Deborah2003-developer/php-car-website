<?php 
    // Require the sessions file
    require "assets/includes/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | My Car Rentals</title>
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
                    <img src="assets/images/register.jpeg" alt="" class="img-fluid h-100">
                </div>
                <div class="col-lg-6 my-4 d-flex justify-content-center align-items-center">
                    <form class="card form-card" method="POST" action="assets/app/register_config.php">
                        <!-- Echo the messages Message -->
                        <?php echo successMsg(); echo errorMsg();  ?>


                        <h5 class="text-center card-header py-4">Hello Again!, Login to your account</h5>
                        <div class="card-body">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="fname" id="floatingInput"
                                    placeholder="John Doe" required>
                                <label for="floatingInput">Full Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingInput" name="phone" placeholder="+1">
                                <label for="floatingInput">Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="gender" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>__Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <label for="floatingSelect">Gender</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" name="c_password">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>

                            <button type="submit" name="register" class="btn btn-primary my-3 w-100">Create Account</button>
                        </div>

                        <div class="card-footer">
                            <p class="fs-6 text-black">Already have an account? <a href="login">Login to your
                                    account</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>