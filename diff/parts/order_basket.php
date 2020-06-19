<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/functions.php";

if (isset($_POST)){
    $parse_basket = json_decode($_COOKIE["basket"],true);
    $temp_array = $_POST;
    $temp_array["basket"] = $parse_basket;

    if (insertOrder($temp_array)){
        setcookie("basket","", 0 , "/");
        echo "ok";
    }else{
        echo "no";
    }
}

