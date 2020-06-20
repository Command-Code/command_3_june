<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/functions.php";
$url = parse_url($_SERVER['HTTP_REFERER']);
$category = null;
if(isset($url["query"])){
    $findCategory = explode("=",$url["query"]);
    if($findCategory[0] == "category"){
        $category = $findCategory[1];
    }
}
$products = getProducts($category, $_GET["limit"], $_GET["limit"]*$_GET["page"]);
include_once "product_iteration.php";
