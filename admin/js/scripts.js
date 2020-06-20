function changeStatus(id){
    let working_container = document.querySelector("#working_container");
    working_container.innerHTML = getAjaxResponse('/admin/options/change_order_status.php?id='+ id);
}


var editProdButton = null;
function initEditProdButton(){
    editProdButton = document.querySelectorAll(".product-edit");
    if(editProdButton){
        editProdButton.forEach(function (item,i) {
            item.onclick = function(){
                let working_container = document.querySelector("#working_container");
                working_container.innerHTML = getAjaxResponse('/admin/options/product.php?act=edit&id='+item.dataset.id);
                initAllInitNeed();
            }
        });
    }
}


var delProdButton = null;
function initDelProdButton(){
    delProdButton = document.querySelectorAll(".product-delete");
    if(delProdButton){
        delProdButton.forEach(function (item,i) {
            item.onclick = function(){
                let working_container = document.querySelector("#working_container");
                working_container.innerHTML = getAjaxResponse('/admin/options/product.php?act=del&id='+item.dataset.id);
                initAllInitNeed();
            }
        });
    }
}


var editCategoryButton = null;
function initEditCategoryButton(){
    editCategoryButton = document.querySelectorAll(".category-edit");
    if(editCategoryButton){
        editCategoryButton.forEach(function (item,i) {
            item.onclick = function(){
                let working_container = document.querySelector("#working_container");
                working_container.innerHTML = getAjaxResponse('/admin/options/category.php?act=edit&id='+item.dataset.id);
                initAllInitNeed();
            }
        });
    }
}


var delCategoryButton = null;
function initDelCategoryButton(){
    delCategoryButton = document.querySelectorAll(".category-delete");
    if (delCategoryButton){
        delCategoryButton.forEach(function (item,i) {
            item.onclick = function(){
                let working_container = document.querySelector("#working_container");
                working_container.innerHTML = getAjaxResponse('/admin/options/category.php?act=del&id='+item.dataset.id);
                initAllInitNeed();
            }
        });
    }
}


initAllInitNeed();
function initAllInitNeed(){
    initEditProdButton();
    initDelProdButton();
    initDelCategoryButton();
    initEditCategoryButton();
}

function clickAddProduct(){
        let working_container = document.querySelector("#working_container");
        working_container.innerHTML = getAjaxResponse('/admin/options/product.php?act=create');
}

function clickAddCategory(){
    let working_container = document.querySelector("#working_container");
    working_container.innerHTML = getAjaxResponse('/admin/options/category.php?act=create');
}

function selectCategory() {
    let curSel = document.querySelector("#select-category");
    document.cookie = "sel_cat="+curSel.value;
    let working_container = document.querySelector("#working_container");
    working_container.innerHTML = getAjaxResponse('/admin/options/product.php?act=selcat&val='+curSel.value);
    initAllInitNeed();
}


function createEditProduct(){
    let createEditProdForm = document.querySelector("#create_edit_prod_form");
        let dataArr = [];
        for(let i = 0; i < createEditProdForm.length; i++) {
            dataArr.push(createEditProdForm[i].name+ "="+createEditProdForm[i].value)
        }
        let xhr = new XMLHttpRequest();
        let myLink = location.protocol+'//'+location.hostname+'/admin/options/product.php';

        xhr.open( "POST", myLink );
        xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );

        xhr.send( dataArr.join("&") );
        xhr.onreadystatechange = function() {
            if (this.readyState != 4) return;
            if (this.status == 200) {
                let working_container = document.querySelector("#working_container");
                working_container.innerHTML =this.response;
                initAllInitNeed();
                return;
            }
        }
        return false;
}

function createEditCategory(){
    let createEditCategoryForm = document.querySelector("#create_edit_category_form");
    let dataArr = [];
    for(let i = 0; i < createEditCategoryForm.length; i++) {
        dataArr.push(createEditCategoryForm[i].name+ "="+createEditCategoryForm[i].value)
    }
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/admin/options/category.php';

    xhr.open( "POST", myLink );
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );

    xhr.send( dataArr.join("&") );
    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;
        if (this.status == 200) {
            let working_container = document.querySelector("#working_container");
            working_container.innerHTML =this.response;
            initAllInitNeed();
            return;
        }
    }
    return false;
}




/**
 * тип строки '/admin/options/product.php?act=create'
  */
function getAjaxResponse(url_string) {
    let myLink = location.protocol+'//'+location.hostname+url_string;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', myLink, false);

    xhr.send();
    if (xhr.status != 200) {
        alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
        return null;
    } else {
        return xhr.response;
    }
    return null;
}