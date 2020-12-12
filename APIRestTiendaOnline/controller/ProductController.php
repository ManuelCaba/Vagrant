<?php

require_once "Controller.php";


class ProductController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaProductos = null;
        $id = null;
        $response = null;
        $code = null;

        //Si se pide un producto en específico
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }

        $listaProductos = ProductHandlerModel::getProduct($id);

        if ($listaProductos != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (ProductHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaProductos, $request->getAccept());
        $response->generate();

    }

}