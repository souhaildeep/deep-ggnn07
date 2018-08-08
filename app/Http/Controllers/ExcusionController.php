<?php

namespace App\Http\Controllers;
use App\Excursion; 
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Ville;
use App\Langue;
class ExcusionController extends Controller
{
	public function create()
    {
        $villes = Ville::all();
        $listlg = Langue::where('active', true)->get();
        return view('excursions.add',compact('villes','listlg'));
    	
    	
    }
    public function FunctionName(Request $request)
    {
         dd($request->all());
        # code...
    }
    public function store(Request $request){
    // create object and set properties
   $ex = new Excursion;
    /*$ex->titre = json_encode([
        'fr' => $request->fr_titre,
        'en' => $request->en_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
		'pt' => $request->pt_titre,
		'it' => $request->it_titre,
		'ne' => $request->ne_titre,
		'ru' => $request->ru_titre,   
    ]);
    $ex->description = json_encode([
        'fr' => $request->fr_description,
        'en' => $request->en_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
		'pt' => $request->pt_description,
		'it' => $request->it_description,
		'ne' => $request->ne_description,
		'ru' => $request->ru_description,   
    ]);
    $ex->information = 
    json_encode([
        'fr' => $request->fr_information,
        'en' => $request->en_information,
        'es' => $request->es_information,
        'de' => $request->de_information,
		'pt' => $request->pt_information,
		'it' => $request->it_information,
		'ne' => $request->ne_information,
		'ru' => $request->ru_information,   
  
  ]);*/


    $ex->titre = [
        'fr' => $request->fr_titre,
        'us' => $request->us_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
        'pt' => $request->pt_titre,
        'it' => $request->it_titre,
        'ne' => $request->ne_titre,
        'ru' => $request->ru_titre, 
    ];
    $ex->description = [
         'fr' => $request->fr_description,
        'us' => $request->us_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
        'pt' => $request->pt_description,
        'it' => $request->it_description,
        'ne' => $request->ne_description,
        'ru' => $request->ru_description, 
    ];
    $ex->information =  [
        'fr' => $request->fr_information,
        'us' => $request->us_information,
        'es' => $request->es_information,
        'de' => $request->de_information,
        'pt' => $request->pt_information,
        'it' => $request->it_information,
        'ne' => $request->ne_information,
        'ru' => $request->ru_information,
    ];
    $ex->ville= $request->ville;
    $ex->prix1_4= $request->prix1_4;
    $ex->prix5_7= $request->prix5_7;
    $ex->prix0= $request->prix0;
    $record = array();
    $uploadeFiles = $request->pics;

    foreach ($uploadeFiles as $key=>$im) {   
       $record []  = $im->store('image');     
    }
    $ex->first_image = $request->first->store('image');
    $ex->images =$record ; 

    // save to database
    $ex->save();
  
    session()->flash('success','good job'); 
    return Response()->json(['state'=>true] ); 
  }
  public function list() {
    $listex = Excursion::where('active',1)->get();

    return view('excursions.list',['lists' => $listex]);
  }
  public function listcorbeille() {
    $listex = Excursion::where('active',0)->get();
   
    return view('excursions.corbeille',['lists' => $listex]);
  }
  public function show($id){    
    $ex = Excursion::find($id);
    $listlg = Langue::where('active', true)->get();
    $villes = Ville::all();
     return view('excursions.show',compact('ex','villes','listlg'));
    
  }
  public function update (Request $request , $id){
    $ex = Excursion::find($id);
        $ex->titre = [
        'fr' => $request->fr_titre,
        'us' => $request->us_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
        'pt' => $request->pt_titre,
        'it' => $request->it_titre,
        'ne' => $request->ne_titre,
        'ru' => $request->ru_titre, 
    ];
    $ex->description = [
         'fr' => $request->fr_description,
        'us' => $request->us_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
        'pt' => $request->pt_description,
        'it' => $request->it_description,
        'ne' => $request->ne_description,
        'ru' => $request->ru_description, 
    ];
    $ex->information =  [
        'fr' => $request->fr_information,
        'us' => $request->us_information,
        'es' => $request->es_information,
        'de' => $request->de_information,
        'pt' => $request->pt_information,
        'it' => $request->it_information,
        'ne' => $request->ne_information,
        'ru' => $request->ru_information,
    ];
    $ex->ville= $request->ville;
    $ex->prix1_4= $request->prix1_4;
    $ex->prix5_7= $request->prix5_7;
    $ex->prix0= $request->prix0;
    // save to database
    $ex->save();
    session()->flash('success','Bien Modifier');
    return redirect('/excursion/list');
  }
    public function addImage (Request $request){
         $ex = Excursion::find($request->id);
          $record = array();
          $uploadeFiles = $request->pics;

        foreach ($uploadeFiles as $key=>$im) {   
               $record []  = $im->store('image');     
            }
        if (empty($ex->images)) {
            $ex->images = $record;
        }else {
            $appended = array_merge($ex->images,$record); 
            $ex->images =$appended ; 
        }
        $ex->save();
        return Response()->json(['state'=>true]);
    }
    public function destroyImages(Request $request){
        $ex = Excursion::find($request->id);
      // $deleteFiles = $request->picsdelet;
       $record = array();
       $record2 = array();
       $newimages = array();
       $record = $request->picsdelet; 
        $newimages = array_diff($ex->images , $record) ;
       foreach ($newimages as $key=>$im) {   
               $record2 []  = $im;     
        }
        $ex->images = $record2;
        $ex->save();
       return Response()->json(['state'=>true]);     
    }
    public function updateActive($id) {
        $ex = Excursion::find($id);        
        if ($ex->active == 1) {
            $ex->active = 0 ;
        }else {
            $ex->active = 1 ;          
        }
        $ex->save();
        return redirect('/excursion/list'); 
    }
    public function updateTop($id) {
        $ex = Excursion::find($id);        
        if ($ex->top == 1) {
            $ex->top = 0 ;
        }else {
            $ex->top = 1 ;          
        }
        $ex->save();
        return redirect('/excursion/list'); 
    }
    public function destroyExcursions($id){
       $ex = Excursion::find($id); 
       $ex->delete();
        return redirect('/excursion/listcorbeille');
    }
    public function listVille(){
        $listlg = Langue::where('active', true)->get();
        $villes = Ville::all();
        return view('villes.ville',compact('villes','listlg'));
    }
    public function storeville(Request $request){
        dd($request->all());
         $vl = new Ville;
       $vl->ville = [
        'fr' => $request->fr_ville,
        'en' => $request->en_ville,
        'es' => $request->es_ville,
        'de' => $request->de_ville,
        'pt' => $request->pt_ville,
        'it' => $request->it_ville,
        'ne' => $request->ne_ville,
        'ru' => $request->ru_ville, 
    ];
    $vl->save();
    session()->flash('success','Bien inserer');
    return redirect('/ville/list');
    }
    public function createville(){
        return view('villes.addville');
    }
    public function afficherVille($id){
        $listlg = Langue::where('active', true)->get();
        $ville = Ville::find($id);
        return view('villes.editville',compact('ville','listlg'));    
    }
    public function editVille(Request $request , $id){
       $vil = Ville::find($id);
       $vil->ville = [
        'fr' => $request->fr_ville,
        'en' => $request->en_ville,
        'es' => $request->es_ville,
        'de' => $request->de_ville,
        'pt' => $request->pt_ville,
        'it' => $request->it_ville,
        'ne' => $request->ne_ville,
        'ru' => $request->ru_ville, 
    ];
     $vil->save();
     session()->flash('success','Bien modifier');
     return redirect('/ville/list');
    }
    public function destroyVille($id){
       $vil = Ville::find($id); 
       $vil->delete();
       return redirect('/ville/list');
    }
    public function villecorbeille(){
        $villes = Ville::onlyTrashed()->get();
        return view('villes.corbeilleville',['villes' => $villes]);
    }
    public function restorVille($id){
        Ville::withTrashed()->find($id)->restore();
        return redirect('/ville/listcorbeille'); 

    }
    public function deleteImage(Request $request){
        return response()->json(['deleted' => 'good']);
    }

}
