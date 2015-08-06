<?php
include 'connect.php';

if (isset($_POST['btt_res'])) {
    $id = $_POST['id'];
    $success = true;

    $name = $_POST['txt_name'];
    $year = $_POST['txt_nam'];
    $month = $_POST['txt_thang'];
    $date = $_POST['txt_ngay'];
    $birthdate = $year . "-" . $month . "-" . $date;
    $phone = $_POST['txt_phone'];
    $mail = $_POST['txt_email'];
    $sex = $_POST['sex'];

    if (!$name) {
        $success = false;
    }
    if (!$year) {
        $success = false;
    }
    if (!$month) {
        $success = false;
    }
    if (!$date) {
        $success = false;
    }
    if (!$phone) {
        $success = false;
    }
    if (!$mail) {
        $success = false;
    }
    if (!$sex) {
        $success = false;
    }

    if ($success) {
        $sql = "UPDATE users SET name='{$name}', birthdate='{$birthdate}', phone='{$phone}', email='{$mail}', sex={$sex} WHERE id={$id}";
        $connect->query($sql);
        header("location: index.php");
    }
} else {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id={$id}";
        if ($result = $connect->query($sql)) {
            $user = $result->fetch_assoc();
            $arrbirthdate = explode('-', $user['birthdate']);
            $year = $arrbirthdate[0];
            $month = $arrbirthdate[1];
            $date = $arrbirthdate[2];
        } else {
            echo "<script>alert('Không tìm thấy bản ghi hoặc có lỗi!'); window.location.href=\"index.php\"</script>";
        }
    } else {
        echo "<script>alert('Không có id truyền vào!'); window.location.href=\"index.php\"</script>";
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <center>
        <h2>Register</h2>
        <form method="post" action="/longnh/php/phpmysql/edit.php" name="register" >
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
            <table border="1">
                <tr>
                    <td >Name :</td>
                    <td colspan="3"><input type="text" name="txt_name" value="<?php echo $user['name']; ?>" size="40"/></td>
                </tr>
                <tr>
                    <td>Birthdate :</td>
                    <td >Năm
                        <select name="txt_nam">
<?php for ($i = 1970; $i < 2000; $i++): ?>
                                <option <?php if ($year == $i) echo "selected=\"selected\""; ?> value="<?php echo $i; ?>">
                                <?php echo $i; ?>
                                </option>
                                <?php endfor; ?>
                        </select>

                        Tháng
                        <select name="txt_thang">
<?php for ($i = 1; $i <= 12; $i++): ?>
                                <option <?php if ($month == $i) echo "selected=\"selected\""; ?> value="<?php echo $i; ?>">
                                <?php echo $i; ?>
                                </option>
                                <?php endfor; ?>               
                        </select>

                        Ngày
                        <select name="txt_ngay"><?php for ($i = 1; $i < 32; $i++): ?>
                                <option <?php if ($date == $i) echo "selected=\"selected\""; ?> value="<?php echo $i; ?>">
    <?php echo $i; ?>
                                </option>
                                <?php endfor; ?>
                        </select>
                    </td> 
                </tr>

                <tr>
                    <td >Phone :</td>
                    <td colspan="3"><input type="text" name="txt_phone" value="<?php echo isset($user['phone']) ? $user['phone'] : ""; ?>" size="40"/></td>
                </tr>

                <tr>
                    <td >Email :</td>
                    <td colspan="3"><input type="text" name="txt_email" value="<?php echo isset($user['email']) ? $user['email'] : ""; ?>" size="40"/></td>
                </tr>

                <tr>
                    <td >Giới tính :</td>
                    <td colspan="3" align="center">
                        <input type="radio" name="sex" id="ra_nam" value="1"  <?php if ($user['sex'] == 1) echo "checked=\"checked\""; ?> />Nam
                        <input type="radio" name="sex" id="ra_nu" value="2" <?php if ($user['sex'] == 2) echo "checked=\"checked\""; ?> />Nữ
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="btt_res" value="Chỉnh sửa"/>
                        <input type="reset" name="reset" value="Reset"/>
                    </td>
                </tr>
            </table>

        </form>
        <a href="index.php"><< Quay lại trang danh sách</a>
    </center>
</body>
</html>