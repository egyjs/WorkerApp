<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;

use GraphQL\Language\Printer;
use Illuminate\Http\Request;

class GraphqlController extends Controller
{
    public function graphql(Request $request){
        $requestSchema = $request->all()['query'];
        return ['hi',$request->all()];
    }
}
