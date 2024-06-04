<?php
/*Arquivo que vai conter o arquvio despachante e o composer*/

header("Content-Type: text/html; charset:utf-8");

require_once("../Config/config.php");
require_once("../Src/Vendor/autoload.php");

use Src\Traits\TraitUrlParser;
use Src\Classes\ClassRoutes;
use App\Dispatch;

$Dispatch= new App\Dispatch();
