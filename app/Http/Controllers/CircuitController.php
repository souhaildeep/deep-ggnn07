<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Circuit; 
use DB;
use Auth;
use Illuminate\Http\UploadedFile;
use App\Ville;
use App\Langue;
use App\Planday;

class CircuitController extends Controller
{
    public function create()
    {
    	$villes = Ville::all();
        $listlg = Langue::where('active', true)->get();
        return view('circuit.addcircuit',compact('villes','listlg'));
    }
    public function store(Request $request){
        
      
    // create object and set properties
   $cr = new Circuit;
    $cr->titre = [
        'fr' => $request->fr_titre,
        'us' => $request->us_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
        'pt' => $request->pt_titre,
        'it' => $request->it_titre,
        'ne' => $request->ne_titre,
        'ru' => $request->ru_titre, 
    ];
    $cr->description = [
         'fr' => $request->fr_description,
        'us' => $request->us_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
        'pt' => $request->pt_description,
        'it' => $request->it_description,
        'ne' => $request->ne_description,
        'ru' => $request->ru_description, 
    ];
    $cr->information =  [
        'fr' => $request->fr_information,
        'us' => $request->us_information,
        'es' => $request->es_information,
        'de' => $request->de_information,
        'pt' => $request->pt_information,
        'it' => $request->it_information,
        'ne' => $request->ne_information,
        'ru' => $request->ru_information,
    ];
       $cr->ville= $request->ville;
    $cr->prix1_4= $request->prix1_4;
    $cr->prix5_7= $request->prix5_7;
    $cr->prix0= $request->prix0;
    $record = array();
    $uploadeFiles = $request->pics;
    foreach ($uploadeFiles as $key=>$im) {   
       $record []  = $im->store('image');     
    }
    $cr->first_image = $request->first->store('image');
    $cr->images =$record ; 
    $cr->save();
    $pas = [];
     for ($i=0; $i <$request->plans ; $i++) {
         $position = $i * 8 ; 
        $pa = [
        'circuit_id' => $cr->id,   
        'jour' => json_encode([
                'fr' => $request->plansday[0+$position],
                'us' => $request->plansday[1+$position],
                'es' => $request->plansday[2+$position],
                'de' => $request->plansday[3+$position],
                'pt' => $request->plansday[4+$position],
                'it' => $request->plansday[5+$position],
                'ne' => $request->plansday[6+$position],
                'ru' => $request->plansday[7+$position],
                ]),
        'titre' => json_encode( [
                'fr' => $request->planstitre[0+$position],
                'us' => $request->planstitre[1+$position],
                'es' => $request->planstitre[2+$position],
                'de' => $request->planstitre[3+$position],
                'pt' => $request->planstitre[4+$position],
                'it' => $request->planstitre[5+$position],
                'ne' => $request->planstitre[6+$position],
                'ru' => $request->planstitre[7+$position],
                ]),
        'description'=> json_encode( [
                'fr' => $request->plansdesc[0+$position],
                'us' => $request->plansdesc[1+$position],
                'es' => $request->plansdesc[2+$position],
                'de' => $request->plansdesc[3+$position],
                'pt' => $request->plansdesc[4+$position],
                'it' => $request->plansdesc[5+$position],
                'ne' => $request->plansdesc[6+$position],
                'ru' => $request->plansdesc[7+$position], 
                ]),
        ];
        $pas[] = $pa;
    }    
    Planday::insert($pas);
    session()->flash('success','good job'); 
    return Response()->json(['state'=>true] ); 
   
  }
  public function list() {
    $listex = Circuit::where('active',1)->get();
    return view('circuit.listcircuit',['lists' => $listex]);
  }
  public function listcorbeille() {
    $listex = Circuit::where('active',0)->get();
    return view('circuit.corbeillecircuit',['lists' => $listex]);
  }
  public function show($id){
   // $id = substr(strrchr($slug, "-"), 1);
    $circuit = Circuit::find($id);
    $listlg = Langue::where('active', true)->get();
    $villes = Ville::all();
    return view('circuit.showcircuit',compact('circuit','villes','listlg'));
    
  }
/*  public function update (Request $request , $id){
    $cr = Circuit::find($id);
       $cr->titre = [
        'fr' => $request->fr_titre,
        'us' => $request->us_titre,
        'es' => $request->es_titre,
        'de' => $request->de_titre,
        'pt' => $request->pt_titre,
        'it' => $request->it_titre,
        'ne' => $request->ne_titre,
        'ru' => $request->ru_titre, 
    ];
    $cr->description = [
         'fr' => $request->fr_description,
        'us' => $request->us_description,
        'es' => $request->es_description,
        'de' => $request->de_description,
        'pt' => $request->pt_description,
        'it' => $request->it_description,
        'ne' => $request->ne_description,
        'ru' => $request->ru_description, 
    ];
    $cr->information =  [
        'fr' => $request->fr_information,
        'us' => $request->us_information,
        'es' => $request->es_information,
        'de' => $request->de_information,
        'pt' => $request->pt_information,
        'it' => $request->it_information,
        'ne' => $request->ne_information,
        'ru' => $request->ru_information,
    ];
    $cr->ville= $request->ville;
    $cr->prix1_4= $request->prix1_4;
    $cr->prix5_7= $request->prix5_7;
    $cr->prix0= $request->prix0;
    // save to database
    $cr->save();
    return redirect('/circuit/list');
  }*/
    public function updateActive($id) {
        $cr = Circuit::find($id);        
        if ($cr->active == 1) {
            $cr->active = 0 ;
        }else {
            $cr->active = 1 ;          
        }
        $cr->save();
        return redirect('/circuit/list'); 
    }
    public function updateTop($id) {
        $cr = Circuit::find($id);        
        if ($cr->top == 1) {
            $cr->top = 0 ;
        }else {
            $cr->top = 1 ;          
        }
        $cr->save();
        return redirect('/circuit/list'); 
    }
    public function destroyCircuit($id){
       $cr = Circuit::find($id); 
       $cr->delete();
        return redirect('/circuit/listcorbeille');
    }
    public function addImage (Request $request){
         $cr = Circuit::find($request->id);
          $record = array();
          $uploadeFiles = $request->pics;

        foreach ($uploadeFiles as $key=>$im) {   
               $record []  = $im->store('image');     
            }
        if (empty($cr->images)) {
            $cr->images = $record;
        }else {
            $appended = array_merge($cr->images,$record); 
            $cr->images =$appended ; 
        }
       
        $cr->save(); 
        return Response()->json(['images'=>$cr->images]);
    }
    public function destroyImages(Request $request){
        $cr = Circuit::find($request->id);
      // $deleteFiles = $request->picsdelet;
       $record = array();
       $record2 = array();
       $newimages = array();
       $record = $request->picsdelet; 
        $newimages = array_diff($cr->images , $record) ;
       foreach ($newimages as $key=>$im) {   
               $record2 []  = $im;     
        }
        $cr->images = $record2;
        $cr->save();
       return Response()->json(['state'=>true]);     
    }
    public function updateAll(Request $request)
    {
    //start update circuit
    $circuit = json_decode($request->cir) ; 
    $cr = Circuit::find($request->id);
    $cr->titre = [
        'fr' => $circuit->titre->fr,
        'us' => $circuit->titre->us,
        'es' => $circuit->titre->es,
        'de' => $circuit->titre->de,
        'pt' => $circuit->titre->pt,
        'it' => $circuit->titre->it,
        'ne' => $circuit->titre->ne,
        'ru' => $circuit->titre->ru, 
    ];
    $cr->description = [
         'fr' => $circuit->description->fr,
        'us' => $circuit->description->us,
        'es' => $circuit->description->es,
        'de' => $circuit->description->de,
        'pt' => $circuit->description->pt,
        'it' => $circuit->description->it,
        'ne' => $circuit->description->ne,
        'ru' => $circuit->description->ru, 
    ];
    $cr->information =  [
        'fr' => $circuit->information->fr,
        'us' => $circuit->information->us,
        'es' => $circuit->information->es,
        'de' => $circuit->information->de,
        'pt' => $circuit->information->pt,
        'it' => $circuit->information->it,
        'ne' => $circuit->information->ne,
        'ru' => $circuit->information->ru,
    ];
    $cr->ville= $circuit->ville;
    $cr->prix1_4= $circuit->prix1_4;
    $cr->prix5_7= $circuit->prix5_7;
    $cr->prix0= $circuit->prix0;
    $cr->save();
   //end  update circuit 
    //start update plans days
    DB::table('plandays')->where('circuit_id', $request->id)->delete();
        $pas = [];
     for ($i=0; $i <$request->plans ; $i++) {
         $position = $i * 8 ; 
        $pa = [
        'circuit_id' => $request->id,   
        'jour' => json_encode([
                'fr' => $request->plansday[0+$position],
                'us' => $request->plansday[1+$position],
                'es' => $request->plansday[2+$position],
                'de' => $request->plansday[3+$position],
                'pt' => $request->plansday[4+$position],
                'it' => $request->plansday[5+$position],
                'ne' => $request->plansday[6+$position],
                'ru' => $request->plansday[7+$position],
                ]),
        'titre' => json_encode( [
                'fr' => $request->planstitre[0+$position],
                'us' => $request->planstitre[1+$position],
                'es' => $request->planstitre[2+$position],
                'de' => $request->planstitre[3+$position],
                'pt' => $request->planstitre[4+$position],
                'it' => $request->planstitre[5+$position],
                'ne' => $request->planstitre[6+$position],
                'ru' => $request->planstitre[7+$position],
                ]),
        'description'=> json_encode( [
                'fr' => $request->plansdesc[0+$position],
                'us' => $request->plansdesc[1+$position],
                'es' => $request->plansdesc[2+$position],
                'de' => $request->plansdesc[3+$position],
                'pt' => $request->plansdesc[4+$position],
                'it' => $request->plansdesc[5+$position],
                'ne' => $request->plansdesc[6+$position],
                'ru' => $request->plansdesc[7+$position], 
                ]),
        ];
        $pas[] = $pa;
    }    
    Planday::insert($pas);

     return Response()->json(['state'=>true] ); 
    
    }
}
