<?php

/*
 *to Login(localhost)
 *Email: superadmin@localhost.ph
 *password: superadminfs
 */

if (isset($_POST['submit'])) {
	require 'DBConnector.php';

	$username = mysqli_real_escape_string($conn, $_POST['suUid']);
	$email = mysqli_real_escape_string($conn, $_POST['suEmail']);
	$password = mysqli_real_escape_string($conn, $_POST['suPwd']);
	$passwordRepeat = mysqli_real_escape_string($conn, $_POST['suPwd-repeat']);


	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: signupSU.php?empty".$username."&suEmail=".$email);
		exit();
	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		# code...
		header("Location: signupSU.php?empty/invalidEmailuid");
		exit();
	}

	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: signupSU.php?empty/invalidEmail".$username);
		exit();
	}else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: signupSU.php?error".$email);
		exit();
	}else if($password !== $passwordRepeat){
		header("Location: signupSU.php?error=checkpassword".$username."&suEmail=".$email);
		exit();
		//if username already taken
	}else{


		$sql = "SELECT uidSU FROM super_user WHERE uidSU=?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			# code...
			header("Location: signupSU.php?errormysql");
			exit();
		} else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				# code...
				header("Location: signupSU.php?error=usertaken&suEmail=".$email);
				exit();
			} else{
				$sql = "INSERT INTO super_user (uidSU, emailSU, pwdSU) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);


					if (!mysqli_stmt_prepare($stmt, $sql)) {
			# code...
						header("Location: signupSU.php?errormysql");
						exit();
			} else{

				$hasedPwd = password_hash($password, PASSWORD_DEFAULT);

				mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hasedPwd);
				mysqli_stmt_execute($stmt);
				header("Location: signupSU.php?Success");
						exit();
			}
			}
		}

	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}