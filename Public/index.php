<?php
/*Arquivo que vai conter o arquivo despachante e o composer*/

session_start();

header("Access-Control-Allow-Origin: robertocarros.local");
header("Content-Type: text/html; charset:utf-8");
error_reporting(E_ALL); ini_set("display_errors", 1);
require_once("../Config/config.php");
require_once("../Src/Vendor/autoload.php");

use Src\Traits\TraitUrlParser;
use Src\Classes\ClassRoutes;
use App\Dispatch;

$Dispatch= new App\Dispatch();
