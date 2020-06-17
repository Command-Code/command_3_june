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
                    <h2>Контакты</h2>
                </div>
                <div class="row">
                    <div class="card text-center col-6">
                        <div class="card-header">
                            Адрес:
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card text-center col-6 mt-4">
                        <div class="card-header">
                            График работы:
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                                <li>6</li>
                                <li>7</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/#content_column-->
    </div>
</div><!-- /.container -->
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";