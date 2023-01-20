<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function view_category() // Retornar una lista con todas las categorías
    {
        $data = category::all();

        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request) // Añadir una categoría
    {
        $data = new Category();

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Categoría creada con éxito :)');
    }
    public function delete_category($id) // Eliminar una categoría
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Categoría eliminada con éxito :)');
    }
    public function view_product() // Mostrar ventana para crear un producto
    {
        $data = Product::all();
        $category = Category::all();

        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request) // Añadir un producto
    {
        $data = new Product();

        $data->title = $request->title;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->price = $request->price;
        $data->quantity = $request->quantity;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $data->image = $imagename;

        $data->save();

        return redirect()->back()->with('message', 'Producto creado con éxito :)');
    }

    public function show_product() // Mostrar los productos en una lista
    {
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id) // Eliminar un producto
    {
        $product = product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Producto eliminado con éxito');
    }

    public function update_product($id) // Vista para actualizar un producto
    {

        $product = product::find($id);
        $category = Category::all();


        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id) // Confirmar los cambios editados en un producto
    {
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();


        return redirect()->back()->with('message', 'Producto editado con éxito');
    }
    public function show_user() // Retornar una lista con todos los usuarios
    {
        $user = User::all();

        return view('admin.show_user', compact('user'));
    }
    public function view_user() // Retornar una vista para crear usuarios
    {
        $data = User::all();

        return view('admin.user');
    }
    public function add_user(Request $request) // Crear un usuario
    {
        $data = new User();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->usertype = $request->usertype;

        $data->save();

        return redirect()->back()->with('message', 'Usuario creado con éxito :)');
    }
    public function delete_user($id) // Eliminar un usuario vía ID
    {
        $user = user::find($id);

        $user->delete();

        return redirect()->back()->with('message', 'Usuario eliminado con éxito');
    }

    public function update_user($id) // Vista para editar un usuario
    {
        $user = user::find($id);

        return view('admin.update_user', compact('user'));
    }
    public function update_user_confirm(Request $request, $id) // Guardar los cambios editados en un usuario
    {
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('message', 'Usuario editado con éxito');
    }
    public function update_category($id) // Actualizar una categoría
    {
        $category = Category::find($id);

        return view('admin.update_category', compact('category'));
    }
    public function update_category_confirm(Request $request, $id) // Confirmar cambios editados
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;

        $category->save();

        return redirect()->back()->with('message', 'Categoría editada con éxito');
    }
    public function view_home() // Volver al HOME
    {
        return view('admin.home');
    }
}
