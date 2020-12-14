<?php

require_once "Controller.php";
require_once "model/ProductoModel.php";


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

        //Si no se ha pedido un producto específico y se ha pedido filtrado por stock
        if(!ProductHandlerModel::isValid($id) && isset ($request->getQueryString()['stock']))
        {
            $stock = $request->getQueryString()['stock'];
            $listaProductos = ProductHandlerModel::getProductByStock($stock);
        }
        else
        {
            $listaProductos = ProductHandlerModel::getProduct($id);
        }

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

    public function manageDeleteVerb(Request $request)
    {
        $id = null;
        $response = null;
        $code = null;

        //Si se pide un producto en específico
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }

        $eliminado = ProductHandlerModel::deleteProduct($id);

        if ($eliminado) {
            $code = '204';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (ProductHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, null, $request->getAccept());
        $response->generate();

    }

    public function managePostVerb(Request $request)
    {
        $body = $request->getBodyParameters();

        if(count($body) > 0)
        {
            $producto = new ProductoModel(0,$body->Nombre,$body->Stock,$body->Discount,$body->Prime,$body->Price,$body->Short_Description,$body->Long_Description,$body->Image,$body->Category);

            if(isset($producto))
            {
                //TODO Insertar Producto
            }
            else
            {
                $code = '404';
            }
        }
        else
        {
            echo 'no';
        }

        $response = new Response($code, null, null, $request->getAccept());
        parent::managePostVerb($request); // TODO: Change the autogenerated stub
    }

}