<?php
require('config.php');
session_start();


// Проверка логина и пароля, установка переменной $userIsAdmin в зависимости от роли
$userIsAdmin = true;
if ($userIsAdmin) {
    $_SESSION['member_type'] = 'Admin';
    // Другие установки сессии для админа
} else {
    $_SESSION['member_type'] = 'Member';
    // Другие установки сессии для пользователя
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin book page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style/main.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 20px;
            margin: auto; 
            width: 1480px;   
        }
        
        th a {
            text-decoration: none;
            color: #fff;
            background-color: #4BA5C1;
            padding: 10px;
            border-radius: 5px;
        }

        tr:nth-child(even) {
            background-color: #D6CEF2;
        }
        .links a {
            color: black;
            padding-top: 15px;
        }
    
        
    </style>
</head>

<body>
<header>
    <div class="logo">
       <img src="../images/Logo_short.jpg" alt="LitReads Library">
    </div>
    <div><h2>Books of LitReads Library</h2></div>
    <div>
        <form class="search_block">
                    <input type="text" name="text" class="search" placeholder="Search book!" />
                    <input type="submit" name="submit" class="submit" value="Search" />
                   
        </form>
    </div>
    <div>
    <p>Hi, <?php echo ($_SESSION['member_type'] === 'Member') ? $_SESSION['first_name'] : 'admin'; ?></p>
    <a href="../index.html"><i class="fi fi-br-exit"></i></a>
    </div>
</header>
<div class="container">

<?php
    $sql = "SELECT * FROM `book`";
    if($ans = $conn->query($sql)){
        if($ans->num_rows < 0){
            echo "No record exists in the manage table";
        }else{
            ?>

    <table>
        <tr>
            <th colspan="10">
            <a href="../php/newBookform.php" class="button">Add a new book</a>
            </th>
        </tr>
        <tr>
            <td>Book ID</td>
            <td>Book Title</td>
            <td>Book Discription</td>
            <td>Category</td>
            <td>Author</td>
            <td>Publisher</td>
            <td>Photo</td>
            <td>Book borrow by</td>
            <td>Action</td>
        </tr>
<?php
    while($row = $ans->fetch_array()){
?>
  <tr>
     <td><?php echo $row["cabinType"]; ?></td>
     <td><?php echo $row["cabinDescription"]; ?></td>
     <td><?php echo $row["pricePerNight"]; ?></td>
     <td><?php echo $row["pricePerWeek"]; ?></td>
     <td><img class="img-thumbnail" style="max-width:200px;height:150px" src="../images/<?php echo $row['photo']?>" alt=""></td>
     <td class="links">
        <a href="updateCabin.php?id=<?php echo $row['cabinID']?>" class="btn-cancel">Edit</a><br><br><br>
        <a href="deleteCabin.php?id=<?php echo $row['cabinID'] ?>" class="btn btn-primary">Delete</a>
     </td>
  </tr>
<?php
    }
?>
</table>
<?php
        }
    }
    $ans->free();
    $conn->close();
?>
</div>
<footer> 
    <a href="../php/adminLogout.php">Logout</a>
    <p>Copywrite © - Create by Sunny Spot develop 2023</p>  
  </footer>
</body>
</html>
