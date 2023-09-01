<?php
require('config.php');


if (isset($_POST['add_book'])) {
  $book_title = $_POST['book_title'];
  $author = $_POST['author'];
  $publisher = $_POST['publisher'];
  $language = $_POST['language'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $bookimage = $_FILES['bookimage']['name']; // Get the name of the uploaded image file

  // File upload handling
  $target_dir = '../images/';
  $target_file = $target_dir . basename($_FILES['bookimage']['name']);

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if the file is an actual image
  $check = getimagesize($_FILES['bookimage']['tmp_name']);
  if ($check !== false) {
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }

  // Check if the file already exists
  if (file_exists($target_file)) {
      echo "Sorry, the file already exists.";
      $uploadOk = 0;
  }

  // Check the file size
  if ($_FILES['bookimage']['size'] > 5000000) {
      echo "Sorry, the file is too large.";
      $uploadOk = 0;
  }

  // Allow only certain file formats (modify this as per your requirements)
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  // If the file upload is successful, move the file to the target directory
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES['bookimage']['tmp_name'], $target_file)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO book (BookTitle, Author, Publisher, Language, Category, Photo, description) VALUES (?, ?, ?, ?, ?)");
        
        // Bind parameters to the prepared statement
        $stmt->bind_param("sssss", $book_title, $author, $publisher, $language, $category, $bookimage, $description);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "A new book has been inserted successfully.";
            echo "<script>setTimeout(function(){ window.location.href = 'display_books.php'; }, 5000);</script>";
        } else {
            echo "Error inserting into table: " . $conn->error;
        }
        
        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }
}
$conn->close();
?>