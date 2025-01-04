<?php
    require_once 'config/database.php';
    $username = '';
    $password = '';

    if (isset($_SESSION['errorlogin_message'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorlogin_message'] . '</div>';
        unset($_SESSION['errorlogin_message']); 
    }

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    if (!empty($username) && !empty($password)) {
        $user = new User();
        $login_result = $user->login($username, $password);
    
        if ($login_result == 1) {
            $_SESSION['login'] = 'Logout, ' . $username;
            header('location: /be_shoeshe/admin/products/index.php');
            exit();
        } elseif ($login_result == 0) { // Nếu role là 0
            $_SESSION['login'] = 'Logout, ' . $username;
            header('location: /be_shoeshe/index.php');
            exit();
        } else {
            $_SESSION['errorlogin_message'] = 'Đăng nhập thất bại. Có thể đã sai user hoặc password';
            header('location: /be1_shoeshe/login.php');
            exit();
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
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>

<div class="login py-5 bg-img">
    <div class="container">
    <div class="d-flex mt-4">
        <a href="index.php" class="btn btn-secondary rounded-pill">Back</a>
    </div>
        <div class="row py-5">
            <div class="col-sm-7">
                <h1 class="p-5 text-login bg-h1 text-white">Welcome to <br> ShoesHe</h1>
            </div>
            <div class="col-sm-5 bg-light p-5" style="margin-left: -12px;">
                <div class="d-flex gap-2">
                    <p class="ms-auto my-auto">Already have an account?</p>
                    <a href="signup.php" type="submit" class="btn btn-outline-primary rounded-pill">Sign up</a>
                </div>
                <h2 class="text-login">Login</h2>
                <p class="mt-3 fs-5">Welcome back! Please login to your account</p>
                <form class="mt-5" action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label mx-2">User Name</label>
                        <input type="text" placeholder="Username" class="form-control rounded-pill" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label mx-2">Password</label>
                        <input type="password" placeholder="Password" class="form-control rounded-pill" id="password" name="password">
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-primary rounded-pill mt-3" type="submit">Login</button>
                    </div>
                    <div class="d-flex ">
                        <a href="#" class="mx-2 mt-2">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
