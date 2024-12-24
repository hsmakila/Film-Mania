<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'nav.php' ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="Images/poster.jpg" alt="Movie Poster" class="img-fluid" id='poster'>
            </div>
            <div class="col-md-8">
                <h1 class="mb-4" id="title">The Super Mario Bros. Movie (2023)</h1>
                <p id='release_date'><strong><i class="fas fa-calendar-alt info-icon"></i> Release Date:</strong> April
                    7, 2023</p>
                <p id='genre'><strong><i class="fas fa-film info-icon"></i> Genre:</strong> Animation, Family,
                    Adventure, Fantasy,
                    Comedy</p>
                <p id='director'><strong><i class="fas fa-user info-icon"></i> Director:</strong> Aaron Horvath, Michael
                    Jelenic</p>
                <p id='cast'><strong><i class="fas fa-users info-icon"></i> Cast:</strong> Anya Taylor-Joy, Chris Pratt,
                    Jack
                    Black, Charlie Day</p>
                <p id='summary'><strong><i class="fas fa-book info-icon"></i> Plot Summary:</strong> While working
                    underground to fix
                    a water main, Brooklyn plumbers-and brothers-Mario and Luigi are
                    transported down a mysterious pipe and wander into a magical new world. But when the brothers are
                    separated, Mario embarks on an epic quest to find Luigi.</p>
                <p id='rating'><strong><i class="fas fa-star info-icon"></i> Rating:</strong> 7.1/10</p>
                <div class="mt-3">
                    <h2>Trailer</h2>
                    <div class="embed-responsive embed-responsive-16by9" style="max-height: 500px;">
                        <iframe id='trailer' class="embed-responsive-item"
                            src="https://www.youtube.com/embed/TnGl01FkMMo" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary" id="action-button">Watch Now</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h2>Cast</h2>
            </div>
        </div>
        <div class="row" id="cast_container">
            <!-- Cast will be loaded by JS -->
        </div>
        <div class="row mt-5">
            <div class="col">
                <h2>Recommendations</h2>
            </div>
        </div>
        <div class="row" id="recommendations_container">
            <!-- Recommendations will be loaded by JS -->
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const movieId = urlParams.get('movie_id');
        console.log("Movie ID: " + movieId);

        fetch('get_movie_details.php?movie_id=' + movieId).then(response => response.json()).then(movie => {
            console.log(movie);
            document.getElementById('poster').src = `Images/Posters/p${movie.movie_id}.jpg`;
            document.getElementById('title').innerHTML = `${movie.title} (${(new Date(movie.release_date)).getFullYear()})`;
            document.getElementById('release_date').innerHTML = `<strong><i class="fas fa-calendar-alt info-icon"></i> Release Date:</strong> ${movie.release_date}`;
            document.getElementById('genre').innerHTML = `<strong><i class="fas fa-film info-icon"></i> Genre:</strong> ${movie.category_name}`;
            document.getElementById('summary').innerHTML = `<p id='summary'><strong><i class="fas fa-book info-icon"></i> Plot Summary:</strong> ${movie.summary}</p>`
            document.getElementById('trailer').src = movie.trailer_url;
        });

    </script>

    <script>
        fetch('get_movie_cast.php?movie_id=' + movieId).then(response => response.json()).then(cast => {
            console.log(cast);
            const castContainer = document.getElementById('cast_container');
            if (cast.length > 0) {
                cast.forEach(cast => {
                    const castCard = document.createElement('div');
                    castCard.classList.add("col-md-2");
                    castCard.innerHTML = `
                        <div class="card">
                            <img src="Images/Cast/c${cast.actor_id}.jpg" class="card-img-top" alt="Cast 1" height="250px">
                            <div class="card-text text-center">
                                <p class="card-title text-truncate">${cast.actor_name}</h5>
                            </div>
                        </div>
                    `;
                    castContainer.appendChild(castCard);
                });
            } else {
                castContainer.textContent = 'No cast found.';
            }
        });
    </script>

    <script>
        fetch('get_movie_details.php?movie_id=' + movieId).then(response => response.json()).then(movie => {
            category_id = movie.category_id;


            fetch('get_recommendations.php?category_id=' + movie.category_id + '&movie_id=' + movie.movie_id).then(response => response.json()).then(recommendations => {

                const recommendations_container = document.getElementById('recommendations_container');
                if (recommendations.length > 0) {
                    recommendations.forEach(recommendation => {
                        console.log(recommendation);
                        const recommendationCard = document.createElement('div');
                        recommendationCard.classList.add("col-md-3");
                        recommendationCard.innerHTML = `
                            <a href="movie.php?movie_id=${recommendation.movie_id}" style="text-decoration: none;">
                                <div class="card shadow">
                                    <img src="Images/Posters/p${recommendation.movie_id}.jpg" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-truncate">${recommendation.title}</h5>
                                    </div>
                                </div>
                            </a>
                            `;
                        recommendations_container.appendChild(recommendationCard);
                    });
                } else {
                    recommendations_container.textContent = 'No Recommendations found.';
                }
            });
        });
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            fetch("get_current_user.php")
                .then((response) => response.json())
                .then((data) => {
                    console.log(data)
                    const action_button = document.getElementById("action-button");
                    if (data.success) {
                        if (data.subscribed) {
                            action_button.textContent = "Watch Now";
                            action_button.href = "#";
                        } else {
                            action_button.textContent = "Subscribe to Watch";
                            action_button.href = "profile.php";
                        }
                    } else {
                        action_button.textContent = "Sign In to Watch";
                        action_button.href = "signin.php";
                    }
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

</html>