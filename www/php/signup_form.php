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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="../style/main.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/signup_script.js"></script>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="../index.html"> 
                <img src="../images/Logo_1.jpg" width="400" height="190" alt="LitReads Library">
            </a>
        </div>
    </header>

    <main>
    <div class="container d-flex justify-content-center align-items-center vh-80">
        <div class="row">
            <div class="col-md-12">
                <form action="signup_procces.php" method="POST" class="form">
                    <h1 class="text-center">Sign Up</h1>
                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter your name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo isset($email) ? $email : ''; ?>" required autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="member_type">Member type:</label>
                        <select id="member_type" name="member_type" class="form-control">
                            <option value="Member" <?php if ($member_type === "Member") echo "selected"; ?>>Member <i class="fas fa-users"></i></option>
                            <option value="Admin" <?php if ($member_type === "Admin") echo "selected"; ?>>Admin</option>
                        </select>
                        <span class="select-icon">&#10003;</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required autocomplete="new-password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="retype_password">Re-type password:</label>
                        <input type="password" name="retype_password" id="retype_password" placeholder="Enter re-type password" required class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                    <div class="form-link text-center">
                        <a href="login_form.html">Already have an account?</a>
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

    

