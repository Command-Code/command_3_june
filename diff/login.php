<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
$see_email = 0;


if (isset($_COOKIE["user_id"]) && $_GET["logout"] == "true"){
    setcookie("user_id","", 0 , "/");
    header("Location: /login.php");
}



if (isset($_POST["button"])) {
    switch ($_POST["button"]) {
        case "login":
            $u_id = getUserIdByLogin($_POST["user_name"], $_POST["password"]);
            if ($u_id){
                if(!isVerifyUser($u_id)){
                    $see_email = 1;
                }else{
                    setcookie("user_id",$u_id, time()+60*60*24 , "/");
                    header("Location: /index.php");
                }
            }else
                header("Location: /login.php");
            break;
        case "registration":
            if ($_POST["password"] == $_POST["repassword"]){
                $user = ['login'=>$_POST["user_name"],
                    'password'=>$_POST["password"],
                    'phone'=>$_POST["user_phone"],
                    'email'=>$_POST["user_email"]];
                if (insertUser($user)){
                    header("Location: /login.php");
                }else
                    header("Location: /login.php?action=registration");
            }else
                header("Location: /login.php?action=registration");
            break;
        default: break;
    }
}







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
                    <?php
                    if (isset($_GET["action"]) && $_GET["action"] == "registration") {
                        ?>
                        <div class="row">
                            <h2>Регистрация</h2>
                        </div>
                        <form action="/login.php" method="post">
                            <div class="row">
                                <?php include_once $_SERVER["DOCUMENT_ROOT"]."/parts/registration_form.php"; ?>
                                <div class="col-8 mt-2">
                                    <button type="submit" name="button" value="registration" class="btn btn-primary mb-2">Регистрация</button>
                                    <a href="/login.php">Войти</a>
                                </div>
                            </div>

                        </form>

                        <?php
                    }else{
                        ?>
                        <div class="row">
                            <h2>Авторизация</h2>
                        </div>
                        <div class="row">
                        <?php
                        if ($see_email){
                            ?>
                            <h3>Верифицируйте email</h3>
                            <div class="col-8">
                                Выслать повторный код <br>
                            <form action="/verify.php" method="post">
                                <div class="form-row align-items-center">
                                    <div class="col-8">
                                        <label class="sr-only" for="user_email">email</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">@</div>
                                            </div>
                                            <input type="text" class="form-control" name="user_email" placeholder="email">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button type="submit" name="verify" value="newcode" class="btn btn-primary mb-2">Отправить</button>
                                    </div>
                                </div>
                            </form>
                            </div>>
                            <?php
                        }else{ ?>
                            <form action="/login.php" method="post">
                                <div class="form-row align-items-center">
                                    <div class="col-8">
                                        <label class="sr-only" for="user_name">Name</label>
                                        <input type="text" class="form-control mb-2" name="user_name" placeholder="Иванов">
                                    </div>
                                    <div class="col-8">
                                        <label class="sr-only" for="password">Пароль</label>
                                        <div class="input-group mb-2">
                                            <input type="password" class="form-control col-6" name="password" placeholder="***">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button type="submit" name="button" value="login" class="btn btn-primary mb-2">Войти</button>
                                        <a href="/login.php?action=registration">Регистрация</a>
                                    </div>
                                </div>
                            </form>
                        <?php }
                        ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div><!--/#content_column-->
        </div>
    </div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";