<!DOCTYPE html>
<?php
// Importação automática de classes
require_once $_SERVER['DOCUMENT_ROOT']
        . '/Blog/classes/AutoLoader.class.php';
?>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <?php Autoloader::importar('fontsawesome.inc.php', 'inc'); ?>
        <?php Autoloader::importar('tinyMCE.inc.php', 'inc'); ?>
        <link rel="stylesheet" href="/Blog/css/estilos.css">
    </head>
    <body>
        <div class="principal">

            <?php Autoloader::importar('cabecalho.inc.php', 'inc'); ?>

            <main>
                <h1>Editar postagem
                    <span><a href="../index.php"><i class="fas fa-home icone"></i></a></span>
                </h1>

                <?php
                // Valores padrão em caso de não haver edição
                $id = 0;
                $positivo = 0;
                $negativo = 0;
                $titulo = null;
                $conteudo = null;

                // id recebido e carga dos dados referentes ao objeto
                if (isset($_GET['id'])) {

                    // Valida id antes de proceder à carga dos dados
                    if (($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT))) {

                        R::setup('mysql:host=127.0.0.1;dbname=blog', 'root', '');
                        $postagem = R::load('postagem', $id);

                        $positivo = $postagem->positivo;
                        $negativo = $postagem->negativo;
                        $titulo = $postagem->titulo;
                        $conteudo = $postagem->conteudo;

                        R::close();
                    }
                }
                ?>

                <!-- Entrada -->
                <form id="frmedicao" method="post" action="postagemControlador.php">

                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="positivo" value="<?= $positivo ?>">
                    <input type="hidden" name="negativo" value="<?= $negativo ?>">

                    <label>Título</label>
                    <input name="titulo" value="<?= $titulo ?>" autofocus>

                    <!--ATENÇÃO aos espaçamentos de conteúdo causados pela indentação-->
                    <textarea class="editor" name="conteudo"><?= filter_var($conteudo, FILTER_SANITIZE_SPECIAL_CHARS) ?></textarea>

                    <div id="botoes">
                        <a href="index.php">Cancelar</a>
                        <button>Salvar</button>
                    </div>

                </form>

                <!-- Editor bloqueado para edição (ver tinyMCE.inc.php) -->
                <!-- <textarea class="editordisabled"> ... </textarea>-->

            </main>

            <?php Autoloader::importar('rodape.inc.php', 'inc'); ?>

        </div>
    </body>
</html>
