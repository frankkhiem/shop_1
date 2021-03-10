<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\StatusProduct;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keywork = $request->q;
        if( $keywork ) {
            $products = Product::where('products.name', 'like', '%'.$keywork.'%')                                    
                                    ->orWhere('products.short_desc', 'like', '%'.$keywork.'%')
                                    ->orWhere('products.full_desc', 'like', '%'.$keywork.'%')
                                    ->orderBy('products.id', 'desc')
                                    ->paginate(10);
        }
        else {
            $products = Product::orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.product.adminProduct',
                    [
                        'products' => $products,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.createProduct',
                [
                    'categories' => Category::all(),
                    'status_products' => StatusProduct::all(),
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ( $request->star ) {
            $star = true;
        }
        else {
            $star = false;
        }
        $product = new Product;
        $product->fill([
            'category_id' => $request->category_id, 
            'name' => $request->name, 
            'image' => $request->image, 
            'short_desc' => $request->short_desc, 
            'full_desc' => $request->full_desc, 
            'price' => $request->price, 
            'status_product_id' => $request->status_product_id,
            'star' => $star,
        ])->save();

        return redirect()->route('adminProduct.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::where('id', $id)->delete();
        return redirect()->route('adminProduct.index');
    }
}
