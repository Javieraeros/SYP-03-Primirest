<?php
require_once "Controller.php";

class SorteoController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaSorteos = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a sorteo entity, instead of the sorteo collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaSorteos = ManejadoraSorteoModel::getSorteo($id);

        if ($listaSorteos != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (ManejadoraSorteoModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaSorteos, $request->getAccept());
        $response->generate();

    }


    //Todo
    /*
     * Cambiar para insertar con prep_query para evitar sql injection
     */
    public function managePostVerb(Request $request)
    {
        $response=null;
        $code=null;
        $resultado=null;
        $sorteo=null;

        $sorteo=new SorteoModel($request->getBodyParameters()->idSorteo
                ,$request->getBodyParameters()->FechaSorteo
                ,$request->getBodyParameters()->num1
                ,$request->getBodyParameters()->num2
                ,$request->getBodyParameters()->num3
                ,$request->getBodyParameters()->num4
                ,$request->getBodyParameters()->num5
                ,$request->getBodyParameters()->num6
                ,$request->getBodyParameters()->rein
                ,$request->getBodyParameters()->comp
                );

        /*Si el json viene con valores null, al decodificarlo mete "" en los valores del objeto sorteo
         y al hacer el insert en la tabla me da error, puesto que no pone ningún valor, así que lo que hago
        es poner los valores que son "" como "null" (cadenas null)*/
        for($i=1;$i<7;$i++){
            $cadenaGet="getNum".$i;
            $cadenaSet="setNum".$i;
            if($sorteo->$cadenaGet()==""){
                $sorteo->$cadenaSet("null");
            }
        }

        if($sorteo->getComp()==""){
            $sorteo->setComp("null");
        }


        if($sorteo->getRein()==""){
            $sorteo->setRein("null");
        }

        $resultado=ManejadoraSorteoModel::postSorteo($sorteo);

        if ($request != null) {
            $code = '200';

        } else {
            $code = '400';
        }

        $response = new Response($code, null, $resultado, $request->getAccept());
        $response->generate();
    }
}