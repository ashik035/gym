<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Banner;
use App\Models\Post;
use App\Models\Contact;

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
}
