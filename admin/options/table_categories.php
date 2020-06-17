<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Список категорий</h4>
                <p class="card-category">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aspernatur atque dicta dolorum illum omnis, quod tenetur vel?
                </p>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Опции</th>
                    </thead>
                    <tbody>

                    <?php
                    foreach (getCategories() as $category){
                        ?>
                        <tr>
                            <td><?=$category["id"];?></td>
                            <td><?=$category["title"];?></td>
                            <td><?=$category["description"];?></td>
                            <td>
                                <div class="">
                                    <button type="button" class="btn btn-primary category-edit" data-id="<?=$category["id"];?>">Edit</button>
                                    <button type="button" class="btn btn-danger category-delete" data-id="<?=$category["id"];?>">Del</button>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row" >
    <button type="button" class="btn btn-success" id="add_product" onclick="clickAddCategory();">Добавить категорию</button>
</div>
