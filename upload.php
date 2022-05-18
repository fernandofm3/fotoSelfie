<?php
    session_start();

    $uploadDir = 'uploads';

    if(!is_dir($uploadDir)){
        if (!mkdir($structure, 0777, true)) {
            print "ERRO: Não foi possível criar o diretório [uploads]";
        }
    }

    if(!is_writable($uploadDir)){
        chmod($uploadDir, 0777);
    }

    $name = $uploadDir.'/image_'.date('d-m-Y--H-i-s').'.jpg';
    $file = file_put_contents($name, file_get_contents('php://input'));
    if (!$file) {
        print "ERRO: Falha de escrita para o arquivo [$name], É necessário dar permissão de escrita na pasta [$uploadDir]\n";
        exit();
    }

    print 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/'.$name;
    
?>
