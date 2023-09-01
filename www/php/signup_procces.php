<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_type = $_POST["member_type"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $retype_password = $_POST["retype_password"];

    // Проверка на валидные алфавитные символы и длину имен
    if (!preg_match('/^[A-Za-z]{1,20}$/', $first_name) || !preg_match('/^[A-Za-z]{1,20}$/', $last_name)) {
        echo json_encode(array("success" => false, "message" => "Invalid first name or last name."));
        exit;
    }

    // Проверка на валидный email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array("success" => false, "message" => "Invalid email address."));
        exit;
    }

    // Проверка, что email не существует в базе данных
    $email_check_sql = "SELECT COUNT(*) AS count FROM users WHERE EmailAddress = '$email'";
    $email_check_result = $conn->query($email_check_sql);
    $email_count = $email_check_result->fetch_assoc()["count"];
    if ($email_count > 0) {
        echo json_encode(array("success" => false, "message" => "Email address is already associated with another user."));
        exit;
    }

    // Проверка на совпадение паролей
    if ($password !== $retype_password) {
        echo json_encode(array("success" => false, "message" => "Passwords do not match."));
        exit;
    }

    // Проверка на минимальное количество символов в пароле
    if (strlen($password) < 4) {
        echo json_encode(array("success" => false, "message" => "Password must be at least 6 characters long."));
        exit;
    }
    echo "Debug message: Before INSERT"; // Отладочное сообщение

    $sql = "INSERT INTO users (MemberType, FirstName, LastName, EmailAddress, PasswordPlainText) VALUES ('$member_type', '$first_name', '$last_name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Hi, $first_name added successfully!"));
    } else {
        echo json_encode(array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error));
    }
    echo "Debug message: After INSERT";
  
    $conn->close();
}
?>
