<?php
session_start();

include 'connection.php';

if (!isset($_SESSION['login_user'])) {

  header("location: login.php");
}

$b_login_id=$_GET['passanger_login_id'];



$data=mysqli_query($conn,"SELECT * FROM booking_tb JOIN passanger_tb ON booking_tb.passanger_id=passanger_tb.login_id JOIN payment_tb ON payment_tb.booking_id=booking_tb.id ");


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>booking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
   <?php include 'header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'sidebar.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Payment Details</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        </ul>
      </div>



         <!--    <?php if(isset($_SESSION['msg_success'])) 
            { ?>
            <div class="alert alert-success" role="alert">
  <?php  echo $_SESSION['msg_success']; ?>

</div>
<?php unset($_SESSION['msg_success']); } ?> -->


      <!--  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
           <a href="add_buses.php"><button class="btn btn-primary"  type="submit">ADD BUSES</button></a>
            </div></div></div></div></div> -->

       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Sl.no</th>
                      <th>Passanger Name</th>
                      <th>Source</th>
                      <th>Destination</th>
                      <th>Amound</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>

                     <?php
                  $count=0;

                  while($row = mysqli_fetch_assoc($data)) {

                   $count++; ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['starting_point']; ?></td>
                      <td><?php echo $row['ending_point']; ?></td>
                      <td><?php echo $row['amound']; ?></td>
                      
                      
                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div></div></div></div></div>
     
    </main>
   <?php include 'script.php'; ?>
  </body>
</html>