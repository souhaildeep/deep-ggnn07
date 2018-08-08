<?php

namespace App\Http\Controllers;
use App\Devi;
use Illuminate\Http\Request;
use DB;
use Auth;
class DeviController extends Controller
{
  public function index()
    {
        $devis = Devi::all();
        return view('devis.show',['devis'=>$devis]);
    	# code...
    }
    public function create()
    {
    	 
    	 return view('devis.add');
    }
    public function store(Request $request)
    {
    	$dv = new Devi ; 
	    $dv->slug = $request->slug;
	    $dv->symbole = $request->symbole;
	    $dv->convert_value = $request->convert_value;
	    $dv->save();
	    session()->flash('success','good job');
	    return redirect('/devis/list'); 
    
    }
    public function show($id)
    {
      $dv = Devi::find($id);
      return view('devis.edit',compact('dv'));
    }
    public function update (Request $request , $id){
     
    $dv = Devi::find($id);
    $dv->slug = $request->slug;
	$dv->symbole = $request->symbole;
	$dv->convert_value = $request->convert_value;
	$dv->save();
    // update database
 
    return redirect('/devis/list');
  }

}
