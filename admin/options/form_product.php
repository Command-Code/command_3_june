<div class="row">
    <!--сюда содержимое-->
    <form class="col-md-12" id="create_edit_prod_form" method="post">
        <input type="hidden" name="id" value="<?=$product["id"];?>">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="<?=$product["title"];?>">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="4" name="description"><?=$product["description"];?></textarea>
            </div>
            <div class="form-group">
                <label for="content">Содержание</label>
                <textarea class="form-control" id="content" rows="8" name="content"><?=$product["content"];?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Картинка</label>
                <input type="text" class="form-control" id="image" name="image" value="<?=$product["image"];?>">
            </div>
            <div class="form-group">
                <label for="coast">Цена</label>
                <input type="text" class="form-control" id="coast" name="coast" value="<?=$product["coast"];?>">
            </div>

            <div class="form-group">
                <label for="id_category">Категория</label>
                <select id="id_category" class="id_category" name="id_category">
                   <?php
                   viewSelectCategories(getCategories(),$product["id_category"]);
                   ?>
                </select>
            </div>
        <button type="submit" class="btn btn-primary" onclick="createEditProduct();return false;" name="button" value="button">Сохранить</button>
    </form>
</div>
<!-- <div class="row"></div>-->
