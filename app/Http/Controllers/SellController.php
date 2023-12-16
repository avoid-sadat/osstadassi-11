<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    public function index($id){

        $productSell= DB::table('products')->where('id',$id)->first();
        return view('Sell.form',compact('productSell'));
    }

    public function transaction(){
        $sells = DB::table('products')
            ->select( 'products.name as productName', 'sells.id as id' , 'sells.qty as totalsell', 'sells.total_price as TotalPrice','sells.created_at as sellTime')
            ->leftJoin('sells', 'products.id', '=', 'sells.product_id')
            ->get();
        return view('Sell.transaction',compact('sells'));
    }

    public function store(Request $request){
       // dd($request->all());
$this->validate($request,[
    'name'=>'required'
]);
DB::table('sells')->insert([
    'product_id'=>$request->product_id,
    'qty'=>$request->qty,
    'total_price'=>$request->total_price
]);
        return redirect()->route('home')->with('success', 'Product Sold successfully.');

    }
}
