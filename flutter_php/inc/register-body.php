<?php
include('database.php');

if (isset($_POST['submit'])) {
    $username = $_POST['yourname'];
    $useremail = $_POST['youremail'];
    $usermobile = $_POST['yourmobile'];
    $userpassword = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validate passwords
    if ($userpassword !== $confirmpassword) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_mobile, user_password) VALUES (:username, :useremail, :usermobile, :userpassword)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':useremail', $useremail);
        $stmt->bindParam(':usermobile', $usermobile);
        $stmt->bindParam(':userpassword', $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            $last_id = $conn->lastInsertId();
            header("Location: index.php?page=Thankyou&id=$last_id");
            exit; // Make sure to exit after redirection
        } else {
            echo "<script>alert('Error: " . $stmt->errorInfo()[2] . "');</script>";
        }
    }
}
?>

<body>
    <div class="container-fluid">
        <div class="row" style="padding-top: 5%;">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: center; background-color: white; border-radius: 20px;">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        Logo
                    </div>
                    <div class="col-md-12">
                        <span style="font-weight: 100; font-size:18px;">Register A New Account</span>
                    </div>
                    <div class="col-md-12">
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-12" style="text-align:left; font-size: 14px; font-weight: 200; padding: 10px 20px;">
                                    <label>Your Name</label>
                                    <input type="text" name="yourname" placeholder="Your Name" class="form-control" required>
                                </div>
                                <div class="col-md-12" style="text-align:left; font-size: 14px; font-weight: 200; padding: 10px 20px;">
                                    <label>Your Email (Email Will Be The Username)</label>
                                    <input type="email" name="youremail" placeholder="Email Id" class="form-control" required>
                                </div>
                                <div class="col-md-12" style="text-align:left; font-size: 14px; font-weight: 200; padding: 10px 20px;">
                                    <label>Your Mobile</label>
                                    <input type="text" name="yourmobile" placeholder="10 Digit Mobile Number" class="form-control" required pattern="\d{10}">
                                </div>
                                <div class="col-md-12" style="text-align:left; font-size: 14px; font-weight: 200; padding: 20px 20px;">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                                </div>
                                <div class="col-md-12" style="text-align:left; font-size: 14px; font-weight: 200; padding: 20px 20px;">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" required>
                                </div>
                                <div class="col-md-12" style="text-align:center; font-size: 14px; font-weight: 200; padding: 10px 20px;">
                                    <button name="submit" class="btn btn-warning">Register Now</button>
                                </div>
                                <div class="col-md-12" style="text-align:center; font-size: 12px; font-weight: 200; padding: 0px 20px;">
                                    <a href="index.php" style="text-decoration: none; color: black;">Already Have An Account? Login Now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
