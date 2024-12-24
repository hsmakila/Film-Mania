<html lang="en" data-bs-theme="dark">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
	<?php include 'nav.php' ?>

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header">
						Sign Up
					</div>
					<div class="card-body">
						<form id="signup-form">
							<div class="form-group mb-3">
								<label for="name">Full Name</label>
								<input type="text" class="form-control" id="name" name="name"
									placeholder="Enter your full name">
							</div>
							<div class="form-group mb-3">
								<label for="email">Email address</label>
								<input type="email" class="form-control" id="email" name="email"
									placeholder="Enter email">
							</div>
							<div class="form-group mb-3">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password"
									placeholder="Password">
							</div>
							<div class="form-group mb-4">
								<label for="confirmPassword">Confirm Password</label>
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
									placeholder="Confirm password">
							</div>
							<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
						</form>
						<div id="error-message" class="mt-3 text-center text-danger"></div>
						<div class="mt-3 text-center">
							Already have an account? <a href="signin.php" class="text-decoration-none">Sign In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const passwordField = document.getElementById("password");
			const confirmPasswordField = document.getElementById("confirmPassword");
			const signupForm = document.getElementById('signup-form');
			const errorMessageDiv = document.getElementById('error-message');

			signupForm.addEventListener('submit', async function (e) {
				e.preventDefault();

				if (passwordField.value !== confirmPasswordField.value) {
					errorMessageDiv.textContent = "Passwords do not match. Please make sure your passwords match.";
				} else {
					const formData = new FormData(signupForm);
					const response = await fetch('signup_user.php', {
						method: 'POST',
						body: formData
					});

					const responseData = await response.json();

					if (responseData.success) {
						window.location.href = "signin.php";
					} else {
						errorMessageDiv.textContent = responseData.message;
					}
				}
			});
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
</body>

</html>