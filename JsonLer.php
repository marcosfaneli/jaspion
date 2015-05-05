<?php
    $resultJson = file_get_contents('http://localhost/phpjson/JsonGerar.php');

    $objDecodeJson = json_decode($resultJson, true);

    print($objDecodeJson['nome']);
    $assuntos = $objDecodeJson['assuntos'];
    foreach($assuntos as $item){
        print($item);
    }
//    foreach($objDecodeJson['assuntos'] as $item){
//        $item[1];
//    };
?>