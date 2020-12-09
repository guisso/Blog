<?php

namespace entidade;

/**
 * Operações aplicadas a objetos do tipo Postagem.
 *
 * @author Luis Guisso <luis dot guisso at ifnmg dot edu dot br>
 * @version 0.0.1, 08/12/2020 
 */
class Postagem {

    /**
     * Processa a postagem recebida a fim de inserir seus campos no modelo
     * elaborado em <code>postagemmodelo.inc.php<code>.
     * 
     * @param Postagem Postagem a ser aplicada ao modelo pré-definido.
     * @return string  Modelo com dados da postagem preenchidos.
     */
    public static function aplicarModeloPostagem($postagem) {

        $arquivo = $_SERVER['DOCUMENT_ROOT']
                . '/Blog/inc/postagemmodelo.inc.php';

        /* Carga do arquivo modelo como string */
        $modelo = file_get_contents($arquivo);

        /* Verificação da correta leitura do arquivo modelo */
//        echo "<p>$modelo<p>";

        /* Substituição de chaves do arquivo modelo pelo conteúdo do bean */
        foreach ($postagem as $item => $conteudo) {
            if ($item == 'datahora') {
                // Exibição de data e hora em formato padrão brasileiro
                $conteudo = \DateTime::createFromFormat('Y-m-d H:i:s', $conteudo);
                $conteudo = $conteudo->format('d/m/Y H:i:s');
            }
            $modelo = str_replace("::$item::", $conteudo, $modelo);
        }

        /* Modelo com dados do bean inseridos */
        return $modelo;
    }

    /**
     * Gera uma tabela HTML com os dados de postagens recebidas para 
     * processamento.
     * 
     * @param array() Mapa de postagens a serem processadas.
     * @return string Tabela preencida com os dados das postagens recebidas.
     */
    public static function gerarTabelaPostagem($postagens) {

        $saida = '<table>'
                . '<thead>'
                . '<tr>'
                . '<th>Id</th>'
                . '<th>Data/Hora</th>'
                . '<th>Título</th>'
                . '<th class="centro"><i class="far fa-thumbs-up positivo"></th>'
                . '<th class="centro"><i class="far fa-thumbs-down negativo"></th>'
                . '<th class="centro"></th>'
                . '<th class="centro"></th>'
                . '</tr>'
                . '</thead>'
                . '<tbody>';

        foreach ($postagens as $postagem) {
            
            $saida .= '<tr>';

            // Insere colunas para todos os atributos, exceto para "conteúdo"
            foreach ($postagem as $campo => $valor) {
                if ($campo == 'conteudo') {
                    continue;
                }
                $saida .= "<td>$valor</td>";
            }

            $saida .= '<td class="editar"><a href="postagemControlador.php?editar&id='
                    . $postagem->id
                    . '"><i class="fas fa-pen editar"></i></a></td>
                        <td class="excluir"><a href="postagemControlador.php?excluir&id='
                    . $postagem->id
                    . '"><i class="fas fa-trash-alt excluir"></i></a></td></tr>';
        }

        $saida .= '</tbody></table >';

        return $saida;
    }

}
