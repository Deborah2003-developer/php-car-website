<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Car Rentals</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/logo.png">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="assets/fontawsome/css/all.css">
</head>

<body class="bg-black">
    
    <!-- Navbar -->
    <section>
        <?php include_once "assets/includes/nav.php"; ?>
    </section>


    <!-- Carousel Section -->
    <section>
        <div id="carouselExampleCaptions" class="carousel index-carousel carousel-fade slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item position-relative active">
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
                    <img src="assets/images/slide-1.jpg" class="d-block w-100" alt="slide-1">
                    <div class="carousel-caption">
                        <h5 class="fs-1">Get The Car Of Your Dreams Today</h5>
                        <a href="login" class="btn btn-primary btn-lg rounded-pill">Get Started</a>
                    </div>
                </div>
                <div class="carousel-item position-relative ">
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
                    <img src="assets/images/slide-2.jpg" class="d-block w-100" alt="slide-1">
                    <div class="carousel-caption">
                        <h5 class="fs-1">Make Your Dreams Come True Today</h5>
                        <a href="login" class="btn btn-primary btn-lg rounded-pill">Get Started</a>
                    </div>
                </div>
                <div class="carousel-item position-relative ">
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
                    <img src="assets/images/slide-3.jpg" class="d-block w-100" alt="slide-1">
                    <div class="carousel-caption">
                        <h5 class="fs-1 text-capitalize">We are here to serve you </h5>
                        <a href="login" class="btn btn-primary btn-lg rounded-pill">Get Started</a>
                    </div>
                </div>
             
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>