<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/head.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";
?>


    <div class="container">
        <div class="row m-2">
            <div class="col-2">
                <?php
               // include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
                ?>
            </div>
            <div class="col-10" id="content_column">
                <div class="container">
                    <div class="row">
                        <?php
                        if (isset($_GET["code"])){
                            $user = getUserByVerifyCode($_GET["code"]);
                            if (!$user){
                                echo "<h2>Неверный код</h2>";
                            }else if (changeVerifyCode($user["id"])){
                                echo "<h2>Верифицирован</h2>";
                            }else{
                                echo "<h2>Неверный код</h2>";
                            }
                        }
                        if (isset($_POST["user_email"]) && $_POST["verify"] == "newcode") {
                            $user_id = getUserByEmail($_POST["user_email"]);
                            if (sendNewCode($user_id["id"])) {
                                echo "<h2>Код отправлен на почту</h2>";
                            }else{
                                echo "<h2>Попробуйте позже</h2>";
                            }
                        }

                        echo "<div class='col-10'>через 3 сек будете перенаправлены</div>";
                        header('Refresh: 3; url=/login.php');
                        ?>
                    </div>

                </div>

            </div><!--/#content_column-->
        </div>
    </div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";