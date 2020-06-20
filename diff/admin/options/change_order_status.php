<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/functions.php";
changeOrderStatus($_GET["id"], 1);

include_once "table_orders.php";