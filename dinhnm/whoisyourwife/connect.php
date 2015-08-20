<?php
$connect = mysqli_connect('localhost', "root", "", "whoisyourwife") 
or 
die(mysqli_error($connect)); 
mysqli_set_charset($connect , 'utf8');
