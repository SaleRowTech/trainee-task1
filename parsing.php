<title>task1</title>
<?php

$url = 'http://trainee.abaddon.pp.ua/catalog.xml';
$xml = simplexml_load_file($url) or die("feed not loading");
$str = apcu_fetch('xml');
if($str === false){
    $xmlFromCache = simplexml_load_file($url) or die("feed not loading");
}else $xmlFromCache = simplexml_load_string($str);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>task 1</title>

    <style>
        table {
            width: 50%; /* Ширина таблицы */
            background: white; /* Цвет фона таблицы */
            color: black; /* Цвет текста */
            border-spacing: 5px; /* Расстояние между ячейками */
        }
        td, tr {
            background: gray; /* Цвет фона ячеек */
            padding: 5px; /* Поля вокруг текста */
        }
    </style>

</head>
<body>
<h1>Таблица №1</h1>
<table>
    <tr>
        <th></th>
        <th>xml</th>
        <th>update</th>
    </tr>
    <tr>
        <th>ФОИ, индификационный код, номер телфона</th>
        <td><?php echo $xml->personinfo->surname." ".
                        $xml->personinfo->first_name." ".
                        $xml->personinfo->patronymic_name." ".
                        $xml->personinfo->tin." ".
                        $xml->personinfo->mobile_phone; ?></td>
        <td><?php
            if($xml->personinfo->asXML() == $xmlFromCache->personinfo->asXML()){
                echo "Не обновлено";
            }
            else echo "Обновлено";
             ?>
        </td>
    </tr>

</table>
<h1>Таблица №2</h1>
<table>
    <tr>
        <th></th>
        <th>orderId + ID товара</th>
        <th>xml</th>
        <th>update</th>
    </tr>
    <?php
    foreach ($xml->goods->good as $key=>$good){
    ?>
    <tr>
        <th>Название, цена,количество</th>
        <td>
            <?php echo $xml->orderid.", ".$good->id;?>
        </td>
        <td>
            <?php
            echo $good->name.", ".$good->price." грн, (".$good->amount."шт)";
            ?>
        </td>
        <td>
            <?php
            $item = null;
            foreach($xmlFromCache->goods->good as $struct) {
                if ($good->id->asXML() == $struct->id->asXML()) {
                    $item = $struct;
                    break;
                }
            }
            if($good->asXML() == $item->asXML()){
                echo "Не обновлено";
            }
            else echo "Обновлено";
    }
            ?>
        </td>
    </tr>
</table>

</body>
</html>

<?php
apcu_store("xml", $xml->asXML());
?>