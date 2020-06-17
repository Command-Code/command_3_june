<?php
include_once "../functions.php";



if(isset($_POST["button"])){
    if($_POST["id"]){
        updateProduct($_POST);
        include_once "table_products.php";
    }else{
        insertProduct($_POST);
        include_once "table_products.php";
    }
}else{
    switch ($_GET["act"]){
        case "selcat":
            include_once "table_products.php";
            break;
        case "edit":
            $product = getProductById($_GET["id"]);
            include_once "form_product.php";
            break;
        case "del":
            deleteProduct($_GET["id"]);
            include_once "table_products.php";
            break;
        case "create":
            $product = getEmptyProductArray();
            $product["id_category"] = $_COOKIE["sel_cat"];
            include_once "form_product.php";
            break;
        default:
            include_once "table_products.php";
            break;
    }
}

?>


