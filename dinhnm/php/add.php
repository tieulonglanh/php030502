<?php
include 'connect.php';
if (isset($_POST['btnAdd'])) {
    $sql = "INSERT INTO product(product_name,"
            . "category_id,"
            . "product_description,"
            . "product_detail,"
            . "create_date ,"
            . "product_image,"
            . "facebook_image,"
            . "meta_keyword,"
            . "meta_description,"
            . "alias"
            . ") "
            . "values  "
            . "("
            . "?, "
            . "?, "
            . "?, "
            . "?, "
            . "?, "
            . "?, "
            . "?, "
            . "?, "
            . "?, "
            . "? "
            . ")";
    if ($stmt = $connect ->prepare($sql)) {
        $txtName = $_POST['txtName'];
        $txtCategory = $_POST['txtCategory'];
        $txtPro_des = $_POST['txtPro_des'];
        $txtPro_det = $_POST['txtPro_det'];
        $txtPro_img = $_POST['txtPro_img'];
        $txtPro_face = $_POST['txtPro_face'];
        $txtKeyword = $_POST['txtKeyword'];
        $txtDescription = $_POST['txtDescription'];
        $txtAlias = $_POST['txtAlias'];
        $date = date("Y-m-d"); //date time now
        $stmt->bind_param('ssssssssss', $txtName, $txtCategory, $txtPro_des, $txtPro_det, $date, $txtPro_img, $txtPro_face, $txtKeyword, $txtDescription, $txtAlias
        );
        $stmt->execute();
        echo "<script>confirm('Add new success!'); window.location.href=\"index.php\"</script>";
        $stmt->close();
    } else
        echo $connect->error;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add new product</title>
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
        <form method="post" action="add.php" id="form" name="addnew">
            <table border="1">
                <tr>
                    <td>Product Name :</td>
                    <td colspan="3"><input type="text" name="txtName" id="txtName" value="" size="40"/></td>
                </tr>
                <tr>
                    <td>Category :</td>
                    <td colspan="3">
                        <select name="txtCategory" style="width: 313px;">
<?php

function category($parentid, $space = "", $trees = array()) {
    if (!$trees) {
        $trees = array();
    }
    include 'connect.php';
    $sql = "SELECT * FROM product_category WHERE parent_id = $parentid";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
        $trees[] = array(
            'id' => $row['id'],
            'category_name' => $space . $row['category_name'],
        );
        $trees = category($row['id'], $space . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $trees);
    }
    return $trees;
}

$menu = category(0, '', '');
foreach ($menu as $k => $row) {
    ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </td> 
                </tr>

                <tr>
                    <td>Product description	 :</td>
                    <td colspan="3">
                        <textarea style="width: 307px" name="txtPro_des"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Product detail :</td>

                    <td colspan="3">  
                        <textarea style="width: 307px" name="txtPro_det"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Product image :</td>
                    <td colspan="3">
                        <input type="text" name="txtPro_img" value="" size="40"/>
                    </td>
                </tr>
                <tr>
                    <td>Facebook image :</td>
                    <td colspan="3">
                        <input type="text" name="txtPro_face" value="" size="40"/>
                    </td>
                </tr> 
                <tr>
                    <td>Meta keyword :</td>
                    <td colspan="3">
                        <textarea style="width: 307px" name="txtKeyword"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Meta description :</td>
                    <td colspan="3">
                        <textarea style="width: 307px" name="txtDescription"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Alias:</td>
                    <td colspan="3">
                        <input type="text" readonly="readonly" name="txtAlias" id="txtAlias"  size="40"/>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="btnAdd" value="Add"/>
                        <input type="reset" name="btnreset" value="Reset"/>
                    </td>
                </tr>
            </table>

        </form>
        <a href="index.php"><< Back to list</a>
    </center>
</body>
</html>