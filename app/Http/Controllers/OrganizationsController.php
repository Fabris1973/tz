<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizations;

class OrganizationsController extends Controller
{
    
	public function index(Request $request)
    {
        $limit = $request->get('limit', 25);
        $page = $request->get('page', 1);

        $organizations = Organizations::paginate($limit, ['*'], 'page', $page);

        //return response()->json($organizations);
		return response()->json($organizations, 200, [],JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
	
	//
}
