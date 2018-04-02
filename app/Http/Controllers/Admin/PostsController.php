<?php
namespace App\Http\Controllers\Admin;
use Image;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
class PostsController extends Controller
{
    public function index() {
        $all = Products::paginate(5);
        return view('admin.posts.index', ['all'=>$all]);
    }
    
    public function users() {
        $all = Products::paginate(5);
        return view('admin.posts.users', ['all'=>$all]);
    }
    
    public function five() {
        $all = Products::all();
        $count = Cart::count();
        return view('welcome', ['all'=>$all, 'count'=>$count]);     
    }
    
    public function create(Request $request) {   
        $products= new Products();    
        if($request->method()=='POST'){
            $products->id = strip_tags(trim($request->id));
            $products->title = strip_tags(trim($request->title));
            $products->category = strip_tags(trim($request->category));
            $products->description = strip_tags(trim($request->description));
            $products->weight = strip_tags(trim($request->weight));
            $image = $request->file('image');
            $upload = './uploads';
            $filename = $image->getClientOriginalName();
            $img = Image::make($image)->resize(320, 240);
            $img->save($upload.'/'.$filename);
            $products->filename = strip_tags(trim($filename));
            $products->price = strip_tags(trim($request->price));
            $products->save();
            return redirect()->route('products');
        }
        return view('admin.posts.create');
    }
    
    public function edit($id, Request $request) {
        $productsClass = Products::find($id);  
        if($request->method()=='POST'){
            $productsClass->title = strip_tags(trim($request->title1));
            $productsClass->category = strip_tags(trim($request->category1));
            $productsClass->description = strip_tags(trim($request->description1));
            $productsClass->weight = strip_tags(trim($request->weight1)); 
            $image1 = $request->file('images');
            $upload1 = './uploads';
            $filename1 = $image1->getClientOriginalName();
            $img1 = Image::make($image1)->resize(320, 240);
            $img1->save($upload1.'/'.$filename1);
            $productsClass->filename = strip_tags(trim($filename1));
            $productsClass->price = strip_tags(trim($request->price1));
            $productsClass->save();
            return redirect()->route('products');
        }
        return view('admin.posts.edit', ['id'=>$productsClass->id, 'title'=>$productsClass->title, 'category'=>$productsClass->category, 'description'=>$productsClass->description, 'weight'=>$productsClass->weight, 'filename'=>$productsClass->filename, 'price'=>$productsClass->price]);
    }
    
    public function destroy($id)
    {
        $products_Class = Products::find($id);
        $products_Class->delete();
        return redirect()->route('products');
    }
}