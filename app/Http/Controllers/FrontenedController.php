<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\Product;

class FrontenedController extends Controller
{
    public function login()
    {
    	return view('frontened.login');
    }

    public function loginStore(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])){
                return redirect('/index');
           
        }else{
            return redirect('/online/login')->withInput()->with('error', 'Login failed! Try again.');
        }
    }

    public function registerStore(Request $request)
    {
    	User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'password' => Hash::make( $request->input('password')),
            'user_type' => 0,
            'address' =>  $request->input('address'),
            'phone' =>  $request->input('phone'),
        ]);

        return redirect('/index');
    }

    public function index()
    {
        $categories = Category::all();
        $f_product = Product::take(5)->get();
        return view('frontened.index',compact('categories','f_product'));
    }

    public function product()
    {
        $f_product = Product::get();

        return view('frontened.product',compact('f_product'));
    }

    public function contact()
    {
        return view('frontened.contact');
    }
    public function AddtoCart(Request $request)
    {
       return view('frontened.add_to_cart');
        
    }
}
