<?php

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
