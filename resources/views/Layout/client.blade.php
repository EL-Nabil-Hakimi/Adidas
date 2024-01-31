@extends('index')
@section('content')   
<a href="/addclient"><button class="btn btn-primary btn-sm" type="button" style="width: 30% ; height:40px; margin:20px" >Ajouter Client</button></a>

<div class="container mt-3">
    <h2>Clients</h2>
    <table class="table">
      <thead class="table-primary">
        <tr>
          <th>Number</th>
          <th>Prenom</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Adress</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clients as $client)
        <tr>
          <td>{{$client->id}}</td>
          <td>{{$client->nom}}</td>
          <td>{{$client->prenom}}</td>
          <td>{{$client->email}}</td>
          <td>{{$client->adresse  }}</td>
          <td>
            <div>
                <a href="/delete_client?id={{$client->id}}" class="text-danger" style="text-decoration: none">Supprimer</a>
                <span>/</span>
                <a href="/modifyclient?id={{$client->id}}" class="text-primary" style="text-decoration: none">Modifier</a>
            </div>
          </td>
        </tr>
        @endforeach
      

        
      </tbody>
    </table>
    
  </div>

  @endsection


  @section('nav')
  <div class="list-group list-group-flush mx-3 mt-4">
            
      <a href="/Client" class="list-group-item list-group-item-action py-2 ripple active">
        <i class="fas fa-chart-area fa-fw me-3"></i><span>Clients</span>
      </a>
      <a href="/addclient" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Client</span>
      </a>
      <a href="/Product" class="list-group-item list-group-item-action py-2 ripple ">
        <i class="fas fa-chart-area fa-fw me-3"></i><span>Produits</span>
      </a>
      <a href="/addproduit" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Produit</span>
      </a>
      <a href="/Categorie" class="list-group-item list-group-item-action py-2 ripple"
        ><i class="fas fa-lock fa-fw me-3"></i><span>Categories</span></a
      >
      <a href="/addcategorie" class="list-group-item list-group-item-action py-2 ripple"
        ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
      >
      
    </div>
  @endsection