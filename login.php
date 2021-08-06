 <?php 
 
 include "connection.php"; 
 
session_start();
   if (isset($_SESSION['login_user'])) {
    header("location:index.php");
     
   }


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM login_tb WHERE username = '$myusername' and password = '$mypassword'";
      

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {

         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
        // $error "Your Login Name or Password is invalid";

        echo "<script>alert('username and password are incorrect')</script>";
        echo "<script>window.location='login.php'</script>";
      }
   }







 ?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - smart ticketing</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Smart Ticketing Using QR Code</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>&emsp;&emsp;&emsp;<span id="sp1" style="color: red;"></span>
            <input class="form-control" type="text" id="uname" onkeyup="clearmsg('sp1')" name="username" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>&emsp;&emsp;&emsp;<span id="sp2" style="color: red;"></span>
            <input class="form-control" type="password" onkeyup="clearmsg('sp2')" id="pass" name="password" placeholder="Password">
          </div>
          
          <div class="form-group btn-container" align="center">
            <button  class="btn btn-primary btn-block" onclick="return valid_login()"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        
      </div>
    </section>
   <?php include 'script.php'; ?>
  </body>

  <script type="text/javascript">
     
     function valid_login()
     {
      var username=document.getElementById('uname').value;
      var password=document.getElementById('pass').value;

      if(username=="")
      {
        document.getElementById('sp1').innerHTML="please enter a username";
        return false;
      }

      if(password=="")
      {
        document.getElementById('sp2').innerHTML="please enter a password";
        return false;
      }
     }

     function clearmsg(sp)
     {
      document.getElementById(sp).innerHTML="";
      return false;
     }




  </script>
</html>