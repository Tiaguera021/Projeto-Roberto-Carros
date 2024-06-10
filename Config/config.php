<?php

/* Arquivo para salvar as possíveis rotas dentro do sistema*/

/* Diretórios raízes*/
$pasta_interna = "";
/* Forma como a URL deve aparecer*/
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pasta_interna}");

/* Evita problemas caso o servidor online não coloque a barra separando os arquivos no diretório real*/
if (substr($_SERVER['DOCUMENT_ROOT'], -1)== '/')
{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$pasta_interna}");
} else
{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$pasta_interna}");
}

/*Diretórios específicos*/
define('DIRIMAGEM', DIRPAGE."Public/Imagem/");
define('DIRCSS', DIRPAGE."Public/Css/");
define('DIRJS', DIRPAGE."Public/Js/");

/*Acesso ao BD*/
define('HOST',"localhost");
define('DB',"roberto_carros");
define('USER',"root");
define('PASS',"admin");