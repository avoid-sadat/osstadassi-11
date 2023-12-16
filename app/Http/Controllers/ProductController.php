<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->select('products.id as id', 'products.name as productName', 'products.quantity as quantity', 'products.price as sellPrice', 'sells.qty as totalsell', 'sells.total_price as TotalPrice')
            ->leftJoin('sells', 'products.id', '=', 'sells.product_id')
            ->get();
        $todaySales = $this->getSalesForDate(Carbon::now());

        // Sales figures for yesterday
        $yesterdaySales = $this->getSalesForDate(Carbon::yesterday());

        // Sales figures for this month
        $thisMonthSales = $this->getSalesForMonth(Carbon::now());

        // Sales figures for last month
        $lastMonthSales = $this->getSalesForMonth(Carbon::now()->subMonth());


        return view('dashboard', compact('products','todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    public function showForm()
    {
        return view('products.form');
    }

    public function addProduct(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        // Create a new product
        DB::table('products')->insert($validatedData);

        return redirect()->route('home')->with('success', 'Product added successfully.');
    }

    public function store(Request $request)
    {
        // Validate the form data for selling a product
        $validatedData = $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:1',
        ]);

        // Update the product quantity after selling
        DB::table('products')
            ->where('id', $validatedData['product_id'])
            ->decrement('quantity', $validatedData['qty']);

        // Record the sale in the sells table
        DB::table('sells')->insert([
            'product_id' => $validatedData['product_id'],
            'qty' => $validatedData['qty'],
            'total_price' => $request->total_price * $validatedData['qty'], // You need to calculate the total price based on the product price and quantity sold
            // Add any other necessary fields
        ]);

        return redirect()->route('home')->with('success', 'Product sold successfully.');
    }

    public function show($id){
        $updateProduct = DB::table('products')->where('id',$id)->first();
        return view('products.update',compact('updateProduct'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        DB::table('products')
            ->where('id',$id)
            ->update($validatedData);

        return redirect()->route('home')->with('success', 'Product update successfully.');
    }
    public function getSalesForDate($date)
    {
        return DB::table('sells')
            ->whereDate('created_at', $date->toDateString())
            ->sum('total_price');
    }

    public function getSalesForMonth($date)
    {
        return DB::table('sells')
            ->whereYear('created_at', $date->year)
            ->whereMonth('created_at', $date->month)
            ->sum('total_price');
    }
}
