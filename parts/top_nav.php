<header>
    <!-- Image and text -->
    <!-- 	navbar navbar-light bg-light
        pos-f-t
     --><nav class="shapka">
        <a class="logotype" href="index.php">
            <img src="/img/logo.png" class="img-logo">
        </a>

        <form method="GET" id="poisk" class="form-inline poisk">
            <input class="form-control mr-sm-2" type="text" name="poisk-text" placeholder="Search" aria-label="Search">
            <button type="search" name="search" class="btn vvod my-2 my-sm-0"><img src="../../img/search5.png"></button>
        </form>

        <span class="vhod">
		  <h5 class="text-white h4"><a href="/login.php?action=registration&logout=true">Регистрация</a></h5>
                <?php
                if (isset($_COOKIE["user_id"])){
                    echo "<h5 class=\"text-white h4\"><a href=\"/register/exit.php\" id=\"exit-login\">".getUserName($_COOKIE["user_id"])."&#187;</a></h5>";
                    echo "<a class=\"nav-link\" href=\"login.php?logout=true\">Выйти</a>";

                }else{
                    echo " <h5 class=\"text-white h4\"><a  href=\"login.php\">Авторизация</a></h5>";
                }
                ?>
	  </span>
        <a class="btn btn-primary ml-2" href="basket.php">
            <img src="img/cart.svg" alt="" style="height: 24px;">
            <span>Товаров: <span id="basket-count"><?php include_once "count_basket.php";?></span></span>
        </a>
    </nav>
</header>
