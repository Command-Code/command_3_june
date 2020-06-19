<?php

$temp_page = getPageData();
if($temp_page){
    setcookie("page_id", $temp_page["id"], time() + (86400 * 30),"/");
    $page = $temp_page;
}else{
    $page = getPageDataById($_COOKIE["page_id"]);
}

