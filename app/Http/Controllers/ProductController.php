<?php

namespace App\Http\Controllers;

use App\Models\product;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_arr=product::all();
        return view('website.manage_product',["product_arr"=>$product_arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png,gif',
            'price' => 'required',
            'description' => 'required'
        ]); 

       $data=new product();
       $data->name=$request->name;

       // image upload
       $file=$request->file('img');		
       $filename=time().'_img.'.$file->getClientOriginalExtension(); // 656676576_img.jpg
       $file->move('website/assets/img/product/',$filename);  // use move for move image in public/images
    
       $data->img=$filename; // name store in db
       $data->price=$request->price;
       $data->description=$request->description;
       $data->save();
       Alert::success('Success Title', 'Product Add Success');
       return redirect('/add_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=product::find($id); // all data in array
        return view('website.editproduct',["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);

        $data = product::find($id); // single data
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;


        // image upload
        if($request->hasfile('img'))
        {
            $old_img=$data->img;
            unlink('website/assets/img/product/'.$old_img);

            $file = $request->file('img');
            $filename = time() . '_img.' . $file->getClientOriginalExtension(); // 656676576_img.jpg
            $file->move('website/assets/img/product/', $filename);  // use move for move image in public/images
            $data->img = $filename; // name store in db
        }  

        $data->update();
        // session()->put('ses_username',$request->name); 
        Alert::success('Success', 'Update Success');
        return redirect('/manage_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=product::find($id);
        $img=$data->img;
        unlink('website/assets/img/product/'.$img);
		$data->delete();
        Alert::success('Success Delete', 'Product Deleted Success');
		return redirect('/manage_product');
    }
}
