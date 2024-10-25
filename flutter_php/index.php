<?php
//include 'inc/login.php';

//$page_name = $_GET['page'];

$page_name = isset($_GET['page']) ? $_GET['page'] : '';

if ($page_name == 'Register') {
    include 'inc/header.php';
    include 'inc/register-body.php';
    include 'inc/footer.php';
}
elseif ($page_name == 'Thankyou') {
    include 'inc/header.php';
    include 'inc/thankyou-body.php';
    include 'inc/footer.php';
}
elseif ($page_name == 'Forgot-Password') {
    include 'inc/header.php';
    include 'inc/forgot-password.php';
    include 'inc/footer.php';
}
elseif ($page_name == 'Logout') {
    include 'inc/header.php';
    include 'inc/logout-body.php';
    include 'inc/footer.php';
}
elseif ($page_name == 'Authenticate') {
    include 'inc/header.php';
    include 'inc/authenticate-body.php';
    include 'inc/footer.php';
}
elseif ($page_name == 'Dashboard') {
    include 'inc/header-1.php';
    include 'inc/nav-bar.php';
    include 'inc/dashboard-body.php';
    include 'inc/footer-1.php';
}
elseif ($page_name == 'Products') {
    include 'inc/header-1.php';
    include 'inc/nav-bar.php';
    include 'inc/products-body.php';
    include 'inc/footer-1.php';
}
elseif ($page_name == 'Orders') {
    include 'inc/header-1.php';
    include 'inc/nav-bar.php';
    include 'inc/orders-body.php';
    include 'inc/footer-1.php';
}else{
    include 'inc/header.php';
    include 'inc/login-body.php';
    include 'inc/footer.php';
}

?>




   