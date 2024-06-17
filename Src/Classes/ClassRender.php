<?php
namespace Src\Classes;

/* Arquivo para renderizar as telas da View*/
class ClassRender
{

    /*propriedades*/
    private $Dir;
    private $Title;
    private $Description;
    private $Keywords;

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    public function getKeywords()
    {
        return $this->Keywords;
    }

    public function setKeywords($Keywords)
    {
        $this->Keywords = $Keywords;
    }

    public function getTitle()
    {
        return $this->Title;
    }

    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    public function getDir()
    {
        return $this->Dir;
    }

    public function setDir($Dir)
    {
        $this->Dir = $Dir;
    }
    public function RenderLayout()
    {
        include_once(DIRREQ. "App/View/Home/Home.php");
    }
    public function RenderLogin()
    {
        include_once(DIRREQ. "App/View/Login/Login.php");
    }

    public function RenderCadastrar()
    {
        include_once(DIRREQ. "App/View/Cadastrar/Cadastrar.php");
    }

    public function RenderComprarVeiculo()
    {
        include_once(DIRREQ. "App/View/ComprarVeiculo/ComprarVeiculo.php");
    }

    public function RenderCadVeiculo()
    {
        include_once(DIRREQ. "App/View/CadastrarVeiculo/CadastrarVeiculo.php");
    }

    public function RenderSobreNos()
    {
        include_once(DIRREQ. "App/View/SobreNos/SobreNos.php");
    }

    public function AddMain()
    {
        if (file_exists(DIRREQ. "App/View/{$this->getDir()}/Main.php"))
        {
            include(DIRREQ. "App/View/{$this->getDir()}/Main.php");
        }
    }

    public function AddHead()
    {
        if (file_exists(DIRREQ. "App/View/{$this->getDir()}/Head.php"))
        {
            include(DIRREQ. "App/View/{$this->getDir()}/Head.php");
        }
    }

    public function AddHeader()
    {
        if (file_exists(DIRREQ. "App/View/{$this->getDir()}/Header.php"))
        {
            include(DIRREQ. "App/View/{$this->getDir()}/Header.php");
        }
    }

    public function AddFooter()
    {
        if (file_exists(DIRREQ. "App/View/{$this->getDir()}/Footer.php"))
        {
            include(DIRREQ. "App/View/{$this->getDir()}/Footer.php");
        }
    }
}
