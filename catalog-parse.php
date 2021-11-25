<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link type="text/css" rel="stylesheet"
          href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></link>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <!--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
</head>
<body>
<?php
//require 'xml.php';
include 'catalog.xml';
//$xml = new xml('catalog.xml');

//var_dump($xml->data);

//print_r($xml->data);

//echo $xml->data['orderid'];
/*$somedata = $xml->data;

print_r($somedata);

*/
$objXmlDocument = simplexml_load_file('catalog.xml');
/*echo '<pre>';
print_r($objXmlDocument);
echo '</pre>';*/

?>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>ФИО</th>
        <th>номер мобильного</th>
        <th>TIN (идентификационный код)</th>
    </tr>
    </thead>
    <tbody>

    <tr>

        <td><? echo $objXmlDocument->personinfo->surname.' '.$objXmlDocument->personinfo->first_name.' '.$objXmlDocument->personinfo->patronymic_name;?> </td>
        <td><?= $objXmlDocument->personinfo->mobile_phone; ?> </td>
        <td><?= $objXmlDocument->personinfo->tin; ?> </td>
    </tr>

    <!--<tr>
        <td colspan="3">Empty data</td>
    </tr>-->

    </tbody>
    <tfoot>
    <tr>
        <th>ФИО</th>
        <th>номер мобильного</th>
        <th>TIN (идентификационный код)</th>
    </tr>
    </tfoot>
</table>
<!-- Second table -->
<table id="exampleReal" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Название (name)</th>
        <th>цена (price)</th>
        <th>Количество (amount)</th>
    </tr>
    </thead>
    <tbody>

    <tr>

        <td><? echo $objXmlDocument->goods->good->name; ?> </td>
        <td><?= $objXmlDocument->goods->good->price; ?> </td>
        <td><?= $objXmlDocument->goods->good->amount; ?> </td>
    </tr>
    <tr>

        <td><? echo $objXmlDocument->goods->good[1]->name; ?> </td>
        <td><?= $objXmlDocument->goods->good[1]->price; ?> </td>
        <td><?= $objXmlDocument->goods->good[1]->amount; ?> </td>
    </tr>

    <!--<tr>
        <td colspan="3">Empty data</td>
    </tr>-->

    </tbody>
    <tfoot>
    <tr>
        <th>Название (name)</th>
        <th>цена (price)</th>
        <th>Количество (amount)</th>
    </tr>
    </tfoot>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
    $(document).ready(function () {
        $('#exampleReal').DataTable();
    });
</script>

</body>
</html>