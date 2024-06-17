<?php
namespace Src\Traits;

/*Arquivo para separar os endereços das páginas em um array*/
trait TraitUrlParser
{
    /*Divide a URL em array*/
    public function parseurl()
    {
        #O primeir item separado pela barra é a Controller, o segundo é o método e do terceiro em diante são parâmetros
        return explode("/",rtrim($_GET['url']), FILTER_SANITIZE_URL);
    }
}