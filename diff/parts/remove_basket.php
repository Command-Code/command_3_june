<?php
if (isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_COOKIE["basket"])) {
        $basket = json_decode($_COOKIE["basket"], true);
        foreach ($basket as $key => $value) {
            if ($value["prod_id"] == $_POST["id"]){
                unset($basket[$key]);
            }
        }
    }
    setcookie("basket",json_encode($basket), time()+60*60*24 , "/");
    echo "removed";
}