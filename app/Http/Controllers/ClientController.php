<?php

namespace App\Http\Controllers;
use App\Models\ClientModel;


use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    protected $client;
    public function __construct(){
        $this->client = new ClientModel();
    }
    
    public function index(){
        $clients = $this->client->all();
        return view('Layout.client')->with('clients' , $clients);
    }
    public function AddClientPage(){
        return view('Layout.addclient');
    }
    public function modifyClientPage(Request $request){
        $id = $request->id;
        $client = $this->client->find($id);
        return view('Layout.modifyclient')->with('client', $client);;
    }

    public function Add_Client(Request $request){
            $client = $this->client;
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->email = $request->email;
            $client->adresse = $request->adresse;

            $client->save();

            return redirect()->route('AddclientView');        

    }

    public function Delete_Client(Request $request){
        $id = $request->id;
        $this->client->find($id)->delete();
        return redirect()->route('ClientView');
    }
    public function Modify_Client(Request $request){
        $id = $request->id;
        $client = $this->client->find($id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->adresse = $request->adresse;

        $client->save();

       return redirect()->route('ClientView');    }

}
