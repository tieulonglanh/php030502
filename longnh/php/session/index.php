<?php
include 'header.php';
include 'connect.php';

if(!isset($_SESSION['user'])){
    header('location:login.php');
}
?>
<a href="#">Xin chào bạn <?php echo $_SESSION['user']['name']; ?>!</a> <br />
<a href="logout.php">Thoát</a>
<h1>Trang index</h1>