<thead>
<tr>
    <th scope="col">#</th>
    <th scope="col">First</th>
    <th scope="col">Last</th>
    <th scope="col">Категория</th>
    <th scope="col">Количество</th>
    <th scope="col">Цена</th>
    <th scope="col"></th>
</tr>
</thead>
<tbody>
<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/functions.php";
if (isset($_COOKIE["basket"])){
    $parse_basket = json_decode($_COOKIE["basket"],true);

    $total_price = 0;
    foreach ($parse_basket as  $prod){
        $cur_prod = getProductById($prod["prod_id"]);
        $total_price += $prod["count"] * $cur_prod["coast"];
        ?>
        <tr>
            <input type="hidden" name="basket[]" value="<?=$cur_prod["id"];?>">
            <th scope="row"><?=$cur_prod["id"];?></th>
            <td><?=$cur_prod["title"];?></td>
            <td><?=$cur_prod["description"];?></td>
            <td><?=getCategoryName($cur_prod["id_category"]);?></td>
            <td><?=$prod["count"];?></td>
            <td><?=$cur_prod["coast"];?></td>
            <td>

                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a type="button" class="btn btn-secondary"  data-id="<?=$cur_prod["id"];?>" onclick="decreaseProduct(this);" >-</a>
                        <a type="button" class="btn btn-secondary"  data-id="<?=$cur_prod["id"];?>" onclick="increaseProduct(this);" >+</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a class="btn btn-danger" data-id="<?=$cur_prod["id"];?>" onclick="deleteProduct(this);" >Удалить</a>
                    </div>
                </div>
        </tr>
        <?php
    }
}
?>
<tr>
    <th colspan="5">Всего: </th>
    <th scope="col" colspan="2"><?=$total_price;?></th>
</tr>
</tbody>