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
  <div>
    <button class="btn btn-danger"><a href="logout.php" style="color: white;">Logouts</a></button>
    <button class="btn btn-success"><a href="update.php" style="color: white;">Update</a></button>

  </div>

</body>
</html>

<?php

session_start();
$conn=mysqli_connect('localhost','root','','test');

if (!isset($_SESSION['uname'])) {
  //echo "Welcome".$_SESSION['uname'];
  //echo "Welsome".$_SESSION['pass'];
           header('Location: http://localhost/registration/login.php');
  
 
  


}
else{

  
  

  $user_check = $_SESSION['uname'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT * from user_registration where email = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$session_name = $row['name'];
$session_id = $row['id'];
$session_image=$row['image'];



echo "<img src='images/$session_image' style='width:10%;max-height:150px;'>"."</br>";
echo "Your Name is ".$session_name."</br>";

echo "Your ID is".$session_id;
echo $session_image;



}
  
         
?>


