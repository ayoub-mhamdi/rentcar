<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Voiture;
use App\Client;
use DateTime;

class LocationsController extends Controller
{
    public function index(){

    $locations = Location::latest()->paginate(8);

    $voitures= Voiture::all();

    	return view('location.index',compact('locations','voitures'));

    }

     public function indexV(){

        $voitures = Voiture::latest()->paginate(8);

    	$todayDate = date("Y-m-d");

 //$location = Location::where('date_fin','<',$todayDate)->orderBy('created_at', 'desc')->first();


//liberer les voitures non Louer
  if(  $location = Voiture::where('date_fin','<',$todayDate)->get()	) {

      foreach($location as $loc){
 $matricule=$loc->matricule;

 $garage= Voiture::find($matricule);
            $statut='garage';
            $garage->statut = $statut;
           
  		    $garage->save();
           }
 }

 if(  $resa = Location::where('date_prise','=',$todayDate)->get()  ) {

        foreach($resa as $res){
 $matricule=$res->voiture_matricule;

 $garage= Voiture::find($matricule);
            $statut='occupee';
            $garage->statut = $statut;
         
          $garage->save();
           }
 }  

       $clients = Client::all(); 

        return view('parc.index',compact('voitures','clients'));

    }


    public function getCarData($matricule){
    $car_dat = array();
    //with client id you can write logic and send output in car_data variable  through json
    $car_dat= Voiture::find($matricule);
    $car_data=array();
    $car_data=$car_dat->locations;
 
    return response()->json(['success' => true, 'car_data' => $car_data]);
				             				           
                                         }

	public function reservation($matricule){

    //with client id you can write logic and send output in car_data variable  through json
    $car_dat= Voiture::find($matricule);

$todayDate = date("Y-m-d");

  //  $car_data=$car_dat->locations->where('date_fin','>',$todayDate)->where('date_prise','=<',$todayDate)->first();
$car_data=$car_dat->locations->where('date_fin','>=',$todayDate)->first();
    $cinClient=$car_data->client_cin;

    $clientR= Client::where('cin',$cinClient)->first();

    return response()->json(['success' => true, 'clientR' => $clientR]);
											}



 public function reserver( request $request ){
  //location        



// $loc = Location::where('voiture_matricule','=',Request('voiture_matricule'))->first();
//foreach($loc as $l){
//    if(Request('date_fin') < $l->date_prise)
 //       {
             $location= new Location;
        $location->voiture_matricule=Request('voiture_matricule');
        $location->client_cin=Request('client_cin');
        $location->date_prise=Request('date_prise');
        $location->date_fin=Request('date_fin');


$dStart = new DateTime(Request('date_prise'));
   $dEnd  = new DateTime(Request('date_fin'));
   $dDiff = $dStart->diff($dEnd);

  $nombre_jours=$dDiff->days;

  		$location->nombre_jours=$nombre_jours;
  	    $location->prix_jour=Request('prix_jour');

  		$location->prix_total=Request('prix_jour')*$nombre_jours;


            $location->save();
//voiture
              $todayDate = date("Y-m-d");
           $voiture = Voiture::find ($request->voiture_matricule);

             if($location->date_prise == $todayDate){
 
            $statut='occupee';
            $voiture->statut = $statut;
                                                    }
      
             $voiture->dateDajout=Request('date_prise');
             $voiture->date_fin=Request('date_fin');
             $voiture->save();
   
           
//}}
return redirect('/parc');
        }



public function editReservation(request $request){
    $voiture = Voiture::find ($request->matricule);

    $voiture->date_fin= $request->date_fin;
   // $voiture->prix= $request->prix;
    $voiture->save();


$location = Location::where('voiture_matricule','=',$request->matricule)->first();
$location->date_fin= $request->date_fin;
$location->prix_jour=$request->prix;

      $location->prix_total=$request->prix*$location->nombre_jours;

       if($request->hasFile('contrat')){ 
        $file=$request->file('contrat');
        $file->move(public_path(). '/contrat/'.$location->client_cin.'/', $file->getClientOriginalName());

        $location->contrat=$file->getClientOriginalName();
    }
    $location->save();

if($request->liberer=='liberer'){
$location = Location::where('voiture_matricule','=',$request->matricule)->first()->delete();

 $garage= Voiture::find($request->matricule);
            $statut='garage';
            $garage->statut = $statut;
            
            $garage->date_fin=null;
          $garage->save();
}
    return redirect('/parc');
    }


    public function voirplus($id){
     $voirplus = Location::where('id','=',$id)->first();
     $nom = Client::find($voirplus->client_cin); 
    return view('location.voirplus',compact('voirplus','nom'));
    }


 public function statistique($matricule,$annee,$mois){
  //$m=date('n',strtotime($date));
 //  $t = Location::where('voiture_matricule','=',$matricule);

 // $m=App\Location::where('voiture_matricule','=','30 000')->where('date_fin','=','$mois')->sum('prix_total'); 


//$price=Location::where('voiture_matricule','=',$matricule)->whereMonth('date_fin','=',$mois)->sum('prix_total');
$priceMonth=Location::where('voiture_matricule','=',$matricule)->whereMonth('date_fin','=',$mois)->whereYear('date_fin','=',$annee)->sum('prix_total');
$pastMonth=Location::where('voiture_matricule','=',$matricule)->whereMonth('date_fin','=',$mois-1)->whereYear('date_fin','=',$annee)->sum('prix_total');

$priceYear=Location::where('voiture_matricule','=',$matricule)->whereYear('date_fin','=',$annee)->sum('prix_total');
$pastYear=Location::where('voiture_matricule','=',$matricule)->whereYear('date_fin','=',$annee-1)->sum('prix_total');


   return response()->json(['success' => true, 'priceMonth' => $priceMonth,'priceYear' => $priceYear,'pastMonth' => $pastMonth,
    'pastYear' => $pastYear]);
    }

}

