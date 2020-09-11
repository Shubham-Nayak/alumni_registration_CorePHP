<?php 
$conn=mysqli_connect('localhost','root','','test');
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registration Form</title>
  </head>
  <body>
    <div class="container">
      <h1  style="text-align: center;">Registration Form</h1>
     
 

    <form enctype='multipart/form-data' method="post" action="#">
  <div class="form-row mt-2">
  <div class="form-group col-md-6">
      <label for="inputFirstName">First Name</label>
      <input type="text" class="form-control" id="inputFirstName" name="firstname" >

    </div>
      <div class="form-group col-md-6">
      <label for="inputLastname">Last Name</label>
      <input type="text" class="form-control" id="inputLastname" name="lastname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <!--
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>-->
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip">
    </div>

     <div class="form-group col-md-2">
      <label for="inputZip">Mobile Number</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="+91" name="number">
    </div>
 


   
</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label >Thumbnils</label>
      <input type="file" class="form-control"  name="imge">
    </div>
</div>
  <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>

<!--#########################    PHP WORK ################-->

<?php
error_reporting(1);

if(isset($_POST['submit']))
{
  $firstname= $_POST['firstname'];
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $address1=$_POST['address1'];
  $address2=$_POST['address2'];
  $city=$_POST['city'];
  $zip=$_POST['zip'];
  $numbers=$_POST['number'];
  $img=$_FILES['imge']['name'];
  $img_tmp=$_FILES['imge']['tmp_name'];
 


  if (empty($firstname))
   {
     $firtnameErr = "Name is required";
       echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$firtnameErr.'</div><br>';
    }
             elseif (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
                 {
                    $firtnameErr = "Only letters and white space allowed";
        
                      echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
                         .$firtnameErr.'</div><br>';
                  }
              
  elseif (empty($lastname))
   {
       $lastnameErr = "Last Name is required";
        echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$lastnameErr.'</div><br>';
    }
             elseif (!preg_match("/^[a-zA-Z ]*$/",$lastname))
              {
                $lastnameErr = "Only letters and white space allowed";
        
                echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
                .$lastnameErr.'</div><br>';
              }
  elseif(empty($email))
  {
    $emailErr = "Email is required";
    echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$emailErr.'</div><br>';
  }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                $emailErr = "Invalid email format";
                  echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
                   .$emailErr.'</div><br>';
              }
  
   
  else
      {


         $query="INSERT INTO registration(firstname,lastname,email,password,address1,address2,city,zip,numbers,image)
          VALUES ('$firstname','$lastname','$email','$password','$address1','$address2','$city','$zip','$numbers','$img')";

           move_uploaded_file($img_tmp, "images/{$img}");

           $run=mysqli_query($conn,$query);
       
          if($run==True)
           {

             print_r($_FILES);
             //echo "<img src='images/$img'>";
             echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">
               Data Inserted Sucessfully</div><br>';
             echo "<img src=images/$img style='width:100%;height:300px;'>";

            }
             else
             {
               echo"error";
              } 
     
        }
    }
  ?>
   