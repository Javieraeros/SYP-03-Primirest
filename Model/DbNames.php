<?php


namespace ConstantesDB;

//Clase con constantes para la tabla de Sorteos
class ConsSorteos
{
    const TABLE_NAME = "Sorteos";
    const id_sorteo = "IdSorteo";
    const fecha = "FechaSorteo";
    const num1 = "num1";
    const num2 = "num2";
    const num3 = "num3";
    const num4 = "num4";
    const num5 = "num5";
    const num6 = "num6";
    const complementario = "comp";
    const reintegro= "rein";
}

class ConsBoletos{
    const TABLE_NAME = "Boletos";
    const id_sorteo = "IdSorteo";
    const id_boleto="IdBoleto";
    const reintegro = "Reintegro";
    const tipoApuesta= "TipoApuesta";
    const premio= "Premio";
    const numeroAcertados= "NumeroAcertados";
}

class ConsNumerosBoletos{
    const TABLE_NAME="NumerosBoletos";
    const id_sorteo="IdSorteo";
    const id_boleto="IdBoleto";
    const numero= "Numero";
}