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