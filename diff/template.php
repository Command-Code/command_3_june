<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/head.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";
?>


<div class="container">
    <div class="row m-2">
        <div class="col-2">
            <?php
            include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
            ?>
        </div>
        <div class="col-10" id="content_column">
            <div class="container">
                <div class="row">

                </div>

            </div>

        </div><!--/#content_column-->
    </div>
</div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";