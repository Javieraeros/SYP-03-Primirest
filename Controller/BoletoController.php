<?php

require_once "Controller.php";

class BoletoController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaBoletos = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaBoletos = ManejadoraBoletoModel::getBoleto($id);

        if ($listaBoletos != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (ManejadoraBoletoModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaBoletos, $request->getAccept());
        $response->generate();

    }


    //Todo
    /*
     * Cambiar para insertar con prep_query para evitar sql injection
     */
    /**
     * Método que
     * @param Request $request
     */
    public function managePostVerb(Request $request)
    {
        $response=null;
        $code=null;
        $resultado=null;
        $boleto=null;

        $boleto=new BoletoModel($request->getBodyParameters()->idBoleto
            ,$request->getBodyParameters()->idSorteo
            ,$request->getBodyParameters()->reintegro
            ,$request->getBodyParameters()->tipoApuesta
            ,0
            ,0);


        $resultado=ManejadoraBoletoModel::postBoleto($boleto);

        if ($request != null) {
            $code = '200';

        } else {
            $code = '400';
        }

        $response = new Response($code, null, $resultado, $request->getAccept());
        $response->generate();
    }

}