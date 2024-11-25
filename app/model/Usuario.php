<?php

namespace App\model;

class Usuario
{
    private $id;
    private $matricula;
    private $area;
    private $nome;
    private $mail;
    private $senha;
    private $dataInsert;
    private $dataEnter;
    private $dataExit;
    private $status;
    private $nivel;    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of area
     */ 
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area
     *
     * @return  self
     */ 
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of dataInsert
     */ 
    public function getDataInsert()
    {
        return $this->dataInsert;
    }

    /**
     * Set the value of dataInsert
     *
     * @return  self
     */ 
    public function setDataInsert($dataInsert)
    {
        $this->dataInsert = $dataInsert;

        return $this;
    }

    /**
     * Get the value of dataEnter
     */ 
    public function getDataEnter()
    {
        return $this->dataEnter;
    }

    /**
     * Set the value of dataEnter
     *
     * @return  self
     */ 
    public function setDataEnter($dataEnter)
    {
        $this->dataEnter = $dataEnter;

        return $this;
    }

    /**
     * Get the value of dataExit
     */ 
    public function getDataExit()
    {
        return $this->dataExit;
    }

    /**
     * Set the value of dataExit
     *
     * @return  self
     */ 
    public function setDataExit($dataExit)
    {
        $this->dataExit = $dataExit;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of nivel
     */ 
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set the value of nivel
     *
     * @return  self
     */ 
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }
}