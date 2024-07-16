<?php

require("./config.php");

if (isset($_POST['sign-up-form'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $register_query = "INSERT INTO 
                    users_data (username, email, password) 
                VALUES 
                    ('{$username}', '{$email}', '{$password}')";

    if (mysqli_query($conn, $register_query)) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ./user/dashboard.php");
        exit();
    } else {
        die("Register Query Failed");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/registration.css">

</head>

<body>

    <main>
        <section id="login-section">

            <div class="login-form">
                <div class="return-page"><a href="./index.php">Back</a></div>
                <div>
                    <div class="title">Sign Up</div>
                    <div class="data">Welcome to sign up to your restaurant management system.</div>
                </div>

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Please enter your full name" autocomplete="off">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Please enter your email" autocomplete="off">
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Please enter your password" autocomplete="off">
                    </div>

                    <div>
                        <input type="submit" value="Sign Up" name="sign-up-form">
                    </div>
                </form>
            </div>

            <div class="login-illustration">
                <img src="./assets/images/illustration2.png" alt="">
            </div>
        </section>
    </main>

</body>

</html>