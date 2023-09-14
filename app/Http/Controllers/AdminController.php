<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{    
    
    // Affiche toutes les catégories
    public function view_category()
    {
         $data = category::all();   // Récupère toutes les catégories depuis la base de données

         return view('admin.category', compact('data'));   // Affiche la vue 'admin.category' avec les données récupérées
    }

    // Ajouter une catégorie
    public function add_category(Request $request)
    {
    $data = new category;   // Crée une nouvelle instance de la classe Category

        $data->category_name = $request->category;   // Attribue la valeur du champ 'category' de la requête à la propriété 'category_name'

        $data->save();   // Enregistre la nouvelle catégorie dans la base de données

        return redirect()->back()->with('message', 'Catégorie ajoutée avec succès!');   // Redirige l'utilisateur vers la page précédente avec un message de succès
         
    }

    // Supprimer une catégorie
    public function delete_category($id)   // Rechercher une catégorie par son identifiant
    {
        $data = category::find($id);   

        $data->delete();   // Supprimer la catégorie de la base de données

        return redirect()->back()->with('message', 'Categorie Supprimée avec Succès.');   // Redirige l'utilisateur vers la page précédente avec un message de succès
    }

     // Afficher tous les produits
    public function view_product()
    {
        $category =category::all();   // Récupère toutes les catégories depuis la base de données

        return view('admin.product', compact('category'));   // Affiche la vue 'admin.product' avec les données récupérées
    }

    // Ajouter un nouveau produit
    public function add_product(Request $request)
    {
        // Créee une nouvelle instance de la classe Product et assigne les valeurs des champs du formulaire aux propriétés correspondantes.
        $product = new product();

        $product->product_name = $request->product_name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->discount_price = $request->discount_price;

        $product->quantity = $request->quantity;

        $product->category = $request->category;


        
        //  Vérifiez d'abord si un fichier a été téléchargé
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            
            // Déplacez le fichier téléchargé vers le répertoire 'public/product' avec le nouveau nom
            $image->move('public/product', $imgname);

            // Enregistrez le nom de l'image dans la base de données
            $product->image = $imgname;
        }

        // Sauvegarder le produit dans la base de données et redirige avec un message de succès.
        $product->save();

        return redirect()->back()->with('message', 'produit ajouté avec succès');
    }

    // Afficher tous les produits
    public function view_showProduct()
    {
        $product = product::all();   // Récupèrer tous les produits depuis la base de données

        return view('admin.showProduct', compact('product'));   // Afficher la vue 'admin.showProduct' avec les données récupérées
    }

    // Supprime un produit
    public function delete_product($id)
    {
        $product = product::find($id);

        $product->delete();   // Supprime un produit par son identifiant et redirige avec un message de succès.

        return redirect()->back()->with('message', 'Produit Supprimer avec Succès');
    }

    // Affiche un formulaire de mise à jour de produit
    public function update_product($id)
    {
        $product = product::find($id);

        $category = Category::all();

         return view('admin.update_product', compact('product', 'category'));
    }

    // Traite la mise à jour d'un produit
    public function update_product_confirm(Request $request, $id)
    {
        // Met à jour les informations d'un produit avec les nouvelles données du formulaire.
        $product = product::find($id);

        $product->product_name = $request->product_name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->discount_price = $request->discount_price;

        $product->quantity = $request->quantity;

        $product->category = $request->category;

        // Gèrer le téléchargement d'une nouvelle image si elle est fournie.
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            
            // Déplacez le fichier téléchargé vers le répertoire 'public/product' avec le nouveau nom
            $image->move('public/product', $imgname);

            // Enregistrez le nom de l'image dans la base de données
            $product->image = $imgname;
        }
        
        $product->save();  // Enregistre les nouvelles informations dans la base de données et redirection vers un message succès

        return redirect()->back()->with('message', 'produit modifier avec succès');

    }

    // Afficher toutes les commandes
    public function order() 
    {
        $order = order::all();   // Récupèrer toutes les commandes depuis la base de données

        return view('admin.order', compact('order'));   // Afficher la vue 'admin.order' avec les données récupérées
    }

    // Marquer une commande comme livrée 
    public function delivered($id)
    {
        $order = order::find($id);

        $order->delivery_status = 'Livrer';

        $order->payment_status = 'payer';

        $order->save();
        
        return redirect()->back();

    }

    // Rechercher des commandes en fonction du texte saisi
    public function searchdata(Request $request)
    {
        $searchText = $request->search;

        // Effectuer une recherche dans les commandes en fonction des critères spécifiés dans la requête.
        $order = order::where('name', 'LIKE', "%$searchText%")->orWhere('telephone', 'LIKE', "%$searchText%")->orWhere('product_name', 'LIKE', "%$searchText%")->get();

        return view('admin.order', compact('order'));   // Afficher les résultats dans la vue 'admin.order'.
    }
}



    

    

    

   
    
