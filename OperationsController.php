<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operations;

class OperationsController extends Controller
{
    //
	public function index(Request $request)
    {
        $limit = $request->get('limit', 25);
        $page = $request->get('page', 1);

        $operations = Operations::with(['seller', 'buyer'])
            ->paginate($limit, ['*'], 'page', $page);

        //return response()->json($operations);
		
		return response()->json($operations, 200, [],JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
