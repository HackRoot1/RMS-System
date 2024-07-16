<?php

require("./config.php");

if (isset($_POST['login-form'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM users_data WHERE email = '{$email}' AND password = '{$password}'";
    $login_result = mysqli_query($conn, $login_query) or die("Login Query Failed");

    if ($login_result->num_rows === 1) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ./user/dashboard.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>

    <main>
        <section id="login-section">

            <div class="login-form">
                <div class="return-page"><a href="./index.php">Back</a></div>
                <div>
                    <div class="title">Login</div>
                    <div class="data">Welcome to log in to your restaurant management system.</div>
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Please enter your email" autocomplete="off">
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Please enter your password" autocomplete="off">
                    </div>

                    <div>
                        <input type="submit" value="LOGIN" name="login-form">
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