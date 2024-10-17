<?php
    include './require/config.php';

    if(isset($_POST['submit'])){
        
        $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
		$userType = mysqli_real_escape_string($conn,$_POST['user_type']);
        $password = md5($_POST['password']);
        $cpass = md5(($_POST['confirm-password']));
		$checkbox = mysqli_real_escape_string($conn, $_POST["terms"]);
		$error = [];

		if (empty($fname) || empty($fname) || empty($email) || empty($password) || empty($cpass)) {
			$error[] =  "All fields are required";

		} else if ($userType == "hide") {
			$error[] =  "All fields are required";

		} else if ($checkbox != 1) {
			$error[] = "Please tick below our privacy policy and terms and conditions";

		}else if ($password != $cpass) {
			$error[] =  "Your password is different";

		}else{

			$select = "SELECT * FROM users WHERE email = '$email' && password = '$password' ";

        	$result = mysqli_query($conn, $select);	

			if(mysqli_num_rows($result) > 0){
				$error[] = 'User already exist!';
			}else{
					$insert = "INSERT INTO users(firstname, lastname, email, user_type, password) VALUES('$fname', '$lname','$email', '$userType','$password')";
					mysqli_query($conn, $insert);
					echo '<script type = "text/javascript">';
			 		echo 'alert(Your account has been created!)';
			 		echo '</script>';
					header('location:login.php');
				
			};
		};
    };
		
?>

<style>

/* Modal */
/* 
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 2rem;
    white-space: pre-line;
    font-size: 0.8rem;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
    0 32px 64px -48px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    max-width: 1000px;
    width: 100%;
	height: 80%;
    display: none;
	scroll-behavior: smooth;


}

.modal-text{
	scroll-behavior: smooth;
	height:80%;
}

.modal-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-image img {
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.modal-title {
    border-bottom: 1px solid #000;
    padding-bottom: 1rem;
	font-size: 15px;
	text-align: center;
}

.modal-btn-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.modal-btn {
    padding: 0.4rem 2rem;
    height: 40px;
    width: 100px;
    border: none;
    border-radius: 5px;
    background: #FF3D31;
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    cursor: pointer;
    transition: 0.3s;
}

.modal-btn:hover{
    background-color: #a22b29;
    transform: translateY(-5px);

} */


/* .alert {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    width: 125%;
    padding: 1rem;
    border-radius: 5px;
    max-width: 1000px;
    display: none;
    text-align: center;
    justify-content: center;
    align-items: center;
    margin-bottom: 1rem;
  } */

</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="css/signup.css">
	<title>Register</title>
