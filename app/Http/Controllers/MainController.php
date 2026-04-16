<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       // echo $request->header('Host');
	   return '12';
    }

    public function home()  {

        return 'home';
    }
	
	public function example_v()  {
		
		return view('example_v',['a' =>  ['a1' =>'Jam','a2' => 'John'],'email' => 'www']);	
    } 		
	
	public function testblade()  {
		
		return view('testblade',['a' => 'ai','comp' => 'infa']);
	}

    public function extends_v()  {
		
		return view('child.index');
	}
	
	public function testcomp()  {
             
		return view('testcomp');	 
    
    }	
	
	public function testLayout(Request $request)  {
             
		//return $request->ip();
		return view('layout.indexlayout');	 
    
    }
	
	
	public function testUrl()  {
		
		//echo url()->current();
	//	echo route('testblade');
	 session()->increment('counter');
	 return session()->get('counter');
	
	}

	public function testlog(Request $request)  {
	  	
	  Log::debug('debug-level-message');
	  
	  Log::channel('daily') ->info($request->ip().'daily:information message');   //работает !!!
	  return 1;
	 }
}
