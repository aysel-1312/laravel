<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function add(Request $request)
    {
        $product = new Product();
        $product->ad = $request->ad;
        $product->uuid = Str::uuid()->toString();
        $product->silindiMi = 1;

        $product->save();
        return redirect()->route('product')
            ->with('message','Ürün  başarıyla eklendi.');
    }

    public function delete($id){
        $product=Product::find($id);
        $product->silindiMi = 0;
        $product->save();
        return redirect()->route('product')
            ->with('message','Ürün Silindi.');
    }

    public function index()
    {
        //return view("proje.product");
        $data['product'] = Product::all()->where("silindiMi", 1);
        /*
        foreach (Product::all() as $product) {
            echo $product->ad;
        }*/
        return view("proje.product" , $data);
    }


    public function edit($id){

        $product=Product::find($id);
        $data['product'] = $product;
        return view("proje.update" , $data);
    }


    public function save(Request $request){
        $product=Product::find($request->id);
        $product->ad = $request->ad;
        $product->save();

        return redirect()->route('product')
            ->with('message',$request->ad .' adlı ürün Güncellendi.');
    }



}
