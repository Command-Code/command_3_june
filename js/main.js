
var  btnShowMore = document.querySelector("#show-more");
if (btnShowMore){
    btnShowMore.onclick = function () {
        let currentPage = document.querySelector("#current_page");
        let productsOnPage = document.querySelector("#products-on-page");
        let cards_container = document.querySelector("#cards_container");
        cards_container.innerHTML = cards_container.innerHTML + getAjaxResponse('/parts/showmore.php?page='+currentPage.value+'&limit='+productsOnPage.value);
        currentPage.value  = parseInt(currentPage.value, 10) +1;
        let pagBttn = document.querySelector("#pagination"+currentPage.value)
        pagBttn.innerHTML = " <span class=\"page-link\">" + currentPage.value + "</span>";
        pagBttn.classList.add("active");
    }
}


function clearBasket() {
    let container = document.querySelector("#content_column");
    console.log(container);
    container.innerHTML = getAjaxResponse('/empty_cookie.php');
    document.querySelector("#basket-count").innerHTML = "0";
}


/**
 * добавляет в куки продукт
 * @param item
 */
function addBasket(item) {
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/parts/add_basket.php';

    xhr.open( "POST", myLink , false);
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    xhr.send( "id=" + item.dataset.id);
    document.querySelector("#basket-count").innerHTML = getAjaxResponse( '/parts/count_basket.php');
}

function deleteProduct(item) {
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/parts/remove_basket.php';

    xhr.open( "POST", myLink , false);
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    xhr.send( "id=" + item.dataset.id);
if (xhr.response == "removed") {
    document.querySelector("#basket-table").innerHTML = getAjaxResponse( '/parts/basket_table.php');
}

    document.querySelector("#basket-count").innerHTML = getAjaxResponse( '/parts/count_basket.php');
    return false;
}

////////////////////////////////////////
function decreaseProduct(item) {
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/parts/decrease_basket.php';

    xhr.open( "POST", myLink , false);
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    xhr.send( "id=" + item.dataset.id);
    document.querySelector("#basket-table").innerHTML = getAjaxResponse( '/parts/basket_table.php');
    document.querySelector("#basket-count").innerHTML = getAjaxResponse( '/parts/count_basket.php');
    return false;
}

function increaseProduct(item) {
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/parts/add_basket.php';

    xhr.open( "POST", myLink , false);
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    xhr.send( "id=" + item.dataset.id);
    document.querySelector("#basket-table").innerHTML = getAjaxResponse( '/parts/basket_table.php');
    document.querySelector("#basket-count").innerHTML = getAjaxResponse( '/parts/count_basket.php');
    return false;
}
////////////////////////////////////////


document.onload = initBasketCookie();
function initBasketCookie() {
    console.log(getAjaxResponse( '/parts/add_basket.php'));
    let main_footer = document.querySelector("#main_footer");
    console.log(main_footer.offsetTop + main_footer.offsetHeight);
    console.log(document.documentElement.clientHeight);
    if (document.documentElement.clientHeight > main_footer.offsetTop + main_footer.offsetHeight) {
        main_footer.classList.add("fix-footer");
    }
}



function sendOrder() {
    var orderForm = document.querySelector("#order-form");

    let dataArr = [];
    for(let i = 0; i < orderForm.length; i++) {
        dataArr.push(orderForm[i].name+ "="+orderForm[i].value)
    }
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/parts/order_basket.php';

    xhr.open( "POST", myLink );
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );

    xhr.send( dataArr.join("&") );
    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;
        if (this.status == 200) {
            //     let working_container = document.querySelector("#working_container");
            //   working_container.innerHTML =this.response;
            console.dir(this.response);
            let container = document.querySelector("#content_column");
            document.querySelector("#basket-count").innerHTML = "0";
            if (this.response == "ok"){
                container.innerHTML = " <div class=\"alert alert-success\" role=\"alert\">Заказ оформлен</div>";
            }else {
                container.innerHTML = "  <div class=\"alert alert-success\" role=\"alert\">Какая то ошибка</div>";
            }
            return;
        }
    }
    return false;

}

/*

var sendOrder = document.querySelector("#send-order");
sendOrder.onclick = function(event) {
    event.preventDefault();
    var orderForm = document.querySelector("#order-form");

    let dataArr = [];
    for(let i = 0; i < orderForm.length; i++) {
        dataArr.push(orderForm[i].name+ "="+orderForm[i].value)
    }
    console.dir(dataArr);
    let xhr = new XMLHttpRequest();
    let myLink = location.protocol+'//'+location.hostname+'/parts/order_basket.php';

    xhr.open( "POST", myLink );
    xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );

    xhr.send( dataArr.join("&") );
    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;
        if (this.status == 200) {
       //     let working_container = document.querySelector("#working_container");
         //   working_container.innerHTML =this.response;
            console.dir(this.response);
            return;
        }
    }
    return false;

}*/





/**
 * функция гет аджакс
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

/********************************************
*   начало блок работы с куки
 *******************************************/
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:","");
        if (user != "" && user != null) {
            setCookie("username", user, 30);
        }
    }
}
/********************************************
 *   конец блок работы с куки
 *******************************************/