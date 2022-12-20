<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // All Data Show
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('product', ['products'=>$products]);
    }

    // Store 
    public function store(Request $request){
        $request->validate(
            [
                'name'  => ['required', 'string', 'unique:products,name'],
                'price'  => ['required', 'integer']
            ],
            [
                'name.required' => 'Name is required.',
                'name.unique' => 'Product Already exists.',
                'price.required' => 'Price is required,',
            ]
        );

        Product::create([
            'name'  => $request->name,
            'price'  => $request->price,
        ]);

        return response()->json([
            'status'    => 'success',
        ]);
    }

    // update
    public function update(Request $request){
        $request->validate(
            [
                'up_name'  => ['required', 'string', 'unique:products,name,'.$request->up_id],
                'up_price'  => ['required']
            ],
            [
                'up_name.required' => 'Name is required.',
                'up_name.unique' => 'Product Already exists.',
                'up_price.required' => 'Price is required,',
            ],
        );

        Product::where('id', $request->up_id)->update([
            'name'  => $request->up_name,
            'price'  => $request->up_price,
        ]);

        return response()->json([
            'status'    => 'success',
        ]);
    }

    public function destroy(Request $request){
        Product::where('id', $request->product_id)->delete();
        
        return response()->json([
            'status'    => 'success',
        ]);
    }

    // Pagination 
    public function pagination(){
        $products = Product::latest()->paginate(5);
        return view('product_pagination', ['products'=>$products])->render();
    }

    // Search 
    public function search(Request $request){
        $products = Product::where('name', 'like', '%'.$request->searchString.'%')
        ->orWhere('price', 'like', '%'.$request->searchString.'%')
        ->orderBy('id', 'desc')->paginate(5);

        if ($products->count() >= 1) {
            return view('product_pagination', ['products'=>$products])->render();
        }else{
            return response()->json([
                'status'=> 'nothing_found',
            ]);
        }
        
    }
}
