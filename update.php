
<?php 

ini_set('display_errors', 1); 
 error_reporting(E_ALL);
$conn=mysqli_connect('localhost','root','','test');

session_start();
if (isset($_SESSION['uname'])) {
	

  $user_check = $_SESSION['uname'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT * from user_registration where email = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$session_name = $row['name'];
$session_email = $row
['email'];
$session_confirm_password = $row['confirm_password'];

$session_zip = $row['zip'];

$session_cource = $row['cource'];
$session_number = $row['numbers'];
$session_image = $row['image'];








//echo "Your Name is ".$session_name."</br>";

//echo "Your ID is".$session_id;



}




 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	   <form enctype='multipart/form-data' method="post" action="">
  <div class="form-row mt-2">
  <div class="form-group col-md-6">
      <label for="inputFirstName">Name</label>
      <input type="text" class="form-control" id="inputFirstName" name=" name" value="<?php echo($session_name);?>">

    </div>
      
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" disabled="" value="<?php echo($session_email);?>">
    </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Enter New Password">
    </div>
     <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="confirm_password" value="<?php echo($session_confirm_password);?>" disabled>
    </div>

 


  
    <div class="form-group col-md-6">
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Cource</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected  value="" name="cource"><?php echo($session_cource);?></option>
    <option value="mca" name="cource">MCA</option>
    <option value="mba" name="cource">MBA</option>
    <option value="bca" name="cource">BCA</option>
  </select>
    </div>
  
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip" value="<?php echo($session_zip);?>">
    </div>

     <div class="form-group col-md-2">
      <label for="inputZip">Mobile Number</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="+91" name="number" value="<?php echo($session_number);?>">
    </div>

   <input type="hidden" class="url" name="url" value="http://localhost/registration/login.php">


    <div class="form-group col-md-6">
      <label >Selected Thumb: <?php echo($session_image);?>"</label>

      <input type="file" class="form-control"  name="imge">
    </div>
     <div class="form-group col-md-6 mt-4">
       

  <label for="inputGender"><strong >Gender</strong></label>
  <input class="form-check-input mx-3 " type="radio" name="gender" id="inlineRadio1" value="male">
  <label class="form-check-label mx-5" for="inlineRadio1" >Male</label>

  <input class="form-check-input mx-3" type="radio" name="gender" id="inlineRadio2" value="female">
  <label class="form-check-label mx-5" for="inlineRadio2">Female</label>

  </div> 
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
  
 
  <button type="submit" class="btn btn-success" name="submit">Update</button>
</form>
	</div>

</body>
</html>

<?php

if (isset($_POST['submit']))
 {
	$updated_name=$_POST['name'];
	$updated_email=$session_email;
	$updated_password=$_POST['password'];
	//$updated_cource=$_POST['cource'];
  //$updated_cource=$_POST['cource'];

	$updated_zip=$_POST['zip'];
	$updated_number=$_POST['number'];
	$updated_img=$_FILES['imge']['name'];
	$updated_img_tmp=$_FILES['imge']['tmp_name'];

	//echo $updated_zip;
	// echo $updated_email;
 if(empty($updated_password)||empty($updated_img))
 {
 	$updated_password=$session_confirm_password;
 	$updated_img=$session_image;
 }


	$querys="UPDATE user_registration SET name='$updated_name',confirm_password='$updated_password',zip='$updated_zip',numbers='$updated_number',image='$updated_img' WHERE email='$session_email'";
	// echo $querys;die();
           move_uploaded_file($updated_img_tmp, "images/{$updated_img}");


	$run=mysqli_query($conn,$querys);

	if ($run==True) {
		// echo "Data Updated";
           header('Location: http://localhost/registration/dashboard.php');

		  exit();
	}
	else{
		echo "error";
	}

	//echo $updated_number;


}


?>