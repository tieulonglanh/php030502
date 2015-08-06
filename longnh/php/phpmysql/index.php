<meta charset="utf-8" />
<?php
include 'connect.php';
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$limit = 2;
$offset = $limit * ($page - 1);
$sql = "SELECT * FROM users LIMIT {$limit} OFFSET $offset";
$result = $connect->query($sql);
$users = array();
while ($row = $result->fetch_assoc()) {
    $users[$row['id']] = $row;
}
?>
<h1>Danh sách User</h1>

<a href="register.php">Đăng ký >></a>
<table>
    <tr>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Giới tính</th>
        <th>Lựa chọn</th>
    </tr>
    <?php foreach ($users as $key => $user): ?>
        <tr>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['birthdate']; ?></td>
            <td><?php echo $user['phone']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo ($user['sex'] == 1) ? "Nam" : "Nữ"; ?></td>
            <td><a href="edit.php?id=<?php echo $user['id']; ?>">sửa</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if ($page > 1): ?>
    <a href="index.php?page=<?php echo $page - 1; ?>"> << </a>
<?php endif; ?>
<a href=""> <?php echo $page ?> </a>
<a href="index.php?page=<?php echo $page + 1; ?>"> >> </a>

<style>
    table, th, tr, td{
        border: 1px solid;
    }
    table{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    a {
        text-decoration: none;
    }
</style>