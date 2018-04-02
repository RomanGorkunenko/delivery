<?php
namespace App\Http\Controllers;
use resources\views\showcart;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\Carts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
   public function add(Request $request){
       //dd($request->all());
       $productsId=$request->productsId;
       $productsById = Products::where('id', $productsId)->first();
       Cart::add([
           'id'=>$productsId,
           'name'=>$productsById->title,
           'price'=>$productsById->price,
           'qty'=>$request->qty,
       ]);
       
       return redirect('/');
    }
    public function show(Request $request){
    if ($request->session()->has('cart')) {

        $cartProducts = Cart::Content();
        
    return view('showcart', ['cartProducts'=>$cartProducts]);}
        else  return redirect('/');
    }
    
    public function update(Request $request){
        //dd($request->all());
        Cart::update($request->rowId, $request->qty);
        return redirect('/showcart')->with('msg', 'Товар обновлен успешно');
    }
    
    public function remove($rowId){
        Cart::remove($rowId);
        return redirect('/showcart')->with('msg', 'Товар удален успешно');      
    }
        public function save(Request $request){
        $data=$request->session()->get('cart'); 
        $collection=$data['default']->toArray();
        foreach ($collection as $a=>$b){
          $cart = new Carts;
          $cart->adres = $request->adres;
          $cart->name=$b['name'];
          $cart->price = $b['price'];
          $cart->qty = $b['qty'];
          $cart->subtotal = $b['subtotal'];
          $cart->userName = Auth::user()->name;
          $cart->userId = Auth::user()->id;
          $cart->phone = Auth::user()->phone;
          //dd(Auth::user()->phone);
          $cart->productId = strtotime("now");
          $id=$request->session()->getId();
          $cart->save();
        }
        //$request->session()->flush();
        $request->session()->forget('cart');
        return redirect('/showcart');
//foreach ($collection as $a=>$s){
//    var_dump($s);}
//dd($request->session()->store->attributes->cart);    
    }

}
