<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/head.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";
?>


    <div class="container">
        <div class="row m-2">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="index.php">Назад</a>
                </div>
            </div>
            <div class="col-10" id="content_column">
                <div class="container">
                    <div class="row">
                        <?php
                        include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
                        $product = getProductById($_GET["product"]);
                       // var_dump();
                        /*array(6) { ["id"]=> string(1) "3"
                        ["title"]=> string(9) "три 31"
                        ["description"]=> string(15) "бла бла 3"
                        ["content"]=> string(15) "бла бла 3"
                        ["image"]=> string(4) "яя"
                        ["id_category"]=> string(1) "4" }*/
                        include_once $_SERVER["DOCUMENT_ROOT"]."/parts/breadcrums.php";
                        ?>
                    </div>
                    <div class="row">
<div class="container">
                        <div class="card text-center">
                            <div class="card-header">
                                О продукте
                            </div>
                            <div class="card-body">
                                <img src="<?=$product["image"];?>" class="card-img-top" alt="...">
                                <h1 class="card-title"><?=$product["title"];?></h1>
                                <h4 class="card-title">Категория: <?=getCategoryName($product["id_category"]);?></h4>
                                <p class="card-text"><?=$product["description"];?></p>
                                <h5 class="card-title">Содержание</h5>
                                <p class="card-text"><?=$product["description"];?></p>
                                <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                            </div>
                            <div class="card-footer text-muted">
                               &nbsp;
                            </div>
                        </div>
</div>
                    </div>

                </div>

            </div><!--/#content_column-->
        </div>
    </div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";