<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .container {
            padding: 40px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px #000;
        }

        body {
            background-image: url("./Images/background.png");
        }
    </style>
</head>

<body>

    <?php

    require_once 'init.php';
    $title = 'Đăng kí';
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirmpassword'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $user = findUserByUsername($username);
        if ($username == "" || $password == "" || $email == "") {
            $error= "Vui lòng nhập đầy đủ thông tin";
            echo header("refresh: 0.5");
           
        } else {
            if ($user) {
                $error = "Tài khoản đã tồn tại";
            } 
            else
            {
                if ($password == $confirmpassword) {
                    $_SESSION['username'] = $user['username'];
                    $dangki = array(
                        'username' => $username,
                        'password' => $password
                    );
                    $content = file_get_contents('./data');
                    $users1 = unserialize($content);
                    $users[sizeof($users1) + 1] = array($dangki);
                    file_put_contents('./data', serialize($users[sizeof($users1) + 1]),  LOCK_EX);
                    header('Location: login.php');
                    exit();
                }
                else
                {
                    $error="Mật khẩu không khớp";
                }
            }
        }
    }
    ?>
    <?php
    include 'header.php';
    ?>
    <?php if (isset($error)) : ?>
        <div class="alert alert-info">
            <?php echo $error; ?>
        </div>
    <?php else : ?>
        <div class="container-fuild">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="container" action="register.php" method="POST">
                        <h1 style="text-align: center;"> REGISTER </h1>
                        <div class="form-group">
                            <div class="input-group inputIncon">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user  fa-lg fa-fw"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group inputIncon">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope  fa-lg fa-fw"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group inputIncon">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock  fa-lg fa-fw"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group inputIncon">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock  fa-lg fa-fw"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <button class="btn btn-primary btn-lg btn-block w3-round-large" type="submit" name="dki" value="dki">
                                    Create Accounts</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
    require_once 'footer.php';
    ?>
</body>

</html>
