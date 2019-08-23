<?php

namespace Safimoney;

use Safimoney\ApiOperations\Error;
use Safimoney\ApiOperations\Request;

class Redirect
{
    function createOrder(Array $params, $credentials = array())
    {
        $request = new Request();
        $arraykeys = array('order_id', 'amount', 'amount_currency','success_url','error_url','cancel_url');
        $result = $request->validateParams($params, $arraykeys);

        if($result === true){
            $namespace = 'PaymentGateway.Redirect';
            $action  = 'createOrder';
            return $request->makeApiCall($params, $namespace, $action, $credentials);
        }else{
            return (new Error())->createErrorResponse($result);
        }
    }

    function getOrderDetail(Array $params, $credentials = array())
    {
        $request = new Request();
        $arraykeys = array('order_id');
        $result = $request->validateParams($params, $arraykeys);

        if($result === true){
            $namespace = 'PaymentGateway.Redirect';
            $action  = 'getOrder';
            return $request->makeApiCall($params, $namespace, $action, $credentials);
        }else{
            return (new Error())->createErrorResponse($result);
        }
    }
}