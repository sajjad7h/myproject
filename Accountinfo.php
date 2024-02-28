<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Include database connection file
require_once 'db_connection.php';

// Fetch user information from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $gender = $row['gender'];
    $marital_status = $row['marital_status'];
    $dob = $row['dob'];
    $mobile = $row['mobile'];
} else {
    // User not found, redirect with error message
    $_SESSION['update_error'] = "User not found.";
    header("Location: accountinfo.php");
    exit;
}

// Check if the form is submitted for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from the form submission
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Update user information in the database
    $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, gender = ?, marital_status = ?, dob = ?, mobile = ?, password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $first_name, $last_name, $email, $gender, $marital_status, $dob, $mobile, $password, $user_id);

    if ($stmt->execute()) {
        // Update successful, set success message
        $_SESSION['update_success'] = true;
    } else {
        // Update failed, set error message
        $_SESSION['update_error'] = "Error updating user information.";
    }

    // Redirect back to accountinfo.php
    header("Location: accountinfo.php");
    exit;
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <style>
    body {

        background-image: url(d.jpg);
        font-family: Arial, sans-serif;
        background-color:    #ebf5fb;
        margin: 0;
        padding: 10px; /* adjust the padding */
        top: 10px; /* top property without unit is invalid, assuming you meant 10px */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
         background-image: url(picture25.jpg);
        
        padding: 20px;
        border-radius: 05px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        min-width: 300px; /* set a minimum width to ensure content doesn't get too squeezed */
        min-height: 500px; /* set a minimum height */
    }
    .container h2 {
         background-color: white;
        text-align: center;
        margin-bottom: 10px;
    }
    .error-message {
        color: red;
        text-align: center;
        margin-bottom: 10px;
    }
    .success-message {
        color: green;
        text-align: center;
        margin-bottom: 10px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="password"] {
        width: 100%;
        padding: 12px; /* increase padding */
        margin-bottom: 15px; /* increase margin bottom */
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    button[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 12px 20px; /* increase padding */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button[type="submit"]:hover {
        background-color: #151B4F;
    }
</style>

</head>
<body>
<div style="position: absolute; top: 50px; left: 70px; font-size: 40px; color: #151B4F;">
    <?php echo "Hi, " . htmlspecialchars($first_name) . "!"; ?>
</div>

    <div class="container">
        <h2>Account Information</h2>
        <?php if (isset($_SESSION['update_error'])): ?>
            <div class="error-message"><?php echo $_SESSION['update_error']; ?></div>
            <?php unset($_SESSION['update_error']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['update_success'])): ?>
            <div class="success-message">Account information updated successfully!</div>
            <?php unset($_SESSION['update_success']); ?>
      <?php endif; ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1;">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
        </div>
        <div style="flex: 1;">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1;">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div style="flex: 1;">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1;">
            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($gender); ?>" required>
        </div>
        <div style="flex: 1;">
            <label for="marital_status">Marital Status</label>
            <input type="text" id="marital_status" name="marital_status" value="<?php echo htmlspecialchars($marital_status); ?>" required>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1;">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" required>
        </div>
        <div style="flex: 1;">
            <label for="mobile">Mobile Phone</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>" required>
        </div>
    </div>
        <button type="submit" style="background-color: #151B4F; margin-top: 30px;">Update Information</button>
    </form>
