<?php
    require_once 'config/database.php';
    $firstname = '';
    $lastname = '';
    $username = '';
    $password = '';

    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
    }
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
    }
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    if (!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname)) {
        $user = new User();
        if ($user->register($username, $password) == true) {
            echo '<div class="alert alert-success" role="alert">' . 'Đăng ký thành công!' . '</div>';
         }
         else
         {
            echo '<div class="alert alert-danger" role="alert">' . 'Đăng ký thất bại!' . '</div>';
         }
    }
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alertElement = document.querySelector('.alert');
            
            if (alertElement) {
                setTimeout(function() {
                    alertElement.style.display = 'none';
                }, 5000);
            }
        });
    </script>
    
    <title>Sign Up</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/styles.css">

<div class="login py-5 bg-img">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-7">
                    <h1 class="p-5 text-login bg-h1 text-white">Welcome to <br> ShoesHe</h1>
                </div>
                <div class="col-sm-5 bg-light p-5" style="margin-left: -12px;">
                    <div class="d-flex gap-2">
                        <p class="ms-auto my-auto">Do you already have an account?</p>
                        <a href="login.php" type="submit" class=" btn-signup rounded-pill">Login</a>
                    </div>
                    <h2 class="text-login">Sign Up</h2>
                    <p class="mt-3 fs-5">Welcome back! Please sign up <br> to your account</p>
                    <form class="mt-5" action="signup.php" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label mx-2">First name</label>
                            <input type="text" placeholder="First Name" class="form-control rounded-pill" id="firstname" name="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label mx-2">Last name</label>
                            <input type="text" placeholder="Last Name" class="form-control rounded-pill" id="lastname" name="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label mx-2">User Name</label>
                            <input type="text" placeholder="User name" class="form-control rounded-pill" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label mx-2">Password</label>
                            <input type="password" placeholder="Password" class="form-control rounded-pill" id="password" name="password">
                        </div>
                        <div class="d-flex ">
                            <p class="mx-2">This site is protected by reCAPTCHA and the Google <a
                                    href="https://policies.google.com/privacy" target="_blank" class="link">Privacy
                                    Policy</a> and <a href="https://policies.google.com/terms" target="_blank"
                                    class="link">Terms of Service apply.</a></p>
                        </div>
                        <div class="d-flex">
                            <button class="btn-login mt-3 rounded-pill" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>