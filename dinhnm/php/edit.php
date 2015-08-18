<?php
include 'connect.php';
if (isset($_POST['btnEdit'])) {
    if ($stmt = $connect->prepare("UPDATE product SET "
            . "product_name = ? , "
            . "category_id = ?  , "
            . "product_description = ? , "
            . "product_detail = ?  , "
            . "product_image = ?  , "
            . "facebook_image = ?  , "
            . "meta_keyword = ?  , "
            . "meta_description = ?   , "
            . "alias = ? "
            . "WHERE id = ? "
            )) {
        //Get param
        $txtName = $_POST['txtName'];
        $txtCategory = $_POST['txtCategory'];
        $txtPro_des = $_POST['txtPro_des'];
        $txtPro_det = $_POST['txtPro_det'];
        $txtPro_img = $_POST['txtPro_img'];
        $txtPro_face = $_POST['txtPro_face'];
        $txtKeyword = $_POST['txtKeyword'];
        $txtDescription = $_POST['txtDescription'];
        $txtAlias = $_POST['txtAlias'];
        $stmt->bind_param('ssssssssss', $txtName, $txtCategory, $txtPro_des, $txtPro_det, $txtPro_img, $txtPro_face, $txtKeyword, $txtDescription, $txtAlias, $id);
        $id = $_POST['id'];
        $stmt->execute();
        echo "<script>confirm('Edit success!'); window.location.href=\"index.php\"</script>";
        $stmt->close();
    } else {
        //Error
        echo $connect->error;
    }
} else {
    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM product WHERE id = ?";
        if($stmt = $connect->prepare($sql)){
            $id = $_GET['id'];
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
        } else {
            echo "<script>alert('No records found or an error!'); window.location.href=\"index.php\"</script>";
            return false;
        }
    } else {
        echo "<script>alert('No id passed!'); window.location.href=\"index.php\"</script>";
        return false;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script>
            $(document).ready(function () {
                $('#txtName').keyup(function () {
                    $('#txtAlias').val(khongdau($('#txtName').val()));
                });
            });
            function khongdau(str) {
                str = str.toLowerCase();
                str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                str = str.replace(/đ/g, "d");
                str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
                /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
                str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
                str = str.replace(/^\-+|\-+$/g, "");
                //cắt bỏ ký tự - ở đầu và cuối chuỗi
                return str;
            }
        </script>
        <script>

            $(document).ready(function () {
                $('#form').validate({
                    rules: {//Quy tắc thỏa mãn điều kiện validate
                        txtName: {
                            required: true
                        },
                        txtCategory: {
                            required: true

                        },
                        txtPro_des: {
                            required: true
                        },
                        txtPro_det: {
                            required: true
                        },
                        txtPro_img: {
                            required: true
                        },
                        txtPro_face: {
                            required: true
                        },
                        txtKeyword: {
                            required: true
                        },
                        txtDescription: {
                            required: true
                        },
                        txtAlias: {
                            required: true
                        }
                    },
                    messages: {
                        txtName: {
                            required: "Enter product name!"
                        },
                        txtCategory: {
                            required: "Choose category"
                        },
                        txtPro_des: {
                            required: "Enter description"
                        },
                        txtPro_det: {
                            required: "Enter detail"
                        },
                        txtPro_img: {
                            required: "Enter image"
                        },
                        txtPro_face: {
                            required: "Enter facebook image"
                        },
                        txtKeyword: {
                            required: "Enter meta keyword"
                        },
                        txtDescription: {
                            required: "Enter meta description"
                        },
                        txtAlias: {
                            required: "Enter alias"
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
    <center>
        <form method="post" action="edit.php" id="form" name="edit">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>" />
            <table border="1">
                <tr>
                    <td>Product Name :</td>
                    <td colspan="3"><input type="text" name="txtName" id="txtName" value="<?php echo $product['product_name'] ?>" size="40"/></td>
                </tr>
                <tr>
                    <td>Category :</td>
                    <td colspan="3">
                        <select name="txtCategory" style="width: 313px;">
                            <?php
                            $sql = "SELECT * FROM product_category where parent_id!=0";
                            $result = $connect->query($sql);
                            $category = array();
                            while ($row = $result->fetch_assoc()) {
                                $category[$row['id']] = $row;
                            }
                            ?>
                            <?php foreach ($category as $key => $cat): ?>
                                <option <?php if ($product["category_id"] == $cat['id']) echo "selected=\"selected\""; ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </td> 
                </tr>

                <tr>
                    <td>Product description :</td>
                    <td colspan="3">
                        <textarea style="width: 307px;" name="txtPro_des"><?php echo $product['product_description'] ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Product detail :</td>
                    <td colspan="3"><input type="text" name="txtPro_det" value="<?php echo $product['product_detail'] ?>" size="40"/></td>
                </tr>

                <tr>
                    <td>Product image :</td>
                    <td colspan="3">
                        <textarea name="txtPro_img" style="width: 307px;">
                            <?php echo $product['product_image'] ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Facebook image :</td>
                    <td colspan="3">
                        <input type="text" name="txtPro_face" value="<?php echo $product['facebook_image'] ?>" size="40"/>
                    </td>
                </tr> 
                <tr>
                    <td>Meta keyword :</td>
                    <td colspan="3">
                        <textarea style="width: 307px;" name="txtKeyword">
                            <?php echo $product['meta_keyword'] ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td>Meta description :</td>
                    <td colspan="3">
                        <textarea style="width: 307px;"  name="txtDescription">
                            <?php echo $product['meta_description'] ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Alias:</td>
                    <td colspan="3">
                        <input type="text" value="<?php echo $product['alias'] ?>" readonly="readonly" name="txtAlias" id="txtAlias"  size="40"/>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="btnEdit" value="Edit"/>
                        <input type="reset" name="btnReset" value="Reset"/>
                    </td>
                </tr>
            </table>

        </form>
        <a href="index.php"><< Back to list</a>
    </center>
</body>
</html>