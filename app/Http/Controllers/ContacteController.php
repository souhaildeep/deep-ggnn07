<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacte; 
use App\Langue; 
use DB;
use Auth;
class ContacteController extends Controller
{
    public function index()
    {
        $contacts = Contacte::all();
        return view('contacte.show',['contacts'=>$contacts]);
    	# code...
    }
    public function create()
    {
    	 $listlg = Langue::where('active', true)->get();
    	 return view('contacte.add',compact('listlg'));
    }
    public function store(Request $request)
    {
        dd($request->all());
    	$ca = new Contacte ; 
    	$ca->titre = [
         'fr' => $request->fr_titre,
        'en' => $request->en_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
        'pt' => $request->pt_titre,
        'it' => $request->it_titre,
        'ne' => $request->ne_titre,
        'ru' => $request->ru_titre, 
    ];
       $ca->socialnet = [
        'fb' => $request->fb_socialnet,
        'tt' => $request->tt_socialnet,
        'ig' => $request->ig_socialnet,
        'yt' => $request->yt_socialnet,
        'gp' => $request->gp_socialnet,
        'pt' => $request->pt_socialnet,
        //'in' => $request->ld_socialnet,
        //'ta' => $request->ta_socialnet, 
    ];
     $ca->email = $request->email;
    $ca->adress = $request->adress;
    $ca->tele = $request->tele;
    $ca->map = $request->map;
     $ca->save();
      session()->flash('success','good job');
      return redirect('/contact/list'); 
    
    }
    public function show($id)
    {
      $ca = Contacte::find($id);
       $listlg = Langue::where('active', true)->get();
     return view('contacte.edit',compact('ca','listlg'));
    }
    public function update (Request $request , $id){
     
    $ca = Contacte::find($id);
    $ca->titre = [
         'fr' => $request->fr_titre,
        'en' => $request->en_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
        'pt' => $request->pt_titre,
        'it' => $request->it_titre,
        'ne' => $request->ne_titre,
        'ru' => $request->ru_titre, 
    ];
       $ca->socialnet = [
        'fb' => $request->fb_socialnet,
        'tt' => $request->tt_socialnet,
        'ig' => $request->ig_socialnet,
        'yt' => $request->yt_socialnet,
        'gp' => $request->gp_socialnet,
        'pt' => $request->pt_socialnet,
        //'in' => $request->ld_socialnet,
        //'ta' => $request->ta_socialnet, 
    ];
     $ca->email = $request->email;
    $ca->adress = $request->adress;
    $ca->tele = $request->tele;
    $ca->map = $request->map;
     $ca->save();
    
    // save to database
 
    return redirect('/contact/list');
  }

}
