<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Список заказов</h4>
                <p class="card-category">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aspernatur atque dicta dolorum illum omnis, quod tenetur vel?
                </p>
            </div>

            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Статус</th>
                    <th>Пользователь</th>
                    <th>Перечень</th>
                    <th></th>
                    </thead>
                    <tbody>

                    <?php
                    foreach (getOrders() as $order){
                        ?>
                        <tr>
                            <td><?=$order["id"];?></td>
                            <td>
                                <?=orderStatus($order["order_status"]);?><br>
                            <button class="btn badge-light" onclick="changeStatus(<?=$order["id"];?>);">Сменить</button>
                            </td>
                            <td>
                                <?php
                                $user = getUserById($order["id_user"]);
                                ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2 btn badge-light"># <?=$user["id"];?></div>
                                        <div class="col-10 btn badge-light">Логин: <?=$user["login"];?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 btn badge-light">Phone: <?=$user["phone"];?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <table class="table table-bordered">
                                    <tbody>
                                            <?php
                                            $parse_basket = json_decode($order["user_order"],true);

                                            $total_price = 0;
                                            foreach ($parse_basket as  $prod) {
                                                $cur_prod = getProductById($prod["prod_id"]);
                                                $total_price += $prod["count"] * $cur_prod["price"];
                                                ?>
                                            <tr>
                                                <th scope="row"><?=$prod["prod_id"];?></th>
                                                <td><?=$cur_prod["name"];?></td>
                                                <td><?=$cur_prod["name_cat"];?>, <?=$cur_prod["name_sub"];?></td>
                                                <td><?=$cur_prod["manuf"];?></td>
                                                <td><?=$cur_prod["price"];?> <?=$cur_prod["short"];?></td>
                                                <td><?=$prod["count"];?></td>
                                            </tr>
                                                <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                Сумма: <?=$total_price;?>
                            </td>
                          <!--  <
                                <div class="">
                                    <button type="button" class="btn btn-primary product-edit" data-id="<?=$product["id"];?>">Edit</button>
                                    <button type="button" class="btn btn-danger product-delete" data-id="<?=$product["id"];?>">Del</button>
                                </div>-->
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

