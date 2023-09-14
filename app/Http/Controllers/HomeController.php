<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    // Afficher la page d'accueil avec une liste paginée de produits
    public function index()
    {
        $product = Product::paginate(10);

        return view('home.index', compact('product'));
    }

    // Rediriger l'utilisateur en fonction de son type (administrateur ou utilisateur)
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            // Si l'utilisateur est un administrateur, affiche des statistiques administratives
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_livrer = Order::where('delivery_status', '=', 'livrer')->get()->count();
            $total_traitement = Order::where('delivery_status', '=', 'traitement')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'order', 'total_revenue', 'total_livrer', 'total_traitement'));
        } else {
            $product = Product::paginate(10);

            return view('home.index', compact('product'));
        }
    }

    // Déconnecter l'utilisateur et le rediriger-le vers la page d'accueil
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    // Afficher les détails d'un produit
    public function product_details($id)
    {
        $product = Product::find($id);

        return view('partials.product_details', compact('product'));
    }

    // Ajouter un produit au panier de l'utilisateur
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);

            // Créer un nouvel élément de panier
            $cart = new Cart;
            
            // Copier les informations de l'utilisateur dans l'élément de panier
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->telephone = $user->telephone;
            $cart->adresse = $user->adresse;
            $cart->user_id = $user->id;

            // Calcule du prix en fonction du prix du produit et de la quantité demandée
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }

            // Copier les informations du produit dans l'élément de panier
            $cart->product_name = $product->product_name;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            // Enregistre l'élément du panier dans la base de données
            $cart->save();

            // Redirige l'utilisateur vers la page précédente
            return redirect()->back();
        } else {
            // Si l'utilisateur n'est pas connecté, redirige-le vers la page de connexion
            return redirect('/login');
        }
    }

    // Afficher le contenu du panier de l'utilisateur
    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('partials.show_cart', compact('cart'));
        } else {
            return redirect('/login');
        }
    }

    // Supprimer un produit du panier de l'utilisateur
    public function remove_product($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    // Traiter la commande de l'utilisateur et enregistre les détails dans la base de données
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        // Vérifier si le panier n'est pas vide
        $data = Cart::where('user_id', $userid)->get();

        if ($data->isEmpty()) {
            return redirect()->back()->with('message', 'Votre panier est vide. Ajoutez des produits avant de passer une commande.');
        }

        foreach ($data as $data) {
            $order = new Order;

            // Copier les données du panier dans la commande
            $order->name = $data->name;
            $order->email = $data->email;
            $order->telephone = $data->telephone;
            $order->adresse = $data->adresse;
            $order->user_id = $data->user_id;
            $order->product_name = $data->product_name;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'paiement à la livraison';
            $order->delivery_status = 'traitement';
            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            // Supprimer l'élément du panier
            $cart->delete();
        }

        return redirect()->back()->with('message', 'Votre commande a été enregistrée avec succès. Vous serez livré d\'ici 24 heures.');
    }

    // Afficher les commandes passées par l'utilisateur
    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id', '=', $userid)->get();

            return view('partials.show_order', compact('order'));
        } else {
            return redirect('/login');
        }
    }

    // Annuler une commande
    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Vous avez annulé la commande.';
        $order->save();

        return redirect()->back()->with('message', 'Commande annulée.');
    }
}
