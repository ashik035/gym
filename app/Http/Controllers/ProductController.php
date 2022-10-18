<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Post;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use Validator;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.product.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $fileName = '';
        $data = [];
        $request->validate([
            'name' => 'required|max:255',
            'details' => 'required|max:500',
            'type' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
        ]);

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $ext = $request->file('image')->getClientOriginalExtension();

            $img = Image::make($image->getRealPath())->encode($ext);
            $filePath = 'images/product'.'/';

            Storage::disk('public')->put($filePath . $fileName, (string) $img);
            $data['image'] = $fileName;
        }
        $data['name'] = $request['name'];
        $data['details'] = $request['details'];
        $data['type'] = $request['type'];
        $data['price'] = $request['price'];
        // dd($data, $request->all());
        Product::create($data);

        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::where('id' , $id)->get()->first();
        return view('admin.product.show',compact('product'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileName = '';
        $data = [];

        if ($request->hasFile('image')) {
            $request->validate([
                'name' => 'required|max:255',
                'details' => 'required|max:500',
                'type' => 'required',
                'price' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
            ]);

            $image      = $request->file('image');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $ext = $request->file('image')->getClientOriginalExtension();

            $img = Image::make($image->getRealPath())->encode($ext);
            $filePath = 'images/product'.'/';

            Storage::disk('public')->put($filePath . $fileName, (string) $img);
            $data['image'] = $fileName;

            $im = $request['current_image'];
            $exists = Storage::disk('public')->exists("images/product/{$im}");
            if($exists){
                Storage::disk('public')->delete("images/product/{$im}");
            }
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'details' => 'required|max:500',
                'type' => 'required',
                'price' => 'required'
            ]);
            $data['image'] = $request['current_image'];
        }
        $data['id'] =  $id;
        $data['name'] = $request['name'];
        $data['details'] = $request['details'];
        $data['type'] = $request['type'];
        $data['price'] = $request['price'];
        Product::where('id' , $data['id'])
                ->update($data);

        return redirect()->route('product.index')
                        ->with('success','Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}