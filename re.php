<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Define CSS variables */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: poppins;
            font-size: 16px;
            color: #fff;
        }
        .form-box {
            background-color: rgba(0, 0, 0, 0.5);
            margin: auto auto;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 15px #000;
            position: absolute;
            top: 20;
            bottom: 0;
            left: 0;
            right: 0;
            width: 500px;
            height: 750px; /* Increased height */
        }
        .form-box:before {
            background-image: url("https://images.pexels.com/photos/889831/pexels-photo-889831.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load");
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
            padding-bottom: 30px;
            text-align: center;
        }
        .form-box input,
        .form-box select {
            margin: 20px 0px; /* Decreased margin */
            border: none;
            padding: 5px; /* Decreased padding */
            border-radius: 5px;
            width: calc(100% - 16px); /* Adjusted width */
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
            margin-top: 30px; /* Updated margin-top value */
        }
        span a {
            color: #BBB;
        }
    </style>
</head>
<body>
    <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div style="background-color: green; color: white; padding: 10px; text-align: center;">Registration Successful!</div>
    <?php endif; ?>

    <div class="form-box">
        <h2 class="header-text">Sign Up</h2>
        
        <form action="connection.php" method="post">
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" placeholder="Enter your first name" required>
                </div>
                <div style="width: 48%;">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" placeholder="Enter your last name" required>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div style="width: 48%;">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="gender">Gender:</label>
                    <select name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="custom">Custom</option>
                    </select>
                </div>
                <div style="width: 48%;">
                    <label for="marital_status">Marital Status:</label>
                    <select name="marital_status" required>
                        <option value="married">Married</option>
                        <option value="unmarried">Unmarried</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" required>
                </div>
                <div style="width: 48%;">
                    <label for="mobile">Mobile:</label>
                    <input type="text" name="mobile" placeholder="Enter your mobile number" required>
                </div>
            </div>

            <input type="submit" value="Sign Up">
            <p><u>Already have an account?</u> <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>