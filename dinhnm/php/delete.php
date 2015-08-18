<?php

include'connect.php';
if (isset($_GET['id'])) {
    $sql = "Delete FROM product WHERE id= ?";
    if ($stmt=$connect->prepare($sql)) {
        $id = $_GET['id'];
        $stmt->bind_param('s',$id);
        $stmt->execute();
        echo "<script>confirm('Delete success!'); window.location.href=\"index.php\"</script>";
        $stmt->close();
    } else {
        echo "<script>confirm('Can't delete or has an error!'); window.location.href=\"index.php\"</script>";
        echo $connect->error;
    }
}
?>
