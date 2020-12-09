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

            <h1>
                    <span><a href="admin"><i class="fas fa-user-shield icone"></i></a></span>
                </h1>
            <main>
                



                <!-- Postagens -->
                <?php
                /* A classe Postagem é responsável por operações com postagens */

                use entidade\Postagem;

//                
                R::setup('mysql:host=127.0.0.1;dbname=blog', 'root', '');
//                R::fancyDebug(TRUE);

                /*
                 * Obtenção de uma entidade gerenciável
                 * (bean com correspondência no banco de dado) 
                 */
//                $postagem = R::dispense('postagem');

                /* Ajuste do estado do objeto */

                // ID é gerada automaticamente e, caso haja um valor atribuído,
                // é utilizada para atualização de registro pré-existente
////                $postagem->id = 1; 
//
//                $postagem->titulo = 'Título teste 001';
//                
//                // Data e hora podem ser ajustados automaticamente pelo Model
////                $postagem->dataHora = new \DateTime();
//
//                $postagem->titulo = 'Segundo Post!';
//                $postagem->conteudo = 'Precisamos organizar as coisas... :|';
//                $postagem->positivo = 5;
//                $postagem->negativo = 0;

                /* Pré-visualização do bean a ser salvo */
//                echo '<pre>';
//                var_dump($postagem);
//                echo '</pre>';
//                
                /* ---------------------------------------------------------- */
                /* Inserção bean como registro no banco de dados              */
                /* ---------------------------------------------------------- */
//                R::store($postagem);

                /* ---------------------------------------------------------- */
                /* Carga de um bean a partir de registro no banco de dados    */
                /* ---------------------------------------------------------- */
//                $postagem = R::load('postagem', 1);

                /* Pré-visualização do bean recuperado do banco de dados */
//                echo '<pre>';
//                var_dump($postagem);
//                echo '</pre>';
//
                /* Aplica o modelo criado em 'postagem.inc.php' aos dados carregados */
//                echo Postagem::aplicarModeloPostagem($postagem);


                /* ---------------------------------------------------------- */
                /* Carga de todos os beans no banco de dados                  */
                /* ---------------------------------------------------------- */
                $postagems = R::findAll('postagem');

//
                /* Aplica o modelo criado em 'postagem.inc.php' aos dados carregados */
                foreach ($postagems as $p) {
                    echo Postagem::aplicarModeloPostagem($p);
                }



                /* ---------------------------------------------------------- */
                /* Exclusão de um registro do banco de dados                  */
                /* ---------------------------------------------------------- */
//                $postagem = R::dispense('postagem');
//                $postagem->id = 1;
//                
                // OU
// 
//                $postagem = R::load('postagem', 1);
//                
                // E
// 
//                R::trash($postagem);

                /* ---------------------------------------------------------- */
                /* Liberação de recursos do sistema                           */
                /* ---------------------------------------------------------- */
                R::close();
                ?>
            </main>

<?php Autoloader::importar('rodape.inc.php', 'inc'); ?>

        </div>

    </body>
</html>
