<?php
require_once 'init.php';
require_once 'functions.php';
$title='Trang chủ';
$currentUser=getCurrentUser();
?>

<?php include 'header.php' ?>

<?php if($currentUser): ?>
    <div class="alert alert-danger">
        Chào <?php echo  $currentUser['username']; ?>
    </div>

<?php else: ?>
    <div class="alert alert-warning">
        Bạn chưa đăng nhập
    </div>

<?php endif; ?>
<?php include 'footer.php' ?>