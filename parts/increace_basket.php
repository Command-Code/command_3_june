<?php
//error_reporting(E_ERROR);

//include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/functions.php";
if (isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_COOKIE["basket"])) {
        $add_prod = 0;
        $basket = json_decode($_COOKIE["basket"], true);
        foreach ($basket as &$value) {
            if ($value["prod_id"] == $_POST["id"]){
                $value["count"]++;
                $add_prod = 1;
            }
        }

        /* это нужно для того, чтобы последующие записи в
        переменную $value не меняли последний элемент массива */
        unset($value); // разорвать ссылку на последний элемент
        if (!$add_prod)
            $basket[] = ["prod_id" => $_POST["id"], "count" => 1];
    }
    setcookie("basket",json_encode($basket), time()+60*60*24 , "/");
}
?>