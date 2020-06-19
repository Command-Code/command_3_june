<?php
$count = 0;
if (isset($_COOKIE["basket"])) {
    $arr = json_decode($_COOKIE["basket"]);
    foreach ( $arr as $item) {
        $count += $item->count;
    }
}
echo $count;