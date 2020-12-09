<?php
require_once $_SERVER['DOCUMENT_ROOT']
        . '/Blog/classes/AutoLoader.class.php';

if(isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id');
    
    R::setup('mysql:host=127.0.0.1;dbname=blog', 'root', '');
    $postagem = R::load('postagem', $id);
    
    // Dado de feedback recebido para processamento
    if(isset($_GET['positivo'])) {
        // feedback postivo
        $postagem->positivo++;
        R::store($postagem);
    } else if(isset($_GET['negativo'])) {
        // feedback negativo
        $postagem->negativo++;
        R::store($postagem);
    }
    
    header('Location:index.php');
}