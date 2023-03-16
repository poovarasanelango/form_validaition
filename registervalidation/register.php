<?php
// include_once('./pdo.php');
// if (isset($_POST['btn'])) {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $phonenumber = $_POST['phonenumber'];
//     $password = $_POST['password'];
//     $confirmpassword = $_POST['confirmpassword'];

//     $select_users = $conn->prepare("SELECT * FROM form1 WHERE email = ?");
//     $select_users->execute([$email]);

//     if ($select_users->rowCount() > 0) {

//         $error = "Email already Exits...please give correct E-mail!";
//     } else {

//         if ($password != $confirmpassword) {

//             $error = "Please Enter correct password!!";
//         } else {

//             $insert_user = $conn->prepare("INSERT INTO form1 (username, email,phonenumber,password ) VALUES(?,?,?,?)");
//             $insert_user->execute([$username, $email, $phonenumber, $confirmpassword]);
//             // Set the error message in a session variable
//             $_SESSION['error'] = "Succesfully Registered Login Now";
//             header("Location: login.php");
//         }
//     }
// }

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=login_crud", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    if (isset($_POST['btn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        $select_users = $conn->prepare("SELECT * FROM form1 WHERE email = ?");
        $select_users->execute([$email]);

        if ($select_users->rowCount() > 0) {

            $error = "Email already Exits...please give correct E-mail!";
        } else {

            if ($password != $confirmpassword) {

                $error = "Please Enter correct password!!";
            } else {

                $insert_user = $conn->prepare("INSERT INTO form1 (username, email,phonenumber,password ) VALUES(?,?,?,?)");
                $insert_user->execute([$username, $email, $phonenumber, $confirmpassword]);
                // Set the error message in a session variable
                $_SESSION['error'] = "Succesfully Registered Login Now";
                header("Location: login.php");
            }
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validation register and login form.</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-base.min.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    

</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Registeration Form</h2>
        </div>
        <form action="" class="form" method="POST">
            <div class="form-group">
                <label for="">UserName</label>
                <input type="text" placeholder="username" id="username" name="username" autocomplete="off">
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <!-- error msg -->
                <span></span>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" placeholder="email " id="email" name="email" autocomplete="off">
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <!-- error msg -->
                <span></span>
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" placeholder="phonenumber" id="phonenumber" name="phonenumber" autocomplete="off">
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <!-- error msg -->
                <span></span>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" placeholder="password" id="password" name="password" autocomplete="off">
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <!-- error msg -->
                <span></span>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="confirm password" id="confirmpassword" name="confirmpassword" autocomplete="off">
                <i class="ion-ios-checkmark"></i>
                <i class="ion-android-alert"></i>
                <!-- error msg -->
                <span></span>
            </div>
            <button id='submit' name="btn">Submit</button>
            <div class="form-group1">
                <p>
                    Do have account?
                    <a href="login.php">Login</a>
                </p>
            </div>
        </form>
    </div>
    <script src="app.js"></script>
</body>

</html>