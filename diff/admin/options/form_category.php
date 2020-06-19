<div class="row">
    <!--сюда содержимое-->
    <form class="col-md-12" id="create_edit_category_form" method="post">
        <input type="hidden" name="id" value="<?=$category["id"];?>">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=$category["title"];?>">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" rows="4" name="description"><?=$category["description"];?></textarea>
        </div>


        <button type="submit" class="btn btn-primary" onclick="createEditCategory();return false;" name="button" value="button">Сохранить</button>
    </form>
</div>
<!-- <div class="row"></div>-->
