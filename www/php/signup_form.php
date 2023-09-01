<?php
$member_type = "Member"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["member_type"])) {
        $member_type = $_POST["member_type"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../style/main.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/signup_script.js"></script>
</head>

</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.html"> 
                <img src="../images/Logo_1.jpg" alt="LitReads Library">
            </a>
        </div>
    </header>

    <main>
        <form action="signup_procces.php" method="POST" class="form">
            <h1>Sign Up</h1>

            <label for="member_type">Member Type:</label>
            <select id="member_type" name="member_type">
                <option value="Member" <?php if ($member_type === "Member") echo "selected"; ?>>Member</option>
                <option value="Admin" <?php if ($member_type === "Admin") echo "selected"; ?>>Admin</option>   
             </select><br><br>
            <br>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required>
            <br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required>
            <br>
            <label for="email">Email address:</label>
           <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo isset($email) ? $email : ''; ?>" required autocomplete="off"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="new-password"><br>
            <br>
            <label for="retype_password">Re-type Password:</label>
            <input type="password" name="retype_password" id="retype_password" required>
            <br>
            <input type="submit" value="Submit">
        </form>
        <div>
            <a href="login_form.html">Do you have account?</a>
        </div>
        <div id="popup-message" class="popup-message"></div>
    </main>

    <footer>
        <p>Copywrite © - Create by Nataliia Petrychuk 2023</p>
    </footer>
</body>

</html>

