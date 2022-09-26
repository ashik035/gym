<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
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

    public function productBuy(Request $request)
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

    // Preogram Menu bar's part start

    public function one_on_one()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'One-on-One Training')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.one-on-one',compact('courses', 'count', 'class'));
    }

    public function online_fitness_coaching_for_general()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'Online Fitness Coaching for General')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.onilne-fitness-coaching',compact('courses', 'count', 'class'));
    }

    public function PCOS()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'PCOS(Poly-Cystic Ovarian Syndrome)')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.PCOS',compact('courses', 'count', 'class'));
    }

    public function HDDA()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'Heart Disease Diabetes Arthritis')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.HDDA',compact('courses', 'count', 'class'));
    }

    public function Exersise_and_diet()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'Exercise and Diet For Older Adults')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.Exersise_and_diet',compact('courses', 'count', 'class'));
    }

    public function customize_diet_plan()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'Customize Diet Plan')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.customize-diet-plan',compact('courses', 'count', 'class'));
    }

    public function customize_workout_diet()
    {
        $courses = Course::where('menu_name', 'PROGRAM')->where('sub_menu', 'Customize Workout Diet')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.program.customize-workout-diet',compact('courses', 'count', 'class'));
    }

    public function three_days_in_a_week()
    {
        $courses = Course::where('menu_name', 'ONLINE LIVE GROUP CLASS')->where('sub_menu', '3 Days In a Week')->get();
        $count = $courses->count();
        $class = '';
        if ($count == 1){
            $class = 'offset-lg-4 col-lg-3 offset-md-3 col-md-6';
        } else if ($count == 2){
            $class = 'offset-lg-2 col-lg-3 col-md-6';
        } else if ($count == 3){
            $class = 'col-lg-4 col-md-6';
        } else if ($count == 4){
            $class = 'col-lg-3 col-md-6';
        }
        return view('frontend.online_live_class.three_days_in_a_week',compact('courses', 'count', 'class'));
    }

    public function courseBuy(Request $request)
    {
        $insert = CourseRequest::create($request->all());
        if ($insert) {
            return response()->json(['success'=>'Successfully Paid for the Course Enrollment. Admin will call you shortly.']);
        } else {
            return response()->json(['danger'=>'Some data of your input are not correct!']);
        }
    }
}
