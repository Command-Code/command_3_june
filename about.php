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
                    <h2>О сайте</h2>
                </div>
                <div class="row">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium culpa eaque earum est ex exercitationem magnam minus quas quibusdam quis, quos sed tempore velit, veniam voluptas. A dicta ipsum iste, laborum nam optio quas sed ullam vero, vitae voluptatem voluptates!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aspernatur dicta dolor et eveniet fugit ipsam itaque magni natus nihil numquam odio quas quod sapiente tempora temporibus, vitae. Aperiam architecto dignissimos eaque eligendi esse expedita, fuga iure maxime nesciunt obcaecati perspiciatis placeat quam quisquam recusandae totam! Aperiam asperiores consequatur cupiditate eveniet hic illo mollitia nihil numquam suscipit veritatis. A aliquam amet cum delectus deleniti dolores error expedita, maxime minus molestiae nihil odio quaerat! A, alias aliquid architecto asperiores, at consequatur debitis dolor ducimus harum itaque iure laudantium maxime natus nostrum nulla quia quidem quo quos rerum soluta totam veritatis voluptas.
                    </p>
                    <div class="jumbotron">
                        <h1 class="display-4">  Важно!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="index.php" role="button">В магазин</a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cumque eligendi libero nam quos voluptatibus!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate doloribus facilis quaerat quis velit vitae voluptas. A alias aperiam aspernatur at atque aut autem dignissimos excepturi exercitationem expedita in, modi molestiae nihil, perspiciatis praesentium quaerat ratione veritatis? Accusamus commodi cumque deserunt dolorem dolorum ducimus eius eligendi excepturi, facere incidunt ipsum laborum laudantium maxime minus nam nostrum numquam officia omnis pariatur placeat porro sequi soluta suscipit voluptates voluptatibus? Distinctio dolores ducimus eos fugiat impedit magni perspiciatis quae quas, quidem repellendus voluptatibus, voluptatum! Ab deleniti distinctio esse fuga fugit inventore ipsam tempore.
                    </p>
                </div>
            </div>

        </div><!--/#content_column-->
    </div>
</div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";