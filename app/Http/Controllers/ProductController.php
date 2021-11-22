<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sauverproduit (Request $request){
        // return view('admin.sauverproduit');
        $this->validate($request,[
            'product_name' => 'required|unique:products',
            'product_price'=>'required',
            'product_image'=>'image|nullable|max:1999',
            'product_category' => 'required']);
        // print($request->input('product_category'));
        if($request->hasFile('product_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('product_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $fileNameToStore;
        $product->status = 1;
        $product->save();
        return redirect('/ajouterproduit')->with('status',' Le produit '.$product->product_name.' a ete insere avec succes ! ');

    }
    public function ajouterproduit(){
        $categories = Category::All()->pluck('category_name','category_name');
        return view('admin.ajouterproduit')->with('categories',$categories);
    }
    public function produits(){
        $produits = Product::get();
        return view('admin.produits')->with('produits',$produits);
    }
    public function edit_produit($id){
        $produit = Product::find($id); 
        $categories = Category::All()->pluck('category_name','category_name');
        return view('admin.editproduit')->with('product',$produit)->with('categories',$categories);

    }
    public function modifierproduit(Request $request){
        // return view('admin.sauverproduit');
        $this->validate($request,[
            'product_name' => 'required',
            'product_price'=>'required',
            'product_image'=>'image|nullable|max:1999',
            'product_category' => 'required']);
        // print($request->input('product_category'));
        $product =  Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');

        if($request->hasFile('product_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('product_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
            if($product->product_image != 'noimage.jpg'){
                Storage::delete('public/product_images/'.$product->product_image);
            }
            $product->product_image = $fileNameToStore;

        }
        $product->update();
        return redirect('/produits')->with('status','Le produit '.$product->product_name.' a ete modifier  avec succes ! '); }
        public function supprimerproduit($id){
            $product = Product::find($id);
            if($product->product_image != 'noimage.jpg'){
                Storage::delete('public/product_images/'.$product->product_image);
            }
            $product->delete();
            return redirect('/produits')->with('status','Le produit '.$product->product_name.' a ete supprimee avec succes ! ');
        }
        public function activer_produit($id){
            $product = Product::find($id);
            $product->status = 1;
            $product->update();
            return redirect('/produits')->with('status','Le produit '.$product->product_name.' a ete activee avec succes ! ');
        }
        public function desactiver_produit($id){
            $product = Product::find($id);
            $product->status = 0;
            $product->update();
            return redirect('/produits')->with('status','Le produit '.$product->product_name.' a ete desactivee avec succes ! ');
        }
     

 
}
