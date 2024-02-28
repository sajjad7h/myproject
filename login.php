<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
         * {
            box-sizing: border-box;
        }
        body {
            font-family: poppins;
            font-size: 16px;
            color: #fff;
        }
        .header {
            text-align: center;
            font-size: 80px; /* Increased font size */
            font-weight: bold;
            margin-bottom: 80px;
                        margin: 10px 0; /* Adjusted margin */
        }
        .form-box {
            background-color: rgba(0, 0, 0, 0.4);
            margin: auto auto;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 15px #000;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 450px;
            height: 400px; /* Decreased height */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .form-box:before {
            background-image: url("https://images.pexels.com/photos/3833722/pexels-photo-3833722.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load");
            width: 100%;
            height: 100%;
            background-size: cover;
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
            display: block;
            filter: blur(2px);
        }
        .form-box .header-text {
            font-size: 32px;
            font-weight: 600;
            padding-bottom: 10px;
            text-align: center;
        }
        .form-box input {
            margin: 20px 0px; /* Increased margin between input fields */
            border: none;
            padding: 8px; /* Decreased padding */
            border-radius: 5px;
            width: 100%; /* Adjusted width */
            font-size: 14px; /* Decreased font size */
            font-family: poppins;
        }
        .form-box input[type=checkbox] {
            display: none;
        }
        .form-box label {
            /* Removed styles that create a box */
            cursor: pointer;
        }
        .form-box label:before {
            /* Removed styles that create a box */
        }
        .form-box input[type=checkbox]:checked+label:before {
            /* Removed styles that create a box */
        }
        .form-box span {
            font-size: 14px;
        }
        .form-box button {
            background-color: deepskyblue;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            padding: 10px;
            margin-top: 20px; /* Increased margin-top value */
        }
        span a {
            color: #BBB;
        }
    
    </style>
</head>
<body>
    <h1 class="header">Bangladesh Railway</h1> <!-- Increased font size -->
    <div class="form-box">
        <h2 class="header-text">Login</h2>
        <?php
        // Start the session
        session_start();

        // Check if error message exists in session
        if (isset($_SESSION['login_error'])) {
            echo '<p style="color: red;">' . $_SESSION['login_error'] . '</p>';
            // Remove the login error message from session
            unset($_SESSION['login_error']);
        }
        ?>
        <form action="loginconn.php" method="post">
            <div style="width: 100%;">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div style="width: 100%;">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <input type="submit" value="Login">
            <p><u>Don't have an account?</u> <a href="re.php">Sign up here</a>.</p>
        </form>
   

</body>
</html>