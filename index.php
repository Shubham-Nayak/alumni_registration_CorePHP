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
  <style type="text/css">
    form{
      background-color: #a9a8a5b8;
      /*border: 1px solid black;*/
      border-radius: 5px;
      box-shadow: 0px 0px 5px 1px #eaba61b8;
      padding: 10px;
    }
  </style>
  <body>
    <div class="container ">
      <h1  style="text-align: center;">ALUMINI REGISTRATION</h1>
     
 

    <form enctype='multipart/form-data' method="post" action="" class="formss">
  
 


  <div class="form-row">
    <div class="form-group col-md-4">
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">class</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="class" required="required">
    <option selected>Choose...</option>
    <option value="mca" >MCA</option>
    <option value="mba" >MBA</option>
    <option value="bca" >BCA</option>
  </select>
    </div>

        <div class="form-group col-md-4">
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">batch</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="batch" required>
    <option selected>Choose...</option>
    <option value="2008-9" >2008-9</option>
    <option value="2009-10" >2009-10</option>
    <option value="2010-11" >2010-11</option>
  </select>
    </div>
        <div class="form-group col-md-4">
          
         <img src='images/<?php echo $im ?>' class='card-img-top' alt='...''>

        </div>

</div>
    <div class="form-row mt-2">
  <div class="form-group col-md-6">
      <label for="inputFirstName">Name</label>
      <input type="text" class="form-control" id="inputFirstName" name="name" >

    </div>
      
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email">
    </div>
   
  


         <div class="form-group col-md-6">
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">present_status</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="present_status" required>
    <option selected>Choose...</option>
    <option value="present" >psent</option>
    <option value="absent" >absent</option>
  </select>
    </div>


     <div class="form-group col-md-4">
      <label for="inputZip">Mobile Number</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="+91" name="number">
    </div>
     <div class="form-group col-md-12">
      <label for="inputZip">Address</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="address" name="address">
    </div>
 </div>


   <input type="hidden" class="url" name="url" value="http://localhost/registration/login.php">

<div class="form-row">
    <div class="form-group col-md-6">
      <label >Thumbnils</label>
      <input type="file" class="form-control"  name="imge">
    </div>
     <div class="form-group col-md-6 mt-4">
       

  <textarea class="form-control "  placeholder="Required example textarea" name="additional_info"></textarea>
    
</div>
<!--
 <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="agree" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>-->
 <input name="captcha_code" type="text" ><br>
<img src="captcha_code.php" />
   
 
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
  // $profilepic=$_FILES['imge']['name'];
  // $profilepic_tmp=$_FILES['imge']['tmp_name'];
  //         $im= move_uploaded_file($profilepic_tmp, "images/{$profilepic}");
// if (count($_POST) > 0) {
//     if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
//         $success_message = "Your message received successfully";
      
//     } else {
//         $error_message = "Incorrect Captcha Code";
//     }
// }

error_reporting(1);

if(isset($_POST['submit']))
{
  $name= $_POST['name'];
  $email=$_POST['email'];
  $batchname=$_POST['batch'];
  $classname=$_POST['class'];
  $present_status=$_POST['present_status'];
  $mobileno=$_POST['number'];
  $date = date('Y-m-d H:i:s');
  $address=$_POST['address'];
  $profilepic=$_FILES['imge']['name'];
  $profilepic_tmp=$_FILES['imge']['tmp_name'];
  $additional_info=$_POST['additional_info'];
  $captcha=$_POST["captcha_code"];
  $session_captcha=$_SESSION["captcha_code"];



   $to = "kabirn40@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['name'];
    //$last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . " wrote the following:" . "\n\n" . $_POST['additional_info'];
   $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
// if(empty($_POST['captcha_code']))
//   {
//       $captchError = "Captcha is required";
//        echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
//              .$captchError.'</div><br>';
//   }
//    if ($_POST["captcha_code"] != $_SESSION["captcha_code"]) {
//       $captchError = "Wrong Captcha";


// echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
//              .$captchError.'</div><br>';

// }   
  if (empty($name))
   {
     $nameErr = "Name is required";
       echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$nameErr.'</div><br>';
    }
             if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
                 {
                    $nameErr = "Only letters and white space allowed";
        
                      echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
                         .$nameErr.'</div><br>';
                  }



if(!empty($mobileno)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$mobileno)) // phone number is valid
    {
      $mobileno = '0' . $mobileno;

      // your other code here
    }
    else // phone number is not valid
    {
       $mobErr="Invalid Mobile Number !";
  echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
                         .$mobErr.'</div><br>';

    }
}
else // phone number is empty
{
  $mobErr="You Must Provide Mobile Number !";
  echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
                         .$mobErr.'</div><br>';
}

