

<?php
session_start();
if (isset($_SESSION['uname']))
{
           header('Location: http://localhost/registration/dashboard.php');

}

$conn=mysqli_connect('localhost','root','','test');
?>
<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
	<h1 style="text-align: center;">Login Page</h1>
	<div class="container">
<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
</body>
</html>

<?php

if (isset($_POST['submit']))
 {


  
    $email=$_POST['email'];
    $password=$_POST['password'];

  //$query="SELECT * FROM user_registration WHERE email='$email'";
    $query="SELECT * FROM user_registration WHERE (email, confirm_password) = ('$email','$password')";



    $run=mysqli_query($conn,$query);

     $results=mysqli_fetch_array($run) ;
    
      $con_email=$results['email'];
      $con_password=$results['confirm_password'];
      if($password!=$con_password)
      {
        echo "Password Not Match";
      }
      else
      {
        $name=$results['name'];
        $image=$results['image'];
        $email=$results['email'];
        //$pass=$results['pass'];

        $_SESSION['uname']=$email;   // $_SESSION['name']=$name;

        //$_SESSION['pass']=$password;
        header('Location: http://localhost/registration/dashboard.php');

       print_r($_SESSION);


        
       // echo "<h1>Welcome ".$name."</h2>";
       // echo "<img src='images/$image' >";

      }
}
 

  
?>


