<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SalesProduct;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:kasir');
    }

    public function index()
    {
        $sales = Sale::with(['products', 'user'])->where('user_id', Auth::id())->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*' => 'integer|min:0'
        ]);

        $sale = new Sale;
        $sale->user_id = Auth::id();
        $sale->customer_name = $request->customer_name;
        $sale->total_price = 0; // Inisialisasi total harga
        $sale->save();

        foreach ($request->products as $product_id => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($product_id);
                $product->stock -= $quantity;
                $product->save();

                $saleProduct = new SalesProduct;
                $saleProduct->sale_id = $sale->id;
                $saleProduct->product_id = $product_id;
                $saleProduct->quantity = $quantity;
                $saleProduct->save();

                $sale->total_price += $product->price * $quantity; // Hitung total harga
            }
        }

        $sale->save(); // Simpan total harga

        return redirect()->route('sales.index');
    }

    public function show($id)
    {
        $sale = Sale::with('products', 'user')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::with('products')->findOrFail($id);
        $products = Product::all();
        return view('sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*' => 'integer|min:0'
        ]);

        $sale = Sale::findOrFail($id);
        $sale->customer_name = $request->customer_name;
        $sale->total_price = 0; // Reset total harga
        $sale->save();

        $sale->products()->detach();
        foreach ($request->products as $product_id => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($product_id);
                $product->stock -= $quantity;
                $product->save();

                $saleProduct = new SalesProduct;
                $saleProduct->sale_id = $sale->id;
                $saleProduct->product_id = $product_id;
                $saleProduct->quantity = $quantity;
                $saleProduct->save();

                $sale->total_price += $product->price * $quantity; // Hitung total harga
            }
        }

        $sale->save(); // Simpan total harga

        return redirect()->route('sales.index');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        foreach ($sale->products as $product) {
            $product->stock += $product->pivot->quantity;
            $product->save();
        }
        $sale->delete();

        return redirect()->route('sales.index');
    }

    // Method to show the invoice
    public function showInvoice($id)
    {
        $sale = Sale::with('products', 'user')->findOrFail($id);
        return view('sales.invoice', compact('sale'));
    }
}
