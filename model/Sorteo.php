<?php


class Sorteo implements JsonSerializable
{
    private $idBoleto;
    private $idSorteo;
    private $reintegro;
    private $tipoApuesta;
    private $premio;

    /**
     * Sorteo constructor.
     * @param $idBoleto
     * @param $idSorteo
     * @param $reintegro
     * @param $tipoApuesta
     * @param $premio
     */
    public function __construct($idBoleto, $idSorteo, $reintegro, $tipoApuesta, $premio)
    {
        $this->idBoleto = $idBoleto;
        $this->idSorteo = $idSorteo;
        $this->reintegro = $reintegro;
        $this->tipoApuesta = $tipoApuesta;
        $this->premio = $premio;
    }


    /**
     * @return mixed
     */
    public function getIdBoleto()
    {
        return $this->idBoleto;
    }

    /**
     * @param mixed $idBoleto
     */
    public function setIdBoleto($idBoleto)
    {
        $this->idBoleto = $idBoleto;
    }

    /**
     * @return mixed
     */
    public function getIdSorteo()
    {
        return $this->idSorteo;
    }

    /**
     * @param mixed $idSorteo
     */
    public function setIdSorteo($idSorteo)
    {
        $this->idSorteo = $idSorteo;
    }

    /**
     * @return mixed
     */
    public function getReintegro()
    {
        return $this->reintegro;
    }

    /**
     * @param mixed $reintegro
     */
    public function setReintegro($reintegro)
    {
        $this->reintegro = $reintegro;
    }

    /**
     * @return mixed
     */
    public function getTipoApuesta()
    {
        return $this->tipoApuesta;
    }

    /**
     * @param mixed $tipoApuesta
     */
    public function setTipoApuesta($tipoApuesta)
    {
        $this->tipoApuesta = $tipoApuesta;
    }

    /**
     * @return mixed
     */
    public function getPremio()
    {
        return $this->premio;
    }

    /**
     * @param mixed $premio
     */
    public function setPremio($premio)
    {
        $this->premio = $premio;
    }

    function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }


}