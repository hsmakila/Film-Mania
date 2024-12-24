<html lang="en" data-bs-theme="dark">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign In</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
	<?php include 'nav.php' ?>

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Sign In
					</div>
					<div class="card-body">
						<form id="signin-form">
							<div class="form-group mb-4">
								<label for="email">Email address</label>
								<input type="email" class="form-control" name="email" placeholder="Enter email">
							</div>
							<div class="form-group mb-4">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</form>
						<div id="error-message" class="mt-3 text-center text-danger"></div>
						<div class="mt-3 text-center">
							Don't have an account? <a href="signup.php" class="text-decoration-none">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const signinForm = document.getElementById('signin-form');
			signinForm.addEventListener('submit', async function (e) {
				e.preventDefault();
				const formData = new FormData(signinForm);
				const response = await fetch('signin_user.php', {
					method: 'POST',
					body: formData
				});

				const responseData = await response.json();

				if (responseData.success) {
					if (document.referrer.endsWith("signup.php") || document.referrer.endsWith("signin.php")) {
						window.location.href = "home.php";
					} else {
						window.location.href = document.referrer;
					}
				} else {
					const errorMessageDiv = document.getElementById('error-message');
					errorMessageDiv.textContent = responseData.message;
				}
			});
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
</body>

</html>