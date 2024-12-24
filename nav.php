<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <img src="Images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Film Mania
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="links">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Genres
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Drama</a></li>
                        <li><a class="dropdown-item" href="#">Western</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
            </ul>

            <!-- Search form -->
            <form class="navbar-nav d-flex" role="search" action="home.php" method="get">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
            </form>

            <!-- User profile icon and dropdown -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" id="nav-username">
                        Guest
                        <img src="Images/Users/default_user.png" alt="Profile" width="24" height="24"
                            class="d-inline-block align-text-top">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
                        <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
                        <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener("DOMContentLoaded", () => {
        fetch("get_current_user.php")
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.success) {
                    document.getElementById("nav-username").innerHTML = `${data.name} <img src="Images/Users/default_user.png" alt="Profile" width="24" height="24"
                            class="d-inline-block align-text-top">`;
                    if (data.id === "1") {
                        var ul = document.getElementById("links");
                        var li = document.createElement("li");
                        li.classList.add("nav-item");
                        li.innerHTML = "<a class=\"nav-link\" href=\"admin.php\">Admin</a>";
                        ul.appendChild(li);
                    }
                }
            });
    });
</script>