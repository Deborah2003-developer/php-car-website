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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit | Cars</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawsome/css/all.css" />
</head>

<body class="bg-light">
    <!-- Navbar -->
    <?php include_once "../assets/includes/dash-nav.php" ?>

    <section class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <form method="POST" action="../assets/app/picture_upload.php" enctype="multipart/form-data" class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img 
                        class="rounded-circle mt-5" 
                        width="150px"
                        height="150px" 
                        src="../assets/images/uploads/<?php echo $row['avatar'].'?'.mt_rand(); ?>" />
                    <span class="font-weight-bold"> <?php echo $row['full_name']; ?>
                    </span>
                    <span class="text-black-50"><?php echo $row['email']; ?>
                    </span>

                    <div class="input-group">
                        <input type="file" name="file"  class="form-control">
                        <button name="upload_picture" type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
            <form method="POST" action="../assets/app/update_config.php" class="col-md-8 border-right">

                <div class="p-3 py-5 mt-5">
                    <?php echo successMsg();
                    echo errorMsg(); ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $row['full_name']; ?>" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-2">
                            <label class="labels">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" />
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="labels">Gender</label>
                            <select name="gender" id="" class="form-select">
                                <option>Male</option>
                                <option>Female</option>
                                <option selected><?php echo $row['gender']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" name="update">
                            Save Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>