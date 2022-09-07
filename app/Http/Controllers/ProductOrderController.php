<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use App\Http\Requests\StoreProductOrderRequest;
use App\Http\Requests\UpdateProductOrderRequest;

class ProductOrderController extends Controller
{
    public function index()
    {
        $products = ProductOrder::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.product.product_order_list',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        ProductOrder::find($id)->delete();

        return redirect()->route('product.order.list')
                        ->with('success','Product Request deleted successfully');
    }
}
