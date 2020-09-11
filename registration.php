
<?php 
$conn=mysqli_connect('localhost','root','','test');
 


error_reporting(1);

if(isset($_POST['submit']))
{
  $name= $_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  $cource=$_POST['cource'];
  $zip=$_POST['zip'];
  $numbers=$_POST['number'];
  $gender=$_POST['gender'];

  $img=$_FILES['imge']['name'];
  $img_tmp=$_FILES['imge']['tmp_name'];
 


  if (empty($name))
   {
     $nameErr = "Name is required";
       echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$nameErr.'</div><br>';
    }
             if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
                 {
                    $nameErr[] = "Only letters and white space allowed";
        
                      echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
                         .$nameErr.'</div><br>';
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

 elseif(empty($password))
  {
    $passErr = "Password is required";
    echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$passErr.'</div><br>';
  }

 elseif(empty($confirm_password))
  {
    $con_passErr = "confirm_password is required";
    echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$con_passErr.'</div><br>';

  }         
    elseif ($confirm_password!=$password)
     {
               
      
     
              echo "Password Not Match";
             }
 

            
   
  else
      {

        $sql="select * from user_registration where (email='$email' );";
        $res=mysqli_query($conn,$sql);
        if (mysqli_num_rows($res) > 0)
         {
          // output data of each row
          $row = mysqli_fetch_assoc($res);
          if ($email==$row['email'])
          {
              
               $con_passErr = "Email Is Alrady Exists";
               echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$con_passErr.'</div><br>';
          }
        }
          else
          {

          
      


       


         $query="INSERT INTO user_registration(name,email,confirm_password,cource,zip,numbers,image,gender)
          VALUES ('$name','$email','$confirm_password','$cource','$zip','$numbers','$img','$gender')";

           move_uploaded_file($img_tmp, "images/{$img}");

           $run=mysqli_query($conn,$query);
       
          if($run==True)
           {
            // $url = $_POST['url'];
// print_r($url);die();
           header('Location: http://localhost/registration/login.php');

            // print_r($_FILES);
             //echo "<img src='images/$img'>";
           /// echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">
            //   Data Inserted Sucessfully</div><br>';
            // echo "<img src=images/$img style='width:100%;height:300px;'>";
           exit();
             

            }
             else
             {
               echo"error";
        }      } 
     
        }
      }
    
  ?>