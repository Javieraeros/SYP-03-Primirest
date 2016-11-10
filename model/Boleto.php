<?php


class Boleto implements JsonSerializable
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


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */

    //Needed if the properties of the class are private.
    //Otherwise json_encode will encode blank objects
    function jsonSerialize()
    {
        return array(
            'idSorteo' => $this->idSorteo,
            'idBoleto' => $this->idBoleto,
            'reintegro' => $this->reintegro,
            'tipoApuesta' => $this->tipoApuesta,
            'premio' => $this->premio
        );
    }

    public function __sleep(){
        return array('idSorteo','idBoleto','reintegro','tipoApuesta','premio' );
    }

}