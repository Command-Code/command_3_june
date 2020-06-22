<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/header.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";
?>


    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="<?=$_SERVER['HTTP_REFERER'];?>">Назад</a>
                </div>
            </div>
            <?php
            include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
            $product = getProductById($_GET["product"]);
            $property = getProductProperties($_GET["product"]);
            ?>
            <div class="col-10" id="content_column">
                    <div class="container">
<div class="row">
    <div class="col-5">
        <img src="<?=$product["image"];?>" class="card-img-top" alt="...">
    </div>
    <div class="col-7 card-body" style="    background-color: rgba(100,100,100,0.3);">
        <h1 class="card-title"><?=$product["name"];?></h1>
        <h3 class="card-title"><span><?=$product["name_cat"];?></span>, <?=$product["name_sub"];?></h3>

        <h3 class="card-text">Производитель: <?=$product["manuf"];?></h3>
        <div class=" text-center">

                <h5 class="card-title">Описание</h5>
                <?php


                foreach ($property as $item) {
                    ?>
                    <div class="m_property table-striped">
                        <span class="m_title"><?=$item["title"];?></span>

                        <span class="m_unit"><?=$item["unit"];?></span>
                        <span class="m_description"><?=$item["description"];?></span>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="card-footer text-muted">
                &nbsp;<button onclick="addBasket(this); return false;" class="btn btn-secondary" data-id="<?=$product["id"];?>">В корзину</button>
                <span class="card-text">Цена: <?=$product["price"];?> <?=$product["short"];?></span>
            </div>

    </div>
</div>





</div>


            </div><!--/#content_column-->
        </div>
    </div><!-- /.container -->

    <style>
        .m_property {
            text-align: left;
        }
        .m_property .m_title {

        }

        .m_property .m_description {
float: right;
        }

        .m_property .m_unit {
float: right;
            margin-left: 5px;
        }
    </style>
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/footer.php";