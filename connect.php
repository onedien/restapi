<?php
define('HOSTNAME','localhost');

define('USERNAME','root');

define('PASSWORD','');

define('DB_NAME','restapi');



$koneksi = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME) or die (mysqli_errno());



?>