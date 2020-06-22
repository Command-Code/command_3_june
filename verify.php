<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/header.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";
?>


    <div class="container">
        <div class="row m-2">
            <div class="col-2">
            </div>
            <div class="col-10" id="content_column">
                <div class="container">
                    <div class="row">
                        <?php
                        if (isset($_GET["code"])){
                            $user = getUserByVerifyCode($_GET["code"]);
                            if (!$user){
                                echo " <div class=\"alert alert-success\" role=\"alert\">Неверный код</div>";
                            }else if (changeVerifyCode($user["id"])){
                                echo " <div class=\"alert alert-success\" role=\"alert\">Верифицирован</div>";
                            }else{
                                echo " <div class=\"alert alert-success\" role=\"alert\">Неверный код</div>";
                            }
                        }
                        if (isset($_POST["user_email"]) && $_POST["verify"] == "newcode") {
                            $user_id = getUserByEmail($_POST["user_email"]);
                            if (sendNewCode($user_id["id"])) {
                                echo " <div class=\"alert alert-success\" role=\"alert\">Код отправлен на почту</div>";
                            }else{
                                echo " <div class=\"alert alert-success\" role=\"alert\">Попробуйте позже</div>";
                            }
                        }

                        echo "<div class=\"alert alert-info\" role=\"alert\">через 3 сек будете перенаправлены</div>";
                        header('Refresh: 3; url=/login.php?logout=true');
                        ?>
                    </div>

                </div>

            </div><!--/#content_column-->
        </div>
    </div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/footer.php";