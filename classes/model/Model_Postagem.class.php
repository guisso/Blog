<?php

// Convenções do RedBeanPHP dificultam a definição de namespace
// para models. Assim, trabalha-se com a convenção de nome da classe
// Modelo_... e configura-se o AutoLoader para fazer a importação
// dos arquivos no diretório especial 'Model'
//namespace Model;
//define('REDBEAN_MODEL_PREFIX', '\\Model\\');

use \RedBeanPHP\SimpleModel;

/**
 * Postagem realizada no <i>blog</i>
 *
 * @author Luis Guisso <luis dot guisso at ifnmg dot edu dot br>
 * @version 0.0.1, 08/12/2020
 */
class Model_Postagem extends SimpleModel {

    public $id = 0;
    public $positivo = 0;
    public $negativo = 0;
    public $titulo = null;
    public $conteudo = null;
    
    function getId() {
        return $this->bean->id;
    }

    function getPositivo() {
        return $this->bean->positivo;
    }

    function getNegativo() {
        return $this->bean->negativo;
    }

    function getTitulo() {
        return $this->bean->titulo;
    }

    function getConteudo() {
        return $this->bean->conteudo;
    }

    function setId($id): void {
        $this->bean->id = $id;
    }

    function setPositivo($positivo): void {
        $this->bean->positivo = $positivo;
    }

    function setNegativo($negativo): void {
        $this->bean->negativo = $negativo;
    }

    function setTitulo($titulo): void {
        $this->bean->titulo = $titulo;
    }

    function setConteudo($conteudo): void {
        $this->bean->conteudo = $conteudo;
    }

    
    /**
     * Método implicitamente invocado quando da criação de um bean.<br>
     * <code>$ref = R::dispense('entidade');</code>
     * 
     * @global string $lifeCycle Variável global para registro do ciclo de vida
     * do objeto a ser gerenciado.
     */
    public function dispense() {
// IMPORTANTE! 
// Se o TimeZone não for especificado, a representação será incorreta
        date_default_timezone_set('America/Fortaleza');

// '\' requerida para que não haja tentativa de importação via
// AutoLoader, ou seja, a partir de um diretório não presente
// dado que a classe DateTime é do sistema.
        $datahora = new \DateTime();

// Formato inteligível pelo RedBeanPHP para armazenamento do banco
// de dados escolhido
        $this->bean->datahora = $datahora->format('Y-m-d H:i:s');
    }
    
    

}
