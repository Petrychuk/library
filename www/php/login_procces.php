<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";/* Put your password */
$dbname = "library";/* Put your database name */

/* Create connection */
$conn = new mysqli($servername, $username, $password, $dbname);

/* Check connection */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: display_book.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $password_hash = md5($password);

    $sql = "SELECT MemberType, FirstName, LastName, EmailAddress FROM users WHERE EmailAddress = '$email' AND PasswordMD5Hash = '$password_hash'";
    
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $row['staffID'];
        $_SESSION['admin_username'] = $row['userName'];
        $_SESSION['admin_name'] = $row['firstName'] . ' ' . $row['lastName'];

        header("Location: display_books.php");
        exit;
    } else
    { 
       header("Location: login_form.html");
    }
}       
?>