<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;

class HomeController extends Controller
{

    public function index() // Retornar la página HOME y listar las categorías con sus respectivos productos
    {
        $product = Product::all();
        $category = Category::all();
        return view('home.userpage', compact('product', 'category'));
    }

    public function redirect() // Función para redirigir el usuario a la ruta que le corresponde según su tipo
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') { // Admin
            return view('admin.home');
        } else { // NO admin
            $product = Product::all();
            $category = Category::all();
            return view('home.userpage', compact('product', 'category'));
        }
    }

    public function order_by_desc() // Retornar los productos ordenador por precio descendente
    {
        // NO admin
        $product = Product::all()->sortByDesc("price");
        $category = Category::all();
        return view('home.userpage', compact('product', 'category'));
    }

    public function order_by_asc() // Retornar los productos ordenador por precio ascendente
    {
        // NO admin
        $product = Product::all()->sortBy("price");
        $category = Category::all();
        return view('home.userpage', compact('product', 'category'));
    }

    public function product_details($id) // Inspeccionar los detalles de un producto
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id) // Añadir un producto a un carrito
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } else {
                $cart->price = $product->price;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart() // Mostrar la ventana del carrito a los usuarios logeados
    {
        if (Auth::id()) {
            $id = Auth::user()->id;

            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            return view('auth.login');
        }
    }

    public function remove_cart($id) // Borrar elementos del carrito
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
