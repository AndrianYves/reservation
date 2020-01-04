<?php
session_start();

?>

<?php
 $conn = mysqli_connect("localhost","root","","database_itproject2");
 $role="";
if (isset($_POST["btnLogin"])) {
	# code...
	date_default_timezone_set("Asia/Bangkok");
	$sql1 = mysqli_query($conn, "SELECT * FROM semesterdate");
    $date = mysqli_fetch_assoc($sql1);
    $dateend = strtotime($date['semesterend']);
    $today= strtotime(date('Y-m-d'));

	$email = $_POST["email"];
	$password = $_POST["password"];
	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		# code...
		while ($row = mysqli_fetch_assoc($result)) {
			# code...
			if (($row["user_type"] == "Super Admin") && ($row["status"] == "Active")) {
				# code...
				//$_SESSION['LoginUser'] = $row["email"];
				$_SESSION['login'] = true;
				header('Location: ../classic/base/html/super_user/super_user.php');
			}else if(($row["user_type"] == "Dean User")  && ($row["status"] == "Active")){
				    
		          if($dateend < $today) {
		            echo '<script type="text/javascript">'; 
					echo 'alert("Account Expires!");'; 
					echo 'window.location.href = "../index.php";';
					echo '</script>';
		          } else {
		            $_SESSION['login'] = true;
					header('Location: ../classic/base/html/admin_user/dean_home.php');
		          }

				// $_SESSION['LoginUser'] = $row["email"];
				// header('Location: user.php');
				
			}else if(($row["user_type"] == "Sao User")  && ($row["status"] == "Active")){
				if($dateend < $today) {
		            echo '<script type="text/javascript">'; 
					echo 'alert("Account Expires!");'; 
					echo 'window.location.href = "../index.php";';
					echo '</script>';
		          } else {
		            $_SESSION['login'] = true;
					header('Location: ../classic/base/html/admin_user/sao_home.php');
		          }

				// $_SESSION['LoginUser'] = $row["email"];
				// header('Location: user.php');
				
			}else if(($row["user_type"] == "Guest User")  && ($row["status"] == "Active")){
				if($dateend < $today) {
		            echo '<script type="text/javascript">'; 
					echo 'alert("Account Expires!");'; 
					echo 'window.location.href = "../index.php";';
					echo '</script>';
		          } else {
		            $_SESSION['login'] = true;
					
				header('Location: ../classic/base/html/guest_user/guest_user.php');
		          }
				// $_SESSION['LoginUser'] = $row["email"];
				// header('Location: user.php');
			}else{
				echo '<script type="text/javascript">'; 
				echo 'alert("Invalid Account!");'; 
				echo 'window.location.href = "../index.php";';
				echo '</script>';

			}
			
		}
	}else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Invalid Account!");'; 
			echo 'window.location.href = "../index.php";';
			echo '</script>';
		
	}
}
?>