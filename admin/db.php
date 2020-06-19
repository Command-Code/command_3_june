<?php

/*база данных*/

$host = "localhost";
$user = "root";
$password = "";
$database = "shop_educoin_db";


/*база данных*/
/*
$host = "localhost";
$user = "id13994416_shop_educoin_user";
$password = "@abGRys8&[k82{d";
$database = "id13994416_shop_educoin_db";
*/


$link = null;

$link = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($link, "utf8");