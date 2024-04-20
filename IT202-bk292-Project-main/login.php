<?php   
 session_start();  
 $conn=mysqli_connect("localhost","mgs_user","pa55word","plugged-in");  
 $msg="";  
 if (isset($_POST['submit'])) {  
      $email=mysqli_real_escape_string($conn,$_POST['email']);  
      $password=mysqli_real_escape_string($conn,$_POST['password']);  
      $sql=mysqli_query($conn,"select * from pluggedinmanagers where emailAddress='$email' && password='$password'");  
      $num=mysqli_num_rows($sql);  
      if ($num>0) {    
           $row=mysqli_fetch_assoc($sql);  
           $_SESSION['USER_ID']=$row['emailAddress'];
           $_SESSION['USER_FNAME']=$row['firstName'];
           $_SESSION['USER_LNAME']=$row['lastName'];
           header("location:user.php");  
      }else{  
           $msg="Please Enter Valid details!";  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <link rel="stylesheet" type="text/css" href="css/style.css">  
      <title>Login Page</title>  
 </head>  
 <body>  
 <div class="main">  
      <div class="flex">  
           <div class="content">  
                <h2 class="title">Login</h2>  
                <form method="post" action="">  
                     <label for="username">Username</label>  
                     <div class="box">  
                          <input type="text" name="email" placeholder="Username" class="form-control" required>  
                     </div>  
                     <label for="password">Password</label>  
                     <div class="box">  
                          <input type="password" name="password" placeholder="Password" class="form-control" required>  
                     </div>  
                     <div class="btn-box">  
                          <input type="submit" name="submit" value="Login" class="btn submit-btn">  
                     </div>  
                     <div class="error">  
                          <?php echo $msg ?>  
                     </div>  
                </form>  
           </div>  
      </div>  
 </div>  
 </body>  
 </html> 