<?php
require('config.php'); // Подключение к базе данных, предположим, что это уже сделано

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_type = $_POST["member_type"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Дополнительная проверка и обработка данных, если необходимо

    // Хеширование пароля (лучше использовать более безопасные методы, чем MD5)
    $password_hash = md5($password);

    $sql = "INSERT INTO user (MemberType, FirstName, LastName, EmailAddress, PasswordMD5Hash) VALUES ('$member_type', '$first_name', '$last_name', '$email', '$password_hash')";

    if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true, "message" => "$first_name added successfully!"));
} else {
    echo json_encode(array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error));
}

}

$conn->close();
?>
