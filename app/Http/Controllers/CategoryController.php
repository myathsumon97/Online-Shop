<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
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
        $all_category = Category::all();

        return view('category.index',compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $has_img = $request->file('img');
        if($has_img)
        {
            $photo=$request->file('img');
            $name = $photo->getClientOriginalName();
            $upload_file = public_path().'/img/';
            $photo->move($upload_file,$name);
            $data = '/img/' . $name;
        }

       $category = new Category;
       $category->name = $request->input('name');
       $category->img = $data ?? '';
       $category->save();
       
        return redirect()->route('category.index');
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
        $ecategory = Category::where('id',$id)->first();

        return view('category.edit',compact("ecategory",'id'));
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

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->img = $data ?? '';
        $category->save();

        return redirect()->route('category.index')->with('success','Successfully Edit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        //return redirect
        return redirect()->route('category.index')->with('success','Successfully Delete!');
    }
}
