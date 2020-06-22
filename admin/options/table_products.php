<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Список товаров</h4>
                <p class="card-category">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aspernatur atque dicta dolorum illum omnis, quod tenetur vel?
                </p>
            </div>
            <div class="row">
                    <select id="select-category" class="form-control col-5 ml-5">

                        <?php
                        $category = 0;
                        if(isset($_COOKIE["sel_cat"]))
                            $category = $_COOKIE["sel_cat"];

                       // if (!isset($_COOKIE["sel_cat"]))
                            echo "<option value=\"0\" selected>Все</option>";
                        viewSelectCategories(getCategories(), $category);
                        ?>
                    </select>
                    <button type="button" class="btn btn-warning col-3 ml-2" onclick="selectCategory();">Сортировать</button>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Производитель</th>
                    <th>Картинка</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Опции</th>
                    </thead>
                    <tbody>

                    <?php
                    foreach (getProducts($category) as $product){
                        ?>
                        <tr>
                            <td><?=$product["id"];?></td>
                            <td><?=$product["name"];?></td>
                            <td><?=getProduction($product["id_company"]);?></td>
                            <td><?=$product["image"];?></td>
                            <td><?=getCategoryName($product["id_category"]);?>, <?=getSubcategoryName($product["id_sub_category"]);?></td>
                            <td><?=$product["price"];?></td>
                            <td>
                                <div class="">
                                    <button type="button" class="btn btn-primary product-edit" data-id="<?=$product["id"];?>">Edit</button>
                                    <button type="button" class="btn btn-danger product-delete" data-id="<?=$product["id"];?>">Del</button>
                                    <!--  <a href="options/product.php?act=edit&id=<?=$product["id"];?>"><button type="button" class="btn btn-primary product-edit" data-id="<?=$product["id"];?>">Edit</button></a>
                                    <a href="options/product.php?act=delete&id=<?=$product["id"];?>"><button type="button" class="btn btn-danger product-delete" data-id="<?=$product["id"];?>">Del</button></a>-->
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
    <button type="button" class="btn btn-success" id="add_product" onclick="clickAddProduct();">Добавить продукт</button>
</div>
