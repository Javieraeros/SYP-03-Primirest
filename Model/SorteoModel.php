<?php


class SorteoModel implements JsonSerializable
{
    private $idSorteo;
    private $FechaSorteo;
    private $num1;
    private $num2;
    private $num3;
    private $num4;
    private $num5;
    private $num6;
    private $rein;
    private $comp;


    /**
     * Boleto constructor.
     * @param $idSorteo
     * @param $FechaSorteo
     * @param $num1
     * @param $num2
     * @param $num3
     * @param $num4
     * @param $num5
     * @param $num6
     * @param $rein
     * @param $comp
     */
    public function __construct($idSorteo, $FechaSorteo, $num1, $num2, $num3, $num4, $num5, $num6, $rein, $comp)
    {
        $this->idSorteo = $idSorteo;
        $this->FechaSorteo = $FechaSorteo;
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->num3 = $num3;
        $this->num4 = $num4;
        $this->num5 = $num5;
        $this->num6 = $num6;
        $this->rein = $rein;
        $this->comp = $comp;
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
    public function getFechaSorteo()
    {
        return $this->FechaSorteo;
    }

    /**
     * @param mixed $FechaSorteo
     */
    public function setFechaSorteo($FechaSorteo)
    {
        $this->FechaSorteo = $FechaSorteo;
    }

    /**
     * @return mixed
     */
    public function getNum1()
    {
        return $this->num1;
    }

    /**
     * @param mixed $num1
     */
    public function setNum1($num1)
    {
        $this->num1 = $num1;
    }

    /**
     * @return mixed
     */
    public function getNum2()
    {
        return $this->num2;
    }

    /**
     * @param mixed $num2
     */
    public function setNum2($num2)
    {
        $this->num2 = $num2;
    }

    /**
     * @return mixed
     */
    public function getNum3()
    {
        return $this->num3;
    }

    /**
     * @param mixed $num3
     */
    public function setNum3($num3)
    {
        $this->num3 = $num3;
    }

    /**
     * @return mixed
     */
    public function getNum4()
    {
        return $this->num4;
    }

    /**
     * @param mixed $num4
     */
    public function setNum4($num4)
    {
        $this->num4 = $num4;
    }

    /**
     * @return mixed
     */
    public function getNum5()
    {
        return $this->num5;
    }

    /**
     * @param mixed $num5
     */
    public function setNum5($num5)
    {
        $this->num5 = $num5;
    }

    /**
     * @return mixed
     */
    public function getNum6()
    {
        return $this->num6;
    }

    /**
     * @param mixed $num6
     */
    public function setNum6($num6)
    {
        $this->num6 = $num6;
    }

    /**
     * @return mixed
     */
    public function getRein()
    {
        return $this->rein;
    }

    /**
     * @param mixed $rein
     */
    public function setRein($rein)
    {
        $this->rein = $rein;
    }

    /**
     * @return mixed
     */
    public function getComp()
    {
        return $this->comp;
    }

    /**
     * @param mixed $comp
     */
    public function setComp($comp)
    {
        $this->comp = $comp;
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
            'FechaSorteo'=>$this->FechaSorteo ,
            'num1'=>$this->num1 ,
            'num2'=>$this->num2 ,
            'num3'=>$this->num3 ,
            'num4'=>$this->num4 ,
            'num5'=>$this->num5 ,
            'num6'=>$this->num6 ,
            'comp'=>$this->comp ,
            'rein'=>$this->rein ,
        );
    }

    public function __sleep()
    {
        return array('idSorteo','FechaSorteo','num1','num2',
            'num3','num4','num5','num6','comp','rein');
    }

}