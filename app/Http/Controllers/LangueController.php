<?php

namespace App\Http\Controllers;
use App\Langue; 
use DB;
use Auth;
use Illuminate\Http\Request;


class LangueController extends Controller
{
     public function index(){
       $listlan = Langue::all();       
      return view('langue.listLangue', ['langues' => $listlan]);
    }
    public function updateActive($id) {
        $lan = Langue::find($id);        
        if ($lan->active == 1) {
            $lan->active = 0 ;
        }else {
            $lan->active = 1 ;          
        }
        $lan->save();
        return redirect('/langue'); 
    }
}
