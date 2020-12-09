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
                <h1>Postagens
                    <span><a href="../index.php"><i class="fas fa-home icone"></i></a></span>
                    <span><a href="postagemEdicao.php"><i class="fas fa-plus icone"></i></a> </span>
                </h1>

                <?php

                use entidade\Postagem;

//                
                R::setup('mysql:host=127.0.0.1;dbname=blog', 'root', '');

                $postagens = R::findAll('postagem');

                echo Postagem::gerarTabelaPostagem($postagens);

                R::close();
                ?>
            </main>
            
            <p></p>

<?php Autoloader::importar('rodape.inc.php', 'inc'); ?>

<!--            -- MODELO DE TABELA A SER GERADA --
                <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Data/Hora</th>
                        <th>Título</th>
                        <th>Postivo</th>
                        <th>Negativo</th>
                        <th class="editar"></th>
                        <th class="excluir"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>9999</td>
                        <td>09/12/2020 11:31</td>
                        <td>TinyMCE</td>
                        <td>4</td>
                        <td>2</td>
                        <td class="editar"><a href=""><i class="fas fa-pen editar"></i></a></td>
                        <td class="excluir"><a href="postagemControlador.php?id="><i class="fas fa-trash-alt excluir"></i></a></td>
                    </tr>
                </tbody>
            </table>-->

        </div>
    </body>
</html>
