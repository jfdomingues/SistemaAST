<?php

namespace App\model;

class Area
{
    private $id;
    private $executivo;
    private $funcional;
    private $dataCriacao;
    private $status;
    private $id_usuario;


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
     * Get the value of executivo
     */ 
    public function getExecutivo()
    {
        return $this->executivo;
    }

    /**
     * Set the value of executivo
     *
     * @return  self
     */ 
    public function setExecutivo($executivo)
    {
        $this->executivo = $executivo;

        return $this;
    }

    /**
     * Get the value of funcional
     */ 
    public function getFuncional()
    {
        return $this->funcional;
    }

    /**
     * Set the value of funcional
     *
     * @return  self
     */ 
    public function setFuncional($funcional)
    {
        $this->funcional = $funcional;

        return $this;
    }

    /**
     * Get the value of dataCriacao
     */ 
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * Set the value of dataCriacao
     *
     * @return  self
     */ 
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

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
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }
}