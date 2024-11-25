<?php

namespace App\model;

class Acompanhamento
{
    private $astId;
    private $astArea;
    private $local;
    private $executante;
    private $astData;
    private $especialista;
    private $participantes;
    private $atividade;
    private $notaBloqueio;
    private $desvioBloqueio;
    private $notaPT;
    private $desvioPT;
    private $notaAPR;
    private $desvioAPR;
    private $notaGeral;


    /**
     * Get the value of astId
     */ 
    public function getAstId()
    {
        return $this->astId;
    }

    /**
     * Set the value of astId
     *
     * @return  self
     */ 
    public function setAstId($astId)
    {
        $this->astId = $astId;

        return $this;
    }

    /**
     * Get the value of astArea
     */ 
    public function getAstArea()
    {
        return $this->astArea;
    }

    /**
     * Set the value of astArea
     *
     * @return  self
     */ 
    public function setAstArea($astArea)
    {
        $this->astArea = $astArea;

        return $this;
    }

    /**
     * Get the value of local
     */ 
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set the value of local
     *
     * @return  self
     */ 
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get the value of executante
     */ 
    public function getExecutante()
    {
        return $this->executante;
    }

    /**
     * Set the value of executante
     *
     * @return  self
     */ 
    public function setExecutante($executante)
    {
        $this->executante = $executante;

        return $this;
    }

    /**
     * Get the value of astData
     */ 
    public function getAstData()
    {
        return $this->astData;
    }

    /**
     * Set the value of astData
     *
     * @return  self
     */ 
    public function setAstData($astData)
    {
        $this->astData = $astData;

        return $this;
    }

    /**
     * Get the value of especialista
     */ 
    public function getEspecialista()
    {
        return $this->especialista;
    }

    /**
     * Set the value of especialista
     *
     * @return  self
     */ 
    public function setEspecialista($especialista)
    {
        $this->especialista = $especialista;

        return $this;
    }

    /**
     * Get the value of participantes
     */ 
    public function getParticipantes()
    {
        return $this->participantes;
    }

    /**
     * Set the value of participantes
     *
     * @return  self
     */ 
    public function setParticipantes($participantes)
    {
        $this->participantes = $participantes;

        return $this;
    }

    /**
     * Get the value of atividade
     */ 
    public function getAtividade()
    {
        return $this->atividade;
    }

    /**
     * Set the value of atividade
     *
     * @return  self
     */ 
    public function setAtividade($atividade)
    {
        $this->atividade = $atividade;

        return $this;
    }

    /**
     * Get the value of notaBloqueio
     */ 
    public function getNotaBloqueio()
    {
        return $this->notaBloqueio;
    }

    /**
     * Set the value of notaBloqueio
     *
     * @return  self
     */ 
    public function setNotaBloqueio($notaBloqueio)
    {
        $this->notaBloqueio = $notaBloqueio;

        return $this;
    }

    /**
     * Get the value of desvioBloqueio
     */ 
    public function getDesvioBloqueio()
    {
        return $this->desvioBloqueio;
    }

    /**
     * Set the value of desvioBloqueio
     *
     * @return  self
     */ 
    public function setDesvioBloqueio($desvioBloqueio)
    {
        $this->desvioBloqueio = $desvioBloqueio;

        return $this;
    }

    /**
     * Get the value of notaPT
     */ 
    public function getNotaPT()
    {
        return $this->notaPT;
    }

    /**
     * Set the value of notaPT
     *
     * @return  self
     */ 
    public function setNotaPT($notaPT)
    {
        $this->notaPT = $notaPT;

        return $this;
    }

    /**
     * Get the value of desvioPT
     */ 
    public function getDesvioPT()
    {
        return $this->desvioPT;
    }

    /**
     * Set the value of desvioPT
     *
     * @return  self
     */ 
    public function setDesvioPT($desvioPT)
    {
        $this->desvioPT = $desvioPT;

        return $this;
    }

    /**
     * Get the value of notaAPR
     */ 
    public function getNotaAPR()
    {
        return $this->notaAPR;
    }

    /**
     * Set the value of notaAPR
     *
     * @return  self
     */ 
    public function setNotaAPR($notaAPR)
    {
        $this->notaAPR = $notaAPR;

        return $this;
    }

    /**
     * Get the value of desvioAPR
     */ 
    public function getDesvioAPR()
    {
        return $this->desvioAPR;
    }

    /**
     * Set the value of desvioAPR
     *
     * @return  self
     */ 
    public function setDesvioAPR($desvioAPR)
    {
        $this->desvioAPR = $desvioAPR;

        return $this;
    }

    /**
     * Get the value of notaGeral
     */ 
    public function getNotaGeral()
    {
        return $this->notaGeral;
    }

    /**
     * Set the value of notaGeral
     *
     * @return  self
     */ 
    public function setNotaGeral($notaGeral)
    {
        $this->notaGeral = $notaGeral;

        return $this;
    }
}
