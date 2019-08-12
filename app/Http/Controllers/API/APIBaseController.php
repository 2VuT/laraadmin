<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller as Controller;

class APIBaseController extends Controller
{
    public function sendResponse($result, $message){
        $res = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($res, 200);
    }

    public function sendError($error, $errorMessage = [], $code = 404){
        $res = [
            'success' => false,
            'message' => $error,
        ];

        if ( !empty($errorMessage) ){
            $res['data'] = $errorMessage;
        }

        return response()->json($res, $code);
    }
}
