<?php

if(isset($_GET['btt_res'])) {
    $name = isset($_GET['txt_name'])?$_GET['txt_name']: "Không rõ tên";
    $year = isset($_GET['txt_nam'])?$_GET['txt_nam']: "Không rõ năm";
    $month = isset($_GET['txt_thang'])?$_GET['txt_thang']: "Không rõ tháng";
    $date = isset($_GET['txt_ngay'])?$_GET['txt_ngay']: "Không rõ ngày";
    $birthdate = $year . "-" . $month . "-" . $date;
    $phone = isset($_GET['txt_phone'])?$_GET['txt_phone']: "Không rõ sđt";
    $mail = isset($_GET['txt_email'])?$_GET['txt_email']: "Không rõ email";
    $sex = isset($_GET['sex'])?$_GET['sex']: "Không rõ giới tính";
    echo "Tên: {$name} - Ngày sinh: {$birthdate} - SĐT: {$phone} - Email: {$mail} - Giới tính: {$sex}";
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
        <form method="get" action="/longnh/php/postget/get.php" name="register" >
            <table border="1">
                <tr>
                    <td >Name :</td>
                    <td colspan="3"><input type="text" name="txt_name" value="" size="40"/></td>
                </tr>
                <tr>
                    <td>Birthdate :</td>
                    <td >Năm
                        <select name="txt_nam">
                            <option >1970</option>
                            <option>1971</option>
                            <option>1972</option>
                            <option>1973</option>
                            <option>1974</option>
                            <option>1975</option>
                            <option>1976</option>
                            <option>1977</option>
                            <option>1978</option>
                            <option>1979</option>
                            <option>1980</option>
                            <option>1981</option>
                            <option>1982</option>
                            <option>1983</option>
                            <option>1984</option>
                            <option>1985</option>
                            <option>1986</option>
                            <option>1987</option>
                            <option>1988</option>
                            <option>1989</option>
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>
                            <option>1996</option>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                        </select>
                        
                        Tháng
                        <select name="txt_thang">
                            <option>Tháng 1</option>
                            <option>Tháng 2</option>
                            <option>Tháng 3</option>
                            <option>Tháng 4</option>
                            <option>Tháng 5</option>
                            <option>Tháng 6</option>
                            <option>Tháng 7</option>
                            <option>Tháng 8</option>
                            <option>Tháng 9</option>
                            <option>Tháng 10</option>
                            <option>Tháng 11</option>
                            <option>Tháng 12</option>
                            <option>Tháng 1</option>
                            <option>Tháng 1</option>
                            <option>Tháng 1</option>
                            <option>Tháng 1</option>                            
                        </select>
                        
                         Ngày
                        <select name="txt_ngay">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>
                   </td> 
                </tr>
                
                <tr>
                    <td >Phone :</td>
                    <td colspan="3"><input type="text" name="txt_phone" value="" size="40"/></td>
                </tr>
                
                <tr>
                    <td >Email :</td>
                    <td colspan="3"><input type="text" name="txt_email" value="" size="40"/></td>
                </tr>
                
                <tr>
                    <td >Giới tính :</td>
                    <td colspan="3" align="center">
                    	<input type="radio" name="sex" id="ra_nam" value="Nam"  checked="checked"/>Nam
                    	<input type="radio" name="sex" id="ra_nu" value="Nữ" />Nữ
                    </td>
                </tr>
                <tr>
                	<td align="center" colspan="2">
                    	<input type="submit" name="btt_res" value="Register"/>
                    	<input type="reset" name="reset" value="Reset"/>
                	</td>
                </tr>
            </table>
            
        </form>
        </center>
    </body>
</html>