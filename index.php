<?php
    define('PATH_URL', "http://localhost/jaspion");
    define('PATH_FILES', dirname( __FILE__ ));
    require_once(PATH_FILES."/core/jaspion.php");
    $url = (isset($_GET['url']) ? $_GET['url'] : '');
    $Jaspion = new jaspion($url);
    $Jaspion->run();
?>