<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php include 'nav.php' ?>

    <div class="m-5">
        <div class="row">
            <!-- Movies management -->
            <div class="col-4">
                <h1>Add New Movie</h1>
                <form action="add_movie.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="releaseDate" class="form-label">Release Date</label>
                        <input type="date" class="form-control" id="releaseDate" name="releaseDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Summary</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="director" name="director" required>
                    </div>
                    <div class="mb-3">
                        <label for="runtime" class="form-label">Runtime (minutes)</label>
                        <input type="number" class="form-control" id="runtime" name="runtime" required>
                    </div>
                    <div class="mb-3">
                        <label for="trailer" class="form-label">Trailer URL</label>
                        <input type="url" class="form-control" id="trailer" name="trailer" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <!-- Loaded by JS -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster</label>
                        <input type="file" class="form-control" id="poster" name="poster" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Movie</button>
                </form>

                <h2 class="mt-5">Current Movie List</h2>
                <table class="table" id="movies_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Release Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loaded by JS -->
                    </tbody>
                </table>
            </div>

            <!-- Cast management -->
            <div class="col-4">
                <h1>Add New Cast</h1>
                <form action="add_cast.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Cast</button>
                </form>

                <h2 class="mt-5">Current Movie List</h2>
                <table class="table" id="cast_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loaded by JS -->
                    </tbody>
                </table>
            </div>

            <!-- Movie-Cast Link -->
            <div class="col-4">
                <h1>Link Movie with Cast</h1>
                <form action="link_movie_cast.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="link_movie_id" class="form-label">Movie Id</label>
                        <input type="number" class="form-control" id="link_movie_id" name="link_movie_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="link_cast_id" class="form-label">Cast Id</label>
                        <input type="number" class="form-control" id="link_cast_id" name="link_cast_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Link</button>
                </form>

                <h2 class="mt-5">Current Movie Cast Links</h2>
                <table class="table" id="actor_movie_link_table">
                    <thead>
                        <tr>
                            <th>Movie Id</th>
                            <th>Cast Id</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loaded by JS -->
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <script>
        fetch('get_categories.php')
            .then(response => response.json())
            .then(categories => {
                console.log(categories);
                const selectElement = document.getElementById('category');

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
        fetch('search_movies.php?keyword=')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const movies_table = document.querySelector('#movies_table tbody');
                if (data.length > 0) {
                    data.forEach(movie => {
                        const row = movies_table.insertRow();

                        const Id = row.insertCell(0);
                        Id.textContent = movie.movie_id;

                        const title = row.insertCell(1);
                        title.textContent = movie.title;

                        const release_date = row.insertCell(2);
                        release_date.textContent = movie.release_date;

                        const action = row.insertCell(3);
                        const deleteButton = document.createElement('button');
                        deleteButton.classList.add("btn");
                        deleteButton.classList.add("btn-danger");
                        deleteButton.textContent = 'Delete';
                        deleteButton.addEventListener('click', () => {
                            var confirmation = confirm("Are you sure you want to delete the movie - " + movie.title + "?");

                            if (confirmation) {
                                fetch("delete_movie.php?movie_id=" + movie.movie_id)
                                    .then((response) => response.json())
                                    .then((data) => {
                                        console.log(data)
                                        alert(data.message);
                                        if (data.success) {
                                            window.location.href = "admin.php";
                                        }
                                    });
                            }
                        });
                        action.appendChild(deleteButton);
                    });

                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

    </script>

    <script>
        fetch('get_all_cast.php')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const cast_table = document.querySelector('#cast_table tbody');
                if (data.length > 0) {
                    data.forEach(cast => {
                        const row = cast_table.insertRow();

                        const id = row.insertCell(0);
                        id.textContent = cast.actor_id;

                        const name = row.insertCell(1);
                        name.textContent = cast.actor_name;

                        const action = row.insertCell(2);
                        const deleteButton = document.createElement('button');
                        deleteButton.classList.add("btn");
                        deleteButton.classList.add("btn-danger");
                        deleteButton.textContent = 'Delete';
                        deleteButton.addEventListener('click', () => {
                            var confirmation = confirm("Are you sure you want to delete the cast - " + cast.actor_name + "?");

                            if (confirmation) {
                                fetch("delete_cast.php?cast_id=" + cast.actor_id)
                                    .then((response) => response.json())
                                    .then((data) => {
                                        console.log(data)
                                        alert(data.message);
                                        if (data.success) {
                                            window.location.href = "admin.php";
                                        }
                                    });
                            }
                        });
                        action.appendChild(deleteButton);
                    });

                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

    </script>

    <script>
        fetch('get_all_movie_cast_links.php')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const actor_movie_link_table = document.querySelector('#actor_movie_link_table tbody');
                if (data.length > 0) {
                    data.forEach(link => {
                        const row = actor_movie_link_table.insertRow();

                        const movie_id = row.insertCell(0);
                        movie_id.textContent = link.movie_id;

                        const actor_id = row.insertCell(1);
                        actor_id.textContent = link.actor_id;

                        const action = row.insertCell(2);
                        const deleteButton = document.createElement('button');
                        deleteButton.classList.add("btn");
                        deleteButton.classList.add("btn-danger");
                        deleteButton.textContent = 'Delete';
                        deleteButton.addEventListener('click', () => {
                            var confirmation = confirm("Are you sure you want to delete the link - " + link.movie_id + "with" +  + "?");

                            if (confirmation) {
                                fetch("delete_cast_movie_link.php?link_id=" + link.link_id)
                                    .then((response) => response.json())
                                    .then((data) => {
                                        console.log(data)
                                        alert(data.message);
                                        if (data.success) {
                                            window.location.href = "admin.php";
                                        }
                                    });
                            }
                        });
                        action.appendChild(deleteButton);
                    });

                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>