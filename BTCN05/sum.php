<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h1 {
            font-size: 40px;
        }
    </style>
</head>

<body>
    <?php
    require_once 'init.php';
    require_once 'functions.php';
    $title = 'Cộng hai số';
    $currentUser = getCurrentUser();

    if (!$currentUser) {
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['number1']) && isset($_POST['number2'])) {
        $a = $_POST['number1'];
        $b = $_POST['number2'];
        $result = $a + $b;
    }
    ?>
    <?php include 'header.php'; ?>

    <?php if (isset($result)) : ?>
        <div class="alert alert-success">
            Kết quả: <?php echo $result; ?>
        </div>
    <?php else : ?>
        <form action="sum.php" method="post">
            <div class="form-group">
                <label for="number1">Số thứ nhất:</label>
                <input type="number" class="form-control" id="number1" placeholder="Số thứ nhất" name="number1">
            </div>
            <div class="form-group">
                <label for="number2">Số thứ hai:</label>
                <input type="number" class="form-control" id="number2" placeholder="Số thứ hai" name="number2">
            </div>
            <button id="Goi" type="submit" class="btn btn-default">Gởi dữ liệu</button>
        </form>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
</body>

</html>