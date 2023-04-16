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
            <?php echo errorMsg(); echo successMsg(); ?>
            <form action="assets/app/mail_config.php" method="POST">
                <input type="email" name="email" class="form-control form-control-lg mb-4" placeholder="Email">
                <input type="text" name="subject" class="form-control form-control-lg mb-4" placeholder="Subject">
                <textarea name="message" id="editor" class="form-control mb-4" style="height: 350px;"></textarea>
                <button name="send" type="submit" class="btn btn-success">Send</button>
            </form>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
</body>

</html>