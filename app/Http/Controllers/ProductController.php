<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $all_product  = Product::all();

        return view('product.index',compact('all_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);
        $has_img = $request->file('img');
        if($has_img)
        {
            $photo=$request->file('img');
            $name = $photo->getClientOriginalName();
            $upload_file = public_path().'/img/';
            $photo->move($upload_file,$name);
            $data = '/img/' . $name;
        }
        Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'img' => $data ?? '',
            'desc' => $request->input('desc'),
        ]);

        return redirect()->route('product.index')->with('Success','Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eproduct = Product::where('id',$id)->first();
        $category = Category::all();

        return view('product.edit',compact("eproduct",'id','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasfile('new_img'))
        {
            $photo = $request->file('new_img');
            
            $name = $photo->getClientOriginalName();
            $public_path = public_path().'/img';
            $photo-> move($public_path,$name);
            $data = '/img/' . $name;

        }else{
            $data = request('old_photo');
        }
        $list = Product::find($id);
        $list->category_id = $request->input('category_id');
        $list->name = $request->input('name');
        $list->img = $data ?? '';
        $list->price = $request->input('price');
        $list->desc = $request->input('desc');   
        $list->save();

        return redirect()->route('product.index')->with('success','Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
