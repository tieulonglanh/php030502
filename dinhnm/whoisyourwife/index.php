<?php
include 'header.php';
include 'connect.php';
//if(!isset($_SESSION['user'])){
//    header('location:login.php');
//}
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$limit = 2;
$offset = $limit * ($page - 1);
if (isset($_POST['Search'])) {
    $key = $_POST['txtSearch'];
    $status=$_POST['txtStatus'];
    $sql = "SELECT * FROM administrators WHERE MATCH(fullname) AGAINST ('{$key}' IN BOOLEAN MODE) and status='{$status}' LIMIT {$limit} OFFSET $offset";
} else {
    $sql = "SELECT * FROM administrators LIMIT {$limit} OFFSET $offset";
}
$result = $connect->query($sql);
$users = array();
while ($row = $result->fetch_assoc()) {
    $users[$row['id']] = $row;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>List Administrator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .content{
                width: 900px;
                margin: 0 auto;

            }
            table, th, tr, td{
                border: 1px solid;
                padding: 10px;

            }
            table{
                text-align: center;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            a {
                text-decoration: none;
            }
            a:visited {
                color: blue;
                font-weight: bold;
            }
            table{
                border-collapse: collapse;    
            }

        </style>
    </head>
    <body>
         <form method="post">
        <div class="content">
            <h1>Hello <?php //echo $_SESSION['user'];   ?></h1>
            <h4><a href="logout.php">Logout</a></h4>
            <a href="add.php">>> Add new product</a>
            <div style="text-align:right">
               
                    <select name="txtStatus">
                        <option value="1">Active</option>
                        <option value="0">DeActive</option>
                    </select>
                    <input type="text" value="" name="txtSearch"/>
                    <input type="submit" value="Search" name="Search"/>
                

            </div>
            <table>
                <tr>
                    <th>User Id</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($users as $key => $user): ?>
                    <tr>
                        <td><?php echo $key//$user["id"];  ?></td>
                        <td><?php echo $user["username"]; ?></td>
                        <td><?php echo $user["password"]; ?></td>
                        <td><?php echo $user["fullname"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td><?php echo $user["phone"]; ?></td>
                        <td><?php echo $user["created"]; ?></td>
                        <td><?php if ($user["status"] == 0)
                    echo 'Deactive';
                else
                    echo 'Active';
                ?></td>
                        <td><a href="edit.php?id=<?php echo $user["id"]; ?>">Edit</a></td>
                        <td><a onclick="return confirm('Are you sure delete product');" href="delete.php?id=<?php echo $user["id"]; ?>">Delete</a></td>
                    </tr>
            <?php endforeach; ?>
            </table>
            <?php
            if (isset($_POST['Search'])) {
                $key = $_POST['txtSearch'];
                $sql2 = "SELECT count(*)FROM administrators WHERE MATCH(fullname) AGAINST ('{$key}'  IN NATURAL LANGUAGE MODE) and status='{$status}' ";
            } else {
                $sql2 = "SELECT count(*) FROM administrators";
            }
            $result2 = $connect->query($sql2);
            $rowcount = $result2->fetch_row()[0];
            $num_page = $rowcount / $limit;
            
            ?>
            Page: 
            <?php if ($page > 1): ?>
                <a href="index.php?page=<?php echo $page - 1; ?>"> << </a>
            <?php endif; ?>
            <a href=""> <?php echo $page ?> </a>
            <?php if ($page < $num_page): ?>
                <a href="index.php?page=<?php echo $page + 1; ?>"> >> </a>
            <?php endif; ?>
            of <?php echo round($num_page); ?>

            <div style="text-align: center"><?php echo $rowcount; ?> record</div>
            
        </div>
             </form>
    </body>
</html>