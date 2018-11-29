<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Infraction;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;


class ClientsController extends Controller
{

    public function index(){
       $clients = Client::latest()->paginate(8);
    	// $clients=Client::latest()->get();

    	return view('client.index',compact('clients','car_data'));
                            }


    public function view(Client $client){

        return view('client.index',compact('client'));
    }


public function getclientData($cin){
    $car_dat = array();
    //with client id you can write logic and send output in car_data variable  through json
    $car_dat= Client::find($cin);
    $car_data=array();
    $car_data=$car_dat->locations;

    return response()->json(['success' => true, 'car_data' => $car_data]);
}

public function getcinphoto($cin){

    $client_photo= Client::find($cin);


    return response()->json(['success' => true, 'client_photo' => $client_photo]);
}


   /* public function store(){
    	//dd(Request()->all());
    	$client= new Client;
    	$client->cin=Request('cin');
    	$client->nom=Request('nom');
    	$client->prenom=Request('prenom');
    	$client->tel=Request('tel');
    	$client->email=Request('email');
        $client->age=Request('age');

    	$client->save();

    	return redirect('/client');
    }
    */

        public function editClient(request $request){

    $client = Client::find ($request->cin);
    $client->nom = $request->nom;
    $client->prenom = $request->prenom;
    $client->tel = $request->tel;
    $client->email = $request->email;
    $client->save();

    return response()->json($client);
    }
    
    public function deleteClient(request $request){
    $client = Client::find ($request->cin)->delete();
    return response()->json();
    }

      public function addClient(Request $request){
          
            $client = new Client;
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->tel = $request->tel;
            $client->cin = $request->cin;
            $client->email = $request->email;
            $client->age = $request->age;

 if($request->hasFile('cin_photo')){ 
        $file=$request->file('cin_photo');
        $file->move(public_path(). '/ClientsPhotos/'.$client->cin.'/', $file->getClientOriginalName());

        $client->cin_photo=$file->getClientOriginalName();
    }
     if($request->hasFile('permis_photo')){ 
        $file=$request->file('permis_photo');
        $file->move(public_path(). '/ClientsPhotos/'.$client->cin.'/', $file->getClientOriginalName());

        $client->permis_photo=$file->getClientOriginalName();
    }

           $client->save();
          //  return response()->json($client);
          return redirect('/client');
        }

public function addInfraction(request $request){
    
            $infra = new Infraction;

            $infra->client_cin=$request->infraction_cin;

                 if($request->hasFile('infraction')){ 
                    $file=$request->file('infraction');
                    $file->move(public_path(). '/infraction/'.$request->infraction_cin.'/', $file->getClientOriginalName());

                    $infra->infraction=$file->getClientOriginalName();
                }
                $infra->save();

    return redirect('/client');
    }

public function infractions($cin){

    $client= Client::find($cin);
    $infra=$client->infractions;


    return response()->json(['success' => true, 'infra' => $infra]);
}
}
