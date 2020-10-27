<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-image: url("./Images/background.png");
            
        }
       
        input[type=text],
        input[type=password] select {

            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
            padding-left: 10px;
        }

        .container {
            padding: 40px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px #000;
        }

        .forget {
            padding-left: 190px;
        }

        .img {
            margin-top: -100px;
        }

        .img img {
            width: 120px;
            height: 150px;
        }

        h1 {
            text-align: center;
        }
    </style>
    </haed>

<body>
    <?php
    require_once 'init.php';
    $title = 'Đăng nhập';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = findUserByUsername($username);
        if (!$user) {
            $error = "Không tìm thấy người dùng";
            echo header("refresh: 0.5");
        } else {
            if ($password != $user['password']) {
                $error = "Mật khẩu hông chính xác";
            } else {
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
                exit();
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
                    <form class="container" action="login.php" method="post">
                        <div class="form-group">
                            <h1>LOGIN</h1>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user fa-lg fa-fw"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock fa-lg fa-fw"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <button class="button btn-primary btn-lg btn-block w3-round-large" type="submit" name="login" value="login">
                                    Login</button>
                            </div>
                            <div class="form-group">
                                <div>
                                    <p class="text-right">
                                        <a href="#">Forget password </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <p class="text-center">
                                        Don't have an account ?
                                        <a href="register.php">Register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php require_once 'footer.php' ?>




</body>

</html>
