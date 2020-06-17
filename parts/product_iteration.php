<?php
if($products){
    foreach ($products as $product) {
        ?>
        <div class="card col-3 m-2">
            <img src="<?=$product["image"];?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$product["title"];?></h5>
                <p class="card-text"><?=$product["description"];?></p>
                <a href="product.php?product=<?=$product["id"];?>" class="btn btn-primary">Подробнее</a>
                <button onclick="addBasket(this); return false;" class="btn btn-secondary" data-id="<?=$product["id"];?>">В корзину</button>
            </div>
        </div>
        <?php
    }
}else{
    echo "<h2>Нет товаров</h2>";
}