if(!empty($captcha)) // phone number is not empty
{
    if ($_POST["captcha_code"] != $_SESSION["captcha_code"]) 
//       $captchError = "Wrong Captcha";) // phone number is valid
    {
         $captchError="Captcha Not Matched !";
  echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
                         .$captchError.'</div><br>';
                         die();

      // your other code here
    }
  //   else // phone number is not valid
  //   {
  //      $captchError="Invalid Mobile Number !";
  // echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
  //                        .$captchError.'</div><br>';

  //   }
}
else // phone number is empty
{
  $captchaErr="You Must Enter Captcha First !";
  echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
                         .$captchaErr.'</div><br>';
}


  if(empty($email))
  {
    $emailErr = "Email is required";
    echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">'
             .$emailErr.'</div><br>';
  }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                $emailErr = "Invalid email format";
                  echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
                   .$emailErr.'</div><br>';
              }      
  else
      {

        $sql="select * from alumnidata where (email='$email' );";
        $res=mysqli_query($conn,$sql);
        if (mysqli_num_rows($res) > 0)
         {
          // output data of each row
          $row = mysqli_fetch_assoc($res);
          if ($email==$row['email'])
          {
              
               $con_passErr = "Email Is Alrady Exists";
               echo '<div class="alert alert-danger mt-2" role="alert" style="text-align:center;">'
             .$con_passErr.'</div><br>';
          }



        }

        
      
          else
          {
    

         $query="INSERT INTO alumnidata(name,batchname,classname,mobileno,email,present_status,address,profilepic,additional_info,create_date)
          VALUES ('$name','$batchname','$classname','$mobileno','$email','$present_status','$address','$profilepic','$additional_info','$date')";

          $im= move_uploaded_file($profilepic_tmp, "images/{$profilepic}");

           $run=mysqli_query($conn,$query);
//print_r($_POST)     ;die(); 
// echo $query;die(); 
   if($run==True)
           {
            // $url = $_POST['url'];
// print_r($url);die();
           //header('Location: http://localhost/registration/login.php');

            // print_r($_FILES);
             //echo "<img src='images/$img'>";
            echo '<div class="alert alert-primary mt-2" role="alert" style="text-align:center;">
               Data Inserted Sucessfully</div><br>';
            // echo "<img src=images/$img style='width:100%;height:300px;'>";
           

             if (mail($to, $subject, $message, $headers)) {
        echo "Mail Sent.";
    }
    else {
        echo "failed";
    }
             

            }
             else
             {
               echo"error";
        }      } 
     
        }
      


}  

// pagination and fetch data

if (isset($_GET['page'])) 
{
  $page=$_GET['page'];
}
else
{
  $page=1;
}

$num_per_page=3;
$start_from=($page-1)*3;
// echo $start_from;


$query="SELECT * FROM `alumnidata` LIMIT $start_from,$num_per_page";



$fech_data=mysqli_query($conn,$query);
//$res=mysqli_fetch_array($fech_data);



echo '<div class="container">
  <div class="row">';
foreach ($fech_data as $data ) {
  $name=$data['name'];
  $profilepic=$data['profilepic'];
  $cource=$data['classname'];
  $batchname=$data['batchname'];


  //echo $profilepic;
  //echo '<img src="images/$profilepic">'
//echo "<img src='images/$profilepic' style='width:10%;max-height:150px;'>"."</br>";



   echo " <div class='card col-md-4 col-sm-4 p-1 d-flex justify-content-center' style='width: 18rem;'>
  <img   src='images/$profilepic' class='card-img-top' alt='...'' style='max-height:200px;min-height:200px;'>
  <div class='card-body'>
    <p class='card-text' style='background-color:gray;text-align:center;color:white;'><strong>$name</strong></p>
    <p>$cource</p>
    <p>$batchname</p>

  </div>
</div>

";
 




}
echo "</div></div>";
//$query="SELECT * FROM `alumnidata` LIMIT $start_from,$num_per_page";





  ?>
  <?php
  
  $pr_query="SELECT * FROM alumnidata";

$pr_result=mysqli_query($conn,$pr_query);

$total_record=mysqli_num_rows($pr_result);
// echo $total_record;die();
//echo $total_record;
$total_pages=ceil($total_record/$num_per_page);
//echo $total_pages;

echo '<div class="container mt-3 d-flex justify-content-center ">';
if($page>1){
  echo "<a href='index.php?page=".($page-1)."' class='btn btn-danger '>Previouus</a>";

}

for ($i=1;$i<$total_pages;$i++) 
{
  echo "<a href='index.php?page=".$i."' class='btn btn-primary ml-2'>$i</a>";
}
if($i>$page){
  echo "<a href='index.php?page=".($page+1)."' class='btn btn-success ml-2'>Next</a>";

}

echo '</div>';
  ?>

  