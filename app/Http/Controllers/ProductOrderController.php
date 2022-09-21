<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use App\Models\Product;
use App\Http\Requests\StoreProductOrderRequest;
use App\Http\Requests\UpdateProductOrderRequest;

class ProductOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = ProductOrder::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.product.product_order_list',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = ProductOrder::where('id' , $id)->get()->first();
        $product = Product::where('id' , $order->product_id)->get()->first();
        $p = (int)$product->price;
        $cost = $p + (($p/1000)*20);
        return view('admin.product.order_show',compact('order', 'product', 'cost'));
    }

    public function destroy($id)
    {
        ProductOrder::find($id)->delete();

        return redirect()->route('product.order.list')
                        ->with('success','Product Request deleted successfully');
    }
}
