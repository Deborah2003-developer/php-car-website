<?php
  require "../assets/app/db_connect.php";
  require "../assets/includes/sessions.php";

  adminCheck();
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
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="row">Full Name</th>
                    <th scope="row">Email</th>
                    <th scope="row">Phone</th>
                    <th scope="row">Registration Date</th>
                    <th scope="row">
                      <i class="fas fa-eye"></i>
                    </th>
                    <th scope="row">
                      <i class="fas fa-trash-alt text-danger"></i>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                      $sql = "SELECT * FROM users WHERE role != 'admin' ORDER BY id DESC LIMIT 20";
                      $query = mysqli_query($connectDB, $sql);
                     while ($row = mysqli_fetch_assoc($query)) {
                  ?>  

                    <tr>
                      <td><?php echo $row['full_name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['created_at']; ?></td>
                      <td>
                        <a href="profile?user=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
                      </td>
                      <td>
                        <form action="../assets/app/delete_config.php" method="post" onsubmit="return confirm('Are you sure you wan to delete <?php echo strtoupper($row['full_name']) ?> account?')">
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
                          <button class="btn btn-danger" name="delete" value="<?php echo $row['id'] ?>" >Delete</button>
                        </form>
                      </td>
                    </tr>
                  
                  <?php } ?>
                </tbody>
              </table>
            </div>

        </div>
      </section>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>