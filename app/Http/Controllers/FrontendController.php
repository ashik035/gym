<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Banner;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Review;
use App\Models\ProductOrder;
use App\Models\CourseRequest;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function frontend_home()
    {
        $about = About::select('about_me')->where('id',1)->get()->toArray();
        $banners = Banner::get()->all();
        if ($about) {
            $about_me = $about['0']['about_me'];
        } else {
            $about_me = '';
        }
        $posts = Post::get()->all();
        return view('frontend.home', compact('banners', 'about_me', 'posts'));
    }

    public function shop_all()
    {
        $products = Product::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest();
        $count = 0;
        if ($products->get()->count() > 3) {
            $products = $products->paginate(3);
            $count = 4;
        } else {
            $products = $products->get();
        }
        return view('frontend.shop.shop-all',compact('products', 'count'));
    }

    public function apparel()
    {
        $products = Product::where('deleted_at', '=', Null)->where('type', 'apparel')->orderBy('id', 'DESC')->latest();
        $count = 0;
        if ($products->get()->count() > 3) {
            $products = $products->paginate(3);
            $count = 4;
        } else {
            $products = $products->get();
        }
        return view('frontend.shop.apparel',compact('products', 'count'));
    }

    public function accessories()
    {
        $products = Product::where('deleted_at', '=', Null)->where('type', 'accessories')->orderBy('id', 'DESC')->latest();
        $count = 0;
        if ($products->get()->count() > 3) {
            $products = $products->paginate(3);
            $count = 4;
        } else {
            $products = $products->get();
        }
        return view('frontend.shop.accessories',compact('products', 'count'));
    }

    public function buy(Request $request)
    {
        $insert = ProductOrder::create($request->all());
        if ($insert) {
            return response()->json(['success'=>'Successfully Paid for the product. Admin will call you shortly.']);
        } else {
            return response()->json(['danger'=>'Some data of your input are not correct!']);
        }
    }

    public function contactPost(Request $request){
        $data = [];
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['subject'] = $request['subject'];
        $data['message'] = $request['message'];

        Contact::create($data);

        return redirect()->route('contact');
    }

    public function reviewPost(Request $request){
        $data = [];
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'details' => 'required'
        ]);

        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['subject'] = $request['subject'];
        $data['details'] = $request['details'];
        Review::create($data);

        return redirect()->route('review');
    }


    // Show All blogs to the frontend
    public function showBlogs()
    {
        $blogs = Blog::get()->all();
        return view('frontend.blog',compact('blogs'));
    }
}
