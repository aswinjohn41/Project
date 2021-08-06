<?php
session_start();

include 'connection.php';

if (!isset($_SESSION['login_user'])) {

  header("location: login.php");
}


if(isset($_POST['add_route']))
{
  $bus_name=$_POST['bus_name'];

  $starting_point=$_POST['starting_point'];
  
  $ending_point=$_POST['ending_point'];
  
  $time=$_POST['time'];

  $date=$_POST['date'];

  // $data1=mysqli_query($conn,"INSERT INTO login_tb(username,password,type) VALUES('$username','$password','conductor')");

  // $id=mysqli_insert_id($conn);




  $data=mysqli_query($conn,"INSERT INTO route_tb(bus_name,starting_point,ending_point,time,date) VALUES('$bus_name','$starting_point','$ending_point','$time','$date')");

  if($data)
  {
    $_SESSION['msg_success'] = "Bus Route Details Added ";

          header("location: route.php");

            }else{

              echo "<script>alert('Route Details not added')</script>";
        echo "<script>window.location='add_route.php'</script>";
  }
}
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
    <title>Bus</title>
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
          <h1><i class="fa fa-dashboard"></i> Add Buse Routes</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST">

                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Bus Name</label>&emsp;&emsp;<span id="sp1" style="color: red;"></span>
                    <select class="form-control" name="bus_name" required="" onkeyup="clearmsg('sp1')" id="bus_name" type="text">
                    <option value=""></option>

                                            <?php
                                            $var=mysqli_query($conn,"SELECT * FROM bus_tb");
                                            while($row=mysqli_fetch_assoc($var)){
                                              ?>

                                            
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['bus_name'];?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                  </div>

                   <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Starting point</label>&emsp;&emsp;<span id="sp2" style="color: red;"></span>
                    <input class="form-control" name="starting_point" required="" onkeyup="clearmsg('sp2')" id="starting_point" type="text">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Ending point</label>&emsp;&emsp;<span id="sp3" style="color: red;">
                    <input class="form-control" name="ending_point" required="" onkeyup="clearmsg('sp3')" id="ending_point" type="text">
                  </div>


                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Time</label>&emsp;&emsp;<span id="sp4" style="color: red;">
                    <input class="form-control" name="time" required="" onkeyup="clearmsg('sp4')" id="time" type="time">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Date</label>&emsp;&emsp;<span id="sp5" style="color: red;">
                    <input class="form-control" name="date" required="" onkeyup="clearmsg('sp5')" id="date" type="date">
                  </div>

                   
                  

                   <div class="tile-footer">
              <button class="btn btn-primary" name="add_route" onclick="return valid_buses()" type="submit">Submit</button>
            </div></form></div></div></div></div></div>
     
    </main>
   <?php include 'script.php'; ?>
  </body>

 <script type="text/javascript">
   
   /*function valid_buses()
   {
    var bus_name=document.getElementById('bus_name').value;
   
    var starting_point=document.getElementById('starting_point').value;

     var ending_point=document.getElementById('ending_point').value;

     var time=document.getElementById('time').value;

     var date=document.getElementById('date').value;
   
    if(bus_name=="")
    {
      document.getElementById('sp1').innerHTML="Bus name is empty!";
      return false;
    }

    

    if(starting_point=="")
    {
      document.getElementById('sp2').innerHTML="starting_point is empty!";
      return false;
    }

    if(ending_point=="")
    {
      document.getElementById('sp3').innerHTML="ending_point is empty!";
      return false;
    }

    
    if(time=="")
    {
      document.getElementById('sp4').innerHTML="time is empty!";
      return false;
    }

    if(date=="")
    {
      document.getElementById('sp5').innerHTML="date is empty!";
      return false;
    }

    
   }

   function clearmsg(sp)
   {
    document.getElementById(sp).innerHTML="";
    return false;
   }*/

 </script>
</html>