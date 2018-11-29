<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Voiture;
use App\Location;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use DateTime;


class VoituresController extends Controller
{
     public function index(){

        $voitures = Voiture::latest()->paginate(8);

        $todayDate = date("Y-m-d");
         if(  $location = Voiture::where('date_fin','<',$todayDate)->first() ) {


 $matricule=$location->matricule;

 $garage= Voiture::find($matricule);
            $statut='garage';
            $garage->statut = $statut;
            $garage->save();
 }

        return view('voiture.index',compact('voitures'));

    }

public function editVoiture(request $request){
    $voiture = Voiture::find ($request->matricule);
    $voiture->modele = $request->modele;
     $voiture->marque = $request->marque;
     $voiture->carburant = $request->carburant;
    $voiture->prix = $request->prix;
    $voiture->couleur = $request->couleur;


    $assurance = date_create($request->assurance);
date_modify($assurance, '-1 year');
echo date_format($assurance, 'Y-m-d');  
     $voiture->assurance = $assurance;

  
    $voiture->vignette =$request->vignette;
    
    $voiture->save();
    return redirect('/voiture');
    }

    public function deleteVoiture(request $request){
    $voiture = Voiture::find ($request->matricule)->delete();
    $location = Location::where('voiture_matricule','=',$request->matricule)->delete();
    return redirect('/voiture');
    }

   public function addVoiture( request $request ){
          
             $voiture= new Voiture;
        $voiture->matricule=Request('matricule');
        $voiture->modele=Request('modele');
        $voiture->marque=Request('marque');
        $voiture->prix=Request('prix');
        $voiture->carburant=Request('carburant');
        $voiture->couleur=Request('couleur');
        $voiture->vignette=Request('vignette');
        $voiture->assurance=Request('assurance');

 if($request->hasFile('photo')){ 
        $file=$request->file('photo');
        $file->move(public_path(). '/PhotosCar/'.$voiture->matricule.'/', $file->getClientOriginalName());

        $voiture->photo=$file->getClientOriginalName();
    }

    else{ return 'taille photo grande';
    }  

   /*     $file=Request('photo');

    if (file_exists( public_path(). '/PhotosCar/'.$voiture->matricule.'/', $file->getClientOriginalName())) {
        return '/images/photos/account/' . $this->account_id .'.png';
    } else {
        return '/images/photos/account/default.png';
    }  
*/


            $voiture->save();
           return redirect('/voiture');

        }

public function photoShow($matricule){

    $voiture_photo= Voiture::find($matricule);


    return response()->json(['success' => true, 'voiture_photo' => $voiture_photo]);
}
   /* public function store(){
        //dd(Request()->all());
        $voiture= new Voiture;
        $voiture->matricule=Request('matricule');
        $voiture->modele=Request('modele');
        $voiture->marque=Request('marque');
        $voiture->prix=Request('prix');
        $voiture->carburant=Request('carburant');
        $voiture->couleur=Request('couleur');
        $voiture->vignette=Request('vignette');
        $voiture->assurance=Request('assurance');

        $voiture->save();

        return redirect('/voiture');

    } 
    */
}
