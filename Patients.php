<?php
$errors = array();
include_once dirname(__FILE__).'/includes/Connection.php';
	
	if($_SERVER['REQUEST_METHOD']="POST"){
//declare new patient
			$name = $_POST['fname'];
			$phone = $_POST['phone'];
			$idno = $_POST['idno'];
			$dob = $_POST['DOB'];
			$address = $_POST['address'];
			$county = $_POST['county'];
			$sub =$_POST['sub'];
			$email = $_POST['email'];
			$sex = $_POST['sex'];
			$marital =$_POST['marital'];
//declare next of kin
			$kname = $_POST['kname'];
			$kphone = $_POST['kphone'];
			$kidno = $_POST['kidno'];
			$kdob = $_POST['kDOB'];
			$ksex = $_POST['ksex'];
			$relative =$_POST['krel'];
			//check errors
			if (empty($name)) {
				array_push($errors, "name Required");
			}if (empty($phone)) {
				array_push($errors, "Phone is Required");
			}if (empty($idno)) {
				array_push($errors, "Id No is Required");
			}if (empty($sex)) {
				array_push($errors, "Gender is Required");
			}if (empty($county)) {
				array_push($errors, "County is Required");
			}if (empty($dob)) {
				array_push($errors, "Date of Birth is Required");
			}
			//if no errors create patient
			if (count($errors)<=0) {
				$stmt = "INSERT INTO `patients` VALUES ('$name','$dob','$idno','$address','$county','$sub','$phone','$email','$sex','$marital','$kname','$kdob','','$kidno','$ksex','$relative','$kphone')";
				$query = mysqli_query($con, $stmt);

				if($query){
					?>
						<div class="alert" id="success">
							<p><strong>Success! </strong> <?php echo $reg; $to = $email;
				$subject = "You have been registered";
				$message = "123454!";
				mail($to, $subject, $message);
				?>Patient Created</p>
						</div>
					<?php
				}else{
					?>
						<div class="alert" id="danger">
							<p><strong>Error! </strong> Something occured while creating account.</p>
						</div>
					<?php
				}
			}

	}else{
		?>
			<div class="alert" id="danger">
				<p><strong>Error!</strong> Invalid Server request method</p>
			</div>
		<?php
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Patient</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" type="text/css" href="style-sidebar.css">
</head>
<body>
		<div class="main_content">
		<div class="info">
			<div class="form-title">
		<h2>Patients Registration Form
</h2>
	</div>
	
	<form action="Patients.php" method="POST">
		<?php include_once dirname(__FILE__).'/errors.php'; ?>
		<div class="form-group">
			<input type="text" name="fname" placeholder="Name" class="input-group">
		</div>
		<div class="form-group">
			<input type="Number" name="phone" placeholder="Telephone" class="input-group">
		</div>
		<div class="form-group">
			<input type="date" name="DOB" placeholder="Date Of Birth" class="input-group">
		</div>
		<div class="form-group">
			<input type="Number" name="idno" placeholder="0034545" class="input-group">
		</div>
		<div class="form-group">
			<input type="text" name="address" placeholder="Address" class="input-group">
		</div>
		<div class="form-group">
			<input type="text" name="county" placeholder="County" class="input-group">
		</div>
		<div class="form-group">
			<input type="text" name="sub" placeholder="Sub-County" class="input-group">
		</div>
		<div class="form-group">
			<input type="email" name="email" placeholder="email.example.com" class="input-group">
		</div>
		<div class="form-group">
			<select name="sex" class="input-group">
				<option>-- Select Gender --</option>
				<option value="Male">Male</option>
				<option value="Female">Famale</option>
			</select>
		</div>
		<div class="form-group">
		<select name="marital" class="input-group">
				<option>-- Select Marital Status --</option>
				<option value="Single">Single</option>
				<option value="Married">Married</option>
				<option value="Divorced">Divorced</option>
			</select>
		</div>
		<div><h5>Next of Kin</h5></div>
		<div class="form-group">
			<input type="text" name="kname" placeholder="Name" class="input-group">
		</div>
		<div class="form-group">
			<input type="Number" name="kphone" placeholder="Telephone" class="input-group">
		</div>
		<div class="form-group">
			<input type="date" name="kDOB" placeholder="Date Of Birth" class="input-group">
		</div>
		<div class="form-group">
			<input type="Number" name="kidno" placeholder="0034545" class="input-group">
		</div>
		<div class="form-group">
			<select name="ksex" class="input-group">
				<option>-- Select Gender --</option>
				<option value="Male">Male</option>
				<option value="Female">Famale</option>
			</select>
		</div>
		<div class="form-group">
			<select name="krel" class="input-group">
				<option>-- Select Relationship --</option>
				<option value="cousin">Cousin</option>
				<option value="sibling">Siblings</option>
				<option value="parent">Parent</option>
				<option value="rlative">Relative</option>
				<option value="friend">Friend</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="index" class="btn-primary" value="Create Patient">
		</div>
	</form>
		</div>
	</div>
	</div>
	
</body>
</html>
