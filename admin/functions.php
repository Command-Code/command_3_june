<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/db.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/variables.php";

// токен бота
define('TELEGRAM_TOKEN', '1239053690:AAHYQT9rKR_i6vAxMLohrmlgl4oIC3rG71Y');

// внутренний айди
define('TELEGRAM_CHATID', '466816209');



function message_to_telegram($text) {
    $data = [
        'chat_id' => TELEGRAM_CHATID,
        'text' => $text,
        'parse_mode' => "HTML"
    ];

    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage' );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );

    $result = curl_exec( $ch );
    curl_close( $ch );
}


/* начало блок юзер */

function sendNewCode($id){
    global $link;
    $code = makeVerifyCode();
    $query = "UPDATE `users` SET `verify_code` = '".$code."' WHERE `id` = ".$id;
    $result = mysqli_query($link, $query);
    if ($result){
        sendVerifyCode($id);
    }
    return $result;
}

function changeVerifyCode($id){
    global $link;
    $query = "UPDATE `users` SET `verify` = '1', `verify_code` = '' WHERE `id` = ".$id;
    $result = mysqli_query($link, $query);
    return $result;
}

function sendVerifyCode($id){
    $url = "http";
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
        $url = $url."s";
    }
    $url = $url."://".$_SERVER["HTTP_HOST"];


    $user = getUserById($id);
    $code = getVerifyCode($id);
    $to      = $user["email"];
    $subject = 'Код верификации email';
    // Сообщение
    $message = "Вы зарегистрировались\r\nПерейдите по ссылке\r\n".$url."/verify.php?code=".$code;
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    return mail($to, $subject, $message, $headers);
}

function makeVerifyCode(){
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($permitted_chars), 0, 25);
}

/**
 * вставка юзера (`login`,`password`, `phone`, `email`)
 * @param $user
 * @return bool|mysqli_result
 */
function insertUser($user){
    global $link;
    $code = makeVerifyCode();
    $query = "INSERT INTO `users` (`login`, `password`, `phone`, `email`, `verify_code`) 
            VALUES ('".$user["login"]."', '".md5($user["password"])."', '".$user["phone"]."', '".$user["email"]."', '".$code."');";
    if (mysqli_query($link, $query)){
        $user_id = mysqli_insert_id($link);
        sendVerifyCode($user_id);
        return $user_id;
    }
    return null;
}

function getVerifyCode($id){
    global $link;
    $query = "SELECT `verify_code` FROM `users` WHERE `id` = ".$id;

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row["verify_code"];
}

function isVerifyUser($id){
    global $link;
    $query = "SELECT `verify` FROM `users` WHERE `id` = ".$id;
    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row["verify"];
}

function getUserIdByLogin($login, $password){
    global $link;
    $query = "SELECT `id` FROM `users` WHERE `login`LIKE \"".$login."\" AND `password` LIKE \"".md5($password)."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row["id"];
}

