<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/functions.php";

$limit = null;
if (isset($_GET["limit"]) && isset($_GET["page"])){
    $limit = $_GET["limit"] * $_GET["page"] - $_GET["limit"];
}


if (isset($_GET["category"])){
    if (isset($_GET["sub"])) {
        $products = getProducts($_GET["category"], $productsOnPage, $limit, $_GET["sub"]);
    } else {
        $products = getProducts($_GET["category"], $productsOnPage, $limit);
    }
}else{
    $products = getProducts(null, $productsOnPage, $limit);
}
include_once "product_iteration.php";


?>


