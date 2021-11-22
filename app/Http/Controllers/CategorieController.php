<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class CategorieController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ajoutercategorie (){
        return view('admin.ajoutercategorie');
    }
    public function sauvercategorie(Request $request){
        $this->validate($request,['category_name'=>'required|unique:categories','category_image'=>'image|nullable|max:20999']);
        if($request->hasFile('category_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('category_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('category_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('category_image')->storeAs('public/category_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        $categorie = new Category();
        $categorie->category_name = $request->input('category_name');
        $categorie->category_image = $fileNameToStore;
        $categorie->save();
        return redirect('/ajoutercategorie')->with('status','La cateogie '.$categorie->category_name.' a ete ajoutee avec success ');

    }
    public function categories(){
        $categories = Category::get();
        return view('admin.categories')->with('categories',$categories);
    }
    public function edit_categorie($id){
        $category = Category::find($id);

        return view('admin.editcategorie')->with('categorie',$category);
    }
    public function modifiercategorie(Request $request){
        $this->validate($request,['category_name'=>'required','category_image'=>'image|nullable|max:20999']);
        $categorie =  Category::find($request->input('id'));
        $categorie->category_name = $request->input('category_name');
        if($request->hasFile('category_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('category_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('category_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('category_image')->storeAs('public/category_images',$fileNameToStore);
            if($categorie->category_image != 'noimage.jpg'){
                Storage::delete('public/category_images/'.$categorie->category_image);
            }
            $categorie->category_image = $fileNameToStore;

        }
       
        $categorie->update();
        return redirect('/categories')->with('status','La categorie '.$categorie->category_name.' a ete modifiee avec success ');

    }
    public function supprimercategorie($id){
        $categorie = Category::find($id);
        $categorie->delete();
       ;
        return redirect('/categories')->with('status','La categorie '.$categorie->category_name.' a ete supprimee  avec success ');

          
    }
}
