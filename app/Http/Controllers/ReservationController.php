<?php

namespace App\Http\Controllers;
use App\Reservation; 
use App\Circuit; 
use App\Excursion; 
use App\Facture; 
use DB;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Mail;
use App\Mail\Resermail;

class ReservationController extends Controller
{
    public function index(){
       $listlres = Reservation::all();       
      return view('reservation.listreservation',['listlres'=>$listlres]);
    }


    public function create($type , $id)
    {

        return view('reservation.addreservedemo', compact('id','type'));
    }
    public function store(Request $request){
     $rs = new Reservation;
    $fa = Facture::first();
    // chack to know ! excursion or circuit
    $totalps = $request->adulte + $request->enfant + $request->enfant_3 ;
    if ($request->type == "excursion") {
        $ex = Excursion::find($request->id);
        //check how many person ..
        if ($totalps>4) {
        $prix = $ex->prix5_7;
        }else{
          $prix = $ex->prix1_4;
        }
        $rs->id_excursion = $request->id ;
      }else{
          $cr = Circuit::find($request->id);
          if ($totalps>4) {
              $prix = $cr->prix5_7;
            }else{
              $prix = $cr->prix1_4;
            }
          $rs->id_circuit = $request->id ;
      }   
    $prixtotale = ($prix * $request->adulte) + (($fa->pourcentage/100*$prix) * $request->enfant) ;  
    $rs->name= $request->name;
    $rs->prenom= $request->prenom;
    $rs->email= $request->email;
    $rs->tele= $request->tele;
    $rs->pays= $request->pays;
    $rs->civilite= $request->civilite;
    $rs->date_start= $request->date_start;
    $rs->hotel= $request->hotel;
    $rs->hotel_adress= $request->hotel_adress;
    $rs->adulte = $request->adulte ;
    $rs->enfant = $request->enfant ;
    $rs->enfant_3 = $request->enfant_3 ;
    $rs->prixuniq = $prix;
    $rs->prixtotale = $prixtotale ;
    // save to database
    $rs->save();
    $facture = Reservation::find($rs->id);
    //take email admin
    $emailadmin = DB::table('contactes')->select('email')->get();
    $emails =  [$rs->email , $emailadmin ];
    foreach ($emails as $email) {
       Mail::to($email)->send(new Resermail($facture));
    }
   
    session()->flash('success','good job');   
    return redirect('/reservation/list'); 
   
  }
  public function listcorbeille() {
    //$listrs = Reservation::where('active',0)->get();
    return view('reservation.corbeilereserve');
  }
  public function destroyResv($id){
       $rv = Reservation::find($id); 
       $rv->delete();
        return redirect('/reservation/list');
    }
  public function showfacture($id) {
    $facture = Reservation::find($id);
    $fa = Facture::first();
    if ($facture->id_excursion) {
      $ex = Excursion::find($facture->id_excursion);
         return view('reservation.factureservation',compact('facture','fa','ex'));
    }else{
      $ex = Circuit::find($facture->id_circuit);
         return view('reservation.factureservation',compact('facture','fa','ex'));
    }
  
 
  }

}
