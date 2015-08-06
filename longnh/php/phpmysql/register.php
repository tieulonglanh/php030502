<?php
include 'connect.php';

if(isset($_POST['btt_res'])) {
    $success = true;
    
    $name = $_POST['txt_name'];
    $year = $_POST['txt_nam'];
    $month = $_POST['txt_thang'];
    $date = $_POST['txt_ngay'];
    $birthdate = $year . "-" . $month . "-" . $date;
    $phone = $_POST['txt_phone'];
    $mail = $_POST['txt_email'];
    $sex = $_POST['sex'];
    
    if(!$name){
        $success = false;
    }
    if(!$year){
        $success = false;
    }
    if(!$month){
        $success = false;
    }
    if(!$date){
        $success = false;
    }
    if(!$phone){
        $success = false;
    }
    if(!$mail){
        $success = false;
    }
    if(!$sex){
        $success = false;
    }
    
    if($success){
        $sql = "INSERT INTO users values('','{$name}','{$birthdate}','{$phone}','{$mail}',{$sex})";
        $connect->query($sql);
        echo $connect->error;
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
        <form method="post" action="/longnh/php/phpmysql/register.php" name="register" >
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
                            <option>1</option>
                            <option>1</option>
                            <option>1</option>
                            <option>1</option>                            
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
                    	<input type="radio" name="sex" id="ra_nam" value="1"  checked="checked"/>Nam
                    	<input type="radio" name="sex" id="ra_nu" value="2" />Nữ
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
        <a href="index.php"><< Quay lại trang danh sách</a>
        </center>
    </body>
</html>