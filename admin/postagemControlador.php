<?php
require_once $_SERVER['DOCUMENT_ROOT']
        . '/Blog/classes/AutoLoader.class.php';

/* Há dados recebidos para tratamento */
if (isset($_GET['id']) || isset($_POST['id'])) {

    // Filtra e recupera a $id recebida por $_GET
    if (isset($_GET['id']) && !($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT))) {
        header("Location:index.php");
    }
    
    // Filtra e recupera a $id recebida por $_POST
    if(isset($_POST['id']) && !($id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT))) {
        header("Location:index.php");
    }

    R::setup('mysql:host=127.0.0.1;dbname=blog', 'root', '');
//    R::fancyDebug(true);

    if (isset($_GET['editar'])) {
        // Edicação solicitada
        header("Location:postagemEdicao.php?id=$id");
        die();
        
    } else if (isset($_GET['excluir'])) {
        // Exclusão solicitada
        R::trash('postagem', $id);
        header("Location:index.php");
        die();
    }

    // TODO Refatorar código para que chave para edição seja detectada
    // assim como para editar e excluir antes de fazer a operação de inclusão
    // 
    // Inclusão solicitada (operação padrão)
    $postagem = R::dispense('postagem');

    foreach ($_POST as $k => $v) {
        // tinyMCE realiza a sanitização, requendo que o texto puro seja enviado
        // para exibição. O mesmo não ocorre com o input 'titulo', requerendo
        // sanitização adequada
        if ($k == 'titulo') {
//            echo "$k\n<p>" . filter_input(INPUT_POST, $v,
//                    FILTER_SANITIZE_SPECIAL_CHARS) . '</p>' . "\n"; // depuração
            $postagem->$k = filter_input(INPUT_POST, $k, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
//            echo "$k = $v\n"; // depuração
            $postagem->$k = $v;
        }
    }

//    var_dump($postagem); // depuração

    R::store($postagem);

    R::close();

    header('Location:index.php'); // comentar para depuração
}
            