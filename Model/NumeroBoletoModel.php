<?php

class NumeroBoletoModel implements JsonSerializable {
    private $idSorteo;
    private $idBoleto;
    private $numero;

    /**
     * NumeroBoleto constructor.
     * @param $idSorteo
     * @param $idBoleto
     * @param $numero
     */
    public function __construct($idSorteo, $idBoleto, $numero)
    {
        $this->idSorteo = $idSorteo;
        $this->idBoleto = $idBoleto;
        $this->numero = $numero;
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
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
            'numero' => $this->numero
        );
    }

    public function __sleep(){
        return array('idSorteo','idBoleto','numero' );
    }
}