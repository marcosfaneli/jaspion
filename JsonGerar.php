<?php
    $meuBlog = array('nome' => 'Marcos Faneli',
                     'idade' => 29,
                     'profissao' => 'Pedreiro High Tech',
                     'assuntos' => array('Delphi','PHP','Jiu-Jitsu','Palmeiras','Rock')
                    );

    $objJson = json_encode($meuBlog);

    print($objJson);

?>