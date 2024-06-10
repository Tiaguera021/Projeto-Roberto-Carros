<?php
namespace Src\Interfaces;

/*Arquivo de segurança que exige que os métodos existam na classe para evitar erros*/
interface InterfaceView
{
    public function setDescription($Description);
    public function setKeywords($Keywords);
    public function setTitle($Title);
    public function setDir($Dir);
    public function RenderLayout();
}
