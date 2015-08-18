<?php
include 'header.php';
include 'connect.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    if ($result = $connect->query($sql)) {
        $user = $result->fetch_assoc();
        if(empty($user)) {
            echo "<script>alert('Email hoặc password sai!'); window.location.href=\"index.php\"</script>";
        }
        
        $_SESSION['user'] = $user;
//        var_dump($_SESSION['user']);die;
        header('location:index.php');
    } else {
        echo "<script>alert('Không tìm thấy người dùng hoặc có lỗi xảy ra!'); window.location.href=\"index.php\"</script>";
    }
}
?>

<form method="post" name="loginForm" action="login.php">
    Email: <input type="text" name="email" > <br />
    Password: <input type="password" name="password" > <br />
    <input type="submit" name="submit" value="Đăng nhập" > <br />
</form>