<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carts;
use App\Users;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function profile(){
        $all = Carts::where('userId', Auth::user()->id)
        ->get();                
        return view('profile', ['all'=>$all]);
    }
    
    public function orders() {
        $all = Carts::paginate(5);
        return view('admin.posts.orders', ['all'=>$all]);
    }
    
    public function orderdestroy($id) {
        $products_Class = Carts::find($id);
        $products_Class->delete();
        return redirect()->route('orders');
    }
    public function users() {
        $all = Users::where('is_admin', NULL)
        ->paginate(5);
        return view('admin.posts.users', ['all'=>$all]);
    }
    
    public function usersdestroy($id) {
        $products_Class = Users::find($id);
        $products_Class->delete();
        return redirect()->route('users');
    }
}
