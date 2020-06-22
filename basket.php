<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/header.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";

?>


    <div class="container-fluid ">
        <div class="row">
            <div class="col-2 spisoc">
                <?php
                include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
                ?>
            </div>

            <div class="col-9" id="content_column">
                <div class="container-fluid">

    <form id="order-form">
        <div class="row">
            <table class="table table-striped" id="basket-table">
                <?php include_once $_SERVER["DOCUMENT_ROOT"]."/parts/basket_table.php";?>
            </table>
        </div>
        <div class="row">
            <?php
            if (!isset($_COOKIE["user_id"]))
                include_once $_SERVER["DOCUMENT_ROOT"]."/parts/registration_form.php";
            ?>
            <div class="col-auto">
                <button id="send-order" name="button" value="button" class="btn btn-primary mb-2" onclick="sendOrder();return false;">Оформить</button>
            </div>

        </div>
    </form><!--замахался с субмит и превент дефаулт-->
    <div class="row">
        <button class="btn btn-danger" onclick="clearBasket();">Очистить корзину</button>
    </div>



                </div>
            </div><!--/#content_column-->
        </div>
    </div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/footer.php";