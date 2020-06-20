<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';			
?>

<?php

if (isset($_GET['id'])) {
	$get = @file_get_contents('../../media/films/1.txt');
	if (isset($_COOKIE['otsenka'])) {
	echo 'Вы уже голосовали';
	} else {
		// если нажата кнопк отправить оценку
		if (isset($_POST['otpravit'])) {
			// если  оценка выбрана, а непуста
			if (!empty($_POST['otsenka'])) {
			// обращаемся к файлу записей после оценки
			$otsenka = $get.$_POST['otsenka'].':';
			// заносим запись в файл
			$record = @file_put_contents('../../media/films/1.txt', $otsenka);
			// устанавливаем время авторизации
			// setcookie("otsenka", "", time() + 3600);
			}
				else {
					echo 'Вам нужно выбрать оценку';
				}	
			} 	
		}
}
		
// если пользователь уже проголосовал

// переменная с записями

$get = @file_get_contents('../../media/films/1.txt');
// массив с записями из файла txt
$explode = explode(':', $get);
//считаем количетсво проголосовавших(количество ячеек в массиве $explode)
$count = count($explode) - 1;
// среднее число оценки
$array_sum = array_sum($explode)/$count;?> <br><?php
// округляем до сотых(2 цифры после запятой)
$array_sum =round($array_sum, 2);
// задаем ширину одной звезды
$width = $array_sum * 60;
?>

<style>
	.point {
		background-image: url(/comments/images/stars.png);
		width: 300px;
		height: 59px;
			}

	#point {
		background-image: url(/comments/images/stars2.png);
		width: <?php echo $width; ?>px;
		height: 59px;
	}
</style>
<?php echo "Средняя оценка $array_sum Всего проголосовало $count" ?>
	<div class="point" title="<?php echo "Средняя оценка $array_sum Всего проголосовало $count" ?>">
		<div id="point"></div>
	</div>
		<!--если нет авторизованного пользователя либо оценка уже выставлена,то скрыть форму с выбором оценки  -->
    	<?php if (!isset($_POST['otsenka'])) { 
		    echo  '<form id="rating" method="POST" class="POST">
		    		<select name="otsenka">
			    		<option disabled selected hidden>...</option>
			    		<option>1</option>
			    		<option>2</option>
			    		<option>3</option>
			    		<option>4</option>
			    		<option>5</option>  		
		    		</select>
		    		<button name="otpravit">Оценить</button>
		    	</form>';
		}
  	?>