<?php
    define('PATH_URL', "http://localhost/phpjson");
    define('PATH_FILES', dirname( __FILE__ ));
    require_once(PATH_FILES."/core/Jaspion.php");
    $url = (isset($_GET['url']) ? $_GET['url'] : 'index/index');
    $Jaspion = new Jaspion($url);
?>