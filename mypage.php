<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="logout.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-20 p-t-27">My Page</span>
					<div class="text-center p-t-10">
						<span class="welcome"><?php echo $_SESSION['email']; ?></span>
					</div>

					<table class="type02">
						<tr>
							<th scope="row">가입 순서</th>
							<td><?php echo $_SESSION['no']; ?></td>
						</tr>
						<tr>
							<th scope="row">아이디</th>
							<td><?php echo $_SESSION['my_id']; ?></td>
						</tr>
					</table>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">로그아웃</button>
					</div>


				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>
</html>