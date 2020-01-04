<?php

if (isset($_POST['signin'])) {
	# code...

	require 'DBConnector.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwdsu'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?emptyfields");
		exit();
	}else{
		$sql = "SELECT * FROM super_user WHERE emailSU=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			# code...
			header("Location: ../index.php?sqlerror");
			exit();
		}

		else{
			mysqli_stmt_bind_param($stmt, "s", $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($result)) {
				# code...
				$pwdCheck = password_verify($password, $row['pwdSU']);
				if ($pwdCheck == false) {
					# code...
					header("Location: ../index.php?error=wrongpwd");
					exit();
				exit();
				}else if ($pwdCheck == true) {
					session_start();
					$_SESSION['userId'] = $row['idSU'];
					$_SESSION['userEmail'] = $row['uidSU'];

					header("Location: ../classic/base/html/super_user/super_user.php");
					exit();
				}else{
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
			}
			else{
					header("Location: ../index.php?error=nouser");
					exit();
			}
		}
	}

} else {
	header("Location: ../index.php");
	exit();
}