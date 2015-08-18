<?php

$connect = mysqli_connect('localhost', "root", "", "php030502") 
        or 
die(mysqli_error($connect)); 

mysqli_set_charset($connect , 'utf8');
