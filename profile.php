<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php include 'nav.php' ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="row g-0 m-3">
                        <div class="col-md-4">
                            <img src="Images/Users/default_user.png" class="img-fluid" alt="Profile Picture">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title" id="user-name">John Doe</h1>
                                <p class="card-text" id="user-email">Email: john.doe@example.com</p>
                                <p class="card-text" id="user-subscription">Subscription: Basic</p>
                                <div>
                                    <button class="btn btn-primary" id="btn-subscribe">Subscribe</button>
                                    <button class="btn btn-secondary" id="btn-change-password">Change Password</button>
                                    <button class="btn btn-danger" id="btn-delete-account">Delete Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            fetch("get_current_user.php")
                .then((response) => response.json())
                .then((data) => {
                    console.log(data)
                    const user_name = document.getElementById("user-name");
                    const user_email = document.getElementById("user-email");
                    const user_subscription = document.getElementById("user-subscription");

                    const btn_subscribe = document.getElementById("btn-subscribe");

                    if (data.success) {
                        user_name.textContent = data.name;
                        user_email.textContent = "Email: " + data.email;
                        if (data.subscribed) {
                            user_subscription.innerHTML = "<h3 class=\"text-success\">Subscription: Premium</h3>";
                            btn_subscribe.disabled = true;
                        } else {
                            user_subscription.innerHTML = "<h3 class=\"text-info\">Subscription: No Plan</h3>";
                        }
                    } else {
                        window.location.href = "signin.php";
                    }
                });
        });
    </script>

    <script>
        document.getElementById('btn-subscribe').addEventListener('click', function () {
            const user_subscription = document.getElementById("user-subscription");
            const btn_subscribe = document.getElementById("btn-subscribe");
            fetch("subscribe.php")
                .then((response) => response.json())
                .then((data) => {
                    console.log(data)
                    alert(data.message);
                    if (data.success) {
                        user_subscription.innerHTML = "<h3 class=\"text-success\">Subscription: Premium</h3>";
                        btn_subscribe.disabled = true;
                    }
                });
        });
    </script>

    <script>
        document.getElementById('btn-delete-account').addEventListener('click', function () {
            var confirmation = confirm("Are you sure you want to delete your account?");

            if (confirmation) {
                fetch("delete_account.php")
                    .then((response) => response.json())
                    .then((data) => {
                        console.log(data)
                        alert(data.message);
                        if (data.success) {
                            window.location.href = "home.php";
                        }
                    });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>