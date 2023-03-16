<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login From</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Login Form</h2>
    </div>
    <form action="" class="form">
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" placeholder="email " id="email" autocomplete="off">
            <i class="ion-ios-checkmark"></i>
            <i class="ion-android-alert"></i>
            <!-- error msg -->
            <span></span>
        </div>
   
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" placeholder="password" id="password" autocomplete="off">
            <i class="ion-ios-checkmark"></i>
            <i class="ion-android-alert"></i>
            <!-- error msg -->
            <span></span>
        </div>
    
        <button id='submit'>Submit</button>
        <div class="form-group1">
            <p>
                 Not a account please click on register?
                <a href="register.php">Register</a>
            </p>
        </div>
    </form>
</div>
<script src="app.js"></script>

</body>

</html>