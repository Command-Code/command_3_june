<?php
if($products){
    foreach ($products as $product) {
        ?>
                <div class="card col-4 mb-4 mr-4">
                    <a href="product.php?product=<?=$product["id"];?>">

                        <?php
                        if($product['image'] != "") {
                            ?>
                            <img class="card_img_top" src="<?php echo $product['image']?>" alt="Card image cap">
                            <?php
                        } else {
                            ?>
                            <img class="card_img_top" src="image/zastavka_kamera3.png" alt="Card image cap">
                            <?php
                        }
                        ?>
                    </a>
                        <div class="card-body position-relative">
                            <a href="product.php?product=<?=$product["id"];?>">
                                <h5 class="card-title position-absolute" style="bottom: 0;"><?php echo $product['name']; ?></h5>
                            </a>
                        </div>
                        <div class="card-footer">
                            <button onclick="addBasket(this); return false;" class="btn btn-secondary" data-id="<?=$product["id"];?>">В корзину</button>
                            <span class="card-text ml-4">Цена: <?=$product["price"];?> <?=getCurrencyShort($product["id_currensy"]);?></span>
                            <small class="text-muted"></small>
                        </div>
                </div> <!-- /<div class="card mb-10" style='width: 18rem;'> -->
        <?php
    }
}else{
    echo "<h2>Нет товаров</h2>";
}
?>
