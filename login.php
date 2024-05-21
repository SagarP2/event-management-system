<!DOCTYPE html>
<html>
  
<head>
    <title>Login Form</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
   
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="w3l-mockup-form">
        <div class="container">
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>                    
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                            
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
 <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "event");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the login is for an admin
    if ($email === "admin@gmail.com" && $password === "admin123") {
        // Admin login successful
        session_start();
        $_SESSION["user_id"] = "admin@gmail.com";

        header("Location: ./event-management/index.php");
        exit();
    }

    // For customer login
    $sql = "SELECT * FROM tbl_register WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Customer login successful
            session_start();
            $_SESSION["user_id"] = $row["user_id"];

            $user_id = $row["user_id"];
            $login_time = date("Y-m-d H:i:s");
            $email = $_SERVER['email'];

            $insert_login_sql = "INSERT INTO login (user_id, login_time, email) VALUES ('$user_id', '$login_time', '$email')";

            if ($conn->query($insert_login_sql) === TRUE) {
                // Redirect to the customer dashboard page
                header("Location: Customer_Page.php");
                exit();
            } else {
                $error_message = "Error inserting login details: " . $conn->error;
            }
        } else {
            $error_message = "Incorrect password";
        }
    } 
    $conn->close();
}
?>

<!-- Include this block to display error messages -->
<?php if (isset($error_message)) : ?>
    <div class="error-message">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>


<!-- Include this block to display error messages -->
<?php if (isset($error_message)) : ?>
    <div class="error-message">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>

    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
 
</body>

</html>