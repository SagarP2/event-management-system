
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image3.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Forgot Password</h2>
                        
                        <?php 
                        ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <button name="submit" class="btn" type="submit">Send Mail</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="login.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <?php
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    
    $reset_token = bin2hex(random_bytes(32));

    // Store the reset token in the database for the user
    $conn = new mysqli("localhost", "root", "", "event");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Update the user's reset token in the database
        $update_sql = "UPDATE tbl_register SET reset_token = '$reset_token' WHERE email = '$email'";
        if ($conn->query($update_sql) === TRUE) {
           
            $reset_link = "http://example.com/reset-password.php?token=$reset_token";
            // Send the email to the user
            mail($email, "Password Reset Link", "Click the link to reset your password: $reset_link");

            // Display a success message
            $success_message = "Password reset link sent. Check your email.";
        } else {
            $error_message = "Error updating reset token: " . $conn->error;
        }
    } else {
        $error_message = "Email not found.";
    }

    $conn->close();
}
?>

  
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
  

</body>

</html>