</head>
<body>
	<div class="main">
	<div class="left">
		<div>
			<a href="index.php">
				<img class="logo"src="images/lavaroom-logo.png" alt="">
			</a>
		</div>
		<div>
			<img class="img-left" src="images/log-img.png" alt="">
		</div>
	</div>
	
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<?php
			if(isset($error)){
				foreach($error as $error) {
					echo '<div class="alert">'.$error.'</div>';
				};
			};

			?>

	
			<div class="input-group reg">
				<input autocomplete="off" type="text" placeholder="First Name" required name="firstname"  >
			</div>
			<div class="input-group reg">
				<input autocomplete="off" type="text" placeholder="Last Name" required name="lastname" >
			</div>
			<div class="input-group reg">
				<input autocomplete="off" type="text" placeholder="Company" required name="lastname" >
			</div>
			<div class="input-group reg">
				<input autocomplete="off" type="text" placeholder="Email"required name="email" >
			</div>
			<div class="input-group" >
				<select class="select" name="user_type" id="">
					<option value="hide" class="type placeholder">User Type</option>
					<option value="Admin" class="type">Admin</option>
					<option value="Secretary" class="type">Secretary</option >
					<option value="User" class="type">User</option >
				</select>
			</div>
			
			<div class="input-group reg">
				<input autocomplete="off" type="password" placeholder="Password" required name="password" >
			</div>
			<div class="input-group reg">
				<input autocomplete="off" type="password" placeholder="Confirm Password" required name="confirm-password"  >
			</div>
			<div class="checkbox">
				<input class="terms-input" type="checkbox" name="terms" id="checkbox" value="1">
				<label for="checkbox">
					<span>I Agree to the
						<a href="#modal"  >Privacy Policy</a>
						and
						<a href="#modal">Terms & Conditions</a>
					</span>
				</label> 
			</div>
			<div class="input-group reg">
				<button type="submit" name="submit" class="btn" onchange="activateButton(this)">Register</button>
			</div>

			<p class="login-register-text">Have an account? <a href="login.php"> Login Here</a>.</p>

			<div class="modal" id="modal">
				<div class="modal-dialog-scrollable">
					<div class="modal-image">
						<img src="./images/logo.png" alt="">
					</div>
					<div class="modal-title">
						<strong>Lava room Privacy Policy and Terms and Conditions.</strong>
					</div>
					<div class="modal-text">
					At LavaRoom Hotdesking System, we value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and disclose personal information in relation to our hotdesking system. Please read this policy carefully to understand our practices regarding your personal data.

						<strong>Information We Collect:</strong>

						<strong>1.1. Personal Information:</strong> When you use our hotdesking system, we may collect personal information that you provide to us, such as your name, contact details, and identification documents. This information is necessary for the proper functioning of the hotdesking system and to ensure security and access control.

						<strong>1.2. Usage Information:</strong> We may collect information about your usage of the hotdesking system, including the dates and times of your visits, the duration of your sessions, and the specific desks or facilities you utilize. This information helps us manage and optimize our hotdesking system effectively.

						<strong>1.3. Device Information:</strong> We may collect information about the devices you use to access the hotdesking system, such as your IP address, operating system, browser type, and unique device identifiers. This information is collected to ensure compatibility, troubleshoot technical issues, and maintain system security.

						<strong>Use of Information:</strong>

						<strong>2.1. Provide Services:</strong> We use the personal information collected to provide you with access to the hotdesking system and its related services. This includes managing reservations, allocating desk spaces, and facilitating a smooth experience for all users.

						<strong>2.2. Communication:</strong> We may use your contact information to communicate with you regarding your use of the hotdesking system, including reservation confirmations, changes to policies, and important updates.

						<strong>2.3. System Improvement:</strong> We may analyze the usage information and device information to improve the functionality, usability, and security of the hotdesking system. This analysis is done in an aggregated and anonymized form, ensuring your personal information remains confidential.

						<strong>2.4. Legal Compliance:</strong> In certain circumstances, we may be required to use or disclose your personal information to comply with applicable laws, regulations, or legal processes. We will only disclose information to the extent required by law.

						<strong>Information Sharing:</strong>

						<strong>3.1. Service Providers:</strong> We may share your personal information with trusted third-party service providers who assist us in operating and maintaining the hotdesking system. These service providers are bound by confidentiality agreements and are only authorized to use your information for specific purposes.

						<strong>3.2. Legal Requirements:</strong> We may disclose your personal information if required to do so by law or in response to a valid legal request, such as a court order or government inquiry.

						<strong>3.3. Business Transfers:</strong> In the event of a merger, acquisition, or sale of all or a portion of our assets, your personal information may be transferred as part of the transaction. We will notify you via email or prominent notice on our website before your personal information is transferred and becomes subject to a different privacy policy.

						<strong>Data Security:</strong>

						We have implemented appropriate technical and organizational measures to safeguard your personal information and protect it from unauthorized access, disclosure, alteration, or destruction. These measures include encryption, access controls, regular system updates, and ongoing security assessments.

						<strong>Your Rights:</strong>

						You have certain rights regarding your personal information, including:

						The right to access and review the personal information we hold about you.

						The right to correct any inaccurate or incomplete information.

						The right to withdraw your consent for processing your personal information, where applicable.

						The right to request the erasure of your personal information, subject to legal limitations.

						The right to restrict or object to the processing of your personal information under certain circumstances.

						To exercise any of these rights, please contact us using the information provided.
					</div>
					<div class="modal-btn-container">
						<button class="modal-btn">Ok</button>
					</div>
				</div>
			</div>

		



		</form>
	</div>


	</div>

	

	<!-- <script src="./js/ajaxRegister.js"></script> -->
	<script>
			function disableSubmit() {
			document.getElementById("submit").disabled = true;
			}
				function activateButton(element) {
				
				if(element.checked) {
					document.getElementById("submit").disabled = false;
				}
				else  {
					document.getElementById("submit").disabled = true;
				}
			}
	</script>

	<script >
		const modal = document.querySelector(".modal");
		const modalBtn = document.querySelector(".modal-btn");
		const termsInput = document.querySelector(".terms-input");
		// Terms and condition
		termsInput.addEventListener("change", () => {
		if (termsInput.checked == true) {
			modal.style.display = "block";
		}
		else {
			modal.style.display = "none";
		}

		})

		

		modalBtn.onclick = () => {
		modal.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
		
	</script>

	
</body>
</html>