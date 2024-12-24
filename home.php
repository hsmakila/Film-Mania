<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php include 'nav.php' ?>

    <div class="container">
        <div class="jumbotron text-center mt-3">
            <h1 class="display-4">Welcome to Film Mania</h1>
            <p class="lead">Enjoy a wide selection of movies and TV shows.</p>
            <hr class="my-4">
        </div>

        <!-- Genre Selector Dropdown -->
        <div class="mb-3">
            <label for="genreSelector" class="form-label">Select Genre:</label>
            <select class="form-select" id="genreSelector">
                <option value="">All Genres</option>
                <!-- Add more genres as needed -->
            </select>
        </div>

        <div class="row justify-content-center gy-5" id="latest_movies_container">
            <!-- Latest movies will load by JS -->
        </div>
    </div>

    <script>
        fetch('get_categories.php')
            .then(response => response.json())
            .then(categories => {
                console.log(categories);
                const selectElement = document.getElementById('genreSelector');

                categories.forEach(category => {
                    console.log(category.category_name);
                    const option = document.createElement('option');
                    option.value = category.category_id;
                    option.textContent = category.category_name;
                    selectElement.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching categories:', error);
            });
    </script>

    <script>
        function loadMovies(keyword, category_id) {
            let url = "search_movies.php?keyword=" + keyword;
            if (category_id != null) {
                url += "&category_id=" + category_id;
            }
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const latestMoviesContainer = document.getElementById('latest_movies_container');
                    latestMoviesContainer.innerHTML = '';
                    if (data.length > 0) {

                        data.forEach(movie => {
                            const moviesCard = document.createElement('div');
                            moviesCard.classList.add("col-2");
                            moviesCard.innerHTML = `
                        <a href="movie.php?movie_id=${movie.movie_id}" style="text-decoration: none;">
                            <div class="card">
                                <img src="Images/Posters/p${movie.movie_id}.jpg" class="card-img-top" height="300">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-truncate">${movie.title}</h5>
                                    <p class="card-text">${(new Date(movie.release_date)).getFullYear()}</p>
                                </div>
                            </div>
                        </a>
                        `;
                            latestMoviesContainer.appendChild(moviesCard);
                        });

                    } else {
                        latestMoviesContainer.textContent = 'No movies found.';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
        const urlParams = new URLSearchParams(window.location.search);
        const keyword = urlParams.get('keyword');
        const category_id = urlParams.get('category_id');
        if (keyword == null && category_id == null) {
            loadMovies("", null);
        } else if (keyword != null && category_id != null) {
            loadMovies(keyword, category_id);
        } else if (keyword != null) {
            loadMovies(keyword, null);
        } else {
            loadMovies("", category_id);
        }

    </script>

    <script>
        const genreSelector = document.getElementById("genreSelector");

        genreSelector.addEventListener("change", function () {
            const selectedGenre = genreSelector.value;

            if (selectedGenre === "") {
                console.log("All Genres selected");
                loadMovies("", null);
            } else {
                console.log(`Genre selected: ${selectedGenre}`);
                loadMovies("", selectedGenre);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>