<?php
include_once "../functions.php";
if(isset($_POST["button"])){
    if($_POST["id"]){
        updateCategory($_POST);
        include_once "table_categories.php";
    }else{
        insertCategory($_POST);
        include_once "table_categories.php";
    }
}else{
    switch ($_GET["act"]){
        case "edit":
            $category = getCategoryById($_GET["id"]);
            include_once "form_category.php";
            break;
        case "del":
            deleteCategory($_GET["id"]);
            include_once "table_categories.php";
            break;
        case "create":
            $category = getEmptyCategoryArray();
            include_once "form_category.php";
            break;
        default:
            include_once "table_categories.php";
            break;
    }
}

?>


