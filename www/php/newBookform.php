<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new book</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="../style/main.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/ajax.js"></script>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="../index.html"> 
                <img src="../images/Logo_short.jpg" width="200" height="290" alt="LitReads Library">
            </a>
        </div>
    </header>

    <main>
    <div class="container d-flex justify-content-center align-items-center vh-80">
        <div class="row">
            <div class="col-md-12">
                <form action="insertBook.php" method="POST" class="form">
                    <h1 class="text-center">Add a new book</h1>
                    <div class="form-group">
                        <label for="book_title">Book title:</label>
                        <input type="text" name="book_title" id="book_title" placeholder="Name a book" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" placeholder="Name of author" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="publisher">Publisher:</label>
                        <input type="text" id="publisher" name="publisher" placeholder="Name of publisher" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="language">Language:</label>
                        <select id="language" name="language" class="form-control">
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                            <option value="Mandarin">Mandarin</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Russian">Russian</option>
                        </select>
                        <span class="select-icon">&#10003;</span>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" class="form-control">
                            <option value="Fiction">Fiction</option>
                            <option value="Non fiction">Non fiction</option>
                            <option value="Reference">Reference</option>
                        </select>
                        <span class="select-icon">&#10003;</span>
                    </div>
                    <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea type="messege " id="description" name="book_description" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bookimage" class="file-upload">Picture:</label>
                        <input type="file" id="bookimage" name="bookimage" accept="image/*" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                    <div class="form-link text-center">
                        <a href="display_books.php">Back to library</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="popup-message" class="popup-message"></div>
</main>

    <footer class="footer">
        <p>Copywrite © - Create by Nataliia Petrychuk 2023</p>
    </footer>
</body>

</html>
