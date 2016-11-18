<?php

require_once "DbNames.php";
require_once "SorteoModel.php";

class ManejadoraSorteoModel
{

    public static function getSorteo($id)
    {
        $listaSorteo = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();


        //IMPORTANT: we have to be very careful about automatic data type conversions in MySQL.
        //For example, if we have a column named "cod", whose type is int, and execute this query:
        //SELECT * FROM table WHERE cod = "3yrtdf"
        //it will be converted into:
        //SELECT * FROM table WHERE cod = 3
        //That's the reason why I decided to create isValid method,
        //I had problems when the URI was like libro/2jfdsyfsd

        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true || $id == null) {
            $query = "SELECT " . \ConstantesDB\ConsSorteos::id_sorteo . ","
                . \ConstantesDB\ConsSorteos::fecha . ","
                . \ConstantesDB\ConsSorteos::num1 . ","
                . \ConstantesDB\ConsSorteos::num2 . ","
                . \ConstantesDB\ConsSorteos::num3 . ","
                . \ConstantesDB\ConsSorteos::num4 . ","
                . \ConstantesDB\ConsSorteos::num5 . ","
                . \ConstantesDB\ConsSorteos::num6 . ","
                . \ConstantesDB\ConsSorteos::complementario . ","
                . \ConstantesDB\ConsSorteos::reintegro . " FROM "
                . \ConstantesDB\ConsSorteos::TABLE_NAME;


            if ($id != null) {
                $query = $query . " WHERE " . \ConstantesDB\ConsSorteos::id_sorteo . " = ?";
            }

            $prep_query = $db_connection->prepare($query);

            //IMPORTANT: If we do not want to expose our primary keys in the URIS,
            //we can use a function to transform them.
            //For example, we can use hash_hmac:
            //http://php.net/manual/es/function.hash-hmac.php
            //In this example we expose primary keys considering pedagogical reasons

            if ($id != null) {
                $prep_query->bind_param('s', $id);
            }

            $prep_query->execute();
            $listaSorteo = array();

            //IMPORTANT: IN OUR SERVER, I COULD NOT USE EITHER GET_RESULT OR FETCH_OBJECT,
            // PHP VERSION WAS OK (5.4), AND MYSQLI INSTALLED.
            // PROBABLY THE PROBLEM IS THAT MYSQLND DRIVER IS NEEDED AND WAS NOT AVAILABLE IN THE SERVER:
            // http://stackoverflow.com/questions/10466530/mysqli-prepared-statement-unable-to-get-result

            $prep_query->bind_result($idSorteo,$fecha,$num1,$num2,$num3,$num4,$num5,$num6,$comp,$rein);
            while ($prep_query->fetch()) {
                $sorteo = new SorteoModel($idSorteo,$fecha,$num1,$num2,$num3,$num4,$num5,$num6,$comp,$rein);
                $listaSorteo[] = $sorteo;
            }

//            $result = $prep_query->get_result();
//            for ($i = 0; $row = $result->fetch_object(LibroModel::class); $i++) {
//
//                $listaLibros[$i] = $row;
//            }
        }
        $db_connection->close();

        return $listaSorteo;
    }

    //returns true if $id is a valid id for a book
    //In this case, it will be valid if it only contains
    //numeric characters, even if this $id does not exist in
    // the table of books
    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

    /**
     * @param $sorteo: será una instacia de sorteomodel, el controller
     * se encargará de la validación
     */
    public static function postSorteo(SorteoModel $sorteo){
        $db=DatabaseModel::getInstance();
        $connection=$db->getConnection();

        $query="Insert into ". \ConstantesDB\ConsSorteos::TABLE_NAME.
            " (".\ConstantesDB\ConsSorteos::id_sorteo.
            ",".\ConstantesDB\ConsSorteos::num1.
            ",".\ConstantesDB\ConsSorteos::num2.
            ",".\ConstantesDB\ConsSorteos::num3.
            ",".\ConstantesDB\ConsSorteos::num4.
            ",".\ConstantesDB\ConsSorteos::num5.
            ",".\ConstantesDB\ConsSorteos::num6.
            ",".\ConstantesDB\ConsSorteos::complementario.
            ",".\ConstantesDB\ConsSorteos::reintegro.
            ") Values (".$sorteo->getIdSorteo().
            ",".$sorteo->getNum1().
            ",".$sorteo->getNum2().
            ",".$sorteo->getNum3().
            ",".$sorteo->getNum4().
            ",".$sorteo->getNum5().
            ",".$sorteo->getNum6().
            ",".$sorteo->getComp().
            ",".$sorteo->getRein().")";

        $prep_query = $connection->prepare($query);
        $resultado=$prep_query->execute();
        return $resultado;

    }
}