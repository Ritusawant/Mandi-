<?php
session_start();
include('database.php');

$id = $_GET['id'] ?? null; // Use null coalescing operator for safety

if (isset($_POST['submit'])) {
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['password'];

    // Prepared statement to prevent SQL injection
    $select_user = "SELECT * FROM USERS WHERE user_email = :email";
    $sql = $conn->prepare($select_user);
    $sql->bindParam(':email', $useremail);
    
    // Execute the statement
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    // Check if user was found and verify password
    if ($data && password_verify($userpassword, $data->user_password)) {
        $_SESSION['session_id'] = $data->id;
        $_SESSION['session_name'] = $data->user_name;
        $_SESSION['session_email'] = $data->user_email;
        $_SESSION['_mobile'] = $data->user_mobile;

        header("Location: index.php?page=Dashboard");
        exit; // Ensure no further code is executed
    } else {
        // Handle login failure (e.g., display an error message)
        $error_message = "Invalid email or password.";
    }
}
?>


  <body >
    

    <!-- Admin Panel HTML Codes Will Be Wriiten Here (Start)-->

    <div class="container-fluid">
        <div class="row" style="padding-top: 10%;">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: center; background-color: white; border-radius: 20px;">
                <div class="row" >
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <img src="assets/img/Logo.png" height="70">
                    </div>

                    <div class="col-md-12">
                        <span style="font-family: 100; font-size: 15px;">Login To Your Account</span>
                    </div>

                    <div class="col-md-12">

                        <form method="POST">
                            <div class="row">
                                <div class="col-md-12" style="text-align: left; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;;">
                                    <label>Email Id</label>
                                    <input type="email" name="useremail" placeholder="Usrename" class="form-control">
                                </div>

                                <div class="col-md-12" style="text-align: left; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                                
                                <div class="col-md-12" style="text-align: center; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;">
                                    <!--<a href="index.php?page=Authenticate" class="btn btn-warning">Login Now</a>-->
                                    <button name="submit" class="btn btn-warning">Login Now</button>
                                </div>

                                <div class="col-md-12" style="text-align: center; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;">
                                    <div class="row">
                                        <div class="col-md-6" style="text-align: left; font-size: 12px; font-weight: 100;">
                                            <a href="index.php?page=Register" style="text-decoration: none; color: black;">
                                            No Account? Register Now</a>
                                        </div>
                                        <div class="col-md-6" style="text-align: right; font-size: 12px; font-weight: 100;">
                                            <a href="index.php?page=Forgot-Password" style="text-decoration: none; color: black;">
                                            Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>


    <!-- Admin Panel HTML Codes Will Be Wriiten Here (End)-->


        