function getUserByVerifyCode($verify_code){
    global $link;
    $query = "SELECT `id`,`login`,`phone`,`email` FROM `users` WHERE `verify_code`LIKE \"".$verify_code."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

function getUserById($id){
    global $link;
    $query = "SELECT `id`,`login`,`phone`,`email` FROM `users` WHERE `id`LIKE \"".$id."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

/**
 * получить имя пользователя
 * @param $id
 * @return mixed|string|null
 */
function getUserName($id){
    global $link;
    $query = "SELECT `login` FROM `users` WHERE `id`LIKE \"".$id."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row["login"];
}

function getUserByEmail($email){
    global $link;
    $query = "SELECT `id`,`login`,`phone`,`email` FROM `users` WHERE `email`LIKE \"".$email."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

function getUserByLogin($login){
    global $link;
    $query = "SELECT `id`,`login`,`phone`,`email` FROM `users` WHERE `login`LIKE \"".$login."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

function getUserByPhone($phone){
    global $link;
    $query = "SELECT `id`,`login`,`phone`,`email` FROM `users` WHERE `phone`LIKE \"".$phone."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

/* конец блок юзер */



/* начало блок заказов */

function changeOrderStatus($id, $stat){
    global $link;
    $query = "UPDATE `orders` SET `order_status` = '".$stat."' WHERE `id` = ".$id;
    $result = mysqli_query($link, $query);
    return $result;
}

function orderStatus($status){
    $name = "";
    switch ($status){
        case "0": $name = "Новый";
            break;
        case "1": $name = "Отправлен";
            break;
        default: $name = "Неопределен";
            break;
    }
    return $name;
}

function getOrders(){
    global $link;
    $query = "SELECT `id`,`user_order`,`id_user`,`order_status` FROM `orders` WHERE `deleted`=0";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $temp_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $temp_arr[] = $row;
    }
    mysqli_free_result($result);
    return $temp_arr;
}

function insertOrder($order){
  /*  // проверка по телефону
   $res =  getUserByPhone($order["user_phone"]);
    if ($res){
        $order["id_user"] = $res["id"];*/


  if (isset($_COOKIE["user_id"])) {
      $order["id_user"] = $_COOKIE["user_id"];
    }else{
            $user_array = ['login'=>$_POST["user_name"],
                'password'=>$_POST["password"],
                'phone'=>$_POST["user_phone"],
                'email'=>$_POST["user_email"]];

        $order["id_user"] = insertUser($user_array);
    }
    if (!$order["id_user"] )
        return null;

    global $link;
    $query = "INSERT INTO `orders` (`user_order`, `id_user`)
         VALUES ('".json_encode($order["basket"])."', '".$order["id_user"]."');";
    if (mysqli_query($link, $query)){
        message_to_telegram("Новый заказ!");
        return mysqli_insert_id($link);
    }
    return null;
}

/* конец блок заказов */


function undeleteProduct($id){
    //UPDATE `products` SET `deleted` = '0' WHERE `id` = 6;
}

function undeleteProductsAll(){
    //UPDATE `products` SET `deleted` = '0'
}

function getCountProducts($category = null){
    global $link;
    $query = "SELECT count(id) as c FROM `products` WHERE `deleted` = 0";

    if(!is_null($category) && $category != "0")
        // if(!$category)
        $query .= " AND `id_category`=".$category;

    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row["c"];
}


/**
 * получить продукты
 * @return array|null
 */
function getProducts($category = null, $limit = null, $offset = null){
    global $link;
    $query = "SELECT `id`, `title`, `description`, `content`, `image`, `coast`, `id_category` FROM `products` WHERE `deleted` = 0";

    if(!is_null($category) && $category != "0")
   // if(!$category)
        $query .= " AND `id_category`=".$category;

    if (!is_null($limit)){
        if (!is_null($offset)){
            $query .= "  LIMIT ".$offset.", ".$limit;
        }else{
            $query .= " LIMIT ".$limit;
            }

    }
    //echo $query;
    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $temp_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $temp_arr[] = $row;
    }
    mysqli_free_result($result);
    return $temp_arr;
}

/**
 * получить продукт по айди
 * @param $id
 * @return string[]|null
 */
function getProductById($id){
    global $link;
    $query = "SELECT `id`, `title`, `description`, `content`, `image`, `coast`, `id_category` FROM `products` WHERE `id` = ".$id;

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

/**
 * получить пустой массив продукта
 * @return string[]
 */
function getEmptyProductArray(){
    return array("id"=> "0", "title"=>"", "description"=> "", "content"=> "", "image"=> "", "coast"=>"", "id_category"=> "0");
}

/**
 * вставить продукт в базу . (`title`, `description`, `content`, `image`,`coast`,  `id_category`)
 * @param $product
 * @return bool|mysqli_result
 */
function insertProduct($product){
    global $link;
    $query = "INSERT INTO `products` ( `title`, `description`, `content`, `image`, `coast`, `id_category`)
    VALUES ( '".$product["title"]."', '".$product["description"]."',
     '".$product["content"]."', '".$product["image"]."', '".$product["coast"]."', '".$product["id_category"]."')";
    if (mysqli_query($link, $query))
        return mysqli_insert_id($link);
    return null;
}

/**
 * обновить продукт
 * @param $product
 * @return bool|mysqli_result
 */
function updateProduct($product){
    global $link;
    $query = "UPDATE `products` SET `title` = '".$product["title"]."',
     `description` = '".$product["description"]."', 
     `content` = '".$product["content"]."', 
     `image` = '".$product["image"]."',
     `coast` = '".$product["coast"]."',  
     `id_category` = '".$product["id_category"]."' WHERE `id` = ".$product["id"];

    $result = mysqli_query($link, $query);
    return $result;
}

/**
 * удалить продукт
 * @param $id
 * @return bool|mysqli_result
 */
function deleteProduct($id){
    global $link;
    $query = "UPDATE `products` SET `deleted` = '1' WHERE `id` = ".$id;
    $result = mysqli_query($link, $query);
    return $result;
}


/**
 * пролучить все категории
 * @return array|null
 */
function getCategories(){
    global $link;
    $query = "SELECT `id`, `title`, `description` FROM `categories` WHERE `deleted`=0";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $temp_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $temp_arr[] = $row;
    }
    mysqli_free_result($result);
    return $temp_arr;
}

/**
 * удалить категорию
 * @param $id
 * @return bool|mysqli_result
 */
function deleteCategory($id){
    global $link;
    $query = "UPDATE `categories` SET `deleted` = '1' WHERE `id` = ".$id;
    $result = mysqli_query($link, $query);
    return $result;
}

/**
 * вставить категорию. тип массива ( `title`, `description`)
 * @param $category
 * @return bool|mysqli_result
 */
function insertCategory($category){
    global $link;
    $query = "INSERT INTO `categories` ( `title`, `description`) 
            VALUES ( '".$category["title"]."', '".$category["description"]."');";
    if (mysqli_query($link, $query))
        return mysqli_insert_id($link);
    return null;
}

function getCategoryById($id){
    global $link;
    $query = "SELECT `id`, `title`, `description` FROM `categories` WHERE `id` = ".$id;

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    return $row;
}

/**
 * обновить категорию
 * @param $category
 * @return bool|mysqli_result
 */
function updateCategory($category){
    global $link;
    $query = "UPDATE `categories` 
        SET `title` = '".$category["title"]."', `description` = '".$category["description"]."' 
        WHERE `id` = ".$category["id"];
    $result = mysqli_query($link, $query);
    return $result;
}

function getEmptyCategoryArray(){
    return array("id"=> "0", "title"=>"", "description"=> "");
}

/**
 * получить название категории
 * @param $id
 * @return mixed|string
 */
function getCategoryName($id){
    global $link;
    $query = "SELECT `title` FROM `categories` WHERE `id`=".$id;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row["title"];
}

function viewSelectCategories($categories, $selected=null){
    if (!is_null($selected) && $selected != "0")
        echo "<option value=\"0\" selected>Choose...</option>";
    foreach ($categories as $category){
        ?>
        <option value="<?=$category["id"];?>" <?=($selected == $category["id"]?"selected":"");?>><?=$category["title"];?></option>
        <?php
    }
}






/**
 * вывод данных страницы
 * @return string[]|null
 */
function getPageData(){
    global $link;
    $query = "SELECT `id`,`description`,`url`,`title` FROM `pages`
         WHERE`url`LIKE \"".basename($_SERVER["PHP_SELF"])."\"";

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;

    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row;
}

/**
 * данные страницы по айди
 * @param $id
 * @return string[]|null
 */
function getPageDataById($id){
    global $link;
    $query = "SELECT `id`,`description`,`url`,`title` FROM `pages`
         WHERE`id` = ".$id;

    $result = mysqli_query($link, $query);
    if(!$result)
        return null;

    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row;
}

/**
 * вывод админ навигации
 * @return string
 */
function viewLeftNav(){
    global $link;
    $query = "SELECT `id`,`description`,`url`,`title`, `ico` FROM `pages` 
        WHERE `admin_side`=1 ORDER BY `order_menu` ASC";
    $result = mysqli_query($link, $query);
    if(!$result)
        return "";
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <li class="nav-item <?=(basename($_SERVER["PHP_SELF"]) == $row["url"])?"active":"";?>">
            <a class="nav-link" href="<?=$row["url"];?>">
                <i class="<?=$row["ico"];?>"></i>
                <p><?=$row["title"];?></p>
            </a>
        </li>
<?php
    }
    mysqli_free_result($result);
}