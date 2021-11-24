<!DOCTYPE html>
<html>
<body>

<h1>Trainee-task1</h1>

<?php
    #Кодировка страницы для браузера и краткая информация
	header("Content-Type: text/html; charset=utf-8");
    #Получаем файл с сервера и считывать его функцией simplexml_load_file().

	$url_file = simplexml_load_file("http://trainee.abaddon.pp.ua/catalog.xml");

?>

<!--Каждый домен может хранить до 5 МБ данных в LocalStorage.
 Кроме того, наши данные не отправляются на сервер при выполнении HTTP-запроса.
 Данные в LocalStorage не имеют срока годности. 
 Его можно удалить с помощью JavaScript или очистив кеш браузера.-->
 
<script>
localStorage.setItem('1', '<?php echo ('Тест1');?>');  
localStorage.setItem('2', '<?php echo ('Тест2');?>');
localStorage.setItem('3', '<?php echo $url_file->personinfo->surname ?>');  
</script>

<?php
$s = "<script>document.write(localStorage.getItem('1'));</script>";
$p = "<script>document.write(localStorage.getItem('2'));</script>";
$q = "<script>document.write(localStorage.getItem('3'));</script>";
echo ($s . $p . $q);
?>

<?php
    
    echo ('<p>Чтение оригинального файла: <a href="http://trainee.abaddon.pp.ua/catalog.xml" target="_blanc">http://trainee.abaddon.pp.ua/catalog.xml</a></p>');
        //Небольшая проверка первой переменной
        if ($url_file) {echo ('<p class="green">Ок!</p>');
        } 
        else {echo ('Проверьте правильность ссылки');}

    $new_file = simplexml_load_file("catalog.xml");

    echo ('<p>Измененный файл (для теста обновлений) <a href="/catalog.xml" target="_blanc">catalog.xml</a></p>');
   
        //Небольшая проверка второй переменной
        if ($new_file) {echo ('<p class="green">Ок!</p>');}
        else {echo ('Проверьте правильность ссылки');}

    echo ('<pre><p>Этот блок вызывает вопросы...</p>');
    //Сравнение двух версий
    if ($url_file == $new_file) {
        echo ('<p>Не изменились</p>');
    } else {
        echo ('<p>Изменились <i>- if ($url_file == $new_file) {} Такая проверка работает</i></p>');
    }

            //Проверка размера узла (но наверное есть лучший способ...)
            $before=0;
            $a=$url_file; //тестируемая переменная
            $b=$new_file; //измененный файл
            $before = memory_get_usage();
            unset($a);
            echo 'Размер первой переменной составил: ',$before-$a,' байт<br>';
            unset($b);
            echo 'Размер второй переменной составил: ',$before-$b,' байт <i>- тут не понял почему одинаковы</i>?';
    echo ('</pre>');

     #- Первая таблица
    /*содержит информаци о Клиенте. Состоит из трёх колонок.
    В первой колонке названия полей, 
    во второй - данные из XML, 
    в третьей должно обтображаться обновлялись данные с прошлой загрузки или нет ("Обновлено"/"Не обновлено").
    Следующие данные должны быть в таблице: 
    + ФИО 
    + номер мобильного 
    + TIN (идентификационный код)*/
    echo ('<h2>Первая таблица информация о Клиенте</h2>');
    echo ('<pre>');
    print_r($url_file->personinfo);
    echo ('</pre>');

    echo ('<table border="1" style="border-collapse: collapse; width: 100%;">
    <tbody>
    <tr>
    <td style="width: 33.3333%;">Названия полей</td>
    <td style="width: 33.3333%;">Данные из XML</td>
    <td style="width: 33.3333%;">Обновлялись ли данные</td>
    </tr>
    <tr>
    <td style="width: 33.3333%;">
    <ul>
         <li>ФИО:</li>
         <li>Номер мобильного:</li>
         <li>c (идентификационный код):</li>
    </ul>
    </td>
    <td style="width: 33.3333%;">'); ?>

    <?php //Получаем переменные для сохранения
        $surname = $url_file->personinfo->surname; //a
        $first_name = $url_file->personinfo->first_name; //b
        $phone = $url_file->personinfo->mobile_phone; //c
        $tin = $url_file->personinfo->tin; //d
    ?>
        <!--Запись в localStorage-->
        <script>
            localStorage.setItem('surname', '<?php echo $surname; ?>');  
            localStorage.setItem('first_name', '<?php echo $first_name; ?>');
            localStorage.setItem('phone', '<?php echo $phone; ?>');  
            localStorage.setItem('tin', '<?php echo $tin; ?>'); 
       </script>

        <?php //Получаем с lacalestorage

            $a = "<script>document.write(localStorage.getItem('surname'));</script>";
            $b = "<script>document.write(localStorage.getItem('first_name'));</script>";
            $c = "<script>document.write(localStorage.getItem('phone'));</script>";
            $d = "<script>document.write(localStorage.getItem('tin'));</script>";
            //echo ($a . $b . $c . $d);
       ?> 

    <?php echo ('<ul>
         <li>'. $surname . '</li>
         <li>' . $first_name .' </li>
         <li>'. $phone .'</li>
         <li>'. $tin .'</li>
        </ul>
    </td>
    <td style="width: 33.3333%;">
    <ul>
    ');?>
    
    <?php 
    
    if ($a == $surname ) {echo ('<li>Не обновлено</li>');} else {echo ('<li>Обновлено</li>');}
    if ($b == $first_name ) {echo ('<li>Не обновлено</li>');} else {echo ('<li>Обновлено</li>');}
    if ($c == $phone ) {echo ('<li>Не обновлено</li>');} else {echo ('<li>Обновлено</li>');}
    if ($c == $phone ) {echo ('<li>Не обновлено</li>');} else {echo ('<li>Обновлено</li>');}
    
    ?>
    
    <?php echo ('
    </ul></td>
    </tr>
    </tbody>
    </table>');

    
    # Информация о заказе
    echo ('<h2>Вторая таблица содержит информацию о заказе</h2>');
    echo ('<pre>');
    print_r($url_file->goods->good);
    echo ('</pre>');    

    echo ('<table border="1" style="border-collapse: collapse; width: 100%;">
    <tbody>
    <tr>
    <td style="width: 25%;">Названия полей</td>
    <td style="width: 25%;">Номер заказа(orderId)+ID товара</td>
    <td style="width: 25%;">Данные из XML</td>
    <td style="width: 25%;">Обновлялись ли данные</td>
    </tr>
    <tr>
    <td style="width: 25%;">
    <ul>
         <li>Номер заказа(orderId):</li>
         <li>ID товара:</li>
    </ul>
    </td>
    <td style="width: 25%;">');

    //Разбор массива заказов
    foreach($url_file->goods->good as $gd) {
    echo ('<ul>
        <li>OrderId: '.$gd->id . '</li>
        <li>ID: '. $gd->classificationid .'</li>
   </ul>');
   }
   
   echo ('</td><td style="width: 25%;">');

    foreach($url_file->goods->good as $gd) {

        echo ('<ul>
            <li>Название: '.$gd->name . '</li>
            <li>Цена: '. $gd->price .'</li>
            <li>Количество: '.$gd->amount . '</li>
       </ul>');
       }

    echo ('</td>
    <td style="width: 25%;">"Обновлено"/"Не обновлено")</td>
    </tr>
    </tbody>
    </table>');

    echo ('End');

?>

<?php

#Визуальное сравнение файлов

echo ('
<table style="border-collapse: collapse; width: 100%;">
<tbody>
<tr>
<td style="width: 50%;">');
 
    echo ('<h2>Print_r оригинального файла</h2>');
    echo ('<pre>');
    print_r($url_file);
    echo ('</pre>');
 
    echo ('</td><td style="width: 50%;">');

    echo ('<h2>Print_r измененного файла</h2>');
    echo ('<pre>');
    print_r($new_file);
    echo ('</pre>');

echo ('</td>
</tr>
</tbody>
</table>');
?>

<style>
    .green {color:green;}
    pre {
    background-color: #eee;
    padding: 10px 30px;
}
</style>

</body>
</html>