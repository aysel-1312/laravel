<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class StockController extends Controller
{
    public function add(Request $request)
    {
        $stock = new Stock();
        $stock->stokAdeti = $request->stokAdeti;
        $stock->product_id = $request->product_id;
        $stock->silindiMi = 1;
        $stock->save();
        return redirect()->route('stock')
            ->with('message', 'Stok  başarıyla eklendi.');
    }

    public function delete($id)
    {
        $stock = Stock::find($id);
        $stock->silindiMi = 0;
        $stock->save();
        return redirect()->route('stock')
            ->with('message', 'Stok Silindi.');
    }

    public function index()
    {
        //return view("proje.stock");
        $stocks = Stock::where("silindiMi", 1)->get();
        $products = Product::where("silindiMi", 1)->get();
        return view("proje.stock", compact('stocks','products'));
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view("proje.update1", compact('stock'));
    }

    public function save($id,Request $request)
    {
        $stock = Stock::where('id',$id)->first();
        $stock->stokAdeti = $request->stokAdeti;
        return $stock;
        $stock->update();

        return redirect()->route('stock')
            ->with('message', $request->stokAdeti . ' adlı ürün Güncellendi.');
    }
}
