<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Shop EduCoin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="about.php">О сайте</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacts.php">Контакты</a>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_COOKIE["user_id"])){
                    echo "<a class=\"nav-link\" href=\"login.php?logout=true\">Выйти</a>";

                }else{
                    echo "<a class=\"nav-link\" href=\"login.php\">Войти</a>";
                }
                ?>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a class="btn btn-primary ml-2" href="basket.php">
            <img src="img/cart.svg" alt="" style="height: 24px;">
            <span>Товаров: <span id="basket-count"><?php include_once "count_basket.php";?></span></span>
        </a>
    </div>
</nav>