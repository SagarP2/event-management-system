<!DOCTYPE html>
<html>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        
                        <?php
                        ?>
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Full Name" required> 
                            <input type="date" class="dob" name="dob" placeholder="Enter Your Birth Date" required>
                            <input type="text" class="contact" name="contact" placeholder="Enter Your Contact" required>
                            <input type="text" class="address" name="address" placeholder="Enter Your Address" required>
                            <input type="text" class="pincode" name="pincode" placeholder="Enter City pincode" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="login.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
 
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $pincode = $_POST["pincode"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
 
    if ($password == $confirmPassword) {
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

       
        $conn = new mysqli("localhost", "root", "", "event");
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
   
        $sql = "INSERT INTO tbl_register (name, dob, contact, address, pincode, email, password) 
                VALUES ('$name', '$dob', '$contact', '$address', '$pincode', '$email', '$hashedPassword')";
        
        if ($conn->query($sql) === TRUE) {
           // echo "Registration successful! You can now log in.";
            
            ?>
            <script>
            swal("Success!", "Registration successfull", "success");
            </script>
            <?php

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    } else {
        echo "Passwords do not match. Please try again.";
    }
}
?>
    <script src="js/jquery.min.js"></script>
</body>

</html>