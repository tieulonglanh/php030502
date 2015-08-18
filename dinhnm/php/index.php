<?php
include 'connect.php';
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$limit = 5;
$offset = $limit * ($page - 1);
$sql = "SELECT * FROM product LIMIT {$limit} OFFSET $offset";
$result = $connect->query($sql);
$products = array();
while ($row = $result->fetch_assoc()) {
    $products[$row['id']] = $row;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>List products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table, th, tr, td{
                border: 1px solid;
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
        </style>
    </head>
    <body>
        <h1>List products</h1>
        <a href="add.php">>> Add new product</a>
        <table>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Product description</th>
                <th width='200'>Product detail</th>
                <th>Product image</th>
                <th>Facebook image</th>
                <th>Created Date</th>
                <th>Meta keyword</th>
                <th>Meta description</th>
                <th>Alias</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                <?php foreach ($products as $key => $product): ?>
                <tr>
                    <td><?php echo $product["id"]; ?></td>
                    <td><?php echo $product["product_name"]; ?></td>
                    <td><?php echo $product["category_id"]; ?></td>
                    <td><?php echo $product["product_description"]; ?></td>
                    <td><?php echo $product["product_detail"]; ?></td>
                    <td><?php echo $product["product_image"]; ?></td>
                    <td><?php echo $product["facebook_image"]; ?></td>
                    <td><?php echo $product["create_date"]; ?></td>
                    <td><?php echo $product["meta_keyword"]; ?></td>
                    <td><?php echo $product["meta_description"]; ?></td>
                    <td><?php echo $product["alias"]; ?></td>
                    <td><a href="edit.php?id=<?php echo $product["id"]; ?>">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure delete product');" href="delete.php?id=<?php echo $product["id"]; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php
        $sql2 = "SELECT * FROM product";
        $result2 = $connect->query($sql2);
        $rowcount = mysqli_num_rows($result2);
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

    </body>
</html>