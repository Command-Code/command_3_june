<?php

if($products){
    foreach ($products as $product) {
        ?>
      <!--  ["id"]=> string(2) "12"
        ["name"]=> string(9) "МР - 71"
        ["id_category"]=> string(1) "1"
        ["id_sub_category"]=> string(1) "2"
        ["image"]=> string(21) "/Weapons_image/12.jpg"
        ["id_company"]=> string(2) "10"
        ["price"]=> string(6) "4,565 "
        ["id_currensy"]=> string(1) "1"-->
        <div class="col-6">
            <div class="col-lg-8 mx-auto">
                <div class="card mb-10" style='width: 18rem;'>

                    <a href="product.php?product=<?=$product["id"];?>">

                        <?php
                        if($product['image'] != "") {
                            ?>
                            <img class="card_img_top" src="<?php echo $product['image']?>" alt="Card image cap">
                            <?php
                        } else {
                            ?>
                            <img class="card_img_top" src="mage/zastavka_kamera3.png.png" alt="Card image cap">
                            <?php
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                        </div>
                        <div class="card-footer">
                            <button onclick="addBasket(this); return false;" class="btn btn-secondary" data-id="<?=$product["id"];?>">В корзину</button>
                            <small class="text-muted"></small>
                        </div>
                    </a>

                </div> <!-- /<div class="card mb-10" style='width: 18rem;'> -->
            </div> <!-- /<div class="col-lg-8 mx-auto"> -->
        </div><!--  /<div class="col-4"> -->
        <?php



       /* ?>
        <div class="card col-3 m-2">
            <img src="<?=$product["image"];?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$product["title"];?></h5>
                <p class="card-text"><?=$product["description"];?></p>
                <a href="product.php?product=<?=$product["id"];?>" class="btn btn-primary">Подробнее</a>
                <button onclick="addBasket(this); return false;" class="btn btn-secondary" data-id="<?=$product["id"];?>">В корзину</button>
            </div>
        </div>
        <?php */
    }
}else{
    echo "<h2>Нет товаров</h2>";
}
?>