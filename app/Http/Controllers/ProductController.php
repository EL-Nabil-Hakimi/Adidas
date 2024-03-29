<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use App\Models\ProduitModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $category;
    protected $product;
    public function __construct(){
        $this->category = new CategorieModel();
        $this->product = new ProduitModel();
    }

    public function index(){
        $products = $this->product->all();
        return view('Layout.produit')->with('products', $products);
    }
    public function AddProduitPage(){
        $categories = $this->category->all();
        return view('Layout.addproduit')->with("categories" , $categories);
    }
    public function modifyProduitPage(Request $request){
        $id = $request->id;
        $product = $this->product->find($id);
        $categories = $this->category->all();        
        return view('Layout.modifyproduit')->with("product", $product)->with("categories" , $categories);
    }

    public function Add_Produit(Request $request){
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('assets/images'), $image_name);
        $categorie = $request->input('categorie');
        $prix = $request->input('prix');
        $description = $request->input('description');
        $name = $request->input('name');
        $produit =$this->product;
        $produit->image = $image_name;
        $produit->categorie_id = $categorie;
        $produit->prix = $prix;
        $produit->description = $description;
        $produit->name = $name;
        $produit->save();
        return redirect()->route('ProductView');
    }

    public function Delete_Produit(Request $request){
        $id = $request->input('id');
        $produit = $this->product->find($id);
        $produit->delete();
        return redirect()->route('ProductView');

    }

    public function Modify_Produit(Request $request)
    {    
        $id = $request->input('id');
        $produit = $this->product->find($id);
        if (!$produit) {
            return redirect()->route('ProductView')->with('error', 'Product not found');
        }
        $image = $request->file('image');
        if ($image) {
            $image_name = $image->getClientOriginalName();

            $image->move(public_path('assets/images'), $image_name);

            $produit->image = $image_name;
    }

    $categorie = $request->input('categorie');
    $prix = $request->input('prix');
    $description = $request->input('description');
    $name = $request->input('name');

    $produit->categorie_id = $categorie;
    $produit->prix = $prix;
    $produit->description = $description;
    $produit->name = $name;

    $produit->save();

    return redirect()->route('ProductView')->with('success', 'Product updated successfully');
}

}
