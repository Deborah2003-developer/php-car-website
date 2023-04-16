<?php
  require "../assets/app/db_connect.php";
  require "../assets/includes/sessions.php";

  checkForLogin();

  $id =  $_SESSION['user'];


  $sql = "SELECT * FROM users WHERE id = '$id' ";
  $query  = mysqli_query($connectDB, $sql);
  $row  = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Cars</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawsome/css/all.css">
</head>

<body>
    <!-- Navbar -->
    <section>
     <?php include_once "../assets/includes/dash-nav.php" ?>
    </section>

    <section class="pt-5 bg-light vh-100">
        <div class="container py-5">
    
          <?php echo successMsg(); echo errorMsg();  ?>
          <div class="row mt-5">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                    <img 
                        class="rounded-circle mt-5" 
                        width="150px"
                        height="150px" 
                        src="../assets/images/uploads/<?php echo $row['avatar'].'?'.mt_rand(); ?>" />
                  <h5 class="my-3"><?php echo $row['full_name']; ?></h5>
                  <p class="text-muted mb-1"><?php echo $row['role']; ?></p>
                  
                  <div class="d-flex justify-content-center mb-2">
                    <a href="edit" class="btn btn-primary">Edit Profile</a>
                    <a href="#" class="btn btn-outline-primary ms-1">Rent a Car</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['full_name']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['email']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['phone']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['gender']; ?></p>
                    </div>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>