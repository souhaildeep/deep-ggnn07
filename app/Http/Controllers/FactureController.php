<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Facture;
use App\Langue;
use Image;
class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::all();
        return view('facture.show',compact('factures'));
    	# code...
    }
    public function create()
    {
    	 $listlg = Langue::where('active', true)->get();
    	 return view('facture.add',compact('listlg'));
    }
    public function store(Request $request)
    {
    	$fa = new Facture ; 
    	$fa->description = [
         'fr' => $request->fr_description,
        'en' => $request->en_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
        'pt' => $request->pt_description,
        'it' => $request->it_description,
        'ne' => $request->ne_description,
        'ru' => $request->ru_description, 
    ];
       $fa->footer = [
         'fr' => $request->fr_footer,
        'en' => $request->en_footer,
        'es' => $request->es_footer,
        'de' => $request->de_footer,
        'pt' => $request->pt_footer,
        'it' => $request->it_footer,
        'ne' => $request->ne_footer,
        'ru' => $request->ru_footer, 
    ];

     if ($request->hasFile('logo')) {
     //$fa->logo= $request->logo->store('logo');
      $image = $request->logo;
     
       $thumbnailPath = public_path().'/storage/logo/';
      $img = Image::make($image->getRealPath());
      $img->save($thumbnailPath.time().'.'.$image->getClientOriginalExtension());
      $img->resize(300, null , function($ratio)
        {
          $ratio->aspectRatio();
        });
      $img->save($thumbnailPath.time().'300x200.'.$image->getClientOriginalExtension() , 50);
       $fa->logo='logo/'.time().'.'.$image->getClientOriginalExtension();      
     }
     $fa->pourcentage = $request->pourcentage ; 

      $fa->save();
      session()->flash('success','good job');
      return redirect('/facture'); 
    
    }
    public function show($id)
    {
      $fa = Facture::find($id);
       $listlg = Langue::where('active', true)->get();
     return view('facture.edit',compact('fa','listlg'));
    }
    public function update (Request $request , $id){
     
    $fa = Facture::find($id);
     $fa->description = [
         'fr' => $request->fr_description,
        'en' => $request->en_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
        'pt' => $request->pt_description,
        'it' => $request->it_description,
        'ne' => $request->ne_description,
        'ru' => $request->ru_description, 
    ];
       $fa->footer = [
         'fr' => $request->fr_footer,
        'en' => $request->en_footer,
        'es' => $request->es_footer,
        'de' => $request->de_footer,
        'pt' => $request->pt_footer,
        'it' => $request->it_footer,
        'ne' => $request->ne_footer,
        'ru' => $request->ru_footer, 
    ];
    $fa->pourcentage = $request->pourcentage ; 
if ($request->hasFile('logo')) {
     //$fa->logo= $request->logo->store('logo');
      $image = $request->logo;
     
       $thumbnailPath = public_path().'/storage/logo/';
      $img = Image::make($image->getRealPath());
      $img->save($thumbnailPath.time().'.'.$image->getClientOriginalExtension());
      $img->resize(300, 200);
      $img->save($thumbnailPath.time().'300x200.'.$image->getClientOriginalExtension());
       $fa->logo='logo/'.time().'.'.$image->getClientOriginalExtension();      
     }
    // save to database
    $fa->save();
    return redirect('/facture');
  }

